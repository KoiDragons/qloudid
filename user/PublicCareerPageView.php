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
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb bg_colorn_new" >
			<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15">
					<a href="https://www.qloudid.com/"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
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
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://www.qloudid.com/" id="usermenu_singin" class="translate hei_30pi dblock padrl25  uppercase lgn_hight_30 white_txt white_txt_h bg_f80" data-en="Close" data-sw="Close">Close</a> </li>
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
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.qloudid.com" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			<div class="column_m container zi1 padtb20">
			<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel">
				<div class="white_bg tall">
					<div class="padb0 fsz20">
       
      
       <a href="#" class="marr5 black_txt">Company </a>
      
	
       
      </div>
					<!-- Logo -->
					<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">Qmatchup </span></a> </div>
					<!-- Meta -->
					<div class="padr10 fsz12"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span> <span class="marrl5">|</span> <span class="fa fa-file-text-o"></span> <span>Todays Paper</span> <span class="marrl5">|</span> <span class="fa fa-video-camera"></span> <span>Video</span> <span class="marrl5">|</span> <span class="fa fa-sun-o regyellow_txt"></span> <span>50&deg;F</span> </div>
				</div>
				<div class="hidden-xs hidden-sm padrl10">
					<a href="#" class="diblock padrl20 brdrad3 pred2_bg ws_now lgn_hight_29 fsz14 white_txt">
						<img src="<?php echo $path; ?>html/usercontent/images/icons/gift.png" width="20" height="20" class="marr5 valm" />
						<span class="valm">Erbjudande</span>
					</a>
				</div>
				
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="column_m  hei_40p scroll-fix hidden-xs hidden-sm zi0" style="height: 40px;">
			<div class="column_m scroll-fix-wrap">
				<div class="wrap sub_header_brd_new sub_header_brdclr_dblue dflex justc_sb alit_fe bs_bb padt5 brdt_b">
					<!-- Tab header -->
					<ul class="mar0 pad0">
						<li class="diblock marr10 padr5"> <a href="PublicAboutQmatchup" class="dblock padb10 brdb brdwi_3 brdclr_trans brdclr_text_topinfo_menu_h brdclr_text_topinfo_menu_a fsz14 fsz14_a  grey_txt  " data-id="tab-HR" data-refresh="scroll">Magazine</a> </li>
						
						<li class="diblock marrl10 padrl5"> <a href="PublicAboutUs" class=" dblock padb10 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a fsz14 fsz14_a grey_txt pred2_txt_a bold_a " data-target="#gratis_popup">Om oss</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="dblock padb10 brdb brdwi_3 brdclr_trans brdclr_text_topinfo_menu_h brdclr_text_topinfo_menu_a fsz14 fsz14_a  black_txt   active" data-target="#gratis_popup">Lediga jobb</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="PublicAterforsljare" class=" dblock padb10 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a fsz14 fsz14_a grey_txt pred2_txt_a bold_a " data-target="#gratis_popup">Återförsäljare</a> </li>
						
					</ul>
				</div>
			</div>
		</div>
		
				<div class="clear"></div>	
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_640p col-xs-12 col-sm-12 fleft pos_rel zi5   fsz14 brdr padr20">
					
					
						
						<!-- Configure Data -->
						<div class="column_m bs_bb ">
							
							
							<table class="wi_100" cellpadding="0" cellspacing="0">
								<tbody>
									<tr class="odd">
										<td class="wi_100 padtb30 valm talc lgtgrey2_bg">
											<div class="padrl30 talc">
												<h2 class="padb30 talc fsz28 lgn_hight_s1 bold black_txt">Intro <br>Get Cloud ID
												</h2>
												<h3 class="fsz20">Här är våra tjänster för dig</h3>
												<p> En HR-avdelning måste ha många strängar på sin lyra. Förhandling, avtal, policys, arbetsmiljö, arbetsrätt, kollektivavtal, ledarskapsutveckling, intern kommunikation. Och så fortsätter listan. Hos oss kan du skräddarsy din egen HR-lösning som passar din vardag. Du kan välja mellan allt från HR Expert som täcker dina grundbehov i arbetsmiljö och arbetsrätt, till skräddarsydda portallösningar som fungerar likt ett intranät för din organisation. </p>
												<div class="mart15">
													<a href="connect.html" class="style_base diblock pos_rel padtb10 padrl30 pgreen_bg lgn_hight_20 talc fsz20 white_txt">
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
						
						
						
						<div class=" txt_37404a mart20 lgtblue2_bg">
							<div class="wrap maxwi_100 padtb30">
								<h2 class="padb20 talc fsz28 lgn_hight_s1 bold black_txt">Intro <br>Medarbetare</h2>
								<ul class="dflex fxwrap_w alit_s mart20 xs-padrl10 pad0">
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb xs-brdb">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-developers"></i> <span class="dblock uppercase fsz13 bold">Web developers</span> </div>
											<div class="back white_bg green_txt"> <span>FRONT-END DEVELOPERS<br>BACK-END DEVELOPERS<br>SOFTWARE PROGRAMMERS</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdb brdr xs-nobrdr xs-brdb">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-mobile-developers"></i> <span class="dblock uppercase fsz13 bold">Mobile developers</span> </div>
											<div class="back white_bg green_txt"> <span>
												iOS APP DEVELOPERS<br>
												ANDROID DEVELOPERS<br>UI/UX DESIGNERS
											</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb xs-brdb">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-designers"></i> <span class="dblock uppercase fsz13 bold">Designers &amp; Creatives</span> </div>
											<div class="back white_bg green_txt"> <span>GRAPHIC DESIGNERS<br>UI/UX DESIGNERS<br>MOTION GRAPHICS EXPERTS</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdb xs-brdb">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-writing"></i> <span class="dblock uppercase fsz13 bold">Writers</span> </div>
											<div class="back white_bg green_txt"> <span>BLOG WRITERS<br>CONTENT WRITERS<br>COPYWRITERS</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr xs-brdb">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-administrative-support"></i> <span class="dblock uppercase fsz13 bold">Virtual assistants</span> </div>
											<div class="back white_bg green_txt"> <span>PERSONAL ASSISTANTS<br>TRANSCRIPTIONISTS<br>WEB RESEARCHERS</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr xs-nobrdr xs-brdb">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-customer-service"></i> <span class="dblock uppercase fsz13 bold">Customer service agents</span> </div>
											<div class="back white_bg green_txt"> <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-sales-marketing"></i> <span class="dblock uppercase fsz13 bold">Sales &amp; marketing experts</span> </div>
											<div class="back white_bg green_txt"> <span>SEO SPECIALISTS<br>EMAIL AUTOMATORS<br>MARKETING EXPERTS</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
									<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0">
										<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
											<div class="front"> <i class="category-icon category-accounting-consulting"></i> <span class="dblock uppercase fsz13 bold">Accountants &amp; consultants</span> </div>
											<div class="back white_bg green_txt"> <span>TAX ACCOUNTANTS<br>BOOKKEEPERS<br>FINANCIAL MODELERS</span> <em class="dblock mart20">and more...</em> </div>
										</a>
									</li>
								</ul>
								<div class="clear"></div>
								<div class="mart30 talc">
													<a href="connect.html" class="style_base diblock pos_rel padtb10 padrl30 pgreen_bg lgn_hight_20 talc fsz20 white_txt">
														<span class="wi_22p wi_36p_sbh hei_100 dblock opa30 pos_abs top0 left0 white_bg trans_all2"></span>
														<span class="dblock">Få en personlig visning</span>
													</a>
												</div>
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="ovfl_hid mart20  txt_37404a">
							<div class="wrap maxwi_100 padt30 padb60 brdb">
								<h2 class="marb30 pad0 talc fsz25 txt_6c737a uppercase">Avdelningar</h2>
								<div class="slick-slider dflex alit_s marrl-15 talc slick-initialized" id="section-3-slick" data-slick-settings="dots:false,arrows:true,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-sm-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xxs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1"><button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: block;">Previous</button>
									
									<div aria-live="polite" class="slick-list draggable" style="padding: 0px 50px;"><div class="slick-track" style="opacity: 1; width: 105000px; transform: translate3d(-105px, 0px, 0px);" role="listbox"><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-18.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Funny Polls</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Political Polls</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-current slick-active slick-center" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="0">
											<img src="html/search/images/icons/Icons_Carousel-31.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Marketing Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-11.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Customer Satisfaction Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-39.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Post-Event Satisfaction Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide03">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-30.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Market Research Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide04">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-16.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Facebook Polls</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide05">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-10.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Customer Development Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide06">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-05.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Branding Questionnaires</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide07">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Patient Satisfaction Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="8" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide08">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-13.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Demographic Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="9" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide09">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-15.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Employee Satisfaction Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="10" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide010">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-32.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Net Promoter Score Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="11" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide011">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Online Questionnaire Maker</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="12" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide012">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Political Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="13" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide013">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-04.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Brand Awareness Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="14" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide014">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-07.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Candidate Experience Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="15" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide015">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Straw Polls</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="16" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide016">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Online Poll Maker</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="17" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide017">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-47.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Student Satisfaction Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="18" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide018">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-42.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Social Media Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="19" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide019">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-18.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Funny Polls</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" data-slick-index="20" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide020">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Political Polls</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned slick-center" data-slick-index="21" aria-hidden="true" tabindex="-1">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-31.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Marketing Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
										</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned" data-slick-index="22" aria-hidden="true" tabindex="-1">
										<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
											<img src="html/search/images/icons/Icons_Carousel-11.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
											<h4 class="pad0 nobold fsz16 txt_60666f">Customer Satisfaction Surveys</h4>
										</a>
										<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
									</div></div></div>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
								<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: block;">Next</button></div>
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
						
						<div class="bs_bb  mart20 brdb lgtgrey2_bg">
							<div class="dflex xs-fxwrap_w alit_c">
								<div class="xs-wi_100 flex_1 order_2 xs-order_1 xs-talc">
									<div class="marb20 xs-padt20"><img src="../../html/usercontent/images/icons/tf-2.png" width="50" height="50"></div>
									<h3 class="padb20 uppercase fsz25">Arbetsplats och Kultur</h3>
									<p>Give respondents a seamless and beautiful interface for answering your questions across devices and platforms.</p>
								</div>
								<div class="xs-wi_100 fxshrink_0 order_1 xs-order_2 martb30 marr15 xs-marr0 talc">
									<img src="../../html/usercontent/images/news/mobile-ready.png" width="411" height="291">
								</div>
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="mart20"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Skapa din egen företagssida - Gratis</a> </div>
						
						
						<!-- Marquee -->
						
						<div class="clear"></div>
					</div>	
				
				<div class="wi_300p col-xs-12 col-sm-12 fright pos_rel zi5">
									
									<div class="dflex alit_s marb20 padr10">
										<input type="search" name="search" class="hei_50p flex_1 padrl15 brd brdrad0 brdradtl3 bg_fe white_bg_f fsz15" placeholder="Skriv.." value="">
										<button type="submit" class="hei_50p padr20 padl30 brd nobrdl brdrad0 brdradrb3 white_bg fsz14 bold curp">Sök</button>
									</div>
									<div class="clear"></div>
									
									<div class="minhei_210 ovfl_hid pos_rel brdrad5 bglgrad_bot_f19961_f97a67 txt_f marl10">
										
										<input type="radio" name="subscribe-card" value="card-1" id="subscribe-card-1" class="default sr-only" checked="checked">
										<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2" id="work" style="display:block;">
											<h3 class="marb30 padb10 brdb brdwi_2 brdclr_f talc fsz20 txt_f">Subscribe</h3>
											
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
											<form action="../../PublicContentDetail/subscribeUser" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1" class="wi_230p maxwi_100 dblock padrl10">
												<input type="radio" name="subscribe-card" value="card-2" id="subscribe-card-2" class="default sr-only">
												<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2">
													<h3 class="marb30 padb10 brdb brdwi_2 brdclr_f talc fsz20 txt_f">Prenumerera på...</h3>
													
													<div class="marb30 padt1 fsz14">
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="1" onclick="changeIndex(this.id);" name="1" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>HR</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="2" onclick="changeIndex(this.id);" name="2" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Sälj</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="4" onclick="changeIndex(this.id);" name="4" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Inköp</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="5" onclick="changeIndex(this.id);" name="5" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Marknad</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="6" onclick="changeIndex(this.id);" name="6" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Ekonomi</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="8" onclick="changeIndex(this.id);" name="8" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>IT</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="9" onclick="changeIndex(this.id);" name="9" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
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
													<h3 class="marb30 padb10 brdb brdwi_2 brdclr_f talc fsz20 txt_f width_190">Dela med dig till</h3>
													
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
										<h3 class="padtb10 padrl10 pred2_bg lgn_hight_24 bold fsz18 white_txt">Lediga tjänster</h3>
										<div class="mart20 padb10  marrl10">
											<h4 class="padb0 fsz15">
												<a href="#" class="black_txt">Assistent - Bryssel</a>
											</h4>   </div>
											<div class="padtb10  marrl10">
												<h4 class="padb0 fsz14">
													<a href="#" class="black_txt">IP-jurist till varumärkesavdelningen i Stockholm</a>
												</h4>   </div>
												<div class="padtb10  marrl10">
													<h4 class="padb0 fsz14">
														<a href="#" class="black_txt">Biträdande jurister - Göteborg</a>
													</h4>   </div>
													
													<div class="padtb10  marrl10">
														<h4 class="padb0 fsz14">
															<a href="#" class="black_txt">Biträdande jurister - Skåne</a>
														</h4>   </div>
														<div class="padtb10  marrl10">
															<h4 class="padb0 fsz14">
																<a href="#" class="black_txt">Biträdande jurister - Stockholm</a>
															</h4>   </div>
									</div>
									<div class="column_m bs_bb marb15">
										<a href="https://www.qmatchup.com/beta/user/index.php/TrendwatchPricing"><h3 class="padtb10 padrl10 lgtgrey_bg lgn_hight_24 bold fsz18 black_txt">Mer HR Nyheter</h3></a>
																					
											
											
																						
											
											
																						
											
											
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
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	</body>
	
</html>
</body>

</html>