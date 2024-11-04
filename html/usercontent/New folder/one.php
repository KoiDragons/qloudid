<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/slick-theme.css" />
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

<body class="white_bg xs-grey_bg sm-grey_bg">
	
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
							<a href="zoho_hr_portal8.html" class="minwi_100p dblock padb15 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a talc fsz14 fsz15_a txt_f2f1f1 pred2_txt_a active">
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
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#sales_popup">HR</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#marketing_popup">Sales</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#gratis_popup">Marketing</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#sales_popup">Procurement</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#marketing_popup">Finance</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#gratis_popup">IT</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#sales_popup">Board</a> </li>
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
								<ul class="mar0 pad0">
									<li class="dblock padrb10 padl8">
										<a href="new_business_profile5_1.html" class="active hei_26p dflex alit_c pos_rel padrl10 pred2_bg_h pred2_bg_a dark_grey_txt white_txt_h white_txt_a">
											<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
											<span class="valm">Newsfeed</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
										</a>
									</li>
									<li class="dblock padrb10 padl8">
										<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 pred2_bg_h pred2_bg_a dark_grey_txt white_txt_h white_txt_a">
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
									<li class="dblock pos_rel padb20 padl30 brdl brdclr_hgrey brdclr_pred2_a">
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
												<a href="zoho_hr_portal7_3_3.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Social Career</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="zoho_hr_portal7_3_4.html?scrollTo=scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a hgrey_txt white_txt_h white_txt_a"> <span class="valm">Recruiting</span>
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
					
					<!-- Middle -->
					<div class="wi_530p col-xs-12 col-sm-12 fleft fsz14">
						
						<!-- 1 article, 1 img -->
						<div class="bs_bb marb20 pad25 xs-padrl15 brd brdrad3">
							<div>
								<a href="zoho_hr_portal_inner2.html" class="dblock marb20">
									<figure class="mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/1a1i.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a1i.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
								</a>
								<h2 class="bold fsz40 xs-fsz24">
									<a href="zoho_hr_portal_inner2.html" class="dark_grey_txt">
										<span class="padrl5 brdrad3 green_bg white_txt">#Anstallda</span>
										Skadestånd på grund av kollektivavtalsbrott
									</a>
								</h2>
								<p class="pad0">
									<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
								</p>
							</div>
							
							<a href="#" class="dblock mart15 dark_grey_txt lnkdblue_txt_h">
								<table class="wi_100 brd" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td class="pad0 brdr valm">
												<img src="images/article/ext.jpg" width="180" class="valb">
											</td>
											<td class="wi_100 bs_bb padtb5 valm">
												<div class="padrl15">
													<h4 class="padb5 fsz16">Work-Life Balance Exists But Unfortunately, It Is Practically A Myth</h4>
													<p class="opa55 mar0 pad0">There is no such thing as Work-Life Balance exists.</p>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</a>
						</div>
						
						
						<!-- 1 article, 2 img -->
						<div class="bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
							<div class="padb10">
								<a href="user_page_dom.html" class="dblock marb20">
									<figure class="wi_50 dblock fleft mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/1a2i_1.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a2i_1.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
									<figure class="wi_50 dblock fleft mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/1a2i_2.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a2i_2.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
									<div class="clear"></div>
								</a>
								<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
									<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott
									</a>
								</h3>
								<p class="pad0">
									<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
								</p>
							</div>
						</div>
						
						
						<!-- 1 article, 3 img -->
						<div class="bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
							<div class="padb10">
								<a href="user_page_dom.html" class="dblock marb20">
									<figure class="wi_33 dblock fleft mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/1a3i_1.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a3i_1.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
									<figure class="wi_33 dblock fleft mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/1a3i_2.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a3i_2.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
									<figure class="wi_33 dblock fleft mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/1a3i_3.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a3i_3.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
									<div class="clear"></div>
								</a>
								<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
									<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
								</h3>
								<p class="pad0">
									<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
								</p>
							</div>
						</div>
						
						
						<!-- 1 article, 1 img + heading -->
						<div class="bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
							<div class="padb10">
								<a href="zoho_hr_portal_inner2.html" class="dblock marb20">
									<div class="padrl10 blue_bg lgn_hight_18 uppercase bold fsz11 white_txt">Nöjesbladet</div>
									<figure class="mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/Goodones01.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/Goodones01.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
								</a>
								<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
									<a href="zoho_hr_portal_inner2.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
								</h3>
								<p class="pad0">
									<a href="user_page_dom.html" class="dark_grey_txt"> <span class="blue3_txt">LENDO</span> <span>Misstaget som du vill undvika</span> <span class="fa fa-check blue3_txt"></span> <span>Så tänker bankerna</span> <span class="fa fa-check blue3_txt"></span> <span>Få lägre ränta</span> </a>
								</p>
							</div>
						</div>
						
						
						<!-- 1 article, 1 img + heading -->
						<div class="bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
							<div class="padb10">
								<a href="zoho_hr_portal_inner2.html" class="dblock marb20">
									<div class="padrl10 sporange_bg lgn_hight_18 uppercase bold fsz11 dark_grey_txt ">Sponsored</div>
									<figure class="mar0 pad0">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/Goodones01.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/Goodones01.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
								</a>
								<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
									<a href="zoho_hr_portal_inner2.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
								</h3>
								<p class="pad0">
									<a href="user_page_dom.html" class="dark_grey_txt"> <span class="blue3_txt">LENDO</span> <span>Misstaget som du vill undvika</span> <span class="fa fa-check blue3_txt"></span> <span>Så tänker bankerna</span> <span class="fa fa-check blue3_txt"></span> <span>Få lägre ränta</span> </a>
								</p>
							</div>
						</div>
						
						
						<!-- 2 articles, 1 img -->
						<div class="bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
							<div class="wi_50 xs-wi_100 fleft bs_bb marb10 padtrl10">
								<div class="padb5">
									<a href="user_page_dom.html" class="dblock marb20">
										<figure class="dblock mar0 pad0">
											<picture class="di_teaser__media">
												<source media="(min-width: 768px)" srcset="images/news/1a2i_1.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a2i_1m.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
										</figure>
									</a>
									<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
										<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
									</h3>
									<p>
										<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
									</p>
								</div>
							</div>
							<div class="wi_50 xs-wi_100 fleft bs_bb marb10 padtrl10">
								<div class="padb5">
									<a href="user_page_dom.html" class="dblock marb20">
										<figure class="dblock mar0 pad0">
											<picture class="di_teaser__media">
												<source media="(min-width: 768px)" srcset="images/news/1a2i_2.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1a2i_2m.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
										</figure>
									</a>
									<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
										<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
									</h3>
									<p>
										<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
									</p>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						
						
						<!-- 1 article, image on the left -->
						<div class="bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
							<h2 class="marrl10 padtb4 padrl10 blue_bg uppercase bold white_txt fsz14 xs-fsz12 sm-fsz12">Section 1</h2>
							<hr class="hei_4p marrl10 nobrd blue_bg" />
							<div class="column_m bs_bb padtrl10">
								<div class="padb10">
									<a href="user_page_dom.html" class="dblock">
										<figure class="wi_33 fleft mar0 padr15">
											<picture class="di_teaser__media">
												<source media="(min-width: 768px)" srcset="images/news/1ali_1.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1ali_1.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
										</figure>
									</a>
									<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
										<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
									</h3>
									<p class="pad0">
										<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
									</p>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="padb10">
								<a href="user_page_dom.html" class="dblock">
									<figure class="wi_33 fleft mar0 padr15">
										<picture class="di_teaser__media">
											<source media="(min-width: 768px)" srcset="images/news/1ali_2.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1ali_2.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
									</figure>
								</a>
								<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
									<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
								</h3>
								<p class="pad0">
									<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
								</p>
								<div class="clear"></div>
							</div>
							
							<div class="marb15 padt15 talc fsz16"> <a href="http://html.wpdev.pw/qmatchup_profile/html/2.html">Read more</a> </div>
						</div>
						
						<!-- 1 article, image on the left -->
						<div class="bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
							<h2 class="marrl10 padtb4 padrl10 blue_bg uppercase bold white_txt fsz14 xs-fsz12 sm-fsz12">Section 2</h2>
							<hr class="hei_4p marrl10 nobrd blue_bg" />
							<div class="bs_bb padtrl10">
								<div class="padb10">
									<a href="user_page_dom.html" class="dblock">
										<figure class="wi_33 fleft mar0 padr15">
											<picture class="di_teaser__media">
												<source media="(min-width: 768px)" srcset="images/news/1ali_1.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1ali_1.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
										</figure>
									</a>
									<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
										<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
									</h3>
									<p class="pad0">
										<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
									</p>
									<div class="clear"></div>
								</div>
							</div>
						
							<div class="bs_bb padtrl10">
								<div class="padb10">
									<a href="user_page_dom.html" class="dblock">
										<figure class="wi_33 fleft mar0 padr15">
											<picture class="di_teaser__media">
												<source media="(min-width: 768px)" srcset="images/news/1ali_2.jpg"></source> <img class="wi_100 hei_auto dblock bs_bb brd" srcset="images/news/1ali_2.jpg" title="Skadestånd på grund av kollektivavtalsbrott"> </picture>
										</figure>
									</a>
									<h3 class="bold fsz24 xs-fsz18 sm-fsz18">
										<a href="user_page_dom.html" class="dark_grey_txt"><span class="padrl5 brdrad3 red_bg white_txt">#Arbetsgivare</span> Skadestånd på grund av kollektivavtalsbrott</a>
									</h3>
									<p class="pad0">
										<a href="user_page_dom.html" class="dark_grey_txt"> <span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal. </a>
									</p>
									<div class="clear"></div>
								</div>
							</div>
							<div class="marb15 padt15 talc fsz16"> <a href="http://html.wpdev.pw/qmatchup_profile/html/2.html">Read more</a> </div>
						</div>
					</div>
					
					<!-- Marquee -->
					<div class="wi_100 visible-xs visible-sm fleft bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
						<h3 class="padb20 uppercase bold fsz16">Lediga jobb</h3>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="images/fb.png" width="80" title="Facebook" alt="Facebook" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="images/volvo.png" width="80" title="Volvo" alt="Volvo" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="images/spot.png" width="80" title="Spotify" alt="Spotify" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="marb15 padt15 talc fsz16"> <a href="#">View more</a> </div>
					</div>
					
					<!-- Right content -->
					<div class="wi_230p col-xs-12 col-sm-12 fright pos_rel zi5">
						<div class="hidden-xs hidden-sm marb10 padrl10">
							<a href="zoho_hr_portal7_subscription.html" class="dblock padrl20 brdrad3 pred2_bg ws_now talc lgn_hight_29 fsz14 white_txt">
								<img src="images/icons/gift.png" width="20" height="20" class="marr5 valm">
								<span class="valm">Erbjudande</span>
							</a>
						</div>
						
						<!-- Links -->
						<div class="column_m bs_bb marb10 padrl10">
							<h3 class="padb0 padrl10 lgtgrey_bg lgn_hight_24 uppercase bold fsz16 white_txt">MEST LÄSTA</h3>
							<div class="padtb10 brdb">
								<h4 class="padb0 fsz14">
												<a href="user_page_dom.html" class="dark_grey_txt">Fiasko tvingar norrmän fly Sverige</a>
											</h4>   </div>
							<div class="padtb10 brdb">
								<h4 class="padb0 fsz14">
												<a href="user_page_dom.html" class="dark_grey_txt">Fiasko tvingar norrmän fly Sverige</a>
											</h4>   </div>
							<div class="padtb10 brdb">
								<h4 class="padb0 fsz14">
												<a href="user_page_dom.html" class="dark_grey_txt">Fiasko tvingar norrmän fly Sverige</a>
											</h4>   </div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
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
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.min.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/icheck.js"></script>
	<script type="text/javascript" src="js/jquery.selectric.js"></script>
	<script type="text/javascript" src="modules.js"></script><script type="text/javascript" src="js/custom.js"></script>
</body>

</html>