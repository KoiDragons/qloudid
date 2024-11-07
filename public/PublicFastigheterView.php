<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylewrap.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
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
														<div class="user_pic padt5"><a href="javascript:checkFlag();" data-value="en"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:checkFlag();" class="fsz14 black_txt" data-value="en" >  Engelska </a> </div>
													</li>
													
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
					</div>
					
					<div class="fright xs-dnone sm-dnone padt10 padb10">
						<ul class="mar0 pad0 sf-menu fsz16">
							
							
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/public/index.php/QloudidPersonal" class="translate hei_30pi dblock padrl20 blue_bg_h lgn_hight_30 black_txt white_txt_h" data-en="Privat" data-sw="Privat">Privat</a> </li>
							
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/public/index.php/CorporateServices"  class="ranslate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Företag" data-sw="Företag">Företag</a> </li>
							
							<li class="dblock hidden-xs hidden-sm fleft pos_rel   "> <a href="#" class="translate hei_30pi dblock padrl20 brdb_b_pink  lgn_hight_30 pink_txt " data-en="Partners" data-sw="Partners">Partners</a> </li>
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue hidden"> <a href="https://www.safeqloud.com/public/index.php/InformRelatives"   class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h hidden" data-en="sos" data-sw="sos">SOS <span class="fa fa-heart red_txt"></span> F&F </a> </li>
							<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_black brdrad5 marl20"> <a href="https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/N0ZvS0gycGRubUx4MlpxeTJNY1czZz09"   class="translate hei_30pi dblock padrl20   lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
							<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20"> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt  white_txt_h  brdl" data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
						</ul>
					</div>
					
					<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3 "> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			
			
			
			<div class="clear"></div>
			<div class="dflex xs-dblock justc_fe pos_rel padtb60 xs-pad0" onclick="checkFlag();">
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
	
	<div class="column_m  xs-padtb10 talc mart0 marb0 fsz16 lgtgrey2_bg" onclick="checkFlag();">
					<div class="wrap maxwi_100 padrl10  xs-padt0 xs-padrl15">
						
						
						
						
					 	<div class="dflex xs-fxwrap_w alit_c mart40 ">
							
							
							<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc white_bg">
								
								
								<div class="wi_100 xs-wi_100 bs_bb pad40 tall">
									<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40">Hantera besök...</h2>
									<div class="lgn_hight_30 fsz26 xs-fsz18">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
									<div class="mart20 tall"> 
										<a href="#"><input type="button" value="Mer om Besökssysstem" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
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
										<a href="https://www.safeqloud.com/public/index.php/PublicAboutQmatchup"><input type="button" value="Mer om Krishantering" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
									</div>
								</div>
							</div>
							
						</div>
						
						
						<div class="clear"></div>
					</div>
					
					
					
					
					
				</div>
		
		<div class="column_m  xs-padtb10 talc mart40 marb0 fsz16 white_bg" onclick="checkFlag();">
		<div class="wrap maxwi_100 xs-padb10 xs-padrl20 padt0 padb10  padrl40">
				<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz25 xs-fsz18 darkgrey_txt ">
						<div class="wi_100 xs-wi_100 bs_bb padl0 talc padb10 brdb_new">
							<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40 tall">För fastighetsägare...</h2>
							<div class="lgn_hight_30 tall">Det här kan ni använda i er dagiga verksamhet... </div>
							
						</div>
						
					</div>
				</div>
			</div>	
		<div class="wrap maxwi_100 dflex marb20 padt0 padrl40">
			 
					<!-- Results -->
					<div class="flex_1 white_bg">
						<div class="pad15">
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list column_m padb20">
									<div class="dflex alit_c justc_sb padb10 talc hidden">
										<div class="bold fsz16">Öppen utbildning</div>
										<div class="">Visar 1-50 av 799 träffar</div>
										<div class="">
											<select class="jui-select" id="ui-id-1" style="display: none;">
												<option selected="selected" disabled="disabled">Sortera listan</option>
												<option value="1">Sortera efter betyg</option>
												<option value="2">Pris</option>
												<option value="3">Langd</option>
											</select><span tabindex="0" id="ui-id-1-button" role="combobox" aria-expanded="false" aria-autocomplete="list" aria-owns="ui-id-1-menu" aria-haspopup="true" class="ui-selectmenu-button ui-selectmenu-button-closed ui-corner-all ui-button ui-widget"><span class="ui-selectmenu-icon ui-icon ui-icon-triangle-1-s"></span><span class="ui-selectmenu-text">Sortera listan</span></span>
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<img src="../../html/usercontent/images/icons/sr-1.png" width="14" height="14">
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<img src="../../html/usercontent/images/icons/sr-1.png" width="14" height="14">
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<img src="../../html/usercontent/images/icons/sr-1.png" width="14" height="14">
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<img src="../../html/usercontent/images/icons/sr-1.png" width="14" height="14">
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<img src="../../html/usercontent/images/icons/sr-1.png" width="14" height="14">
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<img src="../../html/usercontent/images/icons/sr-1.png" width="14" height="14">
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
												<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" class="check toggle-active" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
											</div>
										</a>
									</div>
								</div>
							</form>
						</div>
					</div>
					
					<!-- Banners -->
					<div class="wi_240p fxshrink_0 hidden">
						<div class="padbl15">
							<p>
								<a href="#"><img src="../../html/usercontent/images/banner1.jpg" class="wi_100 hei_auto"> </a>
							</p>
							<p>
								<a href="#"><img src="../../html/usercontent/images/banner2.png" class="wi_100 hei_auto"> </a>
							</p>
							<p>
								<a href="#"><img src="../../html/usercontent/images/banner3.png" class="wi_100 hei_auto"> </a>
							</p>
							<div class="clear"></div>
						</div>
					</div>
				</div>
		
			<div class="column_m padt40 padb40 xs-padtb10 talc lgn_hight_22 fsz16 white_bg ">
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt0 padb20 brdb_new padrl40">
					<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz18 darkgrey_txt ">
						<div class="wi_50 xs-wi_100 bs_bb padl40 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40">Hantera besök...</h2>
							<div class="lgn_hight_30">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om Besökssysstem" class="padl20  wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 brdb_b fsz20 xs-fsz16 darkgrey_txt trans_all2 tall panlyellow_bg nobrd"></a>
							</div>
						</div>
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-2.png" class="wi_80 hei_auto">
						</div>
					</div>
				</div>
				
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt20 padb20 brdb_new bluenew_bg hidden">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padrl30">
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padl40 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 white_txt lgn_hight_40">Hantera besök...</h2>
							<div class="lgn_hight_30 white_txt">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om Besökssysstem" class="padl20 nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt50 padb20 brdb_new hidden">
					<div class="dflex xs-dblock fxdir_rowr justc_c alit_c fsz26 xs-fsz18 darkgrey_txt ">
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-2.png" class="wi_80 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padr40 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 darkgrey_txt lgn_hight_40 tall">Få färska uppgifter...</h2>
							<div class="lgn_hight_30">Erhåll uppdaterade uppgifter om dina anställda och kunder i realtid. Fullständig GDPR anpassad och levererbar till de flesta affärssystemen    </div>
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om Qlean Data" class="padl20 nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl20 padt20 padb20 brdb_new yellownew_bg hidden">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padrl30">
						<div class="wi_50 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb padl40 tall">
							<h2 class="padb15 bold fsz40 xs-fsz22 white_txt lgn_hight_40">Hantera besök...</h2>
							<div class="lgn_hight_30 white_txt">Ett webbaserat besökssystem som förenklar hantering av besökare, höjer säkerheten och förmedlar ett professionellt första intryck. </div>
							<div class="mart20 tall"> 
								<a href="#"><input type="button" value="Mer om Besökssysstem" class="padl20 nobrd wi_100 maxwi_500p minhei_50p dflex  alit_c opa90_h marrla brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
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