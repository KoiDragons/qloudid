<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
			<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
			<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
			
			<!-- Scripts -->
			<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-101260776-1');
			
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
	
	<body class="white_bg">
		
		<?php $path1 = $path."html/usercontent/images/"; ?>
			<div class="column_m header xs-header xsip-header xsi-header bs_bb lgtgrey2_bg">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey2_bg">
					
					<div class="logo marr15 wi_140p xs-wi_80p xxxs-wi_140p">
				<a href="https://www.qloudid.com"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
			</div>
			<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 padt5 xxxs-padt20 xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="../../../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
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
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="sv" onclick="changeLanguage(1);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="sv" onclick="changeLanguage(1);">  Svenska</a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="en" onclick="changeLanguage(0);"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="en" onclick="changeLanguage(0);">  Engelska </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
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
			
					<div class="fright xs-dnone sm-dnone padt10">
						<ul class="mar0 pad0">
							<li class="dblock hidden-xs hidden-sm fright pos_rel brdl "> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
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
					<div class="visible-xs visible-sm fright marr0 padr0 xsi-padt10"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Erbjudande</a> </div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear" id=""></div>
			
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- CONTENT -->
			<div class=" column_m container zi5  mart40 xs-mart20  xsip-mart40 xsi-mart40">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="xs-wi_100 dflex justc_sb alit_c bs_bb marb0  padt2 xs-padt0 xs-lgtgrey_bg">
						<div class="wi_960p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg">
					<div class="wi_240p fleft pos_rel zi50">
					<div class="padrl10">
						
						<!-- Scroll menu -->
						<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
							<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 padt5 white_bg fsz14 brdr_new" id="scroll_menu">
								<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb_b padb20">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
															
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz80 xs-fsz20 brdrad1000 yellow_bg_a panlyellow_bg  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	" id="aa_1227620"> A+ </div> 																<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padtr10 fsz15"> <span>What does this mean?</span>  </div>
															</a></div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>
							
								<ul class="marr20 pad0">
												
												<li class=" dblock  padl8">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
														<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
														<span class="valm trn">Verifiera</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
													</a>
												</li>
												
											</ul>
								<ul class="marr20 pad0">
									<li class="dblock padrb10 padl8">
										<a href="../../About/employeeVerify/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
											<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
											<span class="valm trn">Magazine</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
										</a>
									</li>
									<li class="dblock padrb10 padl8">
												<a href="../../OmOss/storedInfo/<?php echo $data['cid']; ?>" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Om oss</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
												</a>
											</li>
											
											<li class="dblock padrb10 padl8">
												<a href="#" data-id="scroll-section-1" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Karriär</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
												</a>
											</li>
												
											
											<li class="dblock padrb10 padl8 hidden">
												<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Aterförsäljare</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10 padl8 hidden">
												<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Leverantörer</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
								</ul>
										
							
								
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padl20 xs-padl0 xsi-padl0">		
				
					<div class="right_container xs-wi_100">
					<div class="column_m container wi_480p xs-wi_100">
							<!-- Configure Data -->
							<div class="column_m  ">
								
								<div class="column_m pos_rel  padtb0 panlyellow_bg  xs-padrl0 brdrad5 box_shadow">
									<div class="pos_rel bgir_norep bgip_r">
										<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
											<div class="wrap maxwi_100">
												
											</div>
										</div>
										<div class="wrap maxwi_100 minhei_85vh dflex alit_c pos_rel zi2 padtb20 padrl20">
											<div>
												
												<div class="dflex xs-dblock fxwrap_w padb0 xs-padt0 xs-padb0">
													
													<div class="wi_100 xs-wi_100 padtb0  padr20 txt_708198">
														<h2 class="bold marb10 pad0 tall xs-talc fntwei_300 fsz55 sm-fsz32 md-fsz36 lg-fsz40 black_txt xs-fsz30">Om Qmatchup...<div class="wi_50p maxwi_100 hei_4p mart5 xs-marrla black_bg"></div>
														</h2>
														
													</div></div>
											</div>
										</div>
										
									</div>
									
									
									
								</div>
								
								<div class="clear"></div>
							</div>
							<!-- Configure Data -->
							<div class="column_m padt20 ">
							<?php $i=0;  foreach($contentDetail as $category => $value)  { if($i==0) { ?>
							<div class=" bs_bb  <?php if($value['is_active']==0) echo 'hidden'; ?>">
								
								
								
								
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tbody>
										<tr class="odd">
											<td class="wi_100 padtb30 valm talc white_bg box_shadow brdrad5 padrl10 xs-padtb10">
												<div class="padrl30 tall black_txt fsz18 xs-padrl10">
													<h2 class="tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20"><?php echo html_entity_decode($value['heading']); ?></h2>
													
													<?php echo html_entity_decode($value['content']); ?>

 
													
												</div>
												</td>
											
										</tr>
									</tbody>
								</table>
							</div>
							
							
							<?php } else { ?>
							
							
							<div class=" txt_37404a  mart20 brdrad3 <?php if($value['is_active']==0) echo 'hidden'; ?>">
								<div class="wrap maxwi_100 ">
									
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tbody>
											<tr class="odd">
												<td class="wi_100 padtb30 valm talc white_bg box_shadow brdrad5 padrl10 xs-padtb10">
													<div class="padrl30 tall black_txt fsz18 xs-padrl10">
														<h2 class=" tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20"><?php echo html_entity_decode($value['heading']); ?></h2>
														
														




<?php echo html_entity_decode($value['content']); ?>

														
													</div>
													</td>
												
											</tr>
											
											
										</tbody>
									</table>
									
									
								</div>
							</div>
							<?php } $i++; } ?>
							
							</div>
							</div>
							<div class="column_m wi_240p bs_bb padl20 talc hidden-xs">
							<div class="padtb30 brd white_bg talc">
								<div class="marb10 lnkdblue_txt fsz32">1,568</div>
								<div class="marb5 fsz14">Your connections</div>
								<div class="fsz14">
									<a href="#">See all</a>
								</div>
								<div class="padt20">
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/1.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/2.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/3.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/4.jpg" width="36" class="marl-15 brdrad40"></a>
								</div>
							</div>
							
							<div class="mart15 padtb15 brd white_bg talc">
								<form class="padrl10">
									<div class="marb10 fsz14">Add personal contacts</div>
									<input type="text" value="kowaken.ghirmai@qmatchup.com" class="wi_100 hei_32p bs_bb marb10 padrl10 brd brdrad3">
									<button type="submit" class="wi_100 hei_32p marb10 nobrd brdrad3 fsz14 blue_bg white_txt">Continue</button>
								</form>
							</div>
							
						</div>
						
						
							
							
							
							
							<div class="clear"></div>
							</div>
							
							<div class="hei_80p"></div>
			
			
		
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