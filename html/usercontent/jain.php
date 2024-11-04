<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/modules.css" />
	<!-- Scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		var currentLang = 'sv';
	</script>
</head>

<body class="white_bg xs-lgtgrey2_bg sm-lgtgrey2_bg">
	
	<!-- HEADER -->
	<div class="column_m header header_small bs_bb white_bg">
		<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 white_bg">
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="#"> <img src="images/qmatchup_logo_blue.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10"></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="images/slide/flag_us.png" width="24" height="16" title="US" alt="US" />
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="fright xs-dnone sm-dnone">
				<ul class="mar0 pad0">
					<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="http://www.qmatchup.com/beta/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 blue3_txt white_txt_h" data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
				</ul>
			</div>
			<div class="top_menu top_menu_custom mart2">
				<ul class="menulist">
					<li class="xs-mar0i sm-mar0i">
						<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <img src="images/top-menu.png" width="26" height="22" class="dblock" /> </a>
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
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Personal</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus" class="swedBank">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="images/product icons/icon-3.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-vrf" class="swedBank">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act" class="posted_jobs">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Activate</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-eng" class="proposals">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/product icons/icon-4.png" width="45" height="45" title="" alt="" />
												</div>Business</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="images/product icons/icon-5.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/product icons/icon-6.png" width="45" height="45" title="" alt="" />
												</div>Basic - Free</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="images/product icons/icon-7.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By organization</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-ind" class="swedBank">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By industry</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
											<a href="zoho_hr_portal4_subscription.html" class="business_prof">
												<div><img src="images/product icons/icon-8.png" width="45" height="45" title="" alt="" />
												</div>HR Portal</a>
										</li>
										<li>
											<a href="zoho_hr_portal4_subscription.html" class="swedBank">
												<div><img src="images/product icons/icon-9.png" width="45" height="45" title="" alt="" />
												</div>Sales</a>
										</li>
										<li>
											<a href="zoho_hr_portal4_subscription.html" class="posted_jobs">
												<div><img src="images/product icons/icon-10.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/product icons/icon-11.png" width="45" height="45" title="" alt="" />
												</div>Telemarketing</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
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
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Employees</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Customers</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="zoho_hr_portal7_subscription.html" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	
	
	<div class="column_m pos_rel">
		
		<!-- SUB-HEADER -->
		<div class="column_m sub_header hidden-xs hidden-sm white_bg">
			<div class="column_m white_bg">
				<div class="wrap sub_header_brdclr_dblue bs_bb padt5">
					<!-- Tab header -->
					<ul class="dflex alit_s justc_c mar0 pad0">
						<li class="dflex alself_fs marrl10 padrl5">
							<div class="minwi_100p pos_rel padr20">
								<img src="images/icons/tp-active.png" class="wi_auto hei_75p dblock marrla " alt="">
								<div class="hei_60p pos_abs top0 right0 brdr"></div>
							</div>
						</li>
						<li class="dflex alit_s marrl10 padrl5">
							<a href="zoho_hr_portal8_0.html" class="minwi_100p dblock padb15 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a talc fsz14 fsz15_a txt_f2f1f1 pred2_txt_a active">
								<span class="fa fa-user hei_35p dflex alit_c justc_c talc fsz20 black_txt pred2_txt_ph pred2_txt_pa"></span>
								<span class="dblock mart10">My profile</span>
							</a>
						</li>
						<li class="dflex alit_s marrl10 padrl5">
							<a href="zoho_hr_portal8.html" class="minwi_100p dblock padb15 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a talc fsz14 fsz15_a txt_f2f1f1 pred2_txt_a">
								<span class="fa fa-building-o hei_35p dflex alit_c justc_c talc fsz20 black_txt pred2_txt_ph pred2_txt_pa"></span>
								<span class="dblock mart10">Organization</span>
							</a>
						</li>
						<li class="dflex alit_s marrl10 padrl5">
							<a href="zoho_hr_portal8_1.html" class="minwi_100p dblock padb15 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a talc fsz14 fsz15_a txt_f2f1f1 pred2_txt_a">
								<span class="fa fa-industry hei_35p dflex alit_c justc_c talc fsz20 black_txt pred2_txt_ph pred2_txt_pa"></span>
								<span class="dblock mart10">Industrial</span>
							</a>
						</li>
						<li class="dflex alit_s marrl10 padrl5">
							<a href="zoho_hr_portal8_2.html" class="minwi_100p dblock padb15 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a talc fsz14 fsz15_a txt_f2f1f1 pred2_txt_a">
								<span class="fa fa-file-text-o hei_35p dflex alit_c justc_c talc fsz20 black_txt pred2_txt_ph pred2_txt_pa"></span>
								<span class="dblock mart10">Topic</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- Top info -->
		<div class="scroll-fix column_m container hidden-xs hidden-sm">
			<div class="scroll-fix-wrap white_bg">
				<div class="wrap maxwi_100">
					<ul class="mar0 pad0 padb15 talc fsz15">
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#sales_popup">Work profile</a> </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- CONTENT -->
		<div class="column_m container zi5 padt10">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<!-- Left sidebar -->
				<div class="wi_200p fleft pos_rel zi50">
					<div class="padrl10">
						
						<!-- Scroll menu -->
						<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
							<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 padt5 white_bg fsz14" id="scroll_menu">
								
								<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
									<div class="imgwrap nobrd">
										<div class="cropped_image"></div>
										<div class="subimg_load">
											<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
										</div>
									</div>
								</div>
								
								<ul class="mar0 pad0">
									<li class="dblock padrb10 padl8">
										<a href="new_business_profile5_1.html" class="hei_26p dflex alit_c pos_rel padrl10 pred2_bg_h pred2_bg_a dark_grey_txt white_txt_h white_txt_a">
											<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
											<span class="valm">Newsfeed</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
										</a>
									</li>
									<li class="dblock padrb10 padl8">
										<a href="zoho_hr_portal8_m.html" class="hei_26p dflex alit_c pos_rel padrl10 pred2_bg_h pred2_bg_a dark_grey_txt white_txt_h white_txt_a">
											<span class="fa fa-comment-o wi_20p dnone_pa"></span>
											<span class="valm">Messages</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
										</a>
									</li>
								</ul>
										
								<div class="mart10 marr40 marb20 brdt"></div>
								
								<ul class="dblock mar0 padl20 fsz13">
									
									<!-- Newsfeed -->
									<li class="dblock pos_rel padb20 padl30 brdl brdclr_hgrey brdclr_pred2_a">
										<h4 class="padb5 uppercase ff-sans hgrey_txt">Newsfeed</h4>
										<ul class="mar0 pad0">
											<li class="dblock padrb10">
												<a href="zoho_hr_portal8.html?scrollTo=scroll-section-1" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">News</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pred2_bg_pa  white_txt_pa">1</div>
									</li>
									
									<!-- Monitor -->
									<li class="dblock pos_rel padb20 padl30 brdl brdclr_hgrey brdclr_pred2_a">
										<h4 class="padb5 uppercase ff-sans hgrey_txt">Monitor</h4>
										<ul class="mar0 pad0">
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_2_1.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Domar</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pred2_bg_pa  white_txt_pa">2</div>
									</li>
									
									<!-- HR Appstore -->
									<li class="active dblock pos_rel padb20 padl30 brdl brdclr_hgrey brdclr_pred2_a">
										<h4 class="padb5 uppercase ff-sans hgrey_txt">HR appstore</h4>
										<ul class="mar0 pad0">
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_3_1.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Employee CRM</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_3_2.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Schedule</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal8_3_3.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Social Career</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal8_3_6.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Supplier CRM</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal8_3_7.html?scrollTo=scroll-section-1" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Recruiting</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_3_5.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">CV Bank</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pred2_bg_pa  white_txt_pa">3</div>
									</li>
									
									<!-- Procurement -->
									<li class="dblock pos_rel padb20 padl30">
										<h4 class="padb5 uppercase ff-sans hgrey_txt">Procurement</h4>
										<ul class="mar0 pad0">
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_4_1.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Staffing</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_4_2.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Recruiting</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_4_3.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Background Check</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pred2_bg_pa  white_txt_pa">4</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
				<!-- Center content -->
				<div class="wi_760p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg">
					
					<!-- Tabs -->
					<div class="padt10 padb15 padl15 xs-padr15 sm-padr15">
						
						<div class="tab-header padb30 talc uppercase">
							<ul class="dflex xs-dnone alit_fs mar0 pad0">
								<li class="dblock mar0 marr20 pad0">
									<a href="#" data-id="tab_Inhouse" class="active minhei_38p dflex alit_c justc_c pos_rel padrl35 brd brdclr_dblue brdrad3 white_bg blue_bg_a blue_bg_h uppercase dblue_txt white_txt_a white_txt_h">
										Inhouse
										<div class="dnone dblock_pa pos_abs top100 pos_cenX brd brdwi_5 brdclr_trans brdtclr_dblue"></div>
									</a>
								</li>
								<li class="dblock mar0 pad0">
									<a href="#" data-id="tab_Staffing" class="minhei_38p dflex alit_c justc_c pos_rel padrl35 brd nobrdr brdclr_dblue brdradtl3 white_bg blue_bg_a blue_bg_h uppercase dblue_txt white_txt_a white_txt_h">
										<span class="pos_rel">
											Staffing
											<span class="wi_14p hei_14p dblock pos_abs top-10p right-10p brdrad10 yellow2_bg lgn_hight_14 talc fsz10 darkblue_txt">5</span>
										</span>
										<div class="dnone dblock_pa pos_abs top100 pos_cenX brd brdwi_5 brdclr_trans brdtclr_dblue"></div>
									</a>
								</li>
								<li class="dblock mar0 pad0">
									<a href="#" data-id="tab_Recruiting" class="minhei_38p dflex alit_c justc_c pos_rel padrl35 brd nobrdr brdclr_dblue white_bg blue_bg_a blue_bg_h uppercase dblue_txt white_txt_a white_txt_h">
										Recruiting
										<div class="dnone dblock_pa pos_abs top100 pos_cenX brd brdwi_5 brdclr_trans brdtclr_dblue"></div>
									</a>
								</li>
								<li class="dblock mar0 pad0">
									<a href="#" data-id="tab_BackgroundChecks" class="minhei_38p dflex alit_c justc_c pos_rel padrl35 brd brdclr_dblue brdradrb3 white_bg blue_bg_a blue_bg_h uppercase dblue_txt white_txt_a white_txt_h">
										Background
										<div class="dnone dblock_pa pos_abs top100 pos_cenX brd brdwi_5 brdclr_trans brdtclr_dblue"></div>
									</a>
								</li>
							</ul>
							<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
								<option value="tab_Inhouse" selected>Inhouse</option>
								<option value="tab_Staffing">Staffing</option>
								<option value="tab_Recruiting">Recruiting</option>
								<option value="tab_BackgroundChecks">Background</option>
							</select>
						</div>
					
						<div class="tab_container ovfl_hid pos_rel">
							
							<div class="tab_content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a top0 left-100 left0_a padtb10 brd brdrad3 hide" id="tab_Inhouse">
								
								<!-- Charts -->
								<div class="marrl10 marb20 padt20 brdb">
									<div class="dflex fxwrap_w alit_s marrl-10">
								
										<!-- Line chart -->
										<div class="wi_50-20p xs-wi_100-20p marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel">
												<div class="dflex justc_sb alit_fe">
													<div>
														<h4 class="pad0 bold fsz26">54%</h4>
														<span class="fsz10">2.341 new customers</span>
													</div>
													<div class="tall fsz12 lgtgrey4_txt">
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 blue_bg"></span>
															<span class="valm">Upcoming</span>
														</div>
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 pur_ba03d9_bg"></span>
															<span class="valm">Incoming</span>
														</div>
													</div>
												</div>
												<div id="line-chart-Inhouse"></div>
											</div>
										</div>
								
										<!-- Donut chart -->
										<div class="wi_50-20p xs-wi_100-20p ovfl_hid marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel padt10">
												<div class="dflex tab-header padrl10">
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a active" data-id="tab-yearly-Inhouse">Yearly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-monthly-Inhouse">Monthly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-daily-Inhouse">Daily</a>
												</div>
												<div id="tab-yearly-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-yearly-Inhouse" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$13.6k</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">54%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">253</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">18</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-monthly-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-monthly-Inhouse" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$1600</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">34%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">36</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">2</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-daily-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-daily-Inhouse" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$341</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">23%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">10</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">1</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
								
											</div>
										</div>
								
									</div>
								</div>
										
								<!-- tabs header -->
								<div class="container tab-header padrl10 talc dark_grey_txt">
					
									<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone">
										<li>
											<a href="#" class="dblock brdradt5 active" data-id="tab_inhouse_total"> <span class="count">2</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_inhouse_property"> <span class="count">0</span> <span>Not posted</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_inhouse_visiting_address"> <span class="count">0</span> <span>Posted</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_inhouse_invoicing_address"> <span class="count">0</span> <span>Published</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_inhouse_contact_details"> <span class="count">0</span> <span>In progress</span> </a>
										</li>
										<li class="base">
											<a href="#" class="show_slide_modal custom brdradr5 orange2_bg white_txt" data-target="#new_client_modal" target="_blank"> <span class="count">+</span> <span>New client</span> </a>
										</li>
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
										<option value="tab_inhouse_total" selected>2</option>
										<option value="tab_inhouse_property">Not posted</option>
										<option value="tab_inhouse_visiting_address">Posted</option>
										<option value="tab_inhouse_invoicing_address">Published</option>
										<option value="tab_inhouse_contact_details">In progress</option>
									</select>
									<div class="clear"></div>
								</div>
					
								<!-- tabs content -->
								<div class="container padrl10 white_bg fsz14 dark_grey_txt">
					
									<!-- Summary -->
									<div class="tab-content padtb25" id="tab_inhouse_total">
										
										
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Not posted -->
									<div class="tab-content padtb25" id="tab_inhouse_property">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Posted -->
									<div class="tab-content padtb25" id="tab_inhouse_visiting_address">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Published -->
									<div class="tab-content padtb25" id="tab_inhouse_invoicing_address">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<a href="#" class="dblue_btn">Suggest</a>
															</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<a href="#" class="dblue_btn">Suggest</a>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- In progress -->
									<div class="tab-content padtb25" id="tab_inhouse_contact_details">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Closed -->
									<div class="tab-content padtb25" id="tab_inhouse_lost_closed">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
					
								</div>
								
								<div class="clear"></div>
							</div>
							<div class="tab_content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a top0 left-100 left0_a padtb10 brd brdrad3 hide" id="tab_Staffing">
								
								<!-- Charts -->
								<div class="marrl10 marb20 padt20 brdb">
									<div class="dflex fxwrap_w alit_s marrl-10">
								
										<!-- Line chart -->
										<div class="wi_50-20p xs-wi_100-20p marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="pos_rel">
												<div class="dflex justc_sb alit_fe">
													<div>
														<h4 class="pad0 bold fsz26">54%</h4>
														<span class="fsz10">2.341 new customers</span>
													</div>
													<div class="tall fsz12 lgtgrey4_txt">
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 blue_bg"></span>
															<span class="valm">Upcoming</span>
														</div>
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 pur_ba03d9_bg"></span>
															<span class="valm">Incoming</span>
														</div>
													</div>
												</div>
												<div id="line-chart-Staffing"></div>
											</div>
										</div>
								
										<!-- Donut chart -->
										<div class="wi_50-20p xs-wi_100-20p ovfl_hid marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel padt10">
												<div class="dflex tab-header padrl10">
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a active" data-id="tab-yearly-Staffing">Yearly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-monthly-Staffing">Monthly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-daily-Staffing">Daily</a>
												</div>
												<div id="tab-yearly-Staffing" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-yearly-Staffing" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$13.6k</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">54%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">253</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">18</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-monthly-Staffing" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-monthly-Staffing" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$1600</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">34%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">36</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">2</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-daily-Staffing" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-daily-Staffing" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$341</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">23%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">10</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">1</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
								
											</div>
										</div>
								
									</div>
								</div>
								
					
								<!-- tabs header -->
								<div class="container tab-header padrl10 talc dark_grey_txt">
					
									<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone">
										<li>
											<a href="#" class="dblock brdradt5 active" data-id="tab_total2"> <span class="count">2</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_property"> <span class="count">0</span> <span>Requests</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_visiting_address"> <span class="count">0</span> <span>Accepted</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_invoicing_address"> <span class="count">0</span> <span>Suggest</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab_contact_details"> <span class="count">0</span> <span>Hired</span> </a>
										</li>
										<li>
											<a href="#" class="brdradr5" data-id="tab_lost_closed"> <span class="count">0</span> <span>Lost/Closed</span> </a>
										</li>
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
										<option value="tab_total2" selected>2</option>
										<option value="tab_property">Requests</option>
										<option value="tab_inhouse_visiting_address">Accepted</option>
										<option value="tab_invoicing_address">Suggest</option>
										<option value="tab_contact_details">Hired</option>
										<option value="tab_lost_closed">Lost/Closed</option>
									</select>
									<div class="clear"></div>
					
								</div>
					
								<!-- tabs content -->
								<div class="container padrl10 white_bg fsz14 dark_grey_txt">
					
									<!-- Summary -->
									<div class="tab-content padtb25" id="tab_total2">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Active -->
									<div class="tab-content padtb25" id="tab_property">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Popular -->
									<div class="tab-content padtb25" id="tab_visiting_address">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Invoicing -->
									<div class="tab-content padtb25" id="tab_invoicing_address">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<a href="#" class="dblue_btn">Suggest</a>
															</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<a href="#" class="dblue_btn">Suggest</a>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Contact -->
									<div class="tab-content padtb25" id="tab_contact_details">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- № of employees -->
									<div class="tab-content padtb25" id="tab_num_employees">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Lost/Closed -->
									<div class="tab-content padtb25" id="tab_lost_closed">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
					
								</div>
					
								<div class="clear"></div>
							</div>
							<div class="tab_content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a top0 left-100 left0_a padtb10 brd brdrad3 hide" id="tab_Recruiting">
								
								<!-- Charts -->
								<div class="marrl10 marb20 padt20 brdb">
									<div class="dflex fxwrap_w alit_s marrl-10">
								
										<!-- Line chart -->
										<div class="wi_50-20p xs-wi_100-20p marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="pos_rel">
												<div class="dflex justc_sb alit_fe">
													<div>
														<h4 class="pad0 bold fsz26">54%</h4>
														<span class="fsz10">2.341 new customers</span>
													</div>
													<div class="tall fsz12 lgtgrey4_txt">
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 blue_bg"></span>
															<span class="valm">Upcoming</span>
														</div>
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 pur_ba03d9_bg"></span>
															<span class="valm">Incoming</span>
														</div>
													</div>
												</div>
												<div id="line-chart-Recruiting"></div>
											</div>
										</div>
								
										<!-- Donut chart -->
										<div class="wi_50-20p xs-wi_100-20p ovfl_hid marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel padt10">
												<div class="dflex tab-header padrl10">
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a active" data-id="tab-yearly-Recruiting">Yearly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-monthly-Recruiting">Monthly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-daily-Recruiting">Daily</a>
												</div>
												<div id="tab-yearly-Recruiting" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-yearly-Recruiting" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$13.6k</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">54%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">253</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">18</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-monthly-Recruiting" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-monthly-Recruiting" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$1600</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">34%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">36</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">2</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-daily-Recruiting" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-daily-Recruiting" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$341</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">23%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">10</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">1</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
								
											</div>
										</div>
								
									</div>
								</div>
								
					
								<!-- tabs header -->
								<div class="container tab-header padrl10 talc dark_grey_txt">
									<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone">
										<li>
											<a href="#" class="dblock brdradt5 active" data-id="tab1_Internal"> <span class="count">2</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab1_InternalNotPosted"> <span class="count">0</span> <span>Not Posted</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab1_InternalPosted"> <span class="count">0</span> <span>Posted</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab1_InternalPublished"> <span class="count">0</span> <span>Published</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab1_InternalInProgress"> <span class="count">0</span> <span>In Progress</span> </a>
										</li>
										<li>
											<a href="#" class="brdradr5" data-id="tab1_InternalClosed"> <span class="count">0</span> <span>Closed</span> </a>
										</li>
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
										<option value="tab1_Internal" selected>2</option>
										<option value="tab1_InternalNotPosted">Not Posted</option>
										<option value="tab1_InternalPosted">Posted</option>
										<option value="tab1_InternalPublished">Published</option>
										<option value="tab1_InternalInProgress">In Progress</option>
										<option value="tab1_InternalClosed">Closed</option>
									</select>
									<div class="clear"></div>
								</div>
					
								<!-- tabs content -->
								<div class="container padrl10 white_bg fsz14 dark_grey_txt">
					
									<!-- Summary -->
									<div class="tab-content padtb25" id="tab1_Internal">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Active -->
									<div class="tab-content padtb25" id="tab1_InternalNotPosted">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Popular -->
									<div class="tab-content padtb25" id="tab1_InternalPosted">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Invoicing -->
									<div class="tab-content padtb25" id="tab1_InternalPublished">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Contact -->
									<div class="tab-content padtb25" id="tab1_InternalInProgress">
										<!-- inner tab header -->
										<div class="container">
											<ul class="tab-header dblock mar0 pad0 talc dark_grey_txt">
												<li class="dblock fleft lgtgrey_bg">
													<a href="#" class="dblock pad15 lgtgrey2_bg_h lgtgrey2_bg_a cyanblue_txt active" data-id="tab1_internal"> <span>Internal</span> </a>
												</li>
												<li class="dblock fleft lgtgrey_bg">
													<a href="#" class="dblock pad15 lgtgrey2_bg_h lgtgrey2_bg_a cyanblue_txt" data-id="tab1_external_agency"> <span>External Agency</span> </a>
												</li>
												<li class="dblock fleft lgtgrey_bg">
													<a href="#" class="dblock pad15 lgtgrey2_bg_h lgtgrey2_bg_a cyanblue_txt" data-id="tab1_external_network"> <span>External Network</span> </a>
												</li>
												<div class="clear"></div>
											</ul>
										</div>
										<!-- inner tab content -->
										<div class="container">
											<div class="tab-content" id="tab1_internal">
												<form method="post" action="">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<thead class="lgtgrey2_bg fsz13" style="color: #c6c8ca;">
															<tr>
																<th class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check_all" class="check_all" /> </div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Job Title</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Type</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Applicants</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Screened</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Phone</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Meeting</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Offered</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">View</div>
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check0" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check1" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 2</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">2016-08-21</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
														</tbody>
													</table>
												</form>
											</div>
											<div class="tab-content" id="tab1_external_agency">
												<form method="post" action="">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<thead class="lgtgrey2_bg fsz13" style="color: #c6c8ca;">
															<tr>
																<th class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check_all" class="check_all" /> </div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Job Title</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Type</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Applicants</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Screened</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Phone</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Meeting</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Offered</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">View</div>
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check0" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check1" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 2</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">2016-08-21</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
														</tbody>
													</table>
												</form>
											</div>
											<div class="tab-content" id="tab1_external_network">
												<form method="post" action="">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<thead class="lgtgrey2_bg fsz13" style="color: #c6c8ca;">
															<tr>
																<th class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check_all" class="check_all" /> </div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Job Title</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Type</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Applicants</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Screened</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Phone</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Meeting</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Offered</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">View</div>
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check0" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check1" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 2</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">2016-08-21</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
														</tbody>
													</table>
												</form>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<!-- № of employees -->
									<div class="tab-content padtb25" id="tab1_InternalClosed">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
					
								</div>
					
								<div class="clear"></div>
							</div>
							<div class="tab_content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a top0 left-100 left0_a padtb10 brd brdrad3 hide" id="tab_BackgroundChecks">
								
								<!-- Charts -->
								<div class="marrl10 marb20 padt20 brdb">
									<div class="dflex fxwrap_w alit_s marrl-10">
								
										<!-- Line chart -->
										<div class="wi_50-20p xs-wi_100-20p marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="pos_rel">
												<div class="dflex justc_sb alit_fe">
													<div>
														<h4 class="pad0 bold fsz26">54%</h4>
														<span class="fsz10">2.341 new customers</span>
													</div>
													<div class="tall fsz12 lgtgrey4_txt">
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 blue_bg"></span>
															<span class="valm">Upcoming</span>
														</div>
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 pur_ba03d9_bg"></span>
															<span class="valm">Incoming</span>
														</div>
													</div>
												</div>
												<div id="line-chart-BackgroundChecks"></div>
											</div>
										</div>
								
										<!-- Donut chart -->
										<div class="wi_50-20p xs-wi_100-20p ovfl_hid marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel padt10">
												<div class="dflex tab-header padrl10">
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a active" data-id="tab-yearly-BackgroundChecks">Yearly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-monthly-BackgroundChecks">Monthly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-daily-BackgroundChecks">Daily</a>
												</div>
												<div id="tab-yearly-BackgroundChecks" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-yearly-BackgroundChecks" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$13.6k</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">54%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">253</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">18</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-monthly-BackgroundChecks" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-monthly-BackgroundChecks" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$1600</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">34%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">36</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">2</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-daily-BackgroundChecks" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-daily-BackgroundChecks" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$341</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">23%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">10</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">1</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
								
											</div>
										</div>
								
									</div>
								</div>
								
								
								<!-- tabs header -->
								<div class="container tab-header padrl10 talc dark_grey_txt">
					
									<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone">
										<li>
											<a href="#" class="dblock brdradt5 active" data-id="tab2_Internal"> <span class="count">2</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab2_InternalNotPosted"> <span class="count">0</span> <span>Requests</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab2_InternalPosted"> <span class="count">0</span> <span>Accepted</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab2_InternalPublished"> <span class="count">0</span> <span>Quote</span> </a>
										</li>
										<li>
											<a href="#" data-id="tab2_InternalInProgress"> <span class="count">0</span> <span>In Progress</span> </a>
										</li>
										<li>
											<a href="#" class="brdradr5" data-id="tab2_InternalClosed"> <span class="count">0</span> <span>Closed</span> </a>
										</li>
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
										<option value="tab2_Internal" selected>2</option>
										<option value="tab2_InternalNotPosted">Requests</option>
										<option value="tab2_InternalPosted">Accepted</option>
										<option value="tab2_InternalPublished">Quote</option>
										<option value="tab2_InternalInProgress">In Progress</option>
										<option value="tab2_InternalClosed">Closed</option>
									</select>
									<div class="clear"></div>
					
								</div>
					
								<!-- tabs content -->
								<div class="container padrl10 white_bg fsz14 dark_grey_txt">
					
									<!-- Summary -->
									<div class="tab-content padtb25" id="tab2_Internal">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Active -->
									<div class="tab-content padtb25" id="tab2_InternalNotPosted">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Popular -->
									<div class="tab-content padtb25" id="tab2_InternalPosted">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Invoicing -->
									<div class="tab-content padtb25" id="tab2_InternalPublished">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="wi_100p pad5 brdb tall">
															<div class="padtb5">
																<span>
																																Set price
																																<span class="wi_14p hei_14p dinlblck brdrad10 blue_bg lgn_hight_14 talc fsz10 white_txt">?</span>
																</span>
															</div>
														</th>
														<th class="wi_100p pad5 brdb tall">
															<div class="padtb5">
																<span>
																																Delivery Days
																																<span class="wi_14p hei_14p dinlblck brdrad10 blue_bg lgn_hight_14 talc fsz10 white_txt">?</span>
																</span>
															</div>
														</th>
														<th class="wi_100p pad5 brdb tall">
															<div class="padtb5">Submit</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="number" class="wi_100 hei_30p bs_bb pad5 brd" />
															</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="number" class="wi_100 hei_30p bs_bb pad5 brd" />
															</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"><a href="#" class="dblue_btn min_height wi_100 pad0i talc">Submit</a>
															</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="number" class="wi_100 hei_30p bs_bb pad5 brd" />
															</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="number" class="wi_100 hei_30p bs_bb pad5 brd" />
															</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"><a href="#" class="dblue_btn min_height wi_100 pad0i talc">Submit</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
									<!-- Contact -->
									<div class="tab-content padtb25" id="tab2_InternalInProgress">
										<!-- inner tab header -->
										<div class="container">
											<ul class="tab-header dblock mar0 pad0 talc dark_grey_txt">
												<li class="dblock fleft">
													<a href="#" class="dblock pad15 lgtgrey2_bg_h lgtgrey2_bg_a cyanblue_txt active" data-id="tab2_internal"> <span>Internal</span> </a>
												</li>
												<li class="dblock fleft">
													<a href="#" class="dblock pad15 lgtgrey2_bg_h lgtgrey2_bg_a cyanblue_txt" data-id="tab2_external_agency"> <span>External Agency</span> </a>
												</li>
												<li class="dblock fleft">
													<a href="#" class="dblock pad15 lgtgrey2_bg_h lgtgrey2_bg_a cyanblue_txt" data-id="tab2_external_network"> <span>External Network</span> </a>
												</li>
												<div class="clear"></div>
											</ul>
										</div>
										<!-- inner tab content -->
										<div class="container">
											<div class="tab-content" id="tab2_internal">
												<form method="post" action="">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<thead class="lgtgrey2_bg fsz13" style="color: #c6c8ca;">
															<tr>
																<th class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check_all" class="check_all" /> </div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Job Title</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Type</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Applicants</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Screened</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Phone</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Meeting</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Offered</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">View</div>
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check0" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check1" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 2</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">2016-08-21</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
														</tbody>
													</table>
												</form>
											</div>
											<div class="tab-content" id="tab2_external_agency">
												<form method="post" action="">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<thead class="lgtgrey2_bg fsz13" style="color: #c6c8ca;">
															<tr>
																<th class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check_all" class="check_all" /> </div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Job Title</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Type</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Applicants</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Screened</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Phone</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Meeting</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Offered</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">View</div>
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check0" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check1" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 2</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">2016-08-21</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
														</tbody>
													</table>
												</form>
											</div>
											<div class="tab-content" id="tab2_external_network">
												<form method="post" action="">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<thead class="lgtgrey2_bg fsz13" style="color: #c6c8ca;">
															<tr>
																<th class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check_all" class="check_all" /> </div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Job Title</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Type</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Applicants</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Screened</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Phone</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Meeting</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">Offered</div>
																</th>
																<th class="pad5 brdb tall">
																	<div class="padtb5">View</div>
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check0" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
															<tr>
																<td class="pad5 brdb tall">
																	<div class="padtb5">
																		<input type="checkbox" name="check1" class="check" /> </div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Internal 2</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">DU001 Salesperson 1</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">Accepted</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5">2016-08-21</div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"></div>
																</td>
																<td class="pad5 brdb tall">
																	<div class="padtb5"><a href="#" class="dblue_btn min_height dblock nobold fsz11">Post job</a> </div>
																</td>
															</tr>
														</tbody>
													</table>
												</form>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<!-- № of employees -->
									<div class="tab-content padtb25" id="tab2_InternalClosed">
										<form method="post" action="">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead class="fsz13" style="color: #c6c8ca;">
													<tr>
														<th class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check_all" class="check_all" /> </div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Company</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Vacancy</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">My Status</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Reason</div>
														</th>
														<th class="pad5 brdb tall">
															<div class="padtb5">Expire Date</div>
														</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check0" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc 6</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
													<tr>
														<td class="pad5 brdb tall">
															<div class="padtb5">
																<input type="checkbox" name="check1" class="check" /> </div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Qmatch Inc</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">DU001 Salesperson 1</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">Accepted</div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5"></div>
														</td>
														<td class="pad5 brdb tall">
															<div class="padtb5">2016-08-21</div>
														</td>
													</tr>
												</tbody>
											</table>
										</form>
										<div class="clear"></div>
									</div>
					
								</div>
					
								<div class="clear"></div>
							</div>
					
							<div class="clear"></div>
						</div>
					</div>

				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="marb20"> <img src="images/gratis.png" class="maxwi_100 hei_auto" /> </div>
					<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
					<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
						<div class="wi_50 marb10"> <img src="images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
					</div>
					<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
					<div>
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
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
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
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
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	<!-- CALLBACK -->
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
	
	
	<!-- ADVANTAGES -->
	<div class="column_m zi10 frtlgrey_bg">
		<div class="wrap maxwi_100 padt30 padb10 padrl15 fsz16 dark_grey_txt">
			<h2 class="padb15 talc fsz44 dark_grey_txt">Förmåner &amp; Försäkringar</h2>
			<p class="padb15 uppercase talc">Ingår i ditt medlemskap</p>
			<div class="slick-slider dflex alit_s marrl-15 padt15" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1">
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="images/news/foretagarna1.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Affärsnätverket" alt="Affärsnätverket" />
						<h3 class="padb10 fsz24 dark_grey_txt">Affärsnätverket</h3>
						<div> Hitta andra företagare och få nya kunder med Företagarnas Affärsnätverk. Sök medlemmar, beställ offerter och gör affärer! </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
				</div>
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="images/news/foretagarna2.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Försäkringar" alt="Försäkringar" />
						<h3 class="padb10 fsz24 dark_grey_txt">Försäkringar</h3>
						<div> Omfattande försäkringspaket anpassat för dig som företagare. Vi har försäkringar för dig, ditt företag och dina anställda. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
				</div>
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="images/news/foretagarna3.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Rådgivningen" alt="Rådgivningen" />
						<h3 class="padb10 fsz24 dark_grey_txt">Rådgivningen</h3>
						<div> Ring våra jurister kostnadsfritt när du behöver hjälp med en juridisk fråga! Eller sök rätt på svaret i vår FAQ. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
				</div>
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="images/news/foretagarna4.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Förmåner" alt="Förmåner" />
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
	
	
	<!-- FOOTER -->
	<div class="column_m zi10 zindx10">
		<div class="column_m footermain">
			<div class="wrap">
				<div class="column_m padtb30">
					<div class="for_clmn">
						<h2 class="fsz26 cyanblue_txt bold font_opnsns">QMatchup</h2>
						<p class="lgn_hight_20">Qmatchup helps clients proqure prequalified outsourcing services. With our global network of pre qualified contractors we have helped thousands of clients get exactly what they whant, when they whant it. </p>
					</div>
					<div class="for_clmn">
						<div class="marrl30 padrl30 blue_left_brd talc">
							<div class="center_bx footer_green_ico icon1 marb10"> </div>
							<h2 class="darkblue_txt bold">Know more!</h2>
							<ul class="footer_link_list">
								<li class="first"> <a href="#">About</a> </li>
								<li> <a href="#">How it works</a> </li>
								<li> <a href="#">Additionals</a> </li>
								<li class="last"> <a href="#">Blog</a> </li>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
					<div class="for_clmn talc">
						<div class="padrl30 blue_left_brd blue_right_brd talc">
							<div class="center_bx footer_green_ico icon2 marb10"> </div>
							<h2 class="darkblue_txt bold">Need Help!</h2>
							<ul class="footer_link_list">
								<li class="first">Call us at : 1 888 341</li>
								<li>Email : <a href="mailto:support@qmatchup.com">support@qmatchup.com</a> </li>
								<li> <a href="#">Helpcenter</a> </li>
								<li class="last"> <a href="#">FAQ</a> </li>
							</ul>
							<div class="clear"></div>
						</div>
					</div>
					<div class="for_clmn talc">
						<div class="padl30">
							<div class="center_bx footer_green_ico icon3 marb10"> </div>
							<h2 class="darkblue_txt bold">Need Help!</h2>
							<p>Get monthly updates from Qmatchup in your inbox. Read our latest news &amp; buzz.</p>
							<ul class="social_hori_color_list">
								<li class="first">
									<a href="#" class="fb"></a>
								</li>
								<li>
									<a href="#" class="tw"></a>
								</li>
								<li>
									<a href="#" class="sk"></a>
								</li>
								<li class="last">
									<a href="#" class="rs"></a>
								</li>
							</ul>
							<div class="wi_70 center_bx padt10"> <a href="#" class="green_btn dblock min_height">Subscribe Newsletter</a> </div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="dark_footer column_m">
			<div class="wrap">
				<div class="column_m padt15">
					<div class="left_sidebar">
						<h2 class="fsz30 pad0 font_opnsns">QMATCHUP</h2> </div>
					<div class="right_container">
						<ul class="footer_nav_list">
							<li class="first"><a href="#">About us</a> </li>
							<li><a href="#">Blog</a> </li>
							<li><a href="#">News</a> </li>
							<li><a href="#">Contact</a> </li>
							<li class="last"><a href="#">Sitemap</a> </li>
						</ul>
					</div>
				</div>
				<div class="column_m padtb10"> © 1998 – 2014 QMatchup, Inc. All rights reserved. </div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
		<!-- New client modal -->
		<div class="slide_modal wi_400p hei_100vh ovfl_auto bs_bb fright white_bg dark_grey2_txt" id="new_client_modal">
			<form action="" method="post">
				<!-- logo -->
				<div class="marb10 pad10 blue2_bg white_txt">
					<div class="marb10">
						<a href="#" class="fsz21 white_txt"> <img src="images/fortnox.jpg" alt="Qmatchup" title="Bisswise" class="valm" /> <span class="valm">
																					Användarstöd 
																				</span> </a>
					</div>
					<div class="clear"></div>
					<div class="fleft marl5 padt5"> Användar-ID: <span class="user-support-id">14888</span> </div>
					<a href="#" class="dblock fright pad5 brd white_txt"> <span class="user-support-logon-text">Aktivera</span> <b>supportinlogg</b> </a>
					<div class="clear padb5"></div>
				</div>
				<!-- Work 1  -->
				<div class="section padb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 1 </div>
					<h3 class="fleft mart5 padbl10 fsz14">
																			Do you work?
																		</h3>
					<div class="boolean-control boolean-control-small boolean-control-green fright marr10">
						<input type="checkbox" name="do_you_work" class="default" data-target="#do_you_work" data-true="Yes" data-false="No" /> </div>
					<div class="clear"></div>
					<!-- Currently?  -->
					<div class="hide" id="do_you_work">
						<h3 class="fleft mart5 padbl10 fsz14">
																				Currently?
																			</h3>
						<div class="boolean-control boolean-control-small boolean-control-green fright marr10">
							<input type="checkbox" name="work_params" class="default" data-target="#work_params" data-true="Yes" data-false="No" /> </div>
						<div class="clear"></div>
						<div class="hide" id="work_params">
							<!-- Search and results -->
							<div class="padt10">
								<h3 class="padbl10 fsz14">
																						Landlord
																					</h3>
								<div class="padrl10">
									<div class="padb10">
										<input type="text" placeholder="Landlord name" class="autocomplete-custom filter_list_input wi_100 bs_bb pad10 brd brdrad2 fsz14" data-source="landlord_list_data">
										<div class="add_new_form hide"> <a href="#" class="dblue_btn bs_bb talc fsz16">Add new landlord</a> </div>
										<script>
											var landlord_list_data = [{
												label: 'John',
												location: 'Texas, US',
												value: 'John'
											}, {
												label: 'Kyle',
												location: 'Texas, US',
												value: 'kyle'
											}, {
												label: 'Smith',
												location: 'Texas, US',
												value: 'Smith'
											}, {
												label: 'Brian',
												location: 'Texas, US',
												value: 'Brian'
											}, {
												label: 'Vassiliy',
												location: 'Texas, US',
												value: 'Vassiliy'
											}, {
												label: 'Serge',
												location: 'Texas, US',
												value: 'Serge'
											}, {
												label: 'Ivan',
												location: 'Texas, US',
												value: 'Ivan'
											}, {
												label: 'Mike',
												location: 'Texas, US',
												value: 'Mike'
											}];
										</script>
									</div>
								</div>
								<div class="padb20">
									<div class="padrl10">
										<button type="submit" class="dblue_btn wi_100 bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Work 2 -->
				<div class="filter_list padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 2 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="padrl10">
						<input type="text" placeholder="Landlord name" class="autocomplete-custom filter_list_input wi_100 bs_bb pad10 brd brdrad2 fsz14" data-source="landlord_list_data">
						<div class="add_new_form hide"> <a href="#" class="dblue_btn bs_bb talc fsz16">Add new landlord</a> </div>
						<script>
							var landlord_list_data = [{
								label: 'John',
								location: 'Texas, US',
								value: 'John'
							}, {
								label: 'Kyle',
								location: 'Texas, US',
								value: 'kyle'
							}, {
								label: 'Smith',
								location: 'Texas, US',
								value: 'Smith'
							}, {
								label: 'Brian',
								location: 'Texas, US',
								value: 'Brian'
							}, {
								label: 'Vassiliy',
								location: 'Texas, US',
								value: 'Vassiliy'
							}, {
								label: 'Serge',
								location: 'Texas, US',
								value: 'Serge'
							}, {
								label: 'Ivan',
								location: 'Texas, US',
								value: 'Ivan'
							}, {
								label: 'Mike',
								location: 'Texas, US',
								value: 'Mike'
							}];
						</script>
					</div>
					<div class="mart10 padb20">
						<div class="padrl10">
							<button type="submit" class="dblue_btn wi_100 bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
						</div>
					</div>
				</div>
				<!-- Work 3 -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 3 </div>
					<h3 class="fleft mart5 padbl10 fsz14">
																			Are you looking for work?
																		</h3>
					<div class="boolean-control boolean-control-small boolean-control-green fright marr10">
						<input type="checkbox" name="show_form" class="default" data-target="#landlord_params" data-true="Yes" data-false="No" /> </div>
					<div class="clear"></div>
					<div class="hide" id="landlord_params">
						<!-- Search and results -->
						<div class="padt10">
							<h3 class="padbl10 fsz14">
																					Landlord
																				</h3>
							<div class="padrl10">
								<input type="text" placeholder="Landlord name" class="autocomplete-custom filter_list_input wi_100 bs_bb pad10 brd brdrad2 fsz14" data-source="landlord_list_data">
								<div class="add_new_form hide"> <a href="#" class="dblue_btn bs_bb talc fsz16">Add new landlord</a> </div>
								<script>
									var landlord_list_data = [{
										label: 'John',
										location: 'Texas, US',
										value: 'John'
									}, {
										label: 'Kyle',
										location: 'Texas, US',
										value: 'kyle'
									}, {
										label: 'Smith',
										location: 'Texas, US',
										value: 'Smith'
									}, {
										label: 'Brian',
										location: 'Texas, US',
										value: 'Brian'
									}, {
										label: 'Vassiliy',
										location: 'Texas, US',
										value: 'Vassiliy'
									}, {
										label: 'Serge',
										location: 'Texas, US',
										value: 'Serge'
									}, {
										label: 'Ivan',
										location: 'Texas, US',
										value: 'Ivan'
									}, {
										label: 'Mike',
										location: 'Texas, US',
										value: 'Mike'
									}];
								</script>
							</div>
							<div class="mart10 padb20">
								<div class="padrl10">
									<button type="submit" class="dblue_btn wi_100 bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Work 4  -->
				<div class="filter_list padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 4 </div>
					<div class="clear"></div> <a href="#" class="filter_list_add fright padr10 blue2_txt" data-id="landlord_list">Add</a>
					<h3 class="fleft mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="clear"></div>
					<div class="filter_list_add_form padrl10 hide">
						<div class="padb5">
							<div class="wi_50 bs_bb fleft padrb5">
								<input type="text" placeholder="Landlord name to add" class="wi_100 bs_bb pad10 brd brdrad2 fsz14"> </div>
							<div class="wi_25 bs_bb fleft padrbl5">
								<a href="#" class="dblue_btn wi_100 pad0i bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14" data-action="add" data-id="landlord_list" data-row-tag="tr" data-filter-tag="h3"> <span class="fa fa-plus valm fsz16i"></span> <span class="valm">Add</span> </a>
							</div>
							<div class="wi_25 bs_bb fleft padbl5">
								<a href="#" class="lgtgrey_btn wi_100 padr0i padl10i bs_bb tall fsz14" data-action="cancel"> <span class="fa fa-ban valm fsz16i"></span> <span class="valm">Cancel</span> </a>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
					<div class="padrl10">
						<input type="text" placeholder="Landlord name" class="filter_list_input wi_100 bs_bb pad10 brd brdrad2 fsz14" data-id="landlord_list" data-row-tag="tr" data-filter-tag="h3" data-default="hide"> </div>
					<div class="padrl10">
						<table class="wi_100" cellpadding="0" cellspacing="0">
							<tbody id="landlord_list">
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Tom</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">John</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Kyle</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Smith</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Brian</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Vassiliy</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Serge</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Ivan</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Mike</h3> </td>
								</tr>
								<tr class="hide">
									<td class="wi_36p padr15 brdb valm talr">
										<input type="radio" name="selector" /> </td>
									<td class="content-cell padtb5 brdb valm">
										<h3 class="padb5 fsz14">Marcel</h3> </td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="mart10 padb20">
						<div class="padrl10">
							<button type="submit" class="dblue_btn wi_100 bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
						</div>
					</div>
				</div>
				<!-- Work 5  -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 5 </div>
					<div class="mart5 padrl10">
						<div class="select-base padb10">
							<select class="binded-select default wi_100i bs_bb pad10 brd brdrad2 lgtgrey3_txt" data-source="binded_selects_source" id="binded_select1"></select>
						</div>
						<div class="select-base padb10 hide">
							<select class="binded-select default wi_100i bs_bb pad10 brd brdrad2 lgtgrey3_txt" data-source="binded_selects_source" id="binded_select2"></select>
						</div>
						<div class="select-base padb10 hide">
							<select class="binded-select default wi_100i bs_bb pad10 brd brdrad2 lgtgrey3_txt" data-source="binded_selects_source" id="binded_select3"></select>
						</div>
					</div>
					<div class="padb20">
						<div class="padrl10">
							<button type="submit" class="dblue_btn wi_100 bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
						</div>
					</div>
					<script>
						var binded_selects_source = [{
							title: 'level1 - option 1', // title that will go to <option></option>
							value: 'level11', // option value
							items: [ // that will effect other select controls that are bound to this source
								{
									title: 'level 11 2 - option 1',
									value: 'level1121',
									items: [{
										title: 'level 11 21 3 - option 1',
										value: 'level112131',
									}, {
										title: 'level 11 21 3 - option 2',
										value: 'level112132',
									}, {
										title: 'level 11 21 3 - option 3',
										value: 'level112133',
									}, ]
								}, {
									title: 'level 11 2 - option 2',
									value: 'level1122',
									items: [{
										title: 'level 11 22 3 - option 1',
										value: 'level112231',
									}, {
										title: 'level 11 22 3 - option 2',
										value: 'level112232',
									}, {
										title: 'level 11 22 3 - option 3',
										value: 'level112233',
									}, ]
								}, {
									title: 'level 11 2 - option 3',
									value: 'level1123',
									items: [{
										title: 'level 11 23 3 - option 1',
										value: 'level112331',
									}, {
										title: 'level 11 23 3 - option 2',
										value: 'level112332',
									}, {
										title: 'level 11 23 3 - option 3',
										value: 'level112333',
									}, ]
								}
							],
						}, {
							title: 'level1 - option 2',
							value: 'level12',
							items: [{
								title: 'level 12 2 - option 1',
								value: 'level1221',
								items: [{
									title: 'level 12 21 3 - option 1',
									value: 'level122131',
								}, {
									title: 'level 12 21 3 - option 2',
									value: 'level122132',
								}, {
									title: 'level 12 21 3 - option 3',
									value: 'level122133',
								}, ]
							}, {
								title: 'level 12 2 - option 2',
								value: 'level1222',
								items: [{
									title: 'level 12 22 3 - option 1',
									value: 'level122231',
								}, {
									title: 'level 12 22 3 - option 2',
									value: 'level122232',
								}, {
									title: 'level 12 22 3 - option 3',
									value: 'level122233',
								}, ]
							}, {
								title: 'level 12 2 - option 3',
								value: 'level1223',
								items: [{
									title: 'level 12 23 3 - option 1',
									value: 'level122331',
								}, {
									title: 'level 12 23 3 - option 2',
									value: 'level122332',
								}, {
									title: 'level 12 23 3 - option 3',
									value: 'level122333',
								}, ]
							}],
						}, {
							title: 'level1 - option 3',
							value: 'level13',
							items: [{
								title: 'level 13 2 - option 1',
								value: 'level1321',
								items: [{
									title: 'level 13 21 3 - option 1',
									value: 'level132131',
								}, {
									title: 'level 13 21 3 - option 2',
									value: 'level132132',
								}, {
									title: 'level 13 21 3 - option 3',
									value: 'level132133',
								}, ]
							}, {
								title: 'level 13 2 - option 2',
								value: 'level1322',
								items: [{
									title: 'level 13 22 3 - option 1',
									value: 'level132231',
								}, {
									title: 'level 13 22 3 - option 2',
									value: 'level132232',
								}, {
									title: 'level 13 22 3 - option 3',
									value: 'level132233',
								}, ]
							}, {
								title: 'level 13 2 - option 3',
								value: 'level1323',
								items: [{
									title: 'level 13 23 3 - option 1',
									value: 'level132331',
								}, {
									title: 'level 13 23 3 - option 2',
									value: 'level132332',
								}, {
									title: 'level 13 23 3 - option 3',
									value: 'level132333',
								}, ]
							}],
						}, ]
					</script>
				</div>
				<!-- Work 6  -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 6 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="padrl10">
						<div class="padb20">
							<div class="wi_75 bs_bb fleft padr5">
								<input type="text" placeholder="Landlord name to add" class="wi_100 bs_bb pad10 brd brdrad2 fsz14" id="work6source" /> </div>
							<div class="wi_25 bs_bb fleft padl5">
								<a href="#" class="add_to_list dblue_btn wi_100 pad0i bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14" data-source="#work6source" data-target="#work6list"> <span class="fa fa-plus valm fsz16i"></span> <span class="valm">Add</span> </a>
							</div>
							<div class="clear"></div>
							<div id="work6list"></div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<!-- Work 7 -->
				<div class="filter_list padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 7 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="no-mce-statusbar padrl10">
						<textarea class="texteditor" name="texteditor"></textarea>
					</div>
					<div class="mart10 padb20">
						<div class="padrl10">
							<button type="submit" class="dblue_btn wi_100 bs_bb padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
						</div>
					</div>
				</div>
				<!-- Work 8  -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 8 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="padb10">
						<div class="tw_clmn bs_bb padrl10">
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 1</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 2</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 3</span>
								</label>
							</div>
						</div>
						<div class="tw_clmn bs_bb padrl10">
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 4</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 5</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 6</span>
								</label>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Work 9  -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 9 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="padb10">
						<div class="on_clmn bs_bb padrl10">
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 1</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 2</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 3</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="checkbox" /> <span class="valm">Checkbox 3</span>
								</label>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Work 10  -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 10 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="padb10">
						<div class="tw_clmn bs_bb padrl10">
							<div class="marb10">
								<label>
									<input type="radio" name="radio1" checked="checked" /> <span class="valm">Checkbox 1</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="radio" name="radio1" /> <span class="valm">Checkbox 2</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="radio" name="radio1" /> <span class="valm">Checkbox 3</span>
								</label>
							</div>
						</div>
						<div class="tw_clmn bs_bb padrl10">
							<div class="marb10">
								<label>
									<input type="radio" name="radio1" /> <span class="valm">Checkbox 4</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="radio" name="radio1" /> <span class="valm">Checkbox 5</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="radio" name="radio1" /> <span class="valm">Checkbox 6</span>
								</label>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Work 11  -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 11 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="padb10">
						<div class="on_clmn bs_bb padrl10">
							<div class="marb10">
								<label>
									<input type="radio" name="radio2" checked="checked" /> <span class="valm">Checkbox 1</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="radio" name="radio2" /> <span class="valm">Checkbox 2</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="radio" name="radio2" /> <span class="valm">Checkbox 3</span>
								</label>
							</div>
							<div class="marb10">
								<label>
									<input type="radio" name="radio2" /> <span class="valm">Checkbox 3</span>
								</label>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Work 12  -->
				<div class="padtb10 brdb">
					<div class="dblock padrl10 fsz14 bold dark_grey2_txt"> <span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span> Work 12 </div>
					<h3 class="mart5 padbl10 fsz14">
																			Landlord
																		</h3>
					<div class="padrbl10">
						<div class="wi_100 dtable brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Projects</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Something</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Bids</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
							</div>
							<div class="dtrow">
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Administration</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Accounting</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Calendar</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
							</div>
							<div class="dtrow">
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Crm</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>Helpdesk</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
								<a href="#" class="toggle-base toggle-active active-base wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a"> <span>HR</span>
									<div class="wi_60 marrla padt5"> <img src="images/cloud.png" class="hide-when-active wi_100 hei_auto valb" /> <img src="images/cloud_h.png" class="show-when-active wi_100 hei_auto valb" /> </div>
								</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Toggle slide list  -->
				<div class="base padb20 brdb brdrad5">
					<div class="pad10">
						<a href="#" class="toggle-btn dblock fsz14 bold dark_grey2_txt target_shown" data-toggle-id="base"> <span class="fa fa-chevron-right arrow-bottom wi_20p mart5 blue_txt"></span> <span class="fa fa-chevron-down arrow-up wi_20p mart5 blue_txt"></span> Hjälpavsnitt </a>
						<div class="toggle_content padt10">
							<ul class="mar0 padl20 lgn_hight_15">
								<li class="marb5 blue2_txt"> <a href="#" class="blue2_txt">Logga in i klientens program</a> </li>
								<li class="marb5 blue2_txt"> <a href="#" class="blue2_txt">Lägg till ny klient</a> </li>
								<li class="marb5 blue2_txt"> <a href="#" class="blue2_txt">Lägg till ny konsult</a> </li>
								<li class="blue2_txt"> <a href="#" class="blue2_txt">Sammankoppling med redan befintlig Fortnoxkund</a> </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="base padb20 brdb brdrad5">
					<div class="pad10">
						<a href="#" class="toggle-btn dblock fsz14 bold dark_grey2_txt target_shown" data-toggle-id="base"> <span class="fa fa-chevron-right arrow-bottom wi_20p mart5 blue_txt"></span> <span class="fa fa-chevron-down arrow-up wi_20p mart5 blue_txt"></span> Om oss </a>
						<div class="toggle_content padt10">
							<h3>Kort om Consensum AB Sollentuna</h3>
							<p> Consensum gymnasieskola i Sollentuna är en liten trevlig skola med drygt 150 elever på Vård och omsorgsprogrammet. Skolan är certifierad Vård & omsorgscollege vilket borgar för hög kvalitet. </p>
							<p class="pad0"> <a href="http://www.consensum.se" class="blue2_txt">http://www.consensum.se</a> </p>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<!-- Slide fade -->
		<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/icheck.js"></script>
	<script type="text/javascript" src="js/jquery.selectric.js"></script>
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="modules.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	
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