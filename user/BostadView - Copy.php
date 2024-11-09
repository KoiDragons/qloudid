<!doctype html>
<html class="white_bg">
	<?php $path1 = $path."html/usercontent/images/"; ?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/css/icofont.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/css/modules.css" />
		
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/web.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="../../html/smart/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
		</script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
		function changeHeight(id)
		{
		
	$("#ember"+id).attr('style','height:;')
		
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
			
			function changeClass(link)
			{
				
				if($(link).hasClass('active'))
				{
					$(link).removeClass('active');
					$(".class-toggler").removeClass('active');
				}	
				else
				{
					$(".class-toggler").removeClass('active');
					$(link).addClass('active');
				}
			}
		</script>
		
	</head>
	
	<body class="fsz14 white_bg">
		
			<?php include 'UserHeaderUpdated.php'; ?><div class="clear" id=""></div>
		<div class="column_m container zi5 mart40 xs-mart20 white_bg" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 white_bg">
			<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt"><?php echo $row_summary['last_name']; ?></a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz40 xs-fsz30 sm-fsz30 
														bold"><?php echo $row_summary['first_name']; ?></a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									
									
									
									<ul class="marr20 pad0">
										
										<li class=" dblock padrb10  padl8">
											<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Delade uppgifter </span><span class="counter_position"><?php echo $receivedAllCount; ?></span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
										<li class=" dblock padrb10  padl8">
											<a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar </span> 
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
									
										
									</ul>
									
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										<li class=" dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Mitt ID Skydd...</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="StoreData/userAccount" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Mina uppgifter</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="AboutQmatchupOmOss" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Mitt ID Skydd</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="GetVerified/userAccount" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Mitt s&auml;kerhetsl&aring;s</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li>
										
										<!-- Company -->
										<li class=" dblock pos_rel padtb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase bold ff-sans black_txt trn bold">GÅ TILL DIN...</h4>
											<ul class="marr20 pad0">
												
												
												
												<li class="dblock padrb10">
													<a href="Arbetsplats" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Arbetsplats </span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="Bostad" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Bostad</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="Skola" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Skola</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="Leverantor" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Leverantör</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										
										
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
			
					
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xsi-padl0 padl20 xs-padl5">
				
				
				<div class="column_m container zi1 padb5">
								<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								
								
								<div class="white_bg tall">
								
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Personal apps info.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
									<div class="hidden-xs hidden-sm padrl10">
									<a href="#" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt " >
										
										<span class="valm"> Kom igång </span>
									</a> <a href="Bostad/minBostad"><span class="fas fa-cog fsz22 padl10 lgn_hight_29 valm"></span></a>
								</div>
								
									
								</div>
							</div>
							
				<!-- BEST SCREENSHOT -->
		<div class="column_m pos_rel">
								
								<div class="column_m pos_rel  padtb0 bostad_bg  xs-padrl0">
									<div class="pos_rel bgir_norep bgip_r">
										<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
											<div class="wrap maxwi_100">
												
											</div>
										</div>
										<div class="wrap maxwi_100 minhei_85vh dflex alit_c pos_rel zi2 padtb20 padrl20">
											<div>
												
												<div class="dflex xs-dblock fxwrap_w padb0 xs-padt0 xs-padb0">
													<div class="wi_50 xs-wi_100 sm-wi_50 xsip-wi_50 order_2 padrl10">
														<img src="https://www.safeqloud.com/html/smartappcss/images/smart/design-1.png" width="642" height="439" class="maxwi_100 hei_auto">
													</div>
													<div class="wi_50 xs-wi_100 sm-wi_50 xsip-wi_50 padtb0  padr20 txt_708198">
														<h2 class="bold marb20 pad0 tall xs-talc fntwei_300 fsz55 sm-fsz32 md-fsz36 lg-fsz40 black_txt xs-fsz30">Ditt digitala boende.<div class="wi_50p maxwi_100 hei_4p mart5 xs-marrla black_bg"></div>
														</h2>
														
														<ul class="mar0 pad0 tall fsz18 black_txt">
															<li class="wi_100 dflex marb15 first">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																Anslut till din brf eller hyresvärd</div>
															</li>
															<li class="wi_100 dflex marb15">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																Få tillgång till appar </div>
															</li>
															<li class="wi_100 dflex marb15">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																	Kommunicera med grannar
																</div>
															</li>
															<li class="wi_100 dflex marb15 last">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																	Håll dig uppdaterad

																</div>
															</li>
														</ul>
													</div></div>
											</div>
										</div>
										
									</div>
									
									
									
								</div>
								
								<div class="clear"></div>
							</div>
		
		
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " onclick="checkFlag();">
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt20 xs-padt0 white_bg  brdb_new tall">
				
				<section class=" section  whats-new xs-padt0">
					<div class="section__nav section__nav--small">
						<h2 class="whats-new__headline">Presentation</h2>
						
					</div>
					<div class="l-row whats-new__content ">
						
						<div class="l-column small-12 medium-9 xsip-medium-9 large-8a small-valign-top">
							<h4 id="ember291" class=" we-truncate we-truncate--multi-line we-truncate--interactive ember-view supports-list__item__copy__description">    

      <div data-clamp="" id="ember293" class="we-clamp ember-view fsz16" ismorertl="false" style="height: 60px; -webkit-mask: linear-gradient(0deg, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0) 16.0009px, rgb(0, 0, 0) 16.0009px), linear-gradient(270deg, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0) 22.7077px, rgb(0, 0, 0) 54.7095px);"><?php echo html_entity_decode($getAppsPermissionDetail['presentation']); ?>
</div>

  


    <button aria-hidden="true" class="we-truncate__button link" data-ember-action="" data-ember-action-356="356" onclick="changeHeight(293);">
      View
    </button>
</h4>
							
							
						</div>
					</div>
				</section>
				
			</div>		
			
		</div>
		
		
	
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " onclick="checkFlag();">
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt20 xs-padt0 white_bg  brdb_new tall">
				
				<section class=" section  whats-new xs-padt0">
					<div class="section__nav section__nav--small">
						<h2 class="whats-new__headline">Funktioner</h2>
						
					</div>
					<div class="l-row whats-new__content">
						
						<div class="l-column small-12 medium-9 large-8a small-valign-top">
							<div id="ember239" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view">    
								
								<div data-clamp="" id="ember241" class="we-clamp ember-view fsz14">
								  <?php echo html_entity_decode($getAppsPermissionDetail['funktioner']); ?>
									
									
									
								</div>
								
								
								
								
							<!----></div>
						</div>
					</div>
				</section>
				
			</div>		
			
		</div>
		
		
		
		
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " onclick="checkFlag();">
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt20 xs-padt0 white_bg  brdb_new tall">
				
				<section class=" section  whats-new xs-padt0">
					<div class="section__nav section__nav--small">
						<h2 class="whats-new__headline">Nyheter</h2>
						<div id="ember237" class="ember-view version-history">  <button class="we-modal__show link" id="modal-trigger-ember237" data-ember-action="" data-ember-action-238="238">Uppdateringshistorik</button>
							
						<!----></div>
					</div>
					<div class="l-row whats-new__content">
						<div class="l-column small-12 medium-3 large-4 small-valign-top whats-new__latest">
							<div class="l-row">
								<time data-test-we-datetime="" datetime="4 mar 2019" aria-label="4 mars 2019" class="">4 mar 2019</time>
								<p class="l-column small-6 medium-12 whats-new__latest__version">Version 7.13.0</p>
							</div>
						</div>
						<div class="l-column small-12 medium-9 large-8 small-valign-top">
							<div id="ember239" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view">    
								
								<div data-clamp="" id="ember241" class="we-clamp ember-view fsz14">  
								 <?php echo html_entity_decode($getAppsPermissionDetail['nyheter']); ?>
								</div>
								
								
								
								
							<!----></div>
						</div>
					</div>
				</section>
				
			</div>		
			
		</div>
		
		
		
		
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " onclick="checkFlag();">
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt20 xs-padt0 white_bg  brdb_new tall">
				<section class="section xs-padt0">
					<div class="section__nav">
						<h2 class="section__headline">Betyg och recensioner</h2>
					</div>
					<div id="ember244" class="we-customer-ratings lockup ember-view"><div class="l-row">
						<div class="we-customer-ratings__stats l-column small-4 medium-6 large-4">
							<div class="we-customer-ratings__averages"><span class="we-customer-ratings__averages__display">3,7</span> av 5</div>
							<div class="we-customer-ratings__count small-hide medium-show">1,5&nbsp;tn betyg</div>
						</div>
						<div class=" l-column small-8 medium-6 large-4">
							<figure class="we-star-bar-graph">
								<div class="we-star-bar-graph__row">
									<span class="we-star-bar-graph__stars we-star-bar-graph__stars--5"></span>
									<div class="we-star-bar-graph__bar">
										<div class="we-star-bar-graph__bar__foreground-bar" style="width: 48%;"></div>
									</div>
								</div>
								<div class="we-star-bar-graph__row">
									<span class="we-star-bar-graph__stars we-star-bar-graph__stars--4"></span>
									<div class="we-star-bar-graph__bar">
										<div class="we-star-bar-graph__bar__foreground-bar" style="width: 15%;"></div>
									</div>
								</div>
								<div class="we-star-bar-graph__row">
									<span class="we-star-bar-graph__stars we-star-bar-graph__stars--3"></span>
									<div class="we-star-bar-graph__bar">
										<div class="we-star-bar-graph__bar__foreground-bar" style="width: 10%;"></div>
									</div>
								</div>
								<div class="we-star-bar-graph__row">
									<span class="we-star-bar-graph__stars we-star-bar-graph__stars--2"></span>
									<div class="we-star-bar-graph__bar">
										<div class="we-star-bar-graph__bar__foreground-bar" style="width: 8%;"></div>
									</div>
								</div>
								<div class="we-star-bar-graph__row">
									<span class="we-star-bar-graph__stars "></span>
									<div class="we-star-bar-graph__bar">
										<div class="we-star-bar-graph__bar__foreground-bar" style="width: 19%;"></div>
									</div>
								</div>
							</figure>
							<h5 class="we-customer-ratings__count medium-hide">1,5&nbsp;tn betyg</h5>
						</div>
					</div>
					</div>
					<div class="l-row l-row--peek">
						
						<div id="ember252" class="ember-view small-valign-top l-column--equal-height l-column small-4 medium-6 large-4"><div id="ember253" class="ember-view"><!---->
						<!----></div>
						
						
						<div id="ember254" class="we-customer-review lockup ember-view"><figure aria-label="5 av 5" id="ember255" class="we-star-rating ember-view we-customer-review__rating we-star-rating--large"><span class="we-star-rating-stars-outlines">
							<span class="we-star-rating-stars we-star-rating-stars-5"></span>
						</span>
						<!----></figure>
						
						<div class="we-customer-review__header we-customer-review__header--user">
							<span dir="ltr" id="ember256" class="we-truncate we-truncate--single-line ember-view we-customer-review__user">  Flöjtsprutan
							</span>
							
							<span class="we-customer-review__separator">, </span>
							
							<time data-test-customer-review-date="" datetime="2017-06-29" aria-label="29 juni 2017" class="we-customer-review__date">2017-06-29</time>
						</div>
						
						<h3 dir="ltr" id="ember257" class="we-truncate we-truncate--single-line ember-view we-customer-review__title">  Fungerar alltid.
						</h3>
						
						<div id="ember258" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view we-customer-review__body">    
							
							<div data-clamp="" id="ember260" class="we-clamp ember-view" ismorertl="false" style="height: 72px; -webkit-mask: linear-gradient(0deg, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0) 18.0001px, rgb(0, 0, 0) 18.0001px), linear-gradient(270deg, rgba(0, 0, 0, 0) 0px, rgba(0, 0, 0, 0) 24.6px, rgb(0, 0, 0) 60.6002px);">    <p dir="ltr">Jag måste gå emot strömmen och säga att jag känner verkligen inte igen mig i att appen strular. Tvärtom så har den alltid fungerar för mig, i ur och skur, ända sedan den första gången släpptes. </p>
								<br>
								<p dir="ltr">BankID i mobilen har verkligen inneburit en stor förändring i vår vardag och jag tycker att man skall vara tacksamma mot utvecklarna av appen. Om den strular för er så kanske ni borde se över om det kan finnas andra orsaker till era problem. </p>
								<br>
								<p dir="ltr">För mig fungerar appen precis som den ska även efter uppdateringar. Värt att säga är kanske att jag har en iPhone 6+. Möjligen har de nyare modellerna någon form av problem som vi med äldre modeller inte märker av.</p>
								
							</div>
							
							
							
							
							<button aria-hidden="true" class="we-truncate__button link" data-metrics-click="{&quot;actionType&quot;:&quot;more&quot;,&quot;targetType&quot;:&quot;button&quot;,&quot;targetId&quot;:&quot;more&quot;}" data-ember-action="" data-ember-action-370="370">
								Mer
							</button>
						</div>
						<!----></div>
						
						</div>
						
						
						<div id="ember268" class="ember-view small-valign-top l-column--equal-height l-column small-4 medium-6 large-4 hidden-xsi hidden-xsip"><div id="ember269" class="ember-view"><!---->
						<!----></div>
						
						
						<div id="ember270" class="we-customer-review lockup ember-view"><figure aria-label="1 av 5" id="ember271" class="we-star-rating ember-view we-customer-review__rating we-star-rating--large"><span class="we-star-rating-stars-outlines">
							<span class="we-star-rating-stars we-star-rating-stars-1"></span>
						</span>
						<!----></figure>
						
						<div class="we-customer-review__header we-customer-review__header--user">
							<span dir="ltr" id="ember272" class="we-truncate we-truncate--single-line ember-view we-customer-review__user">  zzzSv
							</span>
							
							<span class="we-customer-review__separator">, </span>
							
							<time data-test-customer-review-date="" datetime="2017-06-20" aria-label="20 juni 2017" class="we-customer-review__date">2017-06-20</time>
						</div>
						
						<h3 dir="ltr" id="ember273" class="we-truncate we-truncate--single-line ember-view we-customer-review__title">  Hänger sig
						</h3>
						
						<div id="ember274" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view we-customer-review__body">    
							
							<div data-clamp="" id="ember276" class="we-clamp ember-view">    <p dir="ltr">Det hänger sig. Alltid</p>
								
							</div>
							
							
							
							
						<!----></div>
						<!----></div>
						
						</div>
						
						
						<div id="ember280" class="ember-view small-valign-top l-column--equal-height l-column small-4 medium-6 large-4 hidden-xsi hidden-xsip"><div id="ember281" class="ember-view"><!---->
						<!----></div>
						
						
						<div id="ember282" class="we-customer-review lockup ember-view"><figure aria-label="1 av 5" id="ember283" class="we-star-rating ember-view we-customer-review__rating we-star-rating--large"><span class="we-star-rating-stars-outlines">
							<span class="we-star-rating-stars we-star-rating-stars-1"></span>
						</span>
						<!----></figure>
						
						<div class="we-customer-review__header we-customer-review__header--user">
							<span dir="ltr" id="ember284" class="we-truncate we-truncate--single-line ember-view we-customer-review__user">  Fringing awesome
							</span>
							
							<span class="we-customer-review__separator">, </span>
							
							<time data-test-customer-review-date="" datetime="2017-11-09" aria-label="9 november 2017" class="we-customer-review__date">2017-11-09</time>
						</div>
						
						<h3 dir="ltr" id="ember285" class="we-truncate we-truncate--single-line ember-view we-customer-review__title">  TouchBankID bäst of the bäst
						</h3>
						
						<div id="ember286" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view we-customer-review__body">    
							
							<div data-clamp="" id="ember288" class="we-clamp ember-view">    <p dir="ltr">FaceId fungerar Inte fyfan aså</p>
								
							</div>
							
							
							
							
						<!----></div>
						<!----></div>
						
						</div>
						
						
					</div>
					<div class="l-row l-row--margin-top medium-hide">
						
						<!---->          
						
						<!---->          
						
						<!---->          
						
						<!---->          
						
						<!---->          
						
					</div>
				</section>
			</div>
		</div>
		
		
				</div>
				
			</div>
			
			
			
		</div>
		
		
		
		
		<script type="text/javascript" src="<?php echo $path;?>html/smart/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/smart/js/superfish.js"></script>
		
		<script type="text/javascript" src="<?php echo $path;?>html/smart/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/smart/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/smart/js/custom.js"></script>
	</body>
	
</html>