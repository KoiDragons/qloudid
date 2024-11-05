<?php $path1 = "../../html/usercontent/images/";
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
	<title>Qmatchup</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126618362-1');
</script>
	</head>

<body class="white_bg xs-grey_bg sm-grey_bg">
	
	<!-- HEADER -->
	<div class="column_m header header_small bs_bb bg_colorn_new" >
		<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="#"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
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
			<div class="search padt1">
      <div class="fleft">
        <input type="text" name="Search" class="search_fld hi_wi385">
      </div>
      <div class="fleft">
        <input type="submit" value="" class="search_btn hi26" >
      </div>
    </div>
			<div class="fright xs-dnone sm-dnone">
				<ul class="mar0 pad0">
					<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://www.qloudid.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
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
<div class="column_m pos_rel zi1">
				<div class="wi_100 hei_150p pos_abs zi1 top0 left0 bgir_norep bgis_cov bgip_c lgtblue2_bg"></div>
				<div class="wrap pos_rel zi10 padl10">
					<div class="hei_150p bs_bb padtb15 black_txt">
						<div class="padb30">
							
							<a href="#" class="marr5 black_txt">Industry: Internet and Communication</a>
							
							
						</div>
						<h1 class="edit-text jain padb5 tall fsz50 black_txt" id="dFJHdit4c3R6VlhXelY0bXdXTUtxUT09">Qmatchup Inc</h1>
						<p class="pad0 tall fsz16">Followers: 4234 </p>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		<!-- Top info -->
		<div class="scroll-fix column_m container hidden-xs hidden-sm">
			<div class="scroll-fix-wrap white_bg">
				<div class="wrap maxwi_100">
					<ul class="mar0 pad0 padb15 talc fsz15">
						<li class="diblock marrl10 padrl5"> <!--<a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#sales_popup">Work profile</a>--> </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- CONTENT -->
		<div class="column_m container zi5 padt10">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<!-- Left sidebar -->
				<!-- Left sidebar -->
				<div class="wi_230p fleft pos_rel zi50">
					<div class="padrl10">
						
						<!-- Scroll menu -->
						<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
							<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 padt5 white_bg fsz14" id="scroll_menu">
								
							
								
								<ul class="marr20 pad0">
									<li class="dblock padrb10 padl8">
										<a href="PublicAboutQmatchup" class="lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10 brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
											<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
											<span class="valm trn">Newsfeed</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
										</a>
									</li>
									
								</ul>
										
								
								
								<ul class="dblock mar0 padl20 fsz13">
									
									<!-- Newsfeed -->
									<li class="dblock pos_rel padb20 padl30 brdl brdclr_hgrey brdclr_pblue2_a">
										<h4 class="padb5 uppercase ff-sans black_txt trn">Om Bolaget</h4>
										<ul class="mar0 pad0">
										<li class="dblock padrb10">
												<a href="#" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a black_txt white_txt_h white_txt_a"> <span class="valm trn">Våra tjänster</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="PublicAboutQmatchupOmOss" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a black_txt white_txt_h white_txt_a"> <span class="valm trn">Om oss</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="#" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a black_txt white_txt_h white_txt_a"> <span class="valm trn">Medarbetare</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pred2_bg_pa  white_txt_pa">0</div>
									</li>
									
									<li class=" dblock pos_rel padb20 padl30 brdl brdclr_hgrey brdclr_pblue2_a">
										<h4 class="padb5 uppercase ff-sans black_txt trn">Karriär</h4>
										<ul class="mar0 pad0">
										
											
											<li class="active dblock padrb10">
												<a href="#" data-id="scroll-section-1" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Lediga jobb</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pblue2_bg_pa  white_txt_pa">1</div>
									</li>
									<!-- Company -->
									<li class=" dblock pos_rel padb20 padl30  brdclr_hgrey ">
										<h4 class="padb5 uppercase ff-sans black_txt trn">Partners</h4>
										<ul class="marr20 pad0">
										<li class="dblock padrb10">
												<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Aterförsäljare</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10">
												<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Leverantörer</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
											
											
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pblue2_bg_pa  black_txt_pa">2</div>
									</li>
									
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
				<!-- Center content -->
					<div class="width_730 col-xs-12 col-sm-12 fleft pos_rel zi5 padt30 aftpink_bg fsz14">
						
						<!-- Install Code -->
						<div class="column_m bs_bb marb5 padrl10" id="scroll-section-1" data-offset="55">
							<div class="dflex justc_sb marb20 padb10 brdb fsz16">
								<h3 class="pad0 fsz16 midgrey_txt">Intro.js</h3>
								<div>
									<a href="#" class="marl20">
										<span class="fa fa-download marr5 valm fsz16 black_txt"></span>
										<span class="valm">Download</span>
									</a>
									<a href="#" class="marl20">
										<span class="valm">Github</span>
									</a>
									<a href="#" class="marl20">
										<span class="valm">@usablica</span>
									</a>
								</div>
							</div>
							<h2 class="padb10 talc uppercase lgn_hight_s12 bold fsz45 xs-fsz30">Trendwatch - Stay on top</h2>
							<h4 class="padb30 talc lgn_hight_s12 fsz20">
								Keep yourelf up-to-date with current events, trends, changes, topics in Human Resource.<br>
								And forsee how this can impact and affect your organization.
							</h4>
							<div class="marb20 padb10 brdb talc">
								<a href="#" class="diblock opa80_h padtb10 padrl20 brdrad3 green_bg talc fsz18 white_txt">Show me how</a>
							</div>
							<ul class="mar0 pad0 padrl80 xs-padrl20 tall fsz16">
								<li class="wi_100 dflex marb15 first">
									<div class="wi_20p"> <img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock"> </div>
									<div class="flex_1 padl10"> De flesta <span class="lgtblue_bg dblue_txt">knölar</span> är inte cancer. Ofarliga knölar kan vara <span class="lgtblue_bg dblue_txt">svullna bröstkörtlar</span> eller <span class="lgtblue_bg dblue_txt">knutor</span> som bildas av normal bröstvävnad. Låt en läkare avgöra vad som är vad. </div>
								</li>
								<li class="wi_100 dflex marb15">
									<div class="wi_20p"> <img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock"> </div>
									<div class="flex_1 padl10"> Röntgen av brösten, <span class="lgtblue_bg dblue_txt">mammografi</span>, kan påvisa cancertumörer som är så små att de inte går att känna. </div>
								</li>
								<li class="wi_100 dflex marb15">
									<div class="wi_20p"> <img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock"> </div>
									<div class="flex_1 padl10"> Tio procent av alla <span class="lgtblue_bg dblue_txt">cancertumörer</span> i brösten syns inte på röntgenbilden, inte ens om de är stora. De upptäcks nästan alltid av kvinnan själv när hon <span class="lgtblue_bg dblue_txt">undersöker sina bröst</span>. </div>
								</li>
								<li class="wi_100 dflex marb15">
									<div class="wi_20p"> <img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock"> </div>
									<div class="flex_1 padl10"> Kvinnor med få menstruationscykler under sitt liv, till exempel kvinnor som kommit sent i puberteten och fött många barn löper en något mindre risk att drabbas av <span class="lgtblue_bg dblue_txt">bröstcancer</span>. Det i sin tur tyder på att <span class="lgtblue_bg dblue_txt">hormoner</span> har betydelse för uppkomsten av bröstcancer. </div>
								</li>
								<li class="wi_100 dflex marb15">
									<div class="wi_20p"> <img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock"> </div>
									<div class="flex_1 padl10"> Vid en mindre <span class="lgtblue_bg dblue_txt">cancertumör</span> som inte spridit sig räcker det i de flesta fall att ta bort en mindre del av bröstet. Tveka inte att gå till läkare även med en liten knöl! </div>
								</li>
								<li class="wi_100 dflex marb15">
									<div class="wi_20p"> <img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock"> </div>
									<div class="flex_1 padl10"> <span class="lgtblue_bg dblue_txt">Slag mot brösten</span> orsakar inte cancer. </div>
								</li>
								<li class="wi_100 dflex marb15 last">
									<div class="wi_20p"> <img src="<?php echo $path;?>html/usercontent/images/icon-info.png" class="wi_20p hei_auto dblock"> </div>
									<div class="flex_1 padl10"> <span class="lgtblue_bg dblue_txt">Smärta</span> och <span class="lgtblue_bg dblue_txt">ömhet</span> i brösten är inte vanliga symtom vid bröstcancer, utan har oftast en helt naturlig hormonell orsak. </div>
								</li>
							</ul>
						</div>
						<div class="clear"></div>
						<div class="martb15 padrl10">
							<div class="brdt"></div>
						</div>
						
						
						<!-- Intro js -->
						<div class="column_m bs_bb marb5 padrl10" id="scroll-section-1" data-offset="55">
							<h2 class="padb10 talc uppercase lgn_hight_s12 bold fsz45">Trendwatch - Stay on top</h2>
							<h4 class="padb30 talc lgn_hight_s12 fsz18">
								Keep yourelf up-to-date with current events, trends, changes, topics in Human Resource.<br>
								And forsee how this can impact and affect your organization.
							</h4>
							<div class="marb20 padb10 brdb talc">
								<a href="#" class="diblock opa80_h padtb10 padrl20 brdrad3 green_bg talc fsz18 white_txt">Show me how</a>
							</div>
							<div class="dflex fxwrap_w marrl-20 marb10 padb30 brdb">
								
								<div class="wi_33 xxs-wi_100 marb20 padrl10 talc">
									<div class="maxwi_300p marrla">
										<span class="fa fa-compress fsz75 lenblack_txt"></span>
										<h4 class="pad0 talc bold fsz16">No dependencies, fast and small</h4>
										<div>
											10KB JavaScript and 2.5KB CSS, that's all (minified, gzipped).
										</div>
									</div>
								</div>
								<div class="wi_33 xxs-wi_100 marb20 padrl10 talc">
									<div class="maxwi_300p marrla">
										<span class="fa fa-child fsz75 lenblack_txt"></span>
										<h4 class="pad0 talc bold fsz16">User-friendly</h4>
										<div>
											Navigate using keyboard or mouse. Easily change the themes for your website.
										</div>
									</div>
								</div>
								<div class="wi_33 xxs-wi_100 marb20 padrl10 talc">
									<div class="maxwi_300p marrla">
										<span class="fa fa-globe fsz75 lenblack_txt"></span>
										<h4 class="pad0 talc bold fsz16">Browser compatibility</h4>
										<div>
											Works on Google Chrome, Mozilla Firefox, Opera, Safari and even Internet Explorer.
										</div>
									</div>
								</div>
								
							</div>
							<div class="marb20 padb20 brdb uppercase">
								<a href="#" class="diblock mart10 marr15 dark_grey_txt">
									<span class="valm">Documentation</span>
								</a>
								<a href="#" class="diblock mart10 marr15 dark_grey_txt">
									<span class="valm">Download</span>
								</a>
								<a href="#" class="diblock mart10 marr15 dark_grey_txt">
									<span class="valm">Demo</span>
								</a>
								<a href="#" class="diblock mart10 marr15 dark_grey_txt">
									<span class="fa fa-github valm"></span>
									<span class="valm">Documentation</span>
								</a>
								<a href="#" class="diblock mart10 marr15 dark_grey_txt">
									<span class="fa fa-twitter valm"></span>
									<span class="valm">Twitter</span>
								</a>
								<a href="#" class="diblock mart10 marr15 dark_grey_txt">
									<span class="fa fa-heart valm"></span>
									<span class="valm">Donate</span>
								</a>
							</div>
							<div class="marb20 padb20 brdb">
								<h2 class="padb10 tall lgn_hight_s12 fsz34">Why using Intro.js?</h2>
								<p>
									When new users visit your website or product you should demonstrate your product features using a step-by-step guide. Even when you develop and add a new feature to your product, you should be able to represent them to your users using a user-friendly solution. Intro.js is developed to enable web and mobile developers to create a step-by-step introduction easily.
								</p>
								<p>
									Intro.js is open-source and free to use. Share the project with your friends.
								</p>
							</div>
							<div class="marb20 padb30 brdb">
								<h2 class="padb10 talc lgn_hight_s12 fsz34">Who uses Intro.js?</h2>
								
								<div class="dflex fxwrap_w alit_c talc">
									
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/sap.jpeg" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/amazon.jpeg" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/nestle.jpg" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/kobo.png" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/aylien.png" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/kiwi.png" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/postat.png" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									<div class="wi_25 xs-wi_33 xxs-wi_50 mart20 padrl10">
										<a href="#">
											<img src="<?php echo $path;?>html/usercontent/images/logos/federalbank.png" class="maxwi_100 hei_auto valm">
										</a>
									</div>
									
								</div>
								
							</div>
							
							<div class="marb20 padb30 brdb">
								<h2 class="padb10 tall lgn_hight_s12 fsz34">Examples</h2>
								
								<div class="dflex fxwrap_w alit_c marrl-20">
									
									<div class="wi_50 xs-wi_100 mart20 padrl10">
										<h3 class="padb15 bold fsz16">
											<span class="fa fa-info-circle valm"></span>
											<span class="valm">Hello world</span>
										</h3>
										<div class="marb5">
											<p>This is a basic usage of the library. You can define steps by adding <code>data-intro</code> attribute to the HTML elements. This is the easiest way to setup your step-by-step guide.</p>
										</div>
										<div>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Demo</a>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Source</a>
										</div>
									</div>
									
									<div class="wi_50 xs-wi_100 mart20 padrl10">
										<h3 class="padb15 bold fsz16">
											<span class="fa fa-bars valm"></span>
											<span class="valm">Progress bar</span>
										</h3>
										<div class="marb5">
											<p>Add progress-bar to your step-by-step introduction. It's as easy as adding <code>showProgress</code> option to your Intro.js instance (e.g. <code>introJs().setOption('showProgress', true).start();</code>)</p>
										</div>
										<div>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Demo</a>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Source</a>
										</div>
									</div>
									
									<div class="wi_50 xs-wi_100 mart20 padrl10">
										<h3 class="padb15 bold fsz16">
											<span class="fa fa-commenting-o valm"></span>
											<span class="valm">Hint</span>
											<span class="padrl5 brdrad3 red_bg valm uppercase fsz11 white_txt">
												<code>new</code>
											</span>
										</h3>
										<div class="marb5">
											<p>Hints are the new feature in Intro.js that enables you to add additional descriptions to any part of a web page. You can define hints by adding <code>data-hint</code> attribute to the HTML elements.</p>
										</div>
										<div>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Demo</a>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Source</a>
										</div>
									</div>
									
									<div class="wi_50 xs-wi_100 mart20 padrl10">
										<h3 class="padb15 bold fsz16">
											<span class="fa fa-code valm"></span>
											<span class="valm">Programmatic Hint</span>
											<span class="padrl5 brdrad3 red_bg valm uppercase fsz11 white_txt">
												<code>new</code>
											</span>
										</h3>
										<div class="marb5">
											<p>You can add/alter hints using JavaScript objects (or JSON). Also, you can optionally bind a function to hint events (e.g. hint click, hint close)</p>
										</div>
										<div>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Demo</a>
											<a href="#" class="diblock marr5 padtb10 padrl20 brd brdclr_usgrey brdrad3 trans_bg talc uppercase fsz12 dark_grey_txt">Source</a>
										</div>
									</div>
									
									
								</div>
							</div>
							
							
						</div>
						<div class="clear"></div>
						
						<!-- Set up Events -->
						<div class="column_m bs_bb marb5 padrl10">
							<h2 class="padb10 tall lgn_hight_s12 fsz34">Trendwatch - Stay on top</h2>
							<h4 class="padb5 tall lgn_hight_s12 fsz18">
											Keep yourelf up-to-date with current events, trends, changes, topics in Human Resource.<br>
											And forsee how this can impact and affect your organization.
										</h4>
							<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
							<p class="wi_150p xs-wi_100 sm-wi_100 fleft xs-pull-none sm-pull-none pad0 ff-sans bold remlgtgrey_txt">Saken</p>
							<p class="marl150 xs-mar0 sm-mar0">Skadestånd på grund av kollektivavtalsbrott</p>
							<p class="wi_150p xs-wi_100 sm-wi_100 fleft xs-pull-none sm-pull-none pad0 ff-sans bold remlgtgrey_txt">Summary</p>
							<p class="marl150 xs-mar0 sm-mar0">En präst i ett mindre trossamfund har sagts upp till följd av en konflikt med bl.a. ärkebiskopen i trossamfundet. Arbetsdomstolen har funnit att konflikten mellan prästen och bl.a. ärkebiskopen varit av sådan allvarlig art att den äventyrade kyrkans verksamhet, att prästen inte varit utan skuld till samarbetssvårigheterna, att det måste ha stått klart för prästen att trossamfundet inte accepterade hans agerande, att det inte varit möjligt att omplacera prästen och att det därför funnits saklig grund för uppsägning.</p>
							<p class="wi_150p xs-wi_100 sm-wi_100 fleft xs-pull-none sm-pull-none pad0 ff-sans bold remlgtgrey_txt">Question 1</p>
							<p class="marl150 xs-mar0 sm-mar0">Därutöver fråga om trossamfundet stängt av prästen i strid mot 34 § andra stycket anställningsskyddslagen?</p>
							<p class="wi_150p xs-wi_100 sm-wi_100 fleft xs-pull-none sm-pull-none pad0 ff-sans bold remlgtgrey_txt">Question 2</p>
							<p class="marl150 xs-mar0 sm-mar0">Och om prästen har rätt till lön under den s.k. förlängningstiden, dvs. från det att uppsägningen löpt ut till dess tvisten slutligen avgjorts?</p>
						</div>
						<div class="clear"></div>
						<div class="martb15 padrl10">
							<div class="brdt"></div>
						</div>
						
						<!-- Toborrow -->
						<div class="column_m bs_bb padrl10">
							<div class="dflex fxwrap_w padb10 padrl5 lgtgrey2_bg">
								
								<div class="wi_50 xs-wi_100 padtb10 padrl10">
									<h3 class="padtb10 fsz28">Lånedetaljer</h3>
									<ul class="mar0 pad0">
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Lånebelopp:</strong> 
											<span class="talr">1 000 000 SEK</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Löptid:</strong> 
											<span class="talr">36 månader</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Amortering:</strong> 
											<span class="talr">0%</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Säkerhet:</strong> 
											<span class="talr">Pant i fastighet,  Moderbolagsborgen</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Syfte:</strong> 
											<span class="talr">Investeringskapital</span>
										</li>
									</ul>
								</div>
								
								<div class="wi_50 xs-wi_100 padtb10 padrl10">
									<h3 class="padtb10 fsz28">Företagsinformation</h3>
									<ul class="mar0 pad0">
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Legalt bolagsnamn:</strong> 
											<span class="talr">Stenbacksskolan 5 AB</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Företagsform:</strong> 
											<span class="talr">AB</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Registreringsår:</strong> 
											<span class="talr">1 april 2015</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Verksamhet:</strong> 
											<span class="talr">Uthyrning och förvaltning a...</span>
										</li>
										<li class="wi_100 dflex justc_sb mar0 pad0 padtb8 brdb">
											<strong>Säte:</strong> 
											<span class="talr">Örebro län</span>
										</li>
									</ul>
								</div>
								
							</div>
						</div>
						<div class="clear"></div>
						<div class="martb15 padrl10">
							<div class="brdt"></div>
						</div>
						
						<!-- nvr -->
						<div class="column_m bs_bb padrl10">
							<div class="dflex fxwrap_w padrl-10">
								
								<div class="wi_50 xs-wi_100 padtb10 padrl10">
									<h3 class="padtb10 fsz28">Några av de 4000 företag som använder NVR aktiebok online.</h3>
									<div class="padt10 uppercase fsz12">
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">PricewaterhouseCoopers</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Ernst &amp; Young</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">KPMG</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">BDO</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Grant Thornton</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Mazars</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Matrisen</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Helgusgruppen</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">GU Holding</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Seabased</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Gammelstilla WHISKY</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Ownpower</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">iStone</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">M4 Gruppen</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Fastum UBC</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Medius</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Sciety</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Tessin</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Kaptena</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Pepins</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Alvesta Glass</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">Salesbox</span>
										<span class="diblock marrb5 padtb8 padrl20 brdrad50 eeegrey_bg">vB Automotive</span>
									</div>
								</div>
								
								<div class="wi_50 xs-wi_100 padtb10 padrl10">
									<h3 class="padtb10 fsz28">Nyheter</h3>
									<ul class="mar0 pad0 fsz14">
										<li class="dblock mar0 pad0">
											<a href="#" class="wi_100 dflex alit_s padb5 black_txt dblue_txt_h">
												<div class="wi_55p hei_55p fxshrink_0 dflex fxdir_col justc_c alit_c marr5 dark_grey3_bg uppercase talc white_txt">
													<strong class="fsz24">26</strong>
													<span>oct</span>
												</div>
												<div class="ovfl_hid dflex justc_c fxdir_col padrl15 eeegrey_bg">
													<h4 class="ovfl_hid mar0 pad0 ws_now txtovfl_el bold fsz14 inh_txt">NVR lanserar Register för verklig huvudman!</h4>
													<div class="ovfl_hid ws_now txtovfl_el">
														Idag kan vi stolt meddela att NVR lanserar Register för verklig huvudman på webbplatsen www.verklighuvudman.se. På denna webbplats finns all information man kan behöva om ämnet verklig huvudman och kundkännedom. Under nästkommande år kommer verksamhetsutövare med ett befogat intresse ha möjlighet att elektroniskt och i realtid erhålla information om verklig huvudman i svenska aktiebolag, i enlighet med Penningtvättslagen.
													</div>
												</div>
											</a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="wi_100 dflex alit_s padb5 black_txt dblue_txt_h">
												<div class="wi_55p hei_55p fxshrink_0 dflex fxdir_col justc_c alit_c marr5 dark_grey3_bg uppercase talc white_txt">
													<strong class="fsz24">21</strong>
													<span>sep</span>
												</div>
												<div class="ovfl_hid dflex justc_c fxdir_col padrl15 eeegrey_bg">
													<h4 class="ovfl_hid mar0 pad0 ws_now txtovfl_el bold fsz14 inh_txt">Tips om gratis skydd mot bolagskapning</h4>
													<div class="ovfl_hid ws_now txtovfl_el">
														Uppmärksamheten kring fenomenet bolagskapningar har ökat. NVR vill därför informera sina kunder hur de gratis kan skydda sig bättre mot detta.
													</div>
												</div>
											</a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="wi_100 dflex alit_s padb5 black_txt dblue_txt_h">
												<div class="wi_55p hei_55p fxshrink_0 dflex fxdir_col justc_c alit_c marr5 dark_grey3_bg uppercase talc white_txt">
													<strong class="fsz24">01</strong>
													<span>feb</span>
												</div>
												<div class="ovfl_hid dflex justc_c fxdir_col padrl15 eeegrey_bg">
													<h4 class="ovfl_hid mar0 pad0 ws_now txtovfl_el bold fsz14 inh_txt">Register för verklig huvudman senast 26 jun 2017</h4>
													<div class="ovfl_hid ws_now txtovfl_el">
														NVR har som enda svenska aktör redan erfarenhet av automatisk uppdatering av ägarinformation från sin tjänst i Danmark och vi ser fram emot att även hjälpa svenska aktiebolag med sin rapportering.
													</div>
												</div>
											</a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="wi_100 dflex alit_s padb5 black_txt dblue_txt_h">
												<div class="wi_55p hei_55p fxshrink_0 dflex fxdir_col justc_c alit_c marr5 dark_grey3_bg uppercase talc white_txt">
													<strong class="fsz24">13</strong>
													<span>nov</span>
												</div>
												<div class="ovfl_hid dflex justc_c fxdir_col padrl15 eeegrey_bg">
													<h4 class="ovfl_hid mar0 pad0 ws_now txtovfl_el bold fsz14 inh_txt">22 000 unika investerare hos NVR</h4>
													<div class="ovfl_hid ws_now txtovfl_el">
														Det är med glädje och stolthet som NVR kan meddela att ca 22 000 unika investerare är delägare i de 2 500 bolag som för sin aktiebok elektronisk hos NVR. 
													</div>
												</div>
											</a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="wi_100 dflex alit_s padb5 black_txt dblue_txt_h">
												<div class="wi_55p hei_55p fxshrink_0 dflex fxdir_col justc_c alit_c marr5 dark_grey3_bg uppercase talc white_txt">
													<strong class="fsz24">31</strong>
													<span>oct</span>
												</div>
												<div class="ovfl_hid dflex justc_c fxdir_col padrl15 eeegrey_bg">
													<h4 class="ovfl_hid mar0 pad0 ws_now txtovfl_el bold fsz14 inh_txt">Idag 10 år i branschen</h4>
													<div class="ovfl_hid ws_now txtovfl_el">
														Den 31 oktober 2005, dvs för exakt 10 år sedan, bildades Nordiska Värdepappersregistret AB
													</div>
												</div>
											</a>
										</li>
									</ul>
								</div>
								
							</div>
						</div>
						<div class="clear"></div>
						<div class="martb15 padrl10">
							<div class="brdt"></div>
						</div>
						
						<!-- Configure Data -->
						<div class="column_m bs_bb marb5 padrl10">
							<h2 class="padb10 tall lgn_hight_s12 fsz34">Trendwatch - Stay on top</h2>
							<h4 class="padb5 tall lgn_hight_s12 fsz18">
											Keep yourelf up-to-date with current events, trends, changes, topics in Human Resource.<br>
											And forsee how this can impact and affect your organization.
										</h4>
							<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
							<table class="wi_100 lgtgrey2_bg" cellpadding="0" cellspacing="0">
								<tbody>
									<tr class="odd">
										<td class="wi_50 padtb30 valm tall">
											<div class="padrl30 brdr">
												<h2 class="padb30 tall fsz28 lgn_hight_s1 bold black_txt">
																Be verified online.<br>Get Cloud ID
															</h2>
												<h3 class="fsz20">Här är våra tjänster för dig</h3>
												<p> En HR-avdelning måste ha många strängar på sin lyra. Förhandling, avtal, policys, arbetsmiljö, arbetsrätt, kollektivavtal, ledarskapsutveckling, intern kommunikation. Och så fortsätter listan. Hos oss kan du skräddarsy din egen HR-lösning som passar din vardag. Du kan välja mellan allt från HR Expert som täcker dina grundbehov i arbetsmiljö och arbetsrätt, till skräddarsydda portallösningar som fungerar likt ett intranät för din organisation. </p>
												<div class="mart15">
													<a href="#" class="style_base diblock pos_rel padtb10 padrl30 pgreen_bg lgn_hight_20 talc fsz20 white_txt">
														<span class="wi_22p wi_36p_sbh hei_100 dblock opa30 pos_abs top0 left0 white_bg trans_all2"></span>
														<span class="dblock">Få en personlig visning</span>
													</a>
												</div>
											</div>
										</td>
										<td class="wi_50 padtb30 valm tall">
											<div class="padrl30">
												<h2 class="padb30 tall fsz28 lgn_hight_s1 bold black_txt">
																Be verified online.<br>Get Cloud ID
															</h2>
												<h3 class="fsz20">Här är våra tjänster för dig</h3>
												<p> En HR-avdelning måste ha många strängar på sin lyra. Förhandling, avtal, policys, arbetsmiljö, arbetsrätt, kollektivavtal, ledarskapsutveckling, intern kommunikation. Och så fortsätter listan. Hos oss kan du skräddarsy din egen HR-lösning som passar din vardag. Du kan välja mellan allt från HR Expert som täcker dina grundbehov i arbetsmiljö och arbetsrätt, till skräddarsydda portallösningar som fungerar likt ett intranät för din organisation. </p>
												<div class="mart15">
													<a href="#" class="style_base diblock pos_rel padtb10 padrl30 pgreen_bg lgn_hight_20 talc fsz20 white_txt">
														<span class="wi_22p wi_36p_sbh hei_100 dblock opa30 pos_abs top0 left0 white_bg trans_all2"></span>
														<span class="dblock">Få en personlig visning</span>
													</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="clear"></div>
						<div class="martb15 padrl10">
							<div class="brdt"></div>
						</div>
						
						<!-- Choose Triggers -->
						<div class="column_m bs_bb marb5 padrl10">
							<h2 class="padb10 tall lgn_hight_s12 fsz34">Trendwatch - Stay on top</h2>
							<h4 class="padb5 tall lgn_hight_s12 fsz18">
											Keep yourelf up-to-date with current events, trends, changes, topics in Human Resource.<br>
											And forsee how this can impact and affect your organization.
										</h4>
							<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div> <img src="<?php echo $path;?>html/usercontent/images/custom1.png" class="wi_100 hei_auto dblock">
							<div class="container tall padt20">
								<div class="thr_clmn brdl padrl15 bs_bb">
									<h3 class="lgn_hight_s12 bold fsz20">Email</h3> <img src="<?php echo $path;?>html/usercontent/images/icon-email.png" class="fleft marrb20">
									<p>Reduce email clutter and focus only on what matters; Keep customers emails inside CRM. </p>
								</div>
								<div class="thr_clmn brdl padrl15 bs_bb">
									<h3 class="lgn_hight_s12 bold fsz20">Phone Calls</h3> <img src="<?php echo $path;?>html/usercontent/images/icon-phone.png" class="fleft marrb20">
									<p>Make phone calls within CRM and instantly track prospect details, call duration, etc. </p>
								</div>
								<div class="thr_clmn brdl padrl15 bs_bb">
									<h3 class="lgn_hight_s12 bold fsz20">Live Chat</h3> <img src="<?php echo $path;?>html/usercontent/images/icon-live-chat.png" class="fleft marrb20">
									<p>Chat with your website visitors proactively and convert them to potential customers. </p>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="martb15 padrl10">
							<div class="brdt"></div>
						</div>
						
						<!-- Send Data -->
						<div class="column_m bs_bb marb5 padrl10">
							<h2 class="padb10 tall lgn_hight_s12 fsz34">Trendwatch - Stay on top</h2>
							<h4 class="padb30 tall lgn_hight_s12 fsz18">
											Keep yourelf up-to-date with current events, trends, changes, topics in Human Resource.<br>
											And forsee how this can impact and affect your organization.
										</h4>
							<p class="padb5">Keep yourelf up-to-date with current events, trends, changes, topics in Human Resource. And forsee how this can impact and affect your organization.</p>
							<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
							<div class="padt30">
								<div class="tw_clmn padtb20">
									<div class="home_section_heading">
										<h2 class="pad0 fsz20"><span>RECENT BLOG POSTS</span></h2>
										<div class="clear"></div>
									</div>
									<div class="padrl15">
										<div class="column_m">
											<ul class="icon_list_90">
												<li class="first">
													<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/blog-thumb1.jpg" width="90" height="90" alt="Awesome dream"> </div>
													<div class="list_content_bx">
														<h2 class="padb10 fsz14">AWESOME DREAM HOUSE IN A GREAT LOCATION</h2>
														<p class="">Lorem ipsum dolor amet, consectetur adipiscing elit. Quisque eget ante vel nunc posuere rhoncus. Donec quis elit sit...</p>
														<div class="column_m">
															<div class="tw_clmn"><a href="#" class="fsz11 tall">Read more</a> </div>
															<div class="tw_clmn talr fsz11">Feb 5, 2014</div>
														</div>
													</div>
												</li>
												<li class="last">
													<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/blog-thumb2.jpg" width="90" height="90" alt="AWESOME DREAM HOUSE IN A GREAT LOCATION"> </div>
													<div class="list_content_bx">
														<h2 class="padb10 fsz14">AWESOME DREAM HOUSE IN A GREAT LOCATION</h2>
														<p class="">Lorem ipsum dolor amet, consectetur adipiscing elit. Quisque eget ante vel nunc posuere rhoncus. Donec quis elit sit...</p>
														<div class="column_m">
															<div class="tw_clmn"><a href="#" class="fsz11 tall">Read more</a> </div>
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
													<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/testi_monial_thumb1.jpg" width="90" height="90" alt="Awesome dream"> </div>
													<div class="list_content_bx">
														<h2 class="padb10 fsz14">Mesfun Tedla, GIKO</h2>
														<p class="pad0">As a global business it can be difficult to find companies with the right talent to deliver on our projects, at the right time and price. Using Qmatchup is like having an extended team of management, everywhere, when we need them.</p>
													</div>
												</li>
												<li class="last">
													<div class="ico_img_bx"><img src="<?php echo $path;?>html/usercontent/images/testi_monial_thumb2.jpg" width="90" height="90" alt="AWESOME DREAM HOUSE IN A GREAT LOCATION"> </div>
													<div class="list_content_bx">
														<h2 class="padb10 fsz14">Per Nygren, Notitia</h2>
														<p class="pad0">In our organization, working with solid and professional partners/ vendors is far more important than finding the lowest price on the market. Qmatchup is the secure way to outsource and saves us hours on research and checkups.</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="mart15"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Prova Plus för 1 kr!</a> </div>
					
					
					<!-- Marquee -->
					<div class="visible-xs visible-sm martb20 padrl10">
						<h3 class="padb20 uppercase bold fsz16">KALENDARIUM – vårens seminarier</h3>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/fb.png" width="80" title="Facebook" alt="Facebook"> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/volvo.png" width="80" title="Volvo" alt="Volvo"> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/spot.png" width="80" title="Spotify" alt="Spotify"> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="padt5 talc fsz16"> <a href="#">View more</a> </div>
					</div>
					
					<div class="clear"></div>
					
					<div class="column_m bs_bb marb5 padrl10">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1">
												<h2 class="mart15 marb10 pad0 tall lgn_hight_s12 fsz34">Snabbare och enklare företagslån</h2>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												<p>På Toborrow samlas tusentals långivare som tävlar om att få låna ut pengar till ditt företag. Vi erbjuder konkurrenskraftiga räntor genom en ansökningsprocess som sker helt online. Villkoren är flexibla, och sätts helt av dig. Du väljer belopp, löptid och amorteringstakt. Resten tar vi hand om.</p>
												
												<h2 class="mart15 marb10 pad0 tall lgn_hight_s12 fsz34">Varför låna via oss?</h2>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												<ul class="mar0 pad0 tall">
													<li class="wi_100 dflex marb15 first">
														<strong class="wi_32p diblock brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt">1</strong>
														<div class="flex_1 alself_s padl10">
															<em>Du sätter alla villkor för lånet</em>
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
															<em>Möjlighet att betala tillbaka lånet i förtid, utan extra avgifter</em>
														</div>
													</li>
												</ul>
												
												<div class="mart30">
													<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
												</div>
											</div>
											<div class="wi_250p fxshrink_0 pos_rel martb20 marl15 xs-marl0 pad10 brdrad10 bg_ddf0f1">
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
										</div>
									</div>
									<div class="clear"></div>
									<div class="martb15 padrl10"></div>
									
									<!-- Section 2 -->
									<div class="column_m bs_bb marb5 padrl10">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1">
												<h2 class="mart15 marb10 pad0 tall lgn_hight_s12 fsz34">Så går det till</h2>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												
												<div class="wi_100 dflex fxwrap_w marrl-10 talc">
													<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
														<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow1.png" height="70" class="dblock martb10 marrla" />
														<div class="mart5 marb10">
															<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">1</strong>
														</div>
														<p>
															Låneansökan sker online. Du får svar i realtid om ditt företag uppfyller våra kriterier.
														</p>
													</div>
													<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
														<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow2.png" height="70" class="dblock martb10 marrla" />
														<div class="mart5 marb10">
															<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">2</strong>
														</div>
														<p>
															Du presenterar dig själv och ditt företag och startar din auktion när det passar dig.
														</p>
													</div>
													<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
														<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow3.png" height="70" class="dblock martb10 marrla" />
														<div class="mart5 marb10">
															<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">3</strong>
														</div>
														<p>
															När lånet är fyllt kan du ta ställning till om du vill ha lånet eller ej.
														</p>
													</div>
													<div class="wi_25 sm-wi_50 xs-wi_50 xxs-wi_100 marb10 padrl10">
														<img src="<?php echo $path;?>html/usercontent/images/icons/toborrow4.png" height="70" class="dblock martb10 marrla" />
														<div class="mart5 marb10">
															<strong class="diblock padrl10 brdrad100 bg_8fccd2 lgn_hight_32 white_txt">4</strong>
														</div>
														<p>
															Pengarna finns på ditt konto inom 24 timmar. Vi hanterar all juridik och administration, helt utan fysiska papper.
														</p>
													</div>
													
												</div>
												
												<div class="">
													<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
												</div>
											</div>
										</div>
									</div>
									<div class="clear"></div>
									<div class="martb15 padrl10"></div>
									
									<!-- Section 3 -->
									<div class="column_m bs_bb marb5 padrl10">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1">
												<h2 class="mart15 marb10 pad0 tall lgn_hight_s12 fsz34">Maximal valfrihet att utforma ditt företagslån</h2>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												<p>Du bestämmer själv hur du vill utforma ditt lån:</p>
												<ul class="mar0 pad0 tall">
													<li class="wi_100 dflex marb15 first">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<strong>Lånebelopp:</strong> 100 000 till 2 000 000 kronor
														</div>
													</li>
													<li class="wi_100 dflex marb15">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<strong>Löptid:</strong> 3 - 36 månader
														</div>
													</li>
													<li class="wi_100 dflex marb15">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<strong>Amorteringstakt:</strong> 0%, 50% eller 100%
														</div>
													</li>
													<li class="wi_100 dflex marb15">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<strong>Säkerheter:</strong> Borgen (personlig eller moderbolag) eller företagshypotek
														</div>
													</li>
												</ul>
												
												<h3 class="mart30 padb15 fsz24">Ett företagslån anpassat till dina behov</h3>
												<p>Alla företag är unika och har olika önskemål, förutsättningar och möjligheter. Det är därför du själv sätter alla villkor för ditt lån på Toborrow. Det innebär att varje lån utformas för att passa just ditt företag och er situation. Snabbt, enkelt och flexibelt.</p>
												<div class="mart15">
													<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
												</div>
											</div>
											<div class="wi_250p fxshrink_0 pos_rel martb20 marl15 xs-marl0 pad10 brdrad10 bg_ddf0f1">
												<div class="wi_20p hei_20p pos_abs pos_cenX bot-10p bg_ddf0f1 rotate45"></div>
												<h4 class="fsz20">Vi gillar flexibilitet på Toborrow</h4>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												<p>Vi gillar valfrihet och flexibilitet. Därför kan du välja att avsluta lånet i förtid, det vill säga betala tillbaka pengarna till dina långivare tidigare än planerat.</p>
											</div>
										</div>
									</div>
									<div class="clear"></div>
									<div class="martb15 padrl10"></div>
									
									<!-- Section 4 -->
									<div class="column_m bs_bb marb5 padrl10">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1">
												<h2 class="mart15 marb10 pad0 tall lgn_hight_s12 fsz34">Kom igång: Ansöka om företagslån</h2>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												<p>Grundkrav för en låneansökan på Toborrow:</p>
												<ul class="mar0 pad0 tall">
													<li class="wi_100 dflex marb15 first">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<em>Omsättning minst 1 miljon kronor</em>
														</div>
													</li>
													<li class="wi_100 dflex marb15">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<em>En fungerande verksamhet</em>
														</div>
													</li>
													<li class="wi_100 dflex marb15">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<em>Minst ett bokslut för att kunna bedöma kreditvärdighet</em>
														</div>
													</li>
												</ul>
												<h3 class="mart30 padb15 fsz24">Snabbt och lätt att ansöka</h3>
												<p>Ansökan sker digitalt. Inga papper åker fram och tillbaka, inga möten behövs. Det ger minimala omkostnader, vilket avspeglas i bättre lånevillkor.</p>
												<h3 class="mart15 padb15 fsz24">Så finansieras lånet</h3>
												<p>Hos Toborrow samlas tusentals långivare som finansierar ditt lån genom att lägga bud i en aktion. På så vis tävlar våra långivare som att erbjuda dig den lägsta räntan. När budgivningen är slutförd kan du ta ställning till erbjudandet i lugn och ro.</p>
												<div class="mart15">
													<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
												</div>
											</div>
										
											<div class="wi_250p fxshrink_0 pos_rel martb20 marl15 xs-marl0 pad10 brdrad10 bg_ddf0f1">
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
										</div>
										
									</div>
									<div class="clear"></div>
									<div class="martb15 padrl10"></div>
									
									<!-- Section 5 -->
									<div class="column_m bs_bb marb5 padrl10">
										<h2 class="mart15 marb10 pad0 tall lgn_hight_s12 fsz34">Vad kostar företagslånet?</h2>
										<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
										<p>Avgiften till Toborrow beror på vilken löptid du vill låna: </p>
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
									<div class="clear"></div>
									<div class="martb15 padrl10"></div>
									
								
								<!-- Marquee -->
								<div class="visible-xs visible-sm martb20 padrl10">
									<h3 class="padb20 uppercase bold fsz16">KALENDARIUM – vårens seminarier</h3>
									<div class="dflex marb10 padb5 brdb brdclr_grey">
										<div class="wi_90p">
											<img src="<?php echo $path;?>html/usercontent/images/fb.png" width="80" title="Facebook" alt="Facebook" />
										</div>
										<div class="flex_1">
											<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
											<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
										</div>
									</div>
									<div class="dflex marb10 padb5 brdb brdclr_grey">
										<div class="wi_90p">
											<img src="<?php echo $path;?>html/usercontent/images/volvo.png" width="80" title="Volvo" alt="Volvo" />
										</div>
										<div class="flex_1">
											<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
											<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
										</div>
									</div>
									<div class="dflex marb10 padb5 brdb brdclr_grey">
										<div class="wi_90p">
											<img src="<?php echo $path;?>html/usercontent/images/spot.png" width="80" title="Spotify" alt="Spotify" />
										</div>
										<div class="flex_1">
											<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
											<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
										</div>
									</div>
									<div class="padt5 talc fsz16">
										<a href="#">View more</a>
									</div>
								</div>
								
								
								<div class="clear"></div>
								<div class="column_m bs_bb bsa_bb marb5 padrl10" id="scroll-section-1" data-offset="55">
										
										
										
									
										<img src="<?php echo $path;?>html/usercontent/images/banks.svg" class="wi_100 hei_auto dblock marb20">
										
										<h3 class="padb10 fsz22">Lendo söker lån hos flera banker</h3>
										<p>Lendo är en oberoende låneförmedlare som behandlar ditt lån hos fler banker och låneinstitut, för att hitta det lån med lägst ränta och bäst villkor för just dig.</p>
										
										<h3 class="padb10 fsz22">Säkert och tryggt</h3>
										<p>När du väljer ett lån kan du samtidigt teckna ett låneskydd som hjälper dig att betala dina lånekostnader i upp till ett år vid till exempel plötslig arbetslöshet eller sjukdom.</p>
										
										<h3 class="padb10 fsz22">Vanliga frågor och svar</h3>
										<ul class="mar0 pad0">
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Vilka är grundkraven?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<h4 class="bold fsz16">Lån över 30 000 kr</h4>
													<ul class="mar0 marb20 pad0">
														<li class="dblock mar0 marb5 pad0">- Vara minst 18 år</li>
														<li class="dblock mar0 marb5 pad0">- Vara folkbokförd och skriven i Sverige minst ett år</li>
														<li class="dblock mar0 marb5 pad0">- Har en fast inkomst från arbete eller pension</li>
														<li class="dblock mar0 marb5 pad0">- Inneha en årsinkomst på minst 110 000 kr</li>
														<li class="dblock mar0 marb5 pad0">- Vara skuldfri från kronofogden i minst 6 månader</li>
													</ul>
													
													<h4 class="bold fsz16">Lån upp till 30 000 kr</h4>
													<ul class="mar0 marb20 pad0">
														<li class="dblock mar0 marb5 pad0">- Vara minst 18 år</li>
														<li class="dblock mar0 marb5 pad0">- Vara folkbokförd och skriven i Sverige minst ett år</li>
														<li class="dblock mar0 marb5 pad0">- Inneha en årsinkomst på minst 100 000 kr</li>
														<li class="dblock mar0 marb5 pad0">- Har en inkomst från arbete eller pension</li>
														<li class="dblock mar0 marb5 pad0">- Vara skuldfri från kronofogden i minst 6 månader</li>
													</ul>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Kan jag låna ifall jag har betalningsanmärkningar?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Du som har betalningsanmärkningar kan ansöka om lån upp till 150 000 kr förutsatt att följande krav uppfylls:</p>
													<ul class="mar0 marb20 pad0">
														<li class="dblock mar0 marb5 pad0">- Du är minst 18 år.</li>
														<li class="dblock mar0 marb5 pad0">- Är folkbokförd i Sverige sedan minst ett år.</li>
														<li class="dblock mar0 marb5 pad0">- Har en årsinkomst på minst 120 000 kr.</li>
														<li class="dblock mar0 marb5 pad0">- Är skuldfri hos Kronofogden sedan 6 månader.</li>
													</ul>
													<p>Kraven är satta av våra banker och låneinstitut och det är de som bedömer vilka kunder som kan beviljas ett lån.</p>
													<p><strong class="uppercase">VIKTIGT:</strong> Lendo kan inte påverka denna process.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Hur mycket kan jag låna?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>På Lendo kan du ansöka om lån från 5 000 kr upp till 500 000 kr.</p>
													<p>Bankerna prövar din ansökan för att ta reda på din ekonomiska situation och för att bedöma din framtida förmåga att betala tillbaka lånet. Utifrån detta bestämmer vardera bank och låneinstitut hur mycket du kan låna.</p>
													<p><strong class="uppercase">TIPS:</strong> En tumregel är att inte ansöka om lån som överstiger 90% av din årsinkomst.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Vilken ränta får jag?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Räntan sätts inte av Lendo utan av de banker och låneinstitut som Lendo arbetar med.</p>
													<p>Varje bank och låneinstitut behandlar din ansökan individuellt och den ränta som du erhåller bestäms utifrån den kreditupplysning som utförs av bankerna och låneinstituten samt deras interna riskbedömningar om din (och eventuell medsökandes) återbetalningsförmåga och kreditrisk.</p>
													<p>Räntan mellan olika banker och låneinstitut varierar beroende på vem eller vilka som söker, det är därför som det är så viktigt att jämföra så många banker och låneinstitut som möjligt för att hitta den lägsta räntan för just dig.</p>
													<p>Vanligtvis hamnar den effektiva räntan mellan 4,95% och 17,55%. Den effektiva räntan inkluderar eventuella avgifter eller andra kostnader från banken.</p>
													<p><strong class="uppercase">VIKTIGT:</strong> Du måste skicka in en ansökan för att få reda på vilken ränta bankerna och låneinstituten kan erbjuda dig.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Hur sänker jag kostnaden på mina lån?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Ange totalsumman i formuläret och kryssa sedan i att du vill sänka kostnaden på dina lån, då visas ytterligare ett reglage där du kan ange hur stor del av ditt ansökta lån som består av nuvarande lån som du vill sänka/omförhandla kostnaden på.</p>
													<p>m du enbart vill ansöka om att sänka/omförhandla kostnaden för nuvarande lån så drar du det blå reglaget så långt åt höger som det går, för att indikera att hela din ansökan ska gå till för att sänka/omförhandla nuvarande lån.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Kostar det något?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Att ansöka om lån via Lendo är helt gratis! Lendo tar ut en avgift av bankerna och det tillkommer inga räntepåslag eller extra kostnader för dig! Lendo är en marknadskanal för bankerna, precis som TV- eller radioreklam.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													När betalas lånet ut?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Beroende på vilken bank eller låneinstitut som du väljer så kan det ta olika lång tid för dig att erhålla dina pengar.</p>
													<ul class="mar0 marb20 pad0">
														<li class="dblock mar0 marb5 pad0">- <strong>Ett skuldebrev skickas till dig</strong> per post vilket du skriver under och retunerar. När banken fått ett påskrivet skuldebrev i retur tar det ca 2-5 arbetsdagar innan pengarna finns på ditt konto.</li>
														<li class="dblock mar0 marb5 pad0">- <strong>Du går direkt till bankens</strong> kontor under kontorstid och skriver under ett skuldebrev och får pengarna utbetalad eller överförda till ditt bankkonto.</li>
														<li class="dblock mar0 marb5 pad0">- <strong>Du öppnar en länk (URL)</strong> till ett skuldebrev online som du skriver under via ett BankID. Pengarna kan sättas in på ditt bankkonto eller skickas till dig i form av en utbetalningsavi som du sedan kan gå med till en bank som hjälper dig att lösa in den.</li>
													</ul>
													<p>Avvikelser kan förekomma då Lendo inte kan påverka hur lång tid varje bank behöver för att behandla ditt ärende.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Får jag bara en (1) kreditupplysning?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Endast en kreditupplysning hos Upplysningcentralen (UC) kommer att registreras på dig, men du kan få flera omfrågandekopior från de banker som har tittat på din kreditupplysning. I enstaka fall kan vissa banker ta in ytterligare information som tillägg till informationen från UC för att förbättra kvaliteten i kreditbeslutet.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Hur lång är återbetalningstiden?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Du väljer återbetalningstid själv, från 1 år upp till 15 år. För mindre lån kan det vara lönsammare att ha en kortare återbetalningstid. Totala beloppet att återbetala stiger vid längre återbetalningstid.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Kan jag lösa lånet i förtid?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Du kan när som helst lösa lånet i förtid eller betala in extra pengar utan att det kostar någonting.</p>
													<p>Kontakta banken eller låneinstitutet så hjälper de dig.</p>
												</div>
											</li>
											<li class="dblock mar0 marb10 pad0">
												<a href="#" class="class-toggler dark_grey_txt" data-classes="active">
													<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
													<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
													Vilka banker och kreditinstitut samarbetar Lendo med?
												</a>
												<div class="hide dblock_siba pad15 padb0">
													<p>Lendo samarbetar med följande aktiva banker och kreditinstitut: Avida Finans, Balanzia, Bigbank, Collector Bank, Credento, Euroloan, Forex Bank, ICA Banken, Ikano Bank, Konsumentkredit, Lån &amp; Spar bank, Marginalen Bank, Med Mera Bank, MoneyGo, Nordax, PayEx, Resurs Bank, re:member, Santander, SEB, SevenDay, Svea Ekonomi, Swedbank, Villabanken och Wasa Kredit.</p>
												</div>
											</li>
										</ul>
										
									</div>
				<div class="clear"></div>
				
				<div class="bs_bb marb5 padrl10">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1 xs-talc">
												<div class="marb20"><img src="<?php echo $path;?>html/usercontent/images/icons/tf-1.png" width="50" height="50" /></div>
												<h3 class="padb20 fsz24">Your forms should look as awesome as you.</h3>
												<p>Stand out from the crowd. Make beautiful forms that match your company style and uphold your brand values.</p>
											</div>
											<div class="xs-wi_100 fxshrink_0 martb20 marl15 xs-marl0 talc">
												<img src="<?php echo $path;?>html/usercontent/images/news/brand.png" width="411" height="291" />
											</div>
										</div>
									</div>
									<div class="clear"></div>
									<div class="martb15 padrl10"><div class="brdt"></div></div>
									
									<!-- Section 2 -->
									<div class="bs_bb marb5 padrl10">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1 order_2 xs-order_1 xs-talc">
												<div class="marb20"><img src="<?php echo $path;?>html/usercontent/images/icons/tf-2.png" width="50" height="50" /></div>
												<h3 class="padb20 fsz24">Make your questions look &amp; feel great everywhere.</h3>
												<p>Give respondents a seamless and beautiful interface for answering your questions across devices and platforms.</p>
											</div>
											<div class="xs-wi_100 fxshrink_0 order_1 xs-order_2 martb20 marr15 xs-marr0 talc">
												<img src="<?php echo $path;?>html/usercontent/images/news/mobile-ready.png" width="411" height="291" />
											</div>
										</div>
									</div>
									<div class="clear"></div>
									<div class="martb15 padrl10"><div class="brdt"></div></div>
									
								
								<!-- Marquee -->
								<div class="visible-xs visible-sm martb20 padrl10">
									<h3 class="padb20 uppercase bold fsz16">KALENDARIUM – vårens seminarier</h3>
									<div class="dflex marb10 padb5 brdb brdclr_grey">
										<div class="wi_90p">
											<img src="<?php echo $path;?>html/usercontent/images/fb.png" width="80" title="Facebook" alt="Facebook" />
										</div>
										<div class="flex_1">
											<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
											<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
										</div>
									</div>
									<div class="dflex marb10 padb5 brdb brdclr_grey">
										<div class="wi_90p">
											<img src="<?php echo $path;?>html/usercontent/images/volvo.png" width="80" title="Volvo" alt="Volvo" />
										</div>
										<div class="flex_1">
											<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
											<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
										</div>
									</div>
									<div class="dflex marb10 padb5 brdb brdclr_grey">
										<div class="wi_90p">
											<img src="<?php echo $path;?>html/usercontent/images/spot.png" width="80" title="Spotify" alt="Spotify" />
										</div>
										<div class="flex_1">
											<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
											<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
										</div>
									</div>
									<div class="padt5 talc fsz16">
										<a href="#">View more</a>
									</div>
								</div>
								
								
								<div class="clear"></div>
								
								<div class="marrl10 padt40 padrl10 padb30 lgtgrey_bg">
							<h2 class="padb15 talc bold fsz28">Our team</h2>
							<p class="mart-10 talc uppercase">30 coworkers</p>
							<div class="dflex fxwrap_w marrl-10 padtb10">
								<div class="wi_33-20p xxs-wi_50-20p marrl10 marb20">
									<a href="#" class="dblock talc dark_grey_txt">
										<img src="<?php echo $path;?>html/usercontent/images/people/1.jpg" class="wi_170p maxwi_100 hei_auto dblock marrla marb5 brdrad3" />
										<h3 class="padb5 fsz18 red-ef5469_txt">Erik Andersson</h3>
										<div>Co-founder</div>
									</a>
								</div>
								<div class="wi_33-20p xxs-wi_50-20p marrl10 marb20">
									<a href="#" class="dblock talc dark_grey_txt">
										<img src="<?php echo $path;?>html/usercontent/images/people/2.jpg" class="wi_170p maxwi_100 hei_auto dblock marrla marb5 brdrad3" />
										<h3 class="padb5 fsz18 red-ef5469_txt">Kim Alm</h3>
										<div>Sales</div>
									</a>
								</div>
								<div class="wi_33-20p xxs-wi_50-20p marrl10 marb20">
									<a href="#" class="dblock talc dark_grey_txt">
										<img src="<?php echo $path;?>html/usercontent/images/people/3.jpg" class="wi_170p maxwi_100 hei_auto dblock marrla marb5 brdrad3" />
										<h3 class="padb5 fsz18 red-ef5469_txt">Richard Johansson</h3>
										<div>Developer</div>
									</a>
								</div>
								<div class="wi_33-20p xxs-wi_50-20p marrl10 marb20">
									<a href="#" class="dblock talc dark_grey_txt">
										<img src="<?php echo $path;?>html/usercontent/images/people/4.jpg" class="wi_170p maxwi_100 hei_auto dblock marrla marb5 brdrad3" />
										<h3 class="padb5 fsz18 red-ef5469_txt">David Wennergren</h3>
										<div>Developer</div>
									</a>
								</div>
								<div class="wi_33-20p xxs-wi_50-20p marrl10 marb20">
									<a href="#" class="dblock talc dark_grey_txt">
										<img src="<?php echo $path;?>html/usercontent/images/people/1.jpg" class="wi_170p maxwi_100 hei_auto dblock marrla marb5 brdrad3" />
										<h3 class="padb5 fsz18 red-ef5469_txt">Erik Andersson</h3>
										<div>Co-founder</div>
									</a>
								</div>
								<div class="wi_33-20p xxs-wi_50-20p marrl10 marb20">
									<a href="#" class="dblock talc dark_grey_txt">
										<img src="<?php echo $path;?>html/usercontent/images/people/2.jpg" class="wi_170p maxwi_100 hei_auto dblock marrla marb5 brdrad3" />
										<h3 class="padb5 fsz18 red-ef5469_txt">Kim Alm</h3>
										<div>Sales</div>
									</a>
								</div>
							</div>
							<div class="dflex justc_c alit_s">
								<a href="#" class="diblock padtb10 padrl20 brdrad50 red-ef5469_bg talc uppercase fsz13 white_txt">
									<span class="valm">More coworkers</span>
								</a>
								<span class="fxshrink_0 marrl10 brdl"></span>
								<a href="#" class="scroll-to diblock padtb10 padrl20 brdrad50 red-ef5469_bg talc uppercase fsz13 white_txt" data-target="#job-openings" data-offset="50">
									<span class="valm">Job openings</span>
								</a>
							</div>
						</div>
						<div class="marrl10 padt40 padrl10 padb30 white_bg" id="job-openings">
							<h2 class="padb15 talc bold fsz28">Vacant jobs</h2>
							
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list padb20">
									<div class="dflex alit_c justc_sb padb10 talc">
										<div class="bold fsz16">Öppen utbildning</div>
										<div class="">Visar 1-50 av 799 träffar</div>
										<div class="">
											<select class="jui-select">
												<option selected="selected" disabled="disabled">Sortera listan</option>
												<option value="1">Sortera efter betyg</option>
												<option value="2">Pris</option>
												<option value="3">Langd</option>
											</select>
										</div>
									</div>
									<div class="brdt">
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb lgtgrey2_bg txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Situationsanpassat ledarskap</h4>
												<p class="padtb3">Gällöfsta Perlan Ledarskap</p>
											</div>
											<div class="wi_14p fxshrink_0"></div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">2 dagar</div>
													<div class="wi_33 marb8 bold txt_21">14 900 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Kungsängen</div>
												</div>
												<div>Som ledare ställs du inför situationer där medarbetare inte presterar som förväntat. Förstår medarbetaren kraven? Saknas viljan? Eller är det...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning – Grund</h4>
												<p class="padtb3">IBLÅ Utveckling AB</p>
											</div>
											<div class="wi_14p fxshrink_0"></div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">4 dagar</div>
													<div class="wi_33 marb8 bold txt_21">7 790 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Skövde</div>
												</div>
												<div>Få grundläggande kunskaper om lagarbete och ledarskap. Få insikt om hur jag och andra påverkar varandra och hur vi fungerar i...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb lgtgrey2_bg txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning - Stärk dig själv som ledare!</h4>
												<p class="padtb3">MetaNoova Utbildning AB</p>
												<div class="rating-wrap">
													<div class="rating wi_90"></div>
												</div>
											</div>
											<div class="wi_14p fxshrink_0">
												<img src="<?php echo $path;?>html/usercontent/images/icons/sr-1.png" width="14" height="14" />
											</div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">3 dagar</div>
													<div class="wi_33 marb8 bold txt_21">9 500 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Stockholm</div>
												</div>
												<div>Stärk dig själv som ledare. Förbättra och utveckla ditt ledarskap. Få tillgång till framgångsnycklar i kommunikation och förändringsarbete.  Träna din kommunikation...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning – Ledare men inte chef</h4>
												<p class="padtb3">Hjärtum Utbildning</p>
												<div class="rating-wrap">
													<div class="rating wi_90"></div>
												</div>
											</div>
											<div class="wi_14p fxshrink_0">
												<img src="<?php echo $path;?>html/usercontent/images/icons/sr-1.png" width="14" height="14" />
											</div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">2 dagar</div>
													<div class="wi_33 marb8 bold txt_21">8 980 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Flera orter (3)</div>
												</div>
												<div>Denna ledarskapsutbildning riktar sig till dig som är ledare i praktiken men inte har formell chefstitel. Din roll kan t ex...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb lgtgrey2_bg txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Situationsanpassat ledarskap</h4>
												<p class="padtb3">Gällöfsta Perlan Ledarskap</p>
											</div>
											<div class="wi_14p fxshrink_0"></div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">2 dagar</div>
													<div class="wi_33 marb8 bold txt_21">14 900 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Kungsängen</div>
												</div>
												<div>Som ledare ställs du inför situationer där medarbetare inte presterar som förväntat. Förstår medarbetaren kraven? Saknas viljan? Eller är det...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning – Grund</h4>
												<p class="padtb3">IBLÅ Utveckling AB</p>
											</div>
											<div class="wi_14p fxshrink_0"></div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">4 dagar</div>
													<div class="wi_33 marb8 bold txt_21">7 790 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Skövde</div>
												</div>
												<div>Få grundläggande kunskaper om lagarbete och ledarskap. Få insikt om hur jag och andra påverkar varandra och hur vi fungerar i...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb lgtgrey2_bg txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning - Stärk dig själv som ledare!</h4>
												<p class="padtb3">MetaNoova Utbildning AB</p>
												<div class="rating-wrap">
													<div class="rating wi_90"></div>
												</div>
											</div>
											<div class="wi_14p fxshrink_0">
												<img src="<?php echo $path;?>html/usercontent/images/icons/sr-1.png" width="14" height="14" />
											</div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">3 dagar</div>
													<div class="wi_33 marb8 bold txt_21">9 500 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Stockholm</div>
												</div>
												<div>Stärk dig själv som ledare. Förbättra och utveckla ditt ledarskap. Få tillgång till framgångsnycklar i kommunikation och förändringsarbete.  Träna din kommunikation...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning – Ledare men inte chef</h4>
												<p class="padtb3">Hjärtum Utbildning</p>
												<div class="rating-wrap">
													<div class="rating wi_90"></div>
												</div>
											</div>
											<div class="wi_14p fxshrink_0">
												<img src="<?php echo $path;?>html/usercontent/images/icons/sr-1.png" width="14" height="14" />
											</div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">2 dagar</div>
													<div class="wi_33 marb8 bold txt_21">8 980 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Flera orter (3)</div>
												</div>
												<div>Denna ledarskapsutbildning riktar sig till dig som är ledare i praktiken men inte har formell chefstitel. Din roll kan t ex...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb lgtgrey2_bg txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Situationsanpassat ledarskap</h4>
												<p class="padtb3">Gällöfsta Perlan Ledarskap</p>
											</div>
											<div class="wi_14p fxshrink_0"></div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">2 dagar</div>
													<div class="wi_33 marb8 bold txt_21">14 900 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Kungsängen</div>
												</div>
												<div>Som ledare ställs du inför situationer där medarbetare inte presterar som förväntat. Förstår medarbetaren kraven? Saknas viljan? Eller är det...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning – Grund</h4>
												<p class="padtb3">IBLÅ Utveckling AB</p>
											</div>
											<div class="wi_14p fxshrink_0"></div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">4 dagar</div>
													<div class="wi_33 marb8 bold txt_21">7 790 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Skövde</div>
												</div>
												<div>Få grundläggande kunskaper om lagarbete och ledarskap. Få insikt om hur jag och andra påverkar varandra och hur vi fungerar i...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb lgtgrey2_bg txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning - Stärk dig själv som ledare!</h4>
												<p class="padtb3">MetaNoova Utbildning AB</p>
												<div class="rating-wrap">
													<div class="rating wi_90"></div>
												</div>
											</div>
											<div class="wi_14p fxshrink_0">
												<img src="<?php echo $path;?>html/usercontent/images/icons/sr-1.png" width="14" height="14" />
											</div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">3 dagar</div>
													<div class="wi_33 marb8 bold txt_21">9 500 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Stockholm</div>
												</div>
												<div>Stärk dig själv som ledare. Förbättra och utveckla ditt ledarskap. Få tillgång till framgångsnycklar i kommunikation och förändringsarbete.  Träna din kommunikation...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
										<a href="#" class="dflex alit_s padtb8 padrl5 brdb txt_8c">
											<div class="wi_50 padrl8">
												<h4 class="pad0 bold fsz14 txt_21">Ledarskapsutbildning – Ledare men inte chef</h4>
												<p class="padtb3">Hjärtum Utbildning</p>
												<div class="rating-wrap">
													<div class="rating wi_90"></div>
												</div>
											</div>
											<div class="wi_14p fxshrink_0">
												<img src="<?php echo $path;?>html/usercontent/images/icons/sr-1.png" width="14" height="14" />
											</div>
											<div class="wi_50 padrl8">
												<div class="wi_100 dflex">
													<div class="wi_33 marb8 bold txt_21">2 dagar</div>
													<div class="wi_33 marb8 bold txt_21">8 980 SEK</div>
													<div class="wi_33 marb8 bold txt_21">Flera orter (3)</div>
												</div>
												<div>Denna ledarskapsutbildning riktar sig till dig som är ledare i praktiken men inte har formell chefstitel. Din roll kan t ex...</div>
											</div>
											<div class="fxshrink_0 padl8">
												<input type="checkbox" class="check toggle-active" />
											</div>
										</a>
									</div>
								</div>
							</form>
							
							
						</div>
						<div class="wrap maxwi_100 marb50 padt20 md-marb30 lg-marb30 padrl10">
					<h3 class="fsz16">Top Courses in "Development"</h3>
					<div class="slick-slider dflex alit_s marrl-15" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1">
						<div class="padt10 padrl15 padb50">
							<div class="maxwi_350p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6">
									<div class="pos_abs top-4p left10p">
										<img src="<?php echo $path;?>html/usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="<?php echo $path;?>html/usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="<?php echo $path;?>html/usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="<?php echo $path;?>html/usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8" />
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt">Select</a>
								</div>
							</div>
						</div>
						<div class="padt10 padrl15 padb50">
							<div class="maxwi_350p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6">
									<div class="pos_abs top-4p left10p">
										<img src="<?php echo $path;?>html/usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="<?php echo $path;?>html/usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="<?php echo $path;?>html/usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="<?php echo $path;?>html/usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8" />
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt">Select</a>
								</div>
							</div>
						</div>
						<div class="padt10 padrl15 padb50">
							<div class="maxwi_350p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6">
									<div class="pos_abs top-4p left10p">
										<img src="<?php echo $path;?>html/usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="<?php echo $path;?>html/usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="<?php echo $path;?>html/usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="<?php echo $path;?>html/usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8" />
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt">Select</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="wrap maxwi_100 marb50 md-marb30 lg-marb30 padrl10">
					
					<div class="slick-slider dflex alit_s marrl-15" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1">
						<div class="padt10 padrl15 padb50">
							<div class="maxwi_350p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6">
									<div class="pos_abs top-4p left10p">
										<img src="<?php echo $path;?>html/usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="<?php echo $path;?>html/usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="<?php echo $path;?>html/usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="<?php echo $path;?>html/usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8" />
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt">Select</a>
								</div>
							</div>
						</div>
						<div class="padt10 padrl15 padb50">
							<div class="maxwi_350p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6">
									<div class="pos_abs top-4p left10p">
										<img src="<?php echo $path;?>html/usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="<?php echo $path;?>html/usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="<?php echo $path;?>html/usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="<?php echo $path;?>html/usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8" />
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt">Select</a>
								</div>
							</div>
						</div>
						<div class="padt10 padrl15 padb50">
							<div class="maxwi_350p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5"><img src="<?php echo $path;?>html/usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6">
									<div class="pos_abs top-4p left10p">
										<img src="<?php echo $path;?>html/usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="<?php echo $path;?>html/usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="<?php echo $path;?>html/usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="<?php echo $path;?>html/usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8" />
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-yellow.png" alt="">
												<img src="<?php echo $path;?>html/usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt">Select</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				</div>
			
			</div>
		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
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
	
	
	
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
	
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
</body>

</html>
</body>

</html>