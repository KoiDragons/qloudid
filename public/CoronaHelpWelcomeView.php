<!doctype html>

<?php
	
	$path1 = $path."html/usercontent/images/";
	?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smart/css/icofont.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
	
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		 
		 
		<script>
		 
			
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
		<body class="black_bg ffamily_avenir" >
			<div class="column_m header xs-header xsip-header xsi-header bs_bb black_bg hidden-xs">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 black_bg">
				<div class="logo padt10 wi_50p xs-wi_50p hidden "><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="hidden fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="45" height="45" alt="email" title="email" class="lang_selector" data-value="sv" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="45" height="45" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/germanf.png" width="45" height="45" alt="email" title="email"class="lang_selector" data-value="de" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
			<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
			<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe grey_txt" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/germanf.png" width="28" height="28" alt="email" title="email"data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German </a> </div>
													</li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
			<div class="fright xs-dnone visible_si padt10 hidden">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="http://www.qloudid.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga in" data-sw="Logga in">Logga in</a> </li>
					</ul>
				</div>
			<!--sf-js-enabled sf-arrows hidden-xs-->
			<div class="top_menu frighti padt15 padb20 hidden">
				<ul class="menulist sf-menu  fsz14 ">
					
					
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz24 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						</li>
						
				</ul>
			</div>
			<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="diblock padl10 padr10 brdrad3 fsz30 bg_e6e5e5  white_txt"><i class="fas fa-times " aria-hidden="true"></i></a> </div>
			<div class="clear"></div>
		</div>
		</div>
	
	<div class="column_m header hei_55p  bs_bb black_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 black_bg"  >
				 
					 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class=" " style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe grey_txt" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/germanf.png" width="28" height="28" alt="email" title="email"data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German </a> </div>
													</li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
				
				 
			 
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
	
	<div class="wi_720p xsi-wi_360p maxwi_100   pos_rel zi5 marrla  xs-padrl15 xs-pad0   brdrad5 mart40 xs-mart20 hidden" >
	<div class="maxwi_80 visible-xs talc padb30 padt20">
						<img src="https://images.ctfassets.net/bi9pvs2ayg6b/4Z4UyCWYarsPYV7bYl0pbl/fec71ab43a2997d9735af988482c824a/blockethja__lpenpuff1c.png?w=500&amp;fl=progressive"    class="maxwi_100 valm  wi_auto" height="130px;" title="Free Support" alt="Free Support"   />
					</div>
			<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz70 xxs-fsz35  padb10 black_txt trn ffamily_avenir bold" >#Coronahjälpen</h1>
									</div>
									<div class="mart0 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Vi hjälper människor i huvudsak med att handla och leverera matvaror till ytterdörren.</a></div>
									</div>
	
	
				<div class="column_m wi_100 maxwi_100 marb0 padrl15 hidden">
			<div class="  wi_600p maxwi_100  bg_e6e5e5 marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 xs-padr0">
		<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 bg_e6e5e5 txt_708198 xs-padb0">
					<div class="visible-xs  xxs-talc talc ffamily_avenir marb20"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir bold padrl10" >Vem är du?</a></div>
					<div class="maxwi_80 hidden-xs">
						<img src="https://images.ctfassets.net/bi9pvs2ayg6b/4Z4UyCWYarsPYV7bYl0pbl/fec71ab43a2997d9735af988482c824a/blockethja__lpenpuff1c.png?w=500&amp;fl=progressive" width="482" height="150" class="maxwi_100 valm" title="Free Support" alt="Free Support" />
					</div>
 
<h3 class="marb40 md-marb40 lg-marb40 pad0 black_txt  fsz16 hidden-xs" style="font-family: Avenir;">Är du i karantän och behöver hjälp med leverans av matvaror till din ytterdörr gratis? </h3>

				<div class="padb20 xs-padrl10 xs-padb0">
						<div class="wrap maxwi_100 dflex brdrad3">
						<a href="CoronaHelp/detailInfo/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" class="wi_80 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla  white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdr trn ffamily_avenir brdclr_f tall padl30 "><span class="hidden-xs">Needy</span><span class="visible-xs">I behov av hjälp</span>
						  
						</a> <a href="CoronaHelp/detailInfo/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" class="wi_20 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla brdclr_f white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdl trn ffamily_avenir tall padl10 xs-padl20 ">  
						<span class="fright fsz20  " style="color:#6ebdf7"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
						</a> 
						</div>
						</div>
				</div>
				 
			</div>
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 padl15 xs-padl0">
<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 bg_e6e5e5 txt_708198 xs-padt0">
					
					<div class="maxwi_80 hidden-xs">
						<img src="https://images.ctfassets.net/bi9pvs2ayg6b/7eVkp7P0eLfN9eblfc7z1t/ba2dd6d88b7061e97914728a085fb90b/tips-bla__.png?w=500&amp;fl=progressive" width="482" height="150" class="maxwi_100 valm" title="Free Support" alt="Free Support" />
					</div>

 
		<h3 class="marb40 md-marb40 lg-marb40 pad0 black_txt  fsz16 hidden-xs" style=" font-family: Avenir;">Är du en friskperson som kan hjälpa till med handla och leverans av matvaror till dina grannar. </h3>

			<div class="padb20 xs-padrl10">
						<div class="wrap maxwi_100 dflex brdrad3">
						<a href="CoronaHelp/detailInfoVolunteer/QkhHaWQzcnBweFU5MDRIMllxY3IzQT09" class="wi_80 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla  white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdr trn ffamily_avenir brdclr_f tall padl30 "><span class="hidden-xs">Volunteer</span><span class="visible-xs">Frivillig volontär</span>
						  
						</a> <a href="CoronaHelp/detailInfoVolunteer/QkhHaWQzcnBweFU5MDRIMllxY3IzQT09" class="wi_20 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla brdclr_f white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdl trn ffamily_avenir tall padl10 xs-padl20 ">  
						<span class="fright fsz20  " style="color:#6ebdf7"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
						</a> 
						</div>
						</div>
				</div>
			</div>
			
		</div>
		 
	</div>
	</div>	
								
	<div class="column_m padb0  xs-padtb10 talc lgn_hight_22 fsz16 black_bg ">
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl25 padtb20  black_bg" style="width: 1200px !important;">
					<div class="dflex xs-dblock justc_c alit_c fsz26 xs-fsz18 darkgrey_txt padrl30 xs-padrl0">
						<div class="wi_50 xs-wi_100 order_1 xs-order_1 visible-xs">
							<img src="<?php echo $path; ?>html/usercontent/images/image6.jpeg" class="wi_100 hei_auto">
						</div>
						<div class="wi_50 xs-wi_100 bs_bb order_2 xs-order_2 xs-padl0 tall xs-talc">
							<h2 class="padb15 bold fsz75 xxs-fsz54 white_txt lgn_hight_80 xs-lgn_hight_55">Hjälp i Coronakrisen</h2>
							<div class="lgn_hight_35 xs-lgn_hight_30 fsz30 xs-fsz20 white_txt">Hjälp eller be om hjälp! Krishjälpen kopplar de som behöver hjälp med de som har möjlighet att hjälpa.</div>
							<div class="dflex fxwrap_w xxs-justc_c mart15 marl-10 xxs-marl-15">
							<a href="CoronaHelp/detailInfo/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" class="wi_200p hei_45p dflex alit_c justc_c pos_rel zi1 mart15 marl15 brdrad50 txtdec_n xs-padrl15  bold fsz13 xs-fsz16 white_txt" tabindex="0">
								<div class="wi_100 hei_120 opa0_ph pos_abs zi-1 top5 left0 brd brdclr_f xs-nobrd  xs-bg_62cec1 brdrad50 xs-bglgrad_r_46c8ff_81d37e trans_opa2"></div>
								<div class="wi_100 hei_120 opa0 opa1_ph pos_abs zi-1 top5 left0 brdrad50 bglgrad_r_46c8ff_81d37e bg_62cec1 trans_opa2"></div>
								<span class="icofont icofont-download-alt marr5 fsz14"></span>
								Jag behöver hjälp
							</a>
							<a href="CoronaHelp/detailInfoVolunteer/QkhHaWQzcnBweFU5MDRIMllxY3IzQT09" class="wi_200p hei_45p dflex alit_c justc_c pos_rel zi1 mart15 marl15 brdrad50 txtdec_n xs-padrl15  bold fsz13 xs-fsz16 white_txt" tabindex="0">
								<div class="wi_100 hei_120 opa0_ph pos_abs zi-1 top5 left0 brd brdclr_f brdrad50 trans_opa2"></div>
								<div class="wi_100 hei_120 opa0 opa1_ph pos_abs zi-1 top5 left0 brdrad50 bglgrad_r_46c8ff_81d37e bg_62cec1 trans_opa2"></div>
								 Jag vill hjälpa
							</a>
						</div> 
						</div>
						<div class="wi_50 xs-wi_100 padl40 order_2 xs-order_1 hidden-xs">
							<img src="<?php echo $path; ?>html/usercontent/images/image_2020_03_26T16_09_36_577Z.png" class="wi_100 hei_auto">
						</div>
					</div>
				</div>
				
				
				
			</div>
	
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30  marb0  padb30 hidden" id="loginBank" onclick="checkFlag();">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_400p xsi-wi_360p maxwi_100   pos_rel zi5 marrla pad30  xs-pad0   brdrad5  " >
						
							
							
									
						  <div class="padb20 xs-padrl10">
						<div class="wrap maxwi_100 dflex brdrad3">
						<a href="CoronaHelp/detailInfo/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" class="wi_80 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla  white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdr trn ffamily_avenir brdclr_f tall padl30 ">I am a person in need
						  
						</a> <a href="CoronaHelp/detailInfo/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" class="wi_20 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla brdclr_f white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdl trn ffamily_avenir tall padl30 xs-padl20 ">  
						<span class="fright fsz20  " style="color:#6ebdf7"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
						</a> 
						</div>
						</div>
						 
						 <div class="padb20 xs-padrl10">
						<div class="wrap maxwi_100 dflex brdrad3">
						<a href="CoronaHelp/detailInfoVolunteer/QkhHaWQzcnBweFU5MDRIMllxY3IzQT09" class="wi_80 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla  white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdr trn ffamily_avenir brdclr_f tall padl30 ">I would like to be a volunteer
						  
						</a> <a href="CoronaHelp/detailInfoVolunteer/QkhHaWQzcnBweFU5MDRIMllxY3IzQT09" class="wi_20 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla brdclr_f white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdl trn ffamily_avenir tall padl30 xs-padl20 ">  
						<span class="fright fsz20  " style="color:#6ebdf7"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
						</a> 
						</div>
						</div>
					</div>
					</div>
					</div>
					</div>
					 
				</div>
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			
			
			<div class="clear"></div>
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
			<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/visitorsIP.js"></script>
			
			
			
		</body>
	</html>										