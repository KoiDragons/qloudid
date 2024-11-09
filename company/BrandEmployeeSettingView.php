<!doctype html>
<html>
		<?php
			$path1 = $path."html/usercontent/images/";
		  
	?>
		<head>
	<meta charset="utf-8">
 
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<script>
		
		var dict = {
				"Home": {
					sv: "Início"
				},
				"Download plugin": {
					sv: "Descarregar plugin",
					en: "Download plugin"
				}
			}
			var translator = $('body').translate({lang: "en", t: dict});
			translator.lang("en");
			var translation = translator.get("Home");
			var currentLang = 'en';
			var langVar='<?php echo $verifyLanguage; ?>';
			
			
		 
		function show_popup()
		{
			if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#popup_fade").removeClass('active');
				$("#popup_fade").attr('style','display:none;');
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				
			}
			else
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			}
		}
		
		function closemob_popup()
		{
			
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			
		}
		
		
		function show_phone()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_phone").addClass('active');
				$("#gratis_popup_phone").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_phone").removeClass('active');
				$("#gratis_popup_phone").attr('style','display:none;');
				
			}
			}
			
			
			function show_save()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_saveq").addClass('active');
				$("#gratis_popup_saveq").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_saveq").removeClass('active');
				$("#gratis_popup_saveq").attr('style','display:none;');
				
			}
			}
			
			function show_savev()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_verify").addClass('active');
				$("#gratis_popup_verify").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_verify").removeClass('active');
				$("#gratis_popup_verify").attr('style','display:none;');
				
			}
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
	
	<body class="lgtgrey2_bg xxs-white_bg">
		
	<div class="column_m header xs-hei_55p  bs_bb lgtgrey2_bg xxs-white_bg" id="headerData"  >
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey2_bg xxs-white_bg">
					<div class="logo  marr15 wi_140p xs-wi_80p hidden-xs hidden-sm visible-xxs">
						<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-bars" aria-hidden="true"></i></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_sw.png" width="45" height="45" alt="email" title="email" class="lang_selector" data-value="sv" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_us.png" width="45" height="45" alt="email" title="email" data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/germanf.png" width="45" height="45" alt="email" title="email" class="lang_selector" data-value="de" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/french.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/spanish.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/italian.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="hidden-xs hidden-sm fleft padl20 padr10 ">
						<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
							<ul class="menulist sf-menu  fsz14">
								
								<li class="hidden-xs first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18 sf-with-ul"><img src="../../../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_sw.png" width="28" height="28" alt="email" title="email" data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_us.png" width="28" height="28" alt="email" title="email" data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/germanf.png" width="28" height="28" alt="email" title="email" data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German </a> </div>
													</li>
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
					</div>
					
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="#" class="show_popup_modal diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt" data-target="#gratis_popup_confirm">
									
									<span class="valm">Stäng Sidan</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					<div class="visible-xs visible-sm fright marr0 padt5 ">  </div>
					
					<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="https://www.safeqloud.com/user/index.php/NewPersonal/userInfo" class=" diblock padl10 padr10 brdrad3 fsz30 bg_pink white_txt"><i class="fas fa-times" aria-hidden="true"></i></a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			<div class="clear" id=""></div>
	
		 
		<div class="column_m pos_rel " onclick="checkFlag();"  >
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart20  xs-mart0 lgtgrey2_bg xxs-white_bg">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  brdrad3 lgtgrey2_bg">
						<div class="padtb0 brdrad3 ">
						<div class="padb20 xxs-padb0 mart20">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60 bold padb10 blue_67cff7 trn"  >Settings</h1>
									</div>
									<div class="mart20 xs-marb40 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Here you can work with your settings</a></div>
							  

<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb20 xxs-white_bg xs-padb0">
						<div class="wi_25-12p marl10">
						<a href="#" class="fsz30 ">
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #01b7f2; color:#01b7f2;" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="black_txt  fab fa-airbnb fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Detail</p>
						</div>
						 
						
						<div class="wi_25-12p marl10">
						<a href="https://www.safeqloud.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>" class="fsz30 "> 
						<span class="fa-stack-info">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: #fcaf16; color: #fcaf16;"></i>
																				  <i class="black_txt far fa-envelope fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Visitor</p>
						</div> 
						
						<div class="wi_25-12p marl10  "><a href="https://www.safeqloud.com/company/index.php/Parkering/parkingInfo/<?php echo $data['cid']; ?>" class="fsz30 "> <span class="fa-stack-info ">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: red;color: red;"></i>
																				  <i class="black_txt fas fa-cogs fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Parking</p>
						</div> 
						 
						<div class="wi_25-12p marl10"><a href="https://www.safeqloud.com/company/index.php/BudandLeverans/packageInfo/<?php echo $data['cid']; ?>" class="fsz30 "> <span class="fa-stack-info ">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: rgba(53,205,75,1);color: rgba(53,205,75,1);"></i>
																				  <i class="black_txt far fa-user fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Delivery</p>
						</div> 
						</div>
			
<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb20 xxs-white_bg xs-padb0">
						<div class="wi_25-12p marl10">
						<a href="https://www.safeqloud.com/company/index.php/ChilldCare/helpCenter/<?php echo $data['cid']; ?>" class="fsz30 ">
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #01b7f2; color:#01b7f2;" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="black_txt  fab fa-airbnb fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">SafeQid</p>
						</div>
						 
						
						<div class="wi_25-12p marl10">
						<a href="#" class="fsz30 "> 
						<span class="fa-stack-info">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: #fcaf16; color: #fcaf16;"></i>
																				  <i class="black_txt far fa-envelope fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Setting6</p>
						</div> 
						
						<div class="wi_25-12p marl10  "><a href="#" class="fsz30 "> <span class="fa-stack-info ">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: red;color: red;"></i>
																				  <i class="black_txt fas fa-cogs fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Setting7</p>
						</div> 
						 
						<div class="wi_25-12p marl10"><a href="#" class="fsz30 "> <span class="fa-stack-info ">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: rgba(53,205,75,1);color: rgba(53,205,75,1);"></i>
																				  <i class="black_txt far fa-user fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Setting8</p>
						</div> 
						</div>
					
	 			<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb20 xxs-white_bg xs-padb0">
						<div class="wi_25-12p marl10">
						<a href="#" class="fsz30 ">
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #01b7f2; color:#01b7f2;" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="black_txt  fab fa-airbnb fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Setting9</p>
						</div>
						 
						
						<div class="wi_25-12p marl10">
						<a href="#" class="fsz30 "> 
						<span class="fa-stack-info">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: #fcaf16; color: #fcaf16;"></i>
																				  <i class="black_txt far fa-envelope fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Setting10</p>
						</div> 
						
						<div class="wi_25-12p marl10  "><a href="#" class="fsz30 "> <span class="fa-stack-info ">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: red;color: red;"></i>
																				  <i class="black_txt fas fa-cogs fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Setting11</p>
						</div> 
						 
						<div class="wi_25-12p marl10"><a href="#" class="fsz30 "> <span class="fa-stack-info ">
																				  <i class=" fa-circle fa-stack-2x circle_bg_apps2" aria-hidden="true" style="border-radius: 10%;background: rgba(53,205,75,1);color: rgba(53,205,75,1);"></i>
																				  <i class="black_txt far fa-user fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz13  padt5 grey_new_txt">Setting12</p>
						</div> 
						</div>
		
						</div>
						
						
						
					</div>
					
					
					
				</div>
						
			</div>
		
			
		</div>
			
		</div>
	 

</div>
		 
		<div id="popup_fade" class="opa0 opa55_a black_bg" onclick="closemob_popup();"></div>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/flipqard.js"></script>
		
	</body>
	
</html>