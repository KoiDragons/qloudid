<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<title>Qmatchup</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
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
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	</head>
	<body class="white_bg">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb bg_colorn_new">
		<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 bg_colorn_new">
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="#"> <img src="<?php echo $path;?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10"></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="fright xs-dnone sm-dnone">
				<ul class="mar0 pad0">
					<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://www.qmatchup.com/beta/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
				</ul>
			</div>
			<div class="top_menu top_menu_custom mart2">
				<ul class="menulist">
					<li class="xs-mar0i sm-mar0i">
						<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <span class="fa fa-qrcode fsz26 white_txt"></span> </a>
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
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Personal</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-3.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-vrf" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act" class="posted_jobs">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Activate</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-eng" class="proposals">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-4.png" width="45" height="45" title="" alt="" />
												</div>Business</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-5.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-6.png" width="45" height="45" title="" alt="" />
												</div>Basic - Free</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-7.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By organization</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-ind" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By industry</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-8.png" width="45" height="45" title="" alt="" />
												</div>HR Portal</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-9.png" width="45" height="45" title="" alt="" />
												</div>Sales</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-10.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-11.png" width="45" height="45" title="" alt="" />
												</div>Telemarketing</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
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
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Employees</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Customers</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="clear"></div>
		
		
		
		<!-- CONTENT -->
		<div>
		
			<div class="column_m hidden-xs hidden-sm lgtblue2_bg padt0" >
			<div class="column_m lgtblue2_bg" >
				<div class="wrap sub_header_brdclr_dblue bs_bb">
					<!-- Tab header -->
					<ul class="dflex alit_s justc_c mar0 pad0 just_left">
					<li class="dflex alself_fs marrl10 padrl5 height_93" >
							<a href="#" class=" minwi_80p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz15 fsz15_a sligtgrey_txt pblue2_txt_a  padrl10 padt20 "><div class="dflex alit_c pos_rel padr20">
							
								<!--<img src="<?php echo $path;?>html/usercontent/images/wp.png" class="dblock marrla img_style">-->
								<div class="padl0">
									<h3 class="marb0 pad0 fsz32 sligtgrey_txt " style="font-family: 'Audiowide', sans-serif;">Workplace</h3>
									<span class="fszf1 padt5">Din digitala arbetsplats</span>
								</div>
								<div class="hei_60p pos_abs top5 right0 brdr"></div>
							</div></a>
						</li>
						
						
						
						<li class="dflex alit_s marr10 padrl5 height_93" >
							<a href="https://www.qmatchup.com" class="minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz15 fsz15_a sligtgrey_txt pblue2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="hei_35p dflex alit_c justc_c talc fsz22 sligtgrey_txt mar10" style="font-family: 'Allerta Stencil', sans-serif;"></span>
								<span class="dblock mart10">Chefer & Team</span>
							</a>
						</li>
						
						<li class="dflex alit_s marrl10 padrl5 height_93">
							<a href="#" class="show_popup_modal minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz15 fsz15_a sligtgrey_txt pblue2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="hei_35p dflex alit_c justc_c talc fsz17 white_txt padrl10 martb10 uppercase newgrey_bg" style="font-family: 'Allerta stencil', sans-serif;">VÅRA TJÄNSTER FÖR</span>
								<span class="dblock mart10">Alla anställda</span>
							</a>
						</li>
						<li class="dflex alit_s marrl10 padrl5 height_93">
							<a href="#" class="show_popup_modal minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz15 fsz15_a sligtgrey_txt pblue2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="mar10 hei_35p dflex alit_c justc_c talc fsz28 sligtgrey_txt  "></span>
								<span class="dblock mart10">Varje anställd</span>
							</a>
						</li>
						
						
						
						<li class="dflex alit_s marl10 padrl5 height_93" >
							<a href="#" class="active minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz15 fsz15_a black_txt pblue2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="fa fa-microphone hei_35p dflex alit_c justc_c talc fsz24 black_txt pred2_txt_ph pblue2_txt_pa mar10 pblue2_bg"></span>
								<span class="dblock mart10">Om oss</span>
							</a>
						</li>
						
						
						</ul>
				</div>
			</div>
		</div>
		
		
		
		<div class="clear"></div>
		
			
			<!-- HERO -->
			<div class="dflex xs-dblock justc_fe pos_rel padtb60 xs-pad0">
				<div class="wi_100 hei_100 pos_abs xs-pos_sta zi1 top0 left0 bgir_norep bgip_c bgis_cov" style="background-image: url(<?php echo $path;?>html/omworkplace/images/bg/mockup.png);">
					<img src="<?php echo $path;?>html/omworkplace/images/bg/PlusDator-e1457994495200.jpg" class="wi_100 hei_auto hide xs-dblock" />
				</div>
				<div class="wi_50 xs-wi_100 pos_rel zi5 white_txt">
					<div class="hei_30p dflex alit_c marl10 dark_blue_bg italic fsz16">
						<img src="<?php echo $path;?>html/omworkplace/images/icons/abIconPlus.svg" width="77" height="30" class="wi_auto hei_100 marl-10 marr10" />
						<div class="padtb3">
							När du vill veta mer
						</div>
					</div>
					<div class="pos_rel padrbl30 xs-padrl20 xs-darkgrey_txt">
						<div class="wi_100 hei_100 xs-dnone opa60 pos_abs zi1 top0 left0 dark_blue_bg"></div>
						<div class="maxwi_500p pos_rel zi5">
							<h2 class="mar0 padtb15 bold fsz40 xs-fsz22 white_txt xs-darkgrey_txt">Få allt exklusivt - med Trendwatch HR Light!</h2>
							<ul class="mar0 marb20 pad0 lipos_in bold fsz20 xs-fsz15">
								<li class="marb10 pad0">
									<span class="marl-15">Trendwatch HR E-tidning</span>
								</li>
								<li class="marb10 pad0">
									<span class="marl-15">Sammanfattad nyhetsbrev 20 ggr/år.</span>
								</li>
								<li class="marb10 pad0">
									<span class="marl-15">En förvaltad inköpstjänst</span>
								</li>
								
							</ul>
							<a href="#" class="minhei_50p dflex justc_c alit_c opa90_h marb10 brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Prova Light För En Tweet</a>
							<div class="marb10 talc fsz15">
								Dela på twitter eller komentera för att aktivera ditt erbjudande.
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- IMG SECTONS -->
			<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt50">
				<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz18 darkgrey_txt ">
					<div class="wi_50 xs-wi_100">
						<img src="<?php echo $path;?>html/omworkplace/images/random/mockup2.png" class="wi_100 hei_auto" />
					</div>
					<div class="wi_50 xs-wi_100 bs_bb padr40">
						<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt ">Dagens digitala e-tidning varje morgon</h2>
						<div>Trendwatch HR publicerar dagligen <strong>artiklar </strong>och inlägg i e-tidningen. <strong> Läs om de senaste </strong>trender, nyheter och domar på alla läsplattformar.  </div>
					</div>
				</div>
			</div>
			<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt50">
				<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt ">
					<div class="wi_50 xs-wi_100">
						<img src="<?php echo $path;?>html/omworkplace/images/random/mockup12.png" class="wi_100 hei_auto" />
					</div>
					<div class="wi_50 xs-wi_100 bs_bb padl40">
						<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt ">20 gånger per</br>år till din inkorg</h2>
						<div>Håll dig <strong>ständigt uppdaterad </strong> om förändringar inom HR. 20 gånger per år får du en sammanställning av de senaste lagförändringar, nyheter, AD-domar och arbetsrättsliga frågor, direkt till din e-post. </div>
					</div>
				</div>
			</div>
			<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt50">
				<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz18 darkgrey_txt ">
					<div class="wi_50 xs-wi_100">
						<img src="<?php echo $path;?>html/omworkplace/images/random/mockup9.png" class="wi_100 hei_auto"						/>
					</div>
					<div class="wi_50 xs-wi_100 bs_bb padr40">
						<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt ">Q-Inköp är en</br>förvaltad inköpstjänst</h2>
						<div>Vid behov av personal kan du vända dig till Q-inköp. Där hittar du hundratals kvalificerade rekryterings- och bemanningsbyråer angelägna att hjälpa dig hitta rätt kandidat.</div>
					</div>
				</div>
			</div>
			
			<div class="wrap maxwi_100 mart30 padt30 xs-padrl20 talc fsz15">
				<a href="#" class="maxwi_700p minhei_50p dflex justc_c alit_c opa90_h marrla marb10 brdrad3 panlyellow_bg bold fsz18 darkgrey_txt trans_all2">Prova Light För En Tweet!</a>
				<p>Dela på twitter eller komentera för att aktivera ditt erbjudande</p>
				<p><a href="#" class="bold darkgrey_txt">Redan Light-kund? Logga in här</a></p>
			</div>
			
			<div class="bgrgrad_purple">
				<div class="wrap maxwi_100 mart30 padt30 xs-padb30 xs-padrl20">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 white_txt">
						<div class="wi_50 xs-wi_100">
							<img src="<?php echo $path;?>html/omworkplace/images/random/mockup12.png" class="wi_100 hei_auto" />
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padl40">
							<h2 class="padb15 bold fsz40 xs-fsz22 white_txt">Eller prova Team?</h2>
							<div>
								Med Team kan du som arbetar i en större organisation, 
								bjuda in hela ditt team till att få tillgång till allt som Trendwatch HR Light har att erbjuda. Informera, dela och kommentera tillsammans. 
								Med Trendwatch Team försäkrar du dig om att hela teamet håller samma höga nivå och är ständigt uppdaterade inom ert område<br/>
								<a href="#" class="undln bold white_txt">Läs mer här</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- FOOTER -->
		
		<div class="dark_grey3_bg">
			<div class="wi_100 maxwi_700p dflex xs-dblock justc_sb alit_c marrla padtb20 xs-padrl20 xs-talc lgrey_txt">
				<div class="dflex xs-dblock alit_c">
					<img src="<?php echo $path;?>html/omworkplace/images/icons/spid-logo.svg" class="fxshrink_0" />
					<div class="flex_1 padr30 padl20 xs-mart15">
						Qmatchup använder Qloud ID för enkel inloggning, identifiering och säkra betalningar.
						Har du några frågor? <a href="#" target="_blank" class="undln lgrey_txt">Klicka här</a>.
					</div>
				</div>
				<div class="fxshrink_0 xs-mart15">
					<img src="<?php echo $path;?>html/omworkplace/images/icons/betalmetoder-GREY.png" />
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script><script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script>
			$(document).ready(function(){
				var $counter = $('#counter-button'),
					start_time = 455,
					redirect_time = 2,
					redirect_url = 'zoho_hr_portal4.html';
					
				if($counter[0]){
					var timer_txt = $counter.data('timer-text'),
						finished_txt = $counter.data('finished-text');
					
					var count_down = function(){
						if(start_time < 1){
							clearInterval(count_interval)
							$counter
								.html(finished_txt)
								.attr('href', redirect_url);
							
							setTimeout(function(){
								window.location.href = redirect_url;
							}, redirect_time * 1000);
						}
						else{
							$counter.html(timer_txt + ' ' + start_time);
							start_time--;
						}
					}
					var count_interval = setInterval(count_down, 1000);
					count_down();
				}
			});
		</script>
		<script>
			$(document).ready(function(){
				var $counter = $('#counter-button'),
					start_time = 5,
					redirect_time = 2,
					redirect_url = 'zoho_hr_portal4.html';
					
				if($counter[0]){
					var timer_txt = $counter.data('timer-text'),
						finished_txt = $counter.data('finished-text');
					
					var count_down = function(){
						if(start_time < 1){
							clearInterval(count_interval)
							$counter
								.html(finished_txt)
								.attr('href', redirect_url);
							
							setTimeout(function(){
								window.location.href = redirect_url;
							}, redirect_time * 1000);
						}
						else{
							$counter.html(timer_txt + ' ' + start_time);
							start_time--;
						}
					}
					var count_interval = setInterval(count_down, 1000);
					count_down();
				}
			});
		</script>
		
	</body>
</html>