<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylewrap.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" async src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		<script>
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
			}
			
			function checkFlag()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active')
					$(".popupShow").attr('style','display:none');
				}
				
			}
			function togglePopup()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active')
					$(".popupShow").attr('style','display:none');
				}
				else
				{
					$(".popupShow").addClass('active')
					$(".popupShow").attr('style','display:block');
				}
			}
		</script>
		</head>
		<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" id="bodyBg"><div class="sharethis-inline-share-buttons"></div>
		<div class="column_m header xs-header  bs_bb white_bg">
			<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10  white_bg">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 wi_140p">
					<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
					<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
						<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
							
							<li class="hidden-xs" style="margin: 0 30px 0 0;">
								<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
								<ul class="popupShow" style="display: none;">
									<li class="first">
										<div class="top_arrow"></div>
									</li>
									<li class="last">
										<div class="emailupdate_menu padtb15">
											<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
											<ol>
												<li class="fsz14">
													<div class="user_pic padt5"><a href="javascript:checkFlag();" data-value="sv" ><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:checkFlag();" class="fsz14 black_txt" data-value="sv" >  Svenska</a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:changeHeader();" data-value="en"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:changeHeader();" class="fsz14 black_txt" data-value="en" >  Engelska </a> </div>
												</li>
												
											</ol>
											
										</div>
									</li>
								</ul>
							</li>
							
							
							
							
							
						</ul>
					</div>
				</div>
				
				<div class="top_menu_qloud fright padt20 padb0 hidden-xs" style="width:580px;">
						<ul class="menulist sf-menu fsz16 black_txt">
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/public/index.php/QloudidPersonal" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Privat" data-sw="Privat">Privat</a> </li>
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/public/index.php/CorporateServices" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Företag" data-sw="Företag">Företag</a> </li>
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue ">
								<a href="#" class="translate brdb_b_pink hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 pink_txt ">Partners</a>
								<ul >
									<li class="first">
										<div class="top_arrow"></div>
									</li>
									<li class="last">
										<div class="emailupdate_menu padtb15">
										<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
											<ol>
											
												<li class="fsz14 valm padb10 ">
													
													<div class="padl20 padtb10 brdb_new"> <a href="https://www.safeqloud.com/public/index.php/PublicNews" class="fsz16 black_txt"  >  Våra partners</a> </div>
												</li>
												<li>
													
													<div class="padl20 padtb10 valm"> <a href="https://www.safeqloud.com/public/index.php/InformRelatives" class="fsz16 black_txt" data-value="en" >  Kalender </a> </div>
												</li>
												</ol>
											
											<div class="clear"></div>
										</div>
									</li>
								</ul>
							</li>
							
								<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue hidden"> <a href="https://www.safeqloud.com/public/index.php/InformRelatives" id="usermenu_singin" class="translate hei_30pi dblock padrl10 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="sos" data-sw="sos">NOTIFY <span class="fa fa-heart red_txt"></span> F&F </a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_lgrey2 lgtgrey2_bg brdrad5 marl20 "> <a href="https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/N0ZvS0gycGRubUx4MlpxeTJNY1czZz09" id="usermenu_singin" class="translate hei_30pi dblock padrl10   lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 last"> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl10 blue_bg_h  lgn_hight_30 black_txt  white_txt_h  brdl" data-en="Logga in" data-sw="Logga in">Logga in</a> </li>
							
							</ul>
					</div>
				
				
			
				
				<div class="visible-xs visible-sm fright  brdwi_3 "> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
		
		
		
		
			
			<div class="clear"></div>
				<div class="dflex xs-dblock justc_fe pos_rel padtb60 xs-pad0" onclick="checkFlag();">
				<div class="wi_100 hei_100 pos_abs xs-pos_sta zi1 top0 left0 bgir_norep bgip_c bgis_cov" style="background-image: url(../../html/usercontent/images/bg/hero-partners.jpg);">
					<img src="../../html/usercontent/images/bg/hero-partners.jpg" class="wi_100 hei_auto hide xs-dblock">
				</div>
				<div class="wi_50 xs-wi_100 pos_rel zi5 white_txt">
					<div class="hei_30p dflex alit_c marl10 blue_bg italic fsz16">
						<img src="../../html/usercontent/images/bg/abIconPlus.svg" width="77" height="30" class="wi_auto hei_100 marl-10 marr10">
						<div class="padtb3">
							Verifiera motpart med ditt Qloud ID 
						</div>
					</div>
					<div class="pos_rel padrbl30 xs-padrl20 xs-darkgrey_txt">
						<div class="wi_100 hei_100 xs-dnone opa60 pos_abs zi1 top0 left0 blue_bg"></div>
						<div class="maxwi_500p pos_rel zi5">
							<h2 class="mar0 padtb15 bold fsz40 xs-fsz22 white_txt xs-darkgrey_txt">Vi tror på samarbeten...</h2>
							<div class="mar0 marb20 pad0 lipos_in bold fsz20 xs-fsz15">
								
									<span >På Qloud ID har vi länge arbetat med partners som en del av vår verksamhet. Vi ser samarbeten som en förlängning av vår organisation och en förutsättning för att vara innovativa och skapa mervärde för våra kunder.</span>
								
								<li class="marb10 pad0 hidden">
									<span class="marl-15">Du når över 7,5 miljoner identiteter på 1 minut</span>
								</li>
								<li class="marb10 pad0 hidden">
									<span class="marl-15"> Ta det säkra före det osäkra! </span>
								</li>
								
							</div>
							<a href="#" class="minhei_50p dflex justc_c alit_c opa90_h marb10 brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Pröva Verify ID kostnadsfritt</a>
							<div class="marb10 talc fsz15">
								Det är gratis - på riktigt
							</div>
						</div>
					</div>
				</div>
			</div>	
			
			<div class="column_m padb40  xs-padtb10 talc lgn_hight_22 fsz16 lgtgrey2_bg ">
				
				<div class="wrap maxwi_100  xs-padb30 xs-padrl25 padt0   lgtgrey2_bg">
				<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padtb30 padr30  xs-padrl0 ">
						<div class="wi_30 xs-wi_100">
							<img src="../../html/usercontent/images/bg/WIT-Background new.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_70 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="javascript:void(0);" class="marr5 black_txt">Partner program</a>
							</div>
							<h2 class="padb15 bold fsz40 xs-fsz22 black_txt lgn_hight_40">Bransch partners </h2>
							<div class="lgn_hight_30 black_txt">Skaffa ett Qloud ID för ert företag och ni kan ansluta och aktivera era kunder och leverantörer samt alla applikationer som Qloud ID erbjuder i Qloud ID´s App Market.     </div>
							<div class="lgn_hight_30 black_txt mart10">Med ett Qloud ID business tar ni ett kliv mot att bli en mer attraktiv arbetsgivare leverantör och kund.</div>
							
							
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om PlanetQloud" class="padl20  nobrd wi_60 maxwi_500p minhei_50p    opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
						
						
					</div>
					<div class="dflex xs-dblock justc_c alit_c fsz20 xs-fsz18 darkgrey_txt pad30 xs-padt30 brdb_new xs-padb0 xs-padrl0 white_bg xs-nobrdb">
						<div class="wi_10 xs-wi_100 fsz50 green_txt hidden-xs">
							<span class="fas fa-check"></span>
						</div>
						<div class="wi_90 xs-wi_100 bs_bb padl40 xs-padrl10 tall">
							
							<h2 class="padb15 bold fsz30 xs-fsz20 black_txt lgn_hight_40">Bemanning & Rekryteringspartner    </h2>
							<div class="lgn_hight_30 black_txt">Som bemannings- & rekryteringspartner blir du en del av våra kunders inköpsportal samtidigt som du får ta del av produkter som skapar mervärde för dina kunder.  </div>
							
							
							
						</div>
						
					</div>
					<div class="dflex xs-dblock justc_c alit_c fsz20 xs-fsz18 darkgrey_txt pad30  xs-padrl0 padtb40 xs-padt30 xs-padb0 white_bg brdb_new xs-nobrdb">
						
					<div class="wi_10 xs-wi_100 fsz50 green_txt hidden-xs">
							<span class="fas fa-check"></span>
						</div>
					 <div class="wi_90 xs-wi_100 bs_bb padl40 xs-padrl10 tall">
							
							<h2 class="padb15 bold fsz30 xs-fsz22 black_txt lgn_hight_40">Säkerhetsbolag  </h2>
							<div class="lgn_hight_30 black_txt">Säkerhetsbolag är med och bidrar till säkerheten för våra kunder samtidigt som ni svarar för en stor del av ansiktet utåt för våra lösningar mot våra kunder.  </div>
							
							
						</div>
						
					</div>
					<div class="dflex xs-dblock justc_c alit_c fsz20 xs-fsz18 darkgrey_txt pad30  xs-padrl0 padtb40 xs-padt30 xs-padb0 brdb_new white_bg xs-nobrdb">
						
						<div class="wi_10 xs-wi_100 fsz50 green_txt hidden-xs">
							<span class="fas fa-check"></span>
						</div>
						<div class="wi_90  xs-wi_100 bs_bb padl40 xs-padrl10 tall">
							
							<h2 class="padb15 bold fsz30 xs-fsz22 black_txt lgn_hight_40">Fastighetsägare  </h2>
							<div class="lgn_hight_30 black_txt">Tillsammans med fastighetspartners har vi utvecklat produkter specifika för fastighets-branschen som innebär att du som fastighetsägare kan växa och att våra samt dina kunder får förmånliga produkter och tjänster. </div>
							
							
							
						</div>
						
					</div>
					<div class="dflex xs-dblock justc_c alit_c fsz20 xs-fsz18 darkgrey_txt pad30  xs-padrl0 padt40 xs-padt30 xs-padb0 white_bg brdb_new xs-nobrdb">
						
						<div class="wi_10 xs-wi_100 fsz50 green_txt hidden-xs">
							<span class="fas fa-check"></span>
						</div>
						<div class="wi_90  xs-wi_100 bs_bb padl40 xs-padrl10 tall">
							
							<h2 class="padb15 bold fsz30 xs-fsz22 black_txt lgn_hight_40">Event</h2>
							<div class="lgn_hight_30 black_txt">Tillsammans med våra eventarrangörer möjliggör vi för våra kunder att upphandla på ett smidigare sätt... </div>
							
							
							
						</div>
						
					</div>
				</div>
				
				
				
			</div>
			
				<div class="column_m padb0  xs-padtb10 talc lgn_hight_22 fsz16 yellownew_bg ">
				
				<div class="wrap maxwi_100  xs-padb30 xs-padrl25 padt0 padb0  yellownew_bg">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padr30  xs-padrl0 padtb30">
						<div class="wi_30 xs-wi_100">
							<img src="../../html/usercontent/images/bg/WIT-Background new.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_70 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="javascript:void(0);" class="marr5 black_txt">Partner program</a>
							</div>
							<h2 class="padb15 bold fsz40 xs-fsz22 black_txt lgn_hight_40">Teknisk partner  </h2>
							<div class="lgn_hight_30 black_txt">Qloud ID samarbetar med andra förstklassiga tjänster, från tekniska verktyg till smart utvecklad teknik som delar vår säkerhet och integritets-filosofi.    </div>
							<div class="lgn_hight_30 black_txt mart10">Qloud ID går att integrera med en mängd olika typer av program och system, exempelvis affärssystem, schemaläggning, webbshoppar och workflowsystem. </div>
							
							
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om PlanetQloud" class="padl20  nobrd wi_60 maxwi_500p minhei_50p    opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
						
						
					</div>
					
					<div class="dflex xs-dblock justc_c alit_c fsz20 xs-fsz18 darkgrey_txt pad30 brdb_new  xs-padrl0 blue_bgcbe4f1 hidden">
						<div class="wi_10 xs-wi_100 fsz70 yellow_txt ">
							<span class="fas fa-check"></span>
						</div>
						<div class="wi_90 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							
							<h2 class="padb15 bold fsz30 xs-fsz20 white_txt lgn_hight_40">Teknisk partner    </h2>
							<div class="lgn_hight_30 white_txt">Tack vare våra Tekniska partners kan vi erbjuda våra samt våra partners kunder en välfungerande automatiserad helhet där kund inte riskerar att någon information är inaktuell.  </div>
							
							
							
						</div>
						
					</div>
					
					
					<div class="dflex xs-dblock justc_c alit_c fsz20 xs-fsz18 darkgrey_txt pad30 brdb_new xs-padrl0 padt40 hidden">
						
						<div class="wi_80 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							
							<h2 class="padb15 bold fsz30 xs-fsz22 black_txt lgn_hight_40">Teknisk partner </h2>
							<div class="lgn_hight_30 black_txt padb5 fsz20">Qloud ID samarbetar med andra förstklassiga tjänster, från tekniska verktyg till smart utvecklad teknik som delar vår säkerhet och integritets-filosofi. </div>
							
							<div class="lgn_hight_30 black_txt padb5">Qloud ID går att integrera med en mängd olika typer av program och system, exempelvis affärssystem, schemaläggning, webbshoppar och workflowsystem.  </div>
							<div class="lgn_hight_30 black_txt">Tack vare våra Tekniska partners kan vi erbjuda våra samt våra partners kunder en välfungerande automatiserad helhet där kund inte riskerar att någon information är inaktuell. </div>
							
						</div>
						<div class="wi_20 xs-wi_100 fsz70 yellow_txt">
							<span class="fas fa-arrow-alt-circle-right"></span>
						</div>
					</div>
				</div>
				
				
				
			</div>
			
			<div class="column_m padt40  xs-padtb10 talc lgn_hight_22 fsz16 hidden ">
			<div class="wrap maxwi_100  xs-padb30 xs-padrl20 xs-padt20 padb20  padrl40">
				<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz20 darkgrey_txt ">
						<div class="wi_100 xs-wi_100 bs_bb padl0 talc padb30 brdb">
							<h2 class="padb15 bold fsz50 xs-fsz30 darkgrey_txt lgn_hight_40">Vi tror på samarbeten...</h2>
							<div class="lgn_hight_30">På Qloud ID har vi länge arbetat med partners som en del av vår verksamhet. Vi ser samarbeten som en förlängning av vår organisation och en förutsättning för att vara innovativa och skapa mervärde för våra kunder. </div>
							
						</div>
						
					</div>
				</div>
				</div>
			
			<div class="dflex xs-dblock justc_fe pos_rel padtb60 xs-pad0 hidden">
	<div class="wi_100 hei_100 pos_abs xs-pos_sta zi1 top0 left0 bgir_norep bgip_c bgis_cov" style="background-image: url(../../html/usercontent/images/bg/mockup.png);">
	<img src="../../html/usercontent/images/bg/PlusDator-e1457994495200.jpg" class="wi_100 hei_auto hide xs-dblock">
	</div>
	<div class="wi_50 xs-wi_100 pos_rel zi5 white_txt">
	<div class="hei_30p dflex alit_c marl10 dark_blue_bg italic fsz16">
	<img src="../../html/usercontent/images/bg/abIconPlus.svg" width="77" height="30" class="wi_auto hei_100 marl-10 marr10">
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
	
	<div class="column_m  xs-padtb10 talc mart0 marb0 fsz16 lgtgrey2_bg hidden" onclick="checkFlag();">
			
	
					<div class="wrap maxwi_100 padrl10  xs-padt0 xs-padrl15">
						
						
						
						
					 	<div class="dflex xs-fxwrap_w alit_c mart40 ">
							
							
							<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc white_bg">
								
								
								<div class="wi_100 xs-wi_100 bs_bb pad40 tall">
									<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40">Hantera besök...</h2>
									<div class="lgn_hight_30 fsz26 xs-fsz18">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
									<div class="mart20 tall"> 
										<a href="https://www.safeqloud.com/public/index.php/PublicFastigheter"><input type="button" value="Mer om Besökssysstem" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
									</div>
								</div>
								
								
							</div>
							<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc padl20 xs-padr0">
								<div class="wi_100 xs-wi_100 bs_bb pad40 tall">
									<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40">Hantera kriser...</h2>
									<div class="lgn_hight_30 fsz26 xs-fsz18">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
									<div class="mart20 tall"> 
										<a href="#"><input type="button" value="Mer om Krishantering" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h  brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
									</div>
								</div>
							</div>
							
							
							
							
						</div>
						
						
						<div class="dflex xs-fxwrap_w alit_c padt0 marb40">
							
							
							<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc">
								
								
								<div class="wi_100 xs-wi_100 bs_bb pad40 tall">
									<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40">Hantera besök...</h2>
									<div class="lgn_hight_30 fsz26 xs-fsz18">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
									<div class="mart20 tall"> 
										<a href="#"><input type="button" value="Mer om Besökssysstem" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
									</div>
								</div>
								
								
							</div>
							<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc padl20 xs-padr0">
								<div class="wi_100 xs-wi_100 bs_bb pad40 tall white_bg">
									<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40">Hantera kriser...</h2>
									<div class="lgn_hight_30 fsz26 xs-fsz18">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
									<div class="mart20 tall"> 
										<a href="#"><input type="button" value="Mer om Krishantering" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
									</div>
								</div>
							</div>
							
						</div>
						
						
						<div class="clear"></div>
					</div>
					
					
					
					
					
				</div>
				
			<div class="column_m padt40 padb40 xs-padtb10 talc lgn_hight_22 fsz16 lgtgrey2_bg hidden">
			<div class="wrap maxwi_100  xs-padb30 xs-padrl20 xs-padt20 padb20  padrl40">
				<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz20 darkgrey_txt ">
						<div class="wi_100 xs-wi_100 bs_bb padl0 talc padb30 brdb">
							<h2 class="padb15 bold fsz50 xs-fsz30 darkgrey_txt lgn_hight_40">Vi tror på samarbeten...</h2>
							<div class="lgn_hight_30">På Qloud ID har vi länge arbetat med partners som en del av vår verksamhet. Vi ser samarbeten som en förlängning av vår organisation och en förutsättning för att vara innovativa och skapa mervärde för våra kunder. </div>
							
						</div>
						
					</div>
				</div>
				
				
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt20 padb20 brdb_new bluenew_bg">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padrl30">
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 white_txt lgn_hight_40">Teknisk partner </h2>
							<div class="lgn_hight_30 white_txt">Qloud ID samarbetar med andra förstklassiga tjänster, från tekniska verktyg till smart utvecklad teknik som delar vår säkerhet och integritets-filosofi.   </div>
							<div class="mart20 tall"> 
								<a href="https://www.safeqloud.com/public/index.php/PublicFastigheter"><input type="button" value="Mer om Teknisk partner" class="padl20  nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt50 padb20 brdb_new">
					<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz18 darkgrey_txt ">
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-2.png" class="wi_80 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padr40 xs-padr0 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40 tall">Bemanning & Rekryteringspartner</h2>
							<div class="lgn_hight_30">Medvåra bemannings- & rekryteringspartner förenklas hela inköpsprocessen när våra kunder önskar utöka sin personalstyrka.     </div>
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om Bemanning & Rekryteringspartner" class="padl20 nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt20 padb20 brdb_new yellownew_bg">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padrl30">
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 white_txt lgn_hight_40">Säkerhetsbolag</h2>
							<div class="lgn_hight_30 white_txt">Vi har nära samarbete med säkerhetspartners som bidrar till säkerheten för våra kunder samtidigt som dessa svarar för en stor del av ansiktet utåt för våra lösningar.</div>
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om Säkerhetspartner " class="padl20 nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt50 padb20 brdb_new">
					<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz18 darkgrey_txt ">
						<div class="wi_50 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40">Fastighetsägare</h2>
							<div class="lgn_hight_30">Delar av våra tjänster är utvecklade i nära samarbete med fastighetspartners för att kunna möta kundernas efterfrågan på kvalitativa produkter och tjänster. </div>
							<div class="mart20 tall"> 
								<a href="https://www.safeqloud.com/public/index.php/PublicFastigheter"><input type="button" value="Mer om Farstighetspartners " class="padl20  wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 brdb_b fsz20 xs-fsz16 darkgrey_txt trans_all2 tall panlyellow_bg nobrd"></a>
							</div>
						</div>
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-2.png" class="wi_80 hei_auto">
						</div>
					</div>
				</div>
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt20 padb20 brdb_new bluenew_bg">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padrl30">
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 white_txt lgn_hight_40">Event </h2>
							<div class="lgn_hight_30 white_txt">Tillsammans med våra eventarrangörer möjliggör vi för våra kunder att upphandla på ett smidigare sätt...   </div>
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om event..." class="padl20  nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
				</div>
				
			</div>	
				
					<div class="column_m  xs-padtb10 talc mart0 marb0 fsz16 white_bg" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl10  xs-padt0 xs-padrl25">
					
					
					
					
					<div class="dflex xs-fxwrap_w alit_c  xs-padt0 xs-padb30 ">
						<div class="wi_33 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 talc padl0 xs-padr0">
							
							<div class="wi_100 xs-wi_100 bs_bb padtrl30 tall xs-padrl0 and xs-padtb20">
								
								<h2 class="padb15 bold fsz25 xs-fsz22 darkgrey_txt lgn_hight_40">Marknadsledande</h2>
								<div class="lgn_hight_30 fsz18 xs-fsz18">Som partner kommer nya, djärva produkter att läggas till i er produktportfolio samtidigt som ni kommer få ta del av våra partner-applikationer. </div>
								
								<div class="mart20 tall hidden"> 
									<a href="#"><input type="button" value="En plattform för alla" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h  brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
								</div>
							</div>
						</div>
						
						
						<div class="wi_33 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall mart10 brdrad5 talc">
							
							
							<div class="wi_100 xs-wi_100 bs_bb padtrl30 tall xs-padrl0 and xs-padtb20">
								
								<h2 class="padb15 bold fsz25 xs-fsz22 darkgrey_txt lgn_hight_40">Väx med oss </h2>
								<div class="lgn_hight_30 fsz18 xs-fsz18">Vi erbjuder rätt partner möjligheter till att arbeta med produkter som under längre tid utformas för att förkorta kedjan mellan er och er nästa kund.  </div>
								<div class="mart20 tall hidden"> 
									<a href="#"><input type="button" value="En kultur som utvecklas" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
								</div>
							</div>
							
							
						</div>
						
					<div class="wi_33 xs-wi_100 flex_1 order_3 xs-order_3 xs-tall tall mart10 brdrad5 talc padl0 xs-padr0">
							
							<div class="wi_100 xs-wi_100 bs_bb padtrl30 tall xs-padrl0 and xs-padtb20">
								
								<h2 class="padb15 bold fsz25 xs-fsz22 darkgrey_txt lgn_hight_40">En samarbetsplattform  </h2>
								<div class="lgn_hight_30 fsz18 xs-fsz18">När du blir Qloud ID-partner får du allt du behöver för ett digitalt, webbaserat och skräddarsytt samarbete med varje enskild partner.  </div>
								
								<div class="mart20 tall hidden"> 
									<a href="#"><input type="button" value="Mer om Krishantering" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h  brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
								</div>
							</div>
						</div>
						
						
					</div>
					
					
						<div class="dflex xs-fxwrap_w alit_c padt0 ">
						
						
						<div class="wi_33 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 talc">
							
							
							<div class="wi_100 xs-wi_100 bs_bb padtrl30 tall xs-padrl0 and xs-padtb20">
								
								<h2 class="padb15 bold fsz25 xs-fsz22 darkgrey_txt lgn_hight_40">Digitaliseringen</h2>
								<div class="lgn_hight_30 fsz18 xs-fsz18">Qloud ID hjälper företag med digitalisering & autentitiering. Som Qloud ID-partner blir du en del av digitaliseringen och får ta del av den resan. </div>
								
								<div class="mart20 tall hidden"> 
									<a href="#"><input type="button" value="Mer om App Market" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
								</div>
							</div>
							
							
						</div>
						<div class="wi_33 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall mart10 brdrad5 talc padl0 xs-padr0">
							
							<div class="wi_100 xs-wi_100 bs_bb padtrl30 tall xs-padrl0 and xs-padtb20">
								
								<h2 class="padb15 bold fsz25 xs-fsz22 darkgrey_txt lgn_hight_40">Utbildning   </h2>
								<div class="lgn_hight_30 fsz18 xs-fsz18">Vi vet att ökad kunskap innebär ökad effektivitet, och erbjuder därför ett flertal olika kostnadsfria utbildningar och för våra partners.   </div>
								
								<div class="mart20 tall hidden"> 
									<a href="#"><input type="button" value="Mer om Krishantering" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h  brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
								</div>
							</div>
						</div>
						<div class="wi_33 xs-wi_100 flex_1 order_3 xs-order_3 xs-tall tall mart10 brdrad5 talc">
							
							
							<div class="wi_100 xs-wi_100 bs_bb padtrl30 tall xs-padrl0 and xs-padtb20">
								
								<h2 class="padb15 bold fsz25 xs-fsz22 darkgrey_txt lgn_hight_40">Support </h2>
								<div class="lgn_hight_30 fsz18 xs-fsz18">Vi ger våra partner och deras kunder svensk support. Vi är med dig hela vägen och hjälper dig i din och dina kunders digitala utveckling.   </div>
								
								<div class="mart20 tall hidden"> 
									<a href="#"><input type="button" value="Mer om App Market" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
								</div>
							</div>
							
							
						</div>
					</div>
					
					
					<div class="clear"></div>
				</div>
				
				
				
				
				
			</div>
		
				
			
			
			<div class="column_m padt40  xs-padtb10 talc lgn_hight_22 fsz16  lgtgrey2_bg">
			<div class="wrap maxwi_100  xs-padb0 xs-padrl20 xs-padt20 padb20  padrl40">
				<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz20 darkgrey_txt padrl130 xs-padrl20">
						<div class="wi_100 xs-wi_100 bs_bb padl0 talc padb30 xs-padb0">
							<h2 class="padb15 bold fsz35 xs-fsz30 darkgrey_txt lgn_hight_40">Vill du nå oss?</h2>
							<div class="lgn_hight_30 fsz25">Har du frågor om våra partnerprogram eller någon annan fundering? Tveka inte att skicka oss ett melj eller slå oss en signal   </div>
							
							
							<div class="dflex xs-dblock justc_c alit_c fsz20 xs-fsz18 darkgrey_txt   xs-padrl0  ">
							<div class="wi_40 xs-wi_100 bs_bb  xs-padl0 talr">
							<div class="mart20 talc "> 
									<a href="#"><input type="button" value="Kontakta oss" class="padl20 nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 black_bg fsz20 xs-fsz16 white_txt trans_all2 talc"></a> 
								</div>
								</div>
								<div class="wi_60 xs-wi_100 bs_bb padl40 xs-padl0 tall ">
								<div class="mart20 tall ">
								 <a href="#"><input type="button" value="010 - 1510125" class="padl20 nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 trans_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
								</div>
								</div>
								</div>
						</div>
						
					</div>
				</div>
				</div>
				<?php include 'PublicUserFooter.php'; ?>
				<div class="clear"></div>
				<script type="text/javascript" src="../../html/usercontent/js/jquery-ui.min.js"></script>
				<script type="text/javascript" src="../../html/usercontent/js/vex.combined.min.js"></script>
				<script type="text/javascript" src="../../html/usercontent/js/superfish.js"></script>
				<script type="text/javascript" src="../../html/usercontent/js/icheck.js"></script>
				<script type="text/javascript" src="../../html/usercontent/js/jquery.selectric.js"></script>
				<script type="text/javascript" src="../../html/usercontent/js/tinymce/tinymce.min.js"></script>
				<script type="text/javascript" src="../../html/usercontent/modules.js"></script>
				<script type="text/javascript" src="../../html/usercontent/js/custom.js"></script>
				
				
				
				
			</body>
		</html>																						