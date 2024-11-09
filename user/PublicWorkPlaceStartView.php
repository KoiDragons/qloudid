<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/jquery-ui-1.10.4.custom.html" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/jquery.bxslider.css" />
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/vendor.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126618362-1');
</script>
		<script>
			var currentLang = 'sv';
		</script>
	</head>
	<body class="user-signed-out">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb bg_colorn_new" >
			<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15">
					<a href="https://www.safeqloud.com/"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10">
					<div class="languages">
						<a href="#" id="language_selector" class="padrl10">
							<img src="../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US">
							</a>
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
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://www.safeqloud.com/" id="usermenu_singin" class="translate hei_30pi dblock padrl25  uppercase lgn_hight_30 white_txt white_txt_h bg_f80" data-en="Close" data-sw="Close">Close</a> </li>
					</ul>
				</div>
				<div class="top_menu top_menu_custom mart2">
					<ul class="menulist">
						<li class="xs-mar0i sm-mar0i">
							<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <span class="fa fa-qrcode white_txt fsz26"></span> </a>
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
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.safeqloud.com" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
		
		<!-- Slider -->
		<div class="custom_intropage column_m  talc lgn_hight_28 fsz18 white_txt">
			<div class="container">
				<div class="wrap">
					<div class="textfade_slider">
						<div class="textfade_slides">
							<div class="textfade_slide" id="textfade_slide1">
								<h1 class="marb10 lgn_hight_s12 fsz60  black_txt font_opnsns"><b>Invitation-only Network For</b><br>Young & Senior Professionals</h1>
								<p class="black_txt">Q-Network is exclusive social networks and online communities of executives.</p>
							</div>
							
						</div>
						<div class="textfade_controls fsz15 uppercase bold">
							<a href="#" class=""></a>
							<a href="#" class="textfade_link" data-id="textfade_slide1">Post</a>
						
							<a href="#" class=""></a>
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
		
		
		<!-- Testimonials -->
		
		<!-- FOOTER -->
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="../../modules.js"></script><script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/workplacestart/js/index.js"></script>
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