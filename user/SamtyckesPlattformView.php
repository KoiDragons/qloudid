<!doctype html>
<html>
	<head>
		<meta name="google-site-verification" content="fAZkhLH9sxgymYB5B7htwd1QSN8AXDY-6BP8UfGr68c" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/animated/images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/modules.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/jquery.bxslider.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/icofont.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylewrap.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<title>Qmatchup</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" async src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		<script>
			function submitForm()
			{
				if($("#message").val()=="")
				{
					alert("please enter company name");
					return false;
				}
				$("#save_indexing").submit();
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
	<body class="white_bg">
		<?php $path1 = $path."html/usercontent/images/"; 
		
		include 'UserPublicHeader.php';
		?>
		
		
		
		<div class="column_m header xs-header  bs_bb white_bg hidden">
			<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10  white_bg">
				
				<div class="logo marr15 wi_140p xs-wi_80p">
					<a href="https://www.safeqloud.com"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
				</div>
				<div class="visible-xs visible-sm fleft">
					<div class="flag_top_menu flefti  padb10 " style="width: 50px; padding : 5px 0 0 0;">
						<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
							
							<li class="first last" style="margin: 0 30px 0 0;">
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
									</li></ul>
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
				
				<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16 sf-js-enabled sf-arrows">
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue first"> <a href="https://www.safeqloud.com/user/index.php/safeqloudPersonal" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h " data-en="Privat" data-sw="Privat">Privat</a> </li>
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/user/index.php/CorporateServices" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Företag" data-sw="Företag">Företag</a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/user/index.php/PublicNews"  class="ranslate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Partners" data-sw="Partners">Partners</a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue hidden"> <a href="https://www.safeqloud.com/user/index.php/InformRelatives" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="sos" data-sw="sos">NOTIFY <span class="fa fa-heart red_txt"></span> F&F </a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_lgrey2 lgtgrey2_bg brdrad5 marl20 "> <a href="https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/N0ZvS0gycGRubUx4MlpxeTJNY1czZz09" id="usermenu_singin" class="translate hei_30pi dblock padrl20   lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 last"> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt  white_txt_h  brdl" data-en="Logga in" data-sw="Logga in">Logga in</a> </li>
					</ul>
				</div>
				
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3 "> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
		
		
		
		<!-- NEW BANNER -->
		<div class="column_m pos_rel white_bg marb40 " onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl40  xs-padrl0">
				
				
				<h2 class="marb10 pad0 talc bold fsz45 xs-fsz25  txt_234961 padt30 padrl20 ">Samtyckesplattform</h2>
						<div class="marrla marb10 talc fsz25 xs-fsz18 txt_7 padrl20 ">Välkommen till en ny digital samtyckeskultur där företag, föreningar och privatpersoner samlas och utbyter information på lika villkor.  </div>
						
			</div>
		</div>
		<div class="column_m pos_rel white_bg padtb0 hidden" onclick="checkFlag();">
			<div class="pos_rel bgir_norep bgip_r">
				<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
					<div class="wrap maxwi_100">
						
					</div>
				</div>
				
				<div class="wrap maxwi_100 minhei_100vh dflex alit_c pos_rel zi2 padtb30 brdb_new">
					<div>
						<h2 class="marb10 pad0 talc bold fsz45 xs-fsz25  txt_234961">Samtyckesplattform</h2>
						<div class="marrla marb30 talc fsz25 xs-fsz18 txt_7">Välkommen till en ny digital samtyckeskultur där företag, föreningar och privatpersoner samlas och utbyter information på lika villkor.  </div>
						<div class="dflex xs-dblock fxwrap_w padtb30">
							<div class="wi_60 xs-wi_100 order_2 padrl10">
								<img src="https://www.dropbox.com/s/qmnft2wbo5ll2d5/how-it-works-wealthy-in.png?raw=1" width="642" height="439" class="maxwi_100 hei_auto">
							</div>
							<div class="wi_40 xs-wi_100 order_1 padrl10 lgn_hight_s15 fsz14">
								<div class="wi_100 dflex alit_fs martb10">
									
									<div class="flex_1 padb25 brdb_new">
										<h3 class="marb10 pad0 bold fsz22">Assess savings for the year</h3>
										<div>Calculate how much you can still save with Wealthy in this year of the total Rs 1.5 lakh limit under the section 80C</div>
									</div>
								</div>
								<div class="wi_100 dflex alit_fs martb10">
									
									<div class="flex_1 padb25 brdb_new">
										<h3 class="marb10 pad0 bold fsz22">Invest without paperwork</h3>
										<div>Easy investing with our online (KYC) and paper-less application. Choose one-time or monthly (SIP) payment.</div>
									</div>
								</div>
								<div class="wi_100 dflex alit_fs martb10">
									
									<div class="flex_1 padb25">
										<h3 class="marb10 pad0 bold fsz22">Track investments</h3>
										<div>Monitor the performance of your investments online and withdraw directly to your bank account.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
		</div>
		
		<div class="column_m  xs-padtb10 talc mart0 marb0 fsz16 lgtgrey2_bg" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl10  xs-padt0 xs-padrl25">
				
				
				
				
				<div class="dflex xs-fxwrap_w alit_c padt30 ">
					
					
					<div class="wi_50 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 talc white_bg ">
						
						
						<div class="wi_100 xs-wi_100 bs_bb  tall">
							<img src="../../html/usercontent/images/random/Subhero_1_medium_600x470.jpg" class="wi_100 hei_auto">
						</div>
						
						
					</div>
					<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall mart10 brdrad5 talc padl0 xs-padr0">
						
						<div class="wi_100 xs-wi_100 bs_bb pad40 tall xs-padrl0 and xs-padtb20">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="#" class="marr5 black_txt">En plattform för alla</a>
							</div>
							<h2 class="padb15 bold fsz30 xs-fsz22 darkgrey_txt lgn_hight_40">Allt på ett ställe</h2>
							<div class="lgn_hight_30 fsz22 xs-fsz18">ISamtyckesplattformen styr du din information och kan dela med dig till din arbetsgivare, skola, bostadsrätt eller de företag och privatpersoner som du vill ska ha tillgång. Du kan när som helst återkalla ett samtycke när du inte längre anser det ligger i dit intresse att dela med dig. </div>
							
							<div class="mart20 tall hidden"> 
								<a href="#"><input type="button" value="En plattform för alla" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h  brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
					
					
					
					
				</div>
				
				
				<div class="dflex xs-fxwrap_w alit_c padt0 marb0">
					
					
					<div class="wi_50 xs-wi_100 flex_1 order_1 xs-order_2 xs-tall tall mart10 brdrad5 talc">
						
						
						<div class="wi_100 xs-wi_100 bs_bb pad40 tall xs-padrl0 and xs-padtb20">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="#" class="marr5 black_txt">En kultur som utvecklas</a>
							</div>
							<h2 class="padb15 bold fsz30 xs-fsz22 darkgrey_txt lgn_hight_40">Skicka och ta emot förfrågan</h2>
							<div class="lgn_hight_30 fsz22 xs-fsz18">När du är osäker på annan part på nätet, begär samtycke för att få tillgång till motpartens Qloud ID. När någon vill ha tillgång till information om dig, ge samtycke till delning av ditt Qloud ID.  </div>
							<div class="mart20 tall hidden"> 
								<a href="#"><input type="button" value="En kultur som utvecklas" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
						
						
					</div>
					<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc padl0 xs-padr0">
						<div class="wi_100 xs-wi_100 bs_bb  tall">
							<img src="../../html/usercontent/images/random/Subhero_2_medium_600x470.jpg" class="wi_100 hei_auto">
						</div>
						
					</div>
					
				</div>
				
				<div class="dflex xs-fxwrap_w alit_c mart0 ">
					
					
					<div class="wi_50 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 talc white_bg">
						
						
						<div class="wi_100 xs-wi_100 bs_bb  tall">
							<img src="../../html/usercontent/images/random/Subhero_1_medium_600x470.jpg" class="wi_100 hei_auto">
						</div>
						
						
					</div>
					<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall mart10 brdrad5 talc padl0 xs-padr0">
						
						<div class="wi_100 xs-wi_100 bs_bb pad40 tall xs-padrl0 and xs-padtb20">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="#" class="marr5 black_txt">En kultur som utvecklas</a>
							</div>
							<h2 class="padb15 bold fsz30 xs-fsz22 darkgrey_txt lgn_hight_40">Samlade samtycken</h2>
							<div class="lgn_hight_30 fsz22 xs-fsz18">Alla dina skickade, mottagna och godkända förfrågningar om samtycke finns samlade på ett ställe vilket ger dig ditt egna GDPR- anpassade verktyg. Du har en överblick och kan styra till vilka du väljer att dela löpande eller vid enstaka tillfällen.  </div>
							<div class="mart20 tall hidden"> 
								<a href="#"><input type="button" value="Mer om Krishantering" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h  brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
					</div>
					
					
					
					
				</div>
				<div class="dflex xs-fxwrap_w alit_c padt0 padb30">
					
					
					<div class="wi_50 xs-wi_100 flex_1 order_1 xs-order_2 xs-tall tall mart10 brdrad5 talc">
						
						
						<div class="wi_100 xs-wi_100 bs_bb pad40 tall xs-padrl0 and xs-padtb20">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="#" class="marr5 black_txt">En kultur som utvecklas</a>
							</div>
							<h2 class="padb15 bold fsz30 xs-fsz22 darkgrey_txt lgn_hight_40">Historik och status</h2>
							<div class="lgn_hight_30 fsz22 xs-fsz18">Du får statusrapportering på alla dina skickade och mottagna förfrågningar. Du kan följa om en säljande part undvikit att identifiera sig innan köp, eller om du har obesvarade förfrågningar att hantera. </div>
							<div class="mart20 tall hidden"> 
								<a href="#"><input type="button" value="Mer om Besökssysstem" class="padl20 nobrd wi_60 maxwi_500p minhei_50p dflex  alit_c opa90_h brdrad3 panlyellow_bg fsz20 xs-fsz16 darkgrey_txt trans_all2 tall"></a>
							</div>
						</div>
						
						
					</div>
					<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc padl0 xs-padr0">
						<div class="wi_100 xs-wi_100 bs_bb  tall">
							<img src="../../html/usercontent/images/random/Subhero_2_medium_600x470.jpg" class="wi_100 hei_auto">
						</div>
						
					</div>
					
				</div>
				
				
				<div class="clear"></div>
			</div>
			
			
			
			
			
		</div>
		
	<div class="column_m mart30 xs-padtb10 talc lgn_hight_22 fsz16 ">
			<div class="wrap maxwi_100 padrl10 xs-padrl25 white_bg brdb_new xs-nobrdb padb30">
				
				<div class="dflex xs-fxwrap_w alit_c">
					<div class="wi_50 dflex xs-fxdir_col alit_s xs-alit_c justc_c marr20 xs-marr0 lgtgrey2_bg xs-wi_100">
						
						<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
						<div class="wi_50 xs-wi_100 maxwi_400p flex_1 pad15 fsz16 tall order_1 xs-order_2">
							<span class="icon icon2"></span>
							
							
							<h4 class="bold fsz28 padt10">Äg kontroll. Anslut.</h4>
							<p>Skapa anslutningar till din skola, arbetsgivare eller hyresvärd. Genom att ansluta ditt Qloud ID ger du dem inte bara tillgång till den information de behöver om dig, du får själv möjlighet att ta del av förmåner. </p>
							
						</div>
						<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
						<div class="wi_33 xs-wi_100 maxwi_400p flex_1 xs-brdb padr30 xs-padr0 order_2 xs-order_1">
							<span class="icon icon1"></span>
							<img src="../../html/usercontent/images/random/Tekniker_Ny_Taggad_375x450.png" class="wi_100 hei_auto dblock marb10">
							
							
							
						</div>
					</div>
					
					<div class="wi_50 dflex xs-fxdir_col alit_s xs-alit_c justc_c mart0 lgtgrey2_bg xs-wi_100">
						
						<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
						<div class="wi_50 xs-wi_100 maxwi_400p flex_1 pad15 fsz16 tall order_1 xs-order_2">
							<span class="icon icon2"></span>
							
							<h4 class="bold fsz28 padt10">Begär verifiering</h4>
							<p>När du ska göra en transaktion med en okänd part på nätet kan du be om verifiering. När motparten har verifierat sig (efter samtycke) så kan du försäkra dig om att det är en äkta identitet du handskas med.  </p>
							
						</div>
						<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
						<div class="wi_33 xs-wi_100 maxwi_400p flex_1 xs-brdb padr30 xs-padr0 order_2 xs-order_1 ">
							<span class="icon icon1"></span>
							<img src="../../html/usercontent/images/random/Subhero_Radgivare_375x450.png" class="wi_100 hei_auto dblock marb10">
							
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="column_m mart30 xs-padtb10 talc lgn_hight_22 fsz16  lgtblue2_bg hide">
			<div class="wrap maxwi_100 padrl10 ">
				
				
				<h2 class="marb10 pad0 talc bold fsz45 xs-fsz25  txt_234961 padt30">Tillsammans skapar vi en ny kultur</h2>
						<div class="marrla marb10 talc fsz25 xs-fsz18 txt_7">Vi vill känna oss trygga med att vår personliga information förblir personlig och inte missbrukas eller stjäls av någon okänd individ. Vi har levt i en tid där stora, multinationella företag betraktar vår mest personliga information som en handelsvara.</div>
						<div class="marrla marb30 talc fsz25 xs-fsz18 txt_7">Men nu vill vi bestämma vem som får tillgång till vår personliga information. Endast de vi lämnar samtycke till ska ha möjlighet att få tillgång till vår personliga information. </div>
			</div>
		</div>
		
		<div class="column_m martb30 xs-padtb10 talc lgn_hight_22 fsz16 white_bg hide">
			<div class="start-perks column_m martb30 xs-padtb10 talc lgn_hight_22 fsz16 ">
				
				<div class="wrap maxwi_100 padrl10">
					
					<div class="padb15 mart20 tall">
						<h3 class="padb10  fsz32 black_txt"><a href="#" class="black_txt padb10 bold">Chefer får...</a></h3>
						<div class="dflex alit_fs justc_sb brdb_new">
							<span class="flex_1  padb10 fsz18">Convince investors by demonstrating your understanding of how to build a scaling company.</span>
							<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd">
								<span class="fa fa-plus dblock dnone_pa"></span>
								<span class="fa fa-minus dnone dblock_pa"></span>
							</a>
						</div>
						
						
						
					</div>
					<div class="wi_100 dflex fxwrap_w alit_s xs-alit_c justc_c pos_rel mart30">
						<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr_new  xs-nobrdr brdb_new">
							<img src="../../html/usercontent/images/workplace/5.png" class="wi_100 hei_auto dblock marb10">
							<h3 class="lgn_hight_s12 bold fsz20 padt10"> FAQ Nätverket</h3>
							<p>Här kan personer med samma roll som du ställa eller/och svara på frågor till varandra. Alla frågor och svar är anonyma och endast för medlemmar. Och inga utomstående kommer kunna ta del av de och ringa för att sälja. </p>
						</div>
						<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr_new  sm-nobrdr xs-nobrdr brdb_new">
							<img src="../../html/usercontent/images/workplace/2.png" class="wi_100 hei_200p dblock marb10 padrl20">
							<h3 class="lgn_hight_s12 bold fsz20 padt10">Trendwatch</h3>
							<p>Trendwatch är en PublicistPlatform för företag, myndigheter eller organisationer som önskar sprida kunskap digitalt. I dagsläget har vi ca 7000 anslutna källor och drygt 30 000 artiklar indexerade inom olika områden.</p>
							<a href="#" class="martrl5 dblue_btn">Submit</a>
						</div>
						<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15   xs-nobrdr brdb_new">
							<img src="../../html/usercontent/images/workplace/3.png" class="wi_90 hei_auto dblock marb10 padl25">
							<a href="#"><h3 class="lgn_hight_s12 bold fsz20 padt10">Appar &amp; Mallar</h3></a>
							<p>Apparna går under forskning och framsteg och är utvecklade i samråd och/eller efter förfrågan från våra kunder. Apparna är indelade i kategorier och arbetsprocesser.</p>
						</div>
						<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr_new  sm-nobrdr xs-nobrdr ">
							<img src="../../html/usercontent/images/workplace/4.png" class="wi_100 hei_auto dblock marb20 mart5">
							<a href="#"><h3 class="lgn_hight_s12 bold fsz20 padt10">Smarta Inköp</h3></a>
							<p>Smarta inköp är en serie av konceptlösningar i samarbete med tusentals kvalificerade leverantörer och färdigutveckladeköpprocesser. Under Smart Inköp hittar våra kunder rätt leverantör snabbt.</p>
						</div>
						<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr_new  xs-nobrdr ">
							<img src="../../html/usercontent/images/workplace/5.png" class="wi_100 hei_auto dblock marb10">
							<h3 class="lgn_hight_s12 bold fsz20 padt10">Karriärsdrag</h3>
							<p>Här listas karriärmöjligheter som efterfrågas av övriga medlemmar. Typiska kan vara konsultation, styrelsearbete, mentorskap och föreläsning. Många av våra medlemmar utvecklar sitt eget nätverk här. </p>
						</div>
						<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15   sm-nobrdr xs-nobrdr ">
							<img src="../../html/usercontent/images/workplace/6.png" class="wi_100 hei_200p dblock marb10 padrl20">
							<h3 class="lgn_hight_s12 bold fsz20 padt10">Förmåner</h3>
							<p>Med jämna mellanrum tecknar vi fördelaktiga avtal som våra medlemmar får göra avrop på. Rabatterna upp till 90% har förhandlats. Vi tecknar endast avtal med leverantörer som är till intresse för våra medlemmar.</p>
						</div>
						
						
					</div>	
					<!--<div class="padt10">
						<a href="#" class="wi_200p maxwi_100 mart20 marrl5 dblue_btn">Så fungerar det att fakturera</a>
						<a href="#" class="wi_200p maxwi_100 mart20 marrl5 dblue_btn">Skapa faktura</a>
					</div>-->
				</div>
			</div>
		</div>
		
		<div class="column_m martb30 xs-padtb10 talc lgn_hight_22 fsz16 lgtgrey2_bg hide">
			<div class="wrap maxwi_100 padrl10">
				<div class="padb15 mart20 tall">
					<h3 class="padb10  fsz32 black_txt"><a href="#" class="black_txt padb10 bold">Chefer kan arbeta...</a></h3>
					<div class="dflex alit_fs justc_sb brdb">
						<span class="flex_1  padb10 fsz18">Convince investors by demonstrating your understanding of how to build a scaling company.</span>
						<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd">
							<span class="fa fa-plus dblock dnone_pa"></span>
							<span class="fa fa-minus dnone dblock_pa"></span>
						</a>
					</div>
					
				</div>
				
				<div class="wi_100 dflex xs-fxdir_col alit_s xs-alit_c justc_c mart30">
					<div class="wi_33 xs-wi_100 maxwi_400p flex_1 xs-brdb pad15 brdr">
						<span class="icon icon1"></span>
						<img src="../../html/usercontent/images/workplace/8.png" class="wi_100 hei_auto dblock marb10">
						<h4 class="bold fsz18 padt10">Solo</h4>
						<p>Nivå Chef - innebär att endast du har tillgång till "Chefs" utbudet i nätverket. Du kommer få tillgång till den delen av utbud som endast berör chefer och företagsledare. </p>
						
					</div>
					<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
					<div class="wi_33 xs-wi_100 maxwi_400p flex_1 pad15 brdr">
						<span class="icon icon2"></span>
						<img src="../../html/usercontent/images/workplace/1.png" class="wi_100 hei_auto dblock marb10">
						<h4 class="bold fsz18 padt10">Med sitt team</h4>
						<p>Nivå team - innebär att Produkt &amp; Förmåns utbud utökas till "Chef&amp;Team". Du kan anpassa utbudet för varje teammedlem. Förmånshantering ingår </p>
						
					</div>
					<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
					<div class="wi_33 xs-wi_100 maxwi_400p flex_1 padtb0">
						<span class="icon icon3"></span>
						<img src="../../html/usercontent/images/workplace/7.png" class="wi_80 hei_auto dblock marb10 padl30 padt10">
						<h4 class="bold fsz18 padt10">Med hela företaget</h4>
						<p>Nivå Företag - innebär att du har full åtkomst till hela utbudet. Som chef har du en flexibel position och kan tillgång till fler produkter samt förmåner för dig och ditt företag. </p>
						
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="container zi5 white_bg hide">
			
			
			
			<!-- Section 1 -->
			
			
			<!-- Section 2 -->
			<div class="ovfl_hid mart30 padrl10">
				<div class="wrap maxwi_100 padtb30 brdb">
					<div class="dflex fxwrap_w justc_c alit_c marrl-20 talc fsz13 txt_85">
						<div class="wi_33 xs-wi_100 marb30 padrl20">
							<img src="<?php echo $path; ?>html/search/images/icons/tfg-1.png" width="60" height="60" class="dblock marrla marb20" title="Fully customizable" alt="Fully customizable" />
							<h4 class="fsz20 txt_37404a">Fully customizable</h4>
							<div class="lgn_hight_25 letspc_03">Match your survey to your event's style. Easily change questions, colors, images, and more.</div>
						</div>
						<div class="wi_33 xs-wi_100 marb30 padrl20">
							<img src="<?php echo $path; ?>html/search/images/icons/tfg-2.png" width="60" height="60" class="dblock marrla marb20" title="Mobile-ready" alt="Mobile-ready" />
							<h4 class="fsz20 txt_37404a">Mobile-ready</h4>
							<div class="lgn_hight_25 letspc_03">Delight your attendees with a beautiful survey they can take on the go, on any device.</div>
						</div>
						<div class="wi_33 xs-wi_100 marb30 padrl20">
							<img src="<?php echo $path; ?>html/search/images/icons/tfg-3.png" width="60" height="60" class="dblock marrla marb20" title="Free &amp; unlimited" alt="Free &amp; unlimited" />
							<h4 class="fsz20 txt_37404a">Free &amp; unlimited</h4>
							<div class="lgn_hight_25 letspc_03">Running events can be expensive, but getting feedback shouldn't be. Typeform is free and unlimited.</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Section 3 -->
			<div class="mart30 padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padt30 padb60 brdb">
					<h2 class="xs-dnone marb30 nobold talc fsz16 txt_6c737a">Typeform is trusted by companies like these...</h2>
					
					<div class="dflex xs-dnone alit_c marb30">
						<div class="flex_1 padtb20 padrl30">
							<img src="<?php echo $path; ?>html/search/images/logos/ny_times.png" class="maxwi_100 hei_auto dblock" />
						</div>
						<div class="flex_1 padtb20 padrl30">
							<img src="<?php echo $path; ?>html/search/images/logos/bbc.png" class="maxwi_100 hei_auto dblock" />
						</div>
						<div class="flex_1 padtb20 padrl30">
							<img src="<?php echo $path; ?>html/search/images/logos/facebook.png" class="maxwi_100 hei_auto dblock" />
						</div>
						<div class="flex_1 padtb20 padrl30">
							<img src="<?php echo $path; ?>html/search/images/logos/financial_times.png" class="maxwi_100 hei_auto dblock" />
						</div>
						<div class="flex_1 padtb20 padrl30">
							<img src="<?php echo $path; ?>html/search/images/logos/airbnb.png" class="maxwi_100 hei_auto dblock" />
						</div>
					</div>
					
					<div class="talc">
						<img src="<?php echo $path; ?>html/search/images/people/Mike-Rose.jpg" width="65" height="65" class="dblock marrla marb20 brdrad50" />
						<h3 class="marb10 pad0 fsz15">Mike Rose</h3>
						<div class="txt_a5 fsz12">Professional Icebreaker</div>
						<div class="maxwi_750p mart15 marrla marb30 lgn_hight_35 fsz22">
							&quot;I love feedback (don't we all!). Started using a site to generate post-event feedback forms and I thought I'd share @Typeform&quot;
						</div>
						<div>
							<a href="#" class="fsz16 txt_73bec8">See what else people are saying about Typeform...</a>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Section 4 -->
			<div class="ovfl_hid mart30 padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padt30 padb60 brdb">
					<h2 class="marb30 pad0 talc fsz20 txt_6c737a">Try these templates too...</h2>
					<div class="slick-slider dflex alit_s marrl-15 talc" id="section-3-slick" data-slick-settings="dots:false,arrows:true,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-sm-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xxs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1">
						
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-31.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Marketing Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-11.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Customer Satisfaction Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-39.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Post-Event Satisfaction Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-30.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Market Research Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-16.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Facebook Polls</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-10.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Customer Development Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-05.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Branding Questionnaires</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Patient Satisfaction Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-13.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Demographic Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-15.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Employee Satisfaction Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-32.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Net Promoter Score Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Online Questionnaire Maker</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Political Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-04.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Brand Awareness Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-07.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Candidate Experience Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Straw Polls</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Online Poll Maker</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-47.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Student Satisfaction Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-42.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Social Media Surveys</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-18.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Funny Polls</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						<div class="wi_220pi dflex fxdir_col alit_s padrl15">
							<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2">
								<img src="<?php echo $path; ?>html/search/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="" />
								<h4 class="pad0 nobold fsz16 txt_60666f">Political Polls</h4>
							</a>
							<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
						</div>
						
					</div>
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
			
			<!-- Section 5 -->
			<div class="mart30 xs-mart0 padrl10 xs-padrl0 txt_37404a hide">
				<div class="wrap maxwi_100 padt30 padrl2 xs-padrl0 padb60 brdb fsz16">
					<div class="wi_100 dflex fxwrap_w justc_c alit_s talc">
						
						<div class="wi_100 dflex xs-fxwrap_w justc_c alit_s brdb xs-nobrdb">
							<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12">
								<div class="wi_100 maxwi_500p ovfl_hid padt10">
									<h4 class="fsz24 bold">Sales &amp; Marketing</h4>
									<p>Give your sales team the perfect set of apps to help close more business deals in less time.</p>
									<div class="category-apps sales-marketing marrbl-2 uppercase fsz12">
										<a href="#" class="wi_66 xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt fsz16 xs-fsz12 crm featured-app"><span class="dblock pi1"></span>CRM</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt salesinbox"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new">New</em><span class="dblock pi36"></span> SalesInbox</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt salesiq"><span class="dblock pi5"></span>SalesIQ</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt survey"><span class="dblock pi3"></span>Survey</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt campaign"><span class="dblock pi2"></span>Campaigns</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt sites"><span class="dblock pi4"></span>Sites</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt social"><span class="dblock pi24"></span>Social </a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt contactmanager"><span class="dblock pi6"></span>Contact<br> Manager</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt forms nobottom"><span class="dblock pi25"></span> Forms</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt motivator"><span class="dblock pi30"></span> Motivator</a>
										<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg"></div>
									</div>
								</div>
							</div>
							
							<div class="xs-dnone fxshrink_0 mart40 marrl10 brdr"></div>
							
							<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12 xs-bg_fa">
								<div class="wi_100 maxwi_500p ovfl_hid padt10">
									<h4 class="fsz24 bold">Email &amp; Collaboration</h4>
									<p> Empower your workforce with apps to collaborate and transform the way they work.</p>
									<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										<a href="#" class="wi_66 xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt fsz16 xs-fsz12 mail featured-app"><span class="dblock pi9"></span>Mail</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt notebook"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new">New</em><span class="dblock pi35"></span> Notebook</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt docs"><span class="dblock pi10"></span>Docs</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt projects"><span class="dblock pi11"></span>Projects</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt connect"> <span class="dblock pi12"></span>Connect</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt bugtracker"> <span class="dblock pi13"></span>BugTracker</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt meeting"> <span class="dblock pi14"></span>Meeting</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt vault"><span class="dblock pi15"></span>Vault</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt showtime"><span class="dblock pi29"></span> ShowTime</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h brdr dark_grey_txt chat"><span class="dblock pi31"></span> Chat</a>
										<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="wi_100 dflex xs-fxwrap_w justc_c alit_s">
							<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12">
								<div class="wi_100 maxwi_500p ovfl_hid padt10">
									<h4 class="fsz24 bold">Finance</h4>
									<p>Solve business accounting challenges using our perfect set of finance apps on the cloud. </p>
									<div class="category-apps sales-marketing marrbl-2 uppercase fsz12">
										<a href="#" class="wi_66 xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt fsz16 xs-fsz12 books featured-app "><span class="dblock pi16"></span>Books</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt invoice"><span class="dblock pi17"></span>Invoice</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt subscription"><span class="dblock pi22"></span>Subscriptions</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt expense"><span class="dblock pi27"></span>Expense</a>
										<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_yellow_h brdr dark_grey_txt inventory"><span class="dblock pi28"></span>Inventory</a>
										<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg"></div>
									</div>
								</div>
							</div>
							
							<div class="xs-dnone fxshrink_0 marrl10 brdr"></div>
							
							<div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padtb40 xs-padrl12 xs-bg_fa">
								<div class="wi_100 maxwi_500p ovfl_hid padt10">
									<h4 class="fsz24 bold">IT &amp; Help Desk</h4>
									<p>Be right where your customers are with apps to help your business engage with them. </p>
									<div class="category-apps sales-marketing marrbl-2 uppercase fsz12">
										<a href="#" class="wi_100 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt fsz16 xs-fsz12 support featured-app"><span class="dblock pi7"></span>Support</a>
										<a href="#" class="wi_33 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt sdp-ondemand"><span class="dblock pi32"></span>ServiceDesk Plus</a>
										<a href="#" class="wi_33 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt mdm"><span class="dblock pi34"></span>Mobile Device <br> Management</a>
										<a href="#" class="wi_33 xs-wi_50 dblock fleft pos_rel zi3_h padt30 brdb brdb_darkblue_h brdr dark_grey_txt assist"><span class="dblock pi8"></span>Assist</a>
										<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			
			<!-- Section 6 -->
			<div class="padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padtb60">
					<div class="dflex fxwrap_w justc_c alit_c talc">
						<h2 class="marb20 pad0 nobold fsz20 txt_37404a">Goodbye forms. <strong>Hello typeforms.</strong></h2>
						<a href="#" class="dblock marb20 marrl20 padtb10 padrl30 brd brdwi_2 brdclr_73bec8 brdrad3 white_bg bg_73bec8_h lgn_hight_24 bold fsz16 txt_73bec8 white_txt_h trans_all2">Start creating</a>
					</div>
				</div>
			</div>
			
			<!-- Section 7 -->
			<div class="ovfl_hid padrl10 txt_37404a fsz14 hide">
				<div class="wrap maxwi_100 dflex xs-dnone alit_fs">
					<div class="wi_20 marb40">
						<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Useful cases</h3>
						<ul class="mar0 pad0">
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Forms</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Surveys</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Order forms</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Quizzes</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Lead Generation</a></li>
						</ul>
					</div>
					<div class="wi_20 marb40">
						<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Product</h3>
						<ul class="mar0 pad0 fsz14">
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Examples</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Tour</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Plans &amp; pricing</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Going PRO</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Developers</a></li>
						</ul>
					</div>
					<div class="wi_20 marb40">
						<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">You might like</h3>
						<ul class="mar0 pad0 fsz14">
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Typeform blog</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Form Invaders <img src="<?php echo $path; ?>html/search/images/icon-invaders-animated.gif"></a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Typeform LITE</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Wall of love</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Typeform inspiration</a></li>
						</ul>
					</div>
					<div class="wi_20 marb40">
						<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Help</h3>
						<ul class="mar0 pad0 fsz14">
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Help Center</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">System status ●</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">FAQs</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">My first typeform</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Tweet for support</a></li>
						</ul>
					</div>
					<div class="wi_20 marb40">
						<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 txt_787e89">Company</h3>
						<ul class="mar0 pad0 fsz14">
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">About Typeform</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Work at Typeform</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Terms &amp; privacy</a></li>
							<li class="dblock lgn_hight_35"><a href="#" class="txt_787e89">Contact Us</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Section 8 -->
			<div class=" dflex justc_sb alit_c padtb20 padrl40 brdt lgn_hight_34 fsz14 txt_787e89 hide" style="display:none;">
				<div>
					<img src="<?php echo $path; ?>html/search/images/map-pointer.svg" width="23" height="33" class="marr10 valm">
					<span class="val">
						<b>Typeform|</b> Bac de Roda 163, Barcelona 
					</span>
				</div>
				<span>&copy; Typeform</span>
			</div>
			
			<!-- Section 9 -->
			<div class="padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padtb30">
					<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
					<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
						<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
							<div>
								<h3 class="padb30 fsz24 bold">Multichannel</h4>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#">Learn more</a>
							</div>
						</div>
						<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padt15 xs-padrl0 xs-padb0 talc">
							<div>
								<span class="crm-icon crm-icon-1"></span>
								<h4 class="bold fsz18">Email </h4>
								<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="pointer-divider marb30 hide"></div>
			
			<!-- Section 10 -->
			<div class="padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padtb30">
					<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
					<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
						<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
							<div>
								<h3 class="padb30 fsz24 bold">Multichannel</h4>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#">Learn more</a>
							</div>
						</div>
						<div class="wi_50 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s talc">
							<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 pad30 xs-pad15 xxs-padrl0 brdb xs-nobrdb xs-brdr xxs-nobrdr xxs-brdb">
								<span class="crm-icon crm-icon-1"></span>
								<h4 class="bold fsz18">Email</h4>
								<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
							</div>
							<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 pad30 xs-pad15 xxs-padrl0">
								<span class="crm-icon crm-icon-3"></span>
								<h4 class="bold fsz18">SalesSignals</h4>
								<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="pointer-divider marb30 hide"></div>
			
			<!-- Section 11 -->
			<div class="padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padtb30">
					<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
					<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
						<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
							<div>
								<h3 class="padb30 fsz24 bold">Multichannel</h4>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#">Learn more</a>
							</div>
						</div>
						<div class="wi_50 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s talc">
							<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex alit_c pad30 xs-pad15 xxs-padrl0 brdb xs-nobrdb xs-brdr xxs-nobrdr xxs-brdb">
								<div>
									<span class="crm-icon crm-icon-1"></span>
									<h4 class="bold fsz18">Email</h4>
									<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
								</div>
							</div>
							<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s">
								<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 brdr xs-nobrdr xs-brdb sm-nobrdr sm-brdb">
									<span class="crm-icon crm-icon-3"></span>
									<h4 class="bold fsz18">SalesSignals</h4>
									<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now.</p>
								</div>
								<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
									<span class="crm-icon crm-icon-4"></span>
									<h4 class="bold fsz18">Social</h4>
									<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="pointer-divider marb30 hide"></div>
			
			<!-- Section 12 -->
			<div class="padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padtb30">
					<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så här går det till</h2>
					<ul class="dflex fxwrap_w alit_s mar0 pad0 brdt brdl">
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-developers"></i> <span class="dblock uppercase fsz13 bold">Web developers</span> </div>
								<div class="back white_bg green_txt"> <span>FRONT-END DEVELOPERS<br>BACK-END DEVELOPERS<br>SOFTWARE PROGRAMMERS</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-mobile-developers"></i> <span class="dblock uppercase fsz13 bold">Mobile developers</span> </div>
								<div class="back white_bg green_txt"> <span>
									iOS APP DEVELOPERS<br>
									ANDROID DEVELOPERS<br>UI/UX DESIGNERS
								</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-designers"></i> <span class="dblock uppercase fsz13 bold">Designers &amp; Creatives</span> </div>
								<div class="back white_bg green_txt"> <span>GRAPHIC DESIGNERS<br>UI/UX DESIGNERS<br>MOTION GRAPHICS EXPERTS</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-writing"></i> <span class="dblock uppercase fsz13 bold">Writers</span> </div>
								<div class="back white_bg green_txt"> <span>BLOG WRITERS<br>CONTENT WRITERS<br>COPYWRITERS</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-administrative-support"></i> <span class="dblock uppercase fsz13 bold">Virtual assistants</span> </div>
								<div class="back white_bg green_txt"> <span>PERSONAL ASSISTANTS<br>TRANSCRIPTIONISTS<br>WEB RESEARCHERS</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-customer-service"></i> <span class="dblock uppercase fsz13 bold">Customer service agents</span> </div>
								<div class="back white_bg green_txt"> <span>PHONE SUPPORT SPECIALISTS<br>EMAIL SUPPORT EXPERTS<br>LIVE CHAT SUPPORT PROS</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-sales-marketing"></i> <span class="dblock uppercase fsz13 bold">Sales &amp; marketing experts</span> </div>
								<div class="back white_bg green_txt"> <span>SEO SPECIALISTS<br>EMAIL AUTOMATORS<br>MARKETING EXPERTS</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
						<li class="wi_25 xs-wi_50 sm-wi_33 dblock mar0 pad0 brdr brdb">
							<a class="toggle-sides padt20 talc dark_grey_txt" href="#">
								<div class="front"> <i class="category-icon category-accounting-consulting"></i> <span class="dblock uppercase fsz13 bold">Accountants &amp; consultants</span> </div>
								<div class="back white_bg green_txt"> <span>TAX ACCOUNTANTS<br>BOOKKEEPERS<br>FINANCIAL MODELERS</span> <em class="dblock mart20">and more...</em> </div>
							</a>
						</li>
					</ul>
					<div class="clear"></div>
					<div class="mart30 talc">
						<a href="#" class="dblue_btn marrl15 fsz16" target="_self">View more</a>
					</div>
				</div>
			</div>
			
			<div class="pointer-divider marb30 hide"></div>
			
			<!-- Section 13 -->
			<div class="padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padtb30">
					<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Så tycker våra egenanställda</h2>
					<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
						<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
							<div>
								<h3 class="padb30 fsz24 bold">Multichannel</h4>
								<p>Meet your customers, no matter the medium. Multichannel support in Zoho CRM lets you reach people on the phone, via live chat, email, through social media, and even in person. Use visitor tracking and email analytics to know what your customers are seeing, and find opportunities for engagement. Communicate, connect, and close the deal with Zoho CRM.</p>
								<a href="#">Learn more</a>
							</div>
						</div>
						<div class="wi_50 xs-wi_100 dflex xxs-dblock fxdir_col xxs-dblock alit_s talc">
							<div class="wi_100 flex_1 dflex xxs-dblock sm-fxdir_col alit_s brdb">
								<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 brdr xxs-nobrdr xxs-brdb sm-nobrdr sm-brdb">
									<span class="crm-icon crm-icon-1"></span>
									<h4 class="bold fsz18">Email</h4>
									<p>See your email inside CRM. SalesInbox means no more shuffling between screens to get the full picture.</p>
								</div>
								<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
									<span class="crm-icon crm-icon-2"></span>
									<h4 class="bold fsz18">Telephony</h4>
									<p>Have conversations with context. Make calls from Zoho CRM with single-click dialing and use call analytics to measure your team's performance.</p>
								</div>
							</div>
							<div class="wi_100 flex_1 dflex xxs-dblock sm-fxdir_col alit_s">
								<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 brdr xxs-nobrdr xxs-brdb sm-nobrdr sm-brdb">
									<span class="crm-icon crm-icon-3"></span>
									<h4 class="bold fsz18">SalesSignals</h4>
									<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now.</p>
								</div>
								<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
									<span class="crm-icon crm-icon-4"></span>
									<h4 class="bold fsz18">Social</h4>
									<p>Bring social media into your sales process. Monitor trends and discover new leads, all from within Zoho CRM.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="pointer-divider marb30 hide"></div>
			
			<!-- Section 14 -->
			<div class="padrl10 txt_37404a hide">
				<div class="wrap maxwi_100 padtb30">
					<h2 class="talc fsz34 xs-fsz28 lgn_hight_n12 padb30">Fördelar med Frilans Finans</h2>
					<div class="dflex fxwrap_w alit_s pos_rel talc lgn_hight_22 fsz16">
						<div class="wi_1p hei_100 pos_abs zi1 top0 left0 bg_f"></div>
						<div class="wi_100 hei_1p pos_abs zi1 bot0 left0 bg_f"></div>
						<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
							<div class="sprite-image euro-bill marb10"></div>
							<h3 class="lgn_hight_s12 bold fsz20">Få betalt inom fem bankdagar</h3>
							<p>Normalt får du dina pengar efter fem bankdagar, oavsett om din kund har betalningsvillkor 30 dagar. Med ett Expresstillägg kan du få betalt redan inom 24 timmar. </p>
						</div>
						<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
							<div class="sprite-image note marb10"></div>
							<h3 class="lgn_hight_s12 bold fsz20">Slipp all administration</h3>
							<p>Det enda du behöver göra är att fokusera på ditt jobb. Vi tar hand om löneadministrationen, kontakterna med Skatteverket, inbetalning av moms och skatt samt försäkringar. Med oss kan du fakturera utan f-skatt.</p>
						</div>
						<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
							<div class="sprite-image heart marb10"></div>
							<h3 class="lgn_hight_s12 bold fsz20">Trygghet</h3>
							<p>Våra egenanställda får ett bra grundskydd genom basförsäkringen. Vi har även försäkringspaket för dig som vill ha extra skydd.</p>
						</div>
						<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
							<div class="sprite-image user marb10"></div>
							<h3 class="lgn_hight_s12 bold fsz20">Personlig service</h3>
							<p>Kontakta oss på klientstöd om du undrar över något. Vår erfarenhet och kunskap om egenanställning och administration finns till för dig.</p>
						</div>
						<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
							<div class="sprite-image like marb10"></div>
							<h3 class="lgn_hight_s12 bold fsz20">Endast 6% i avgift</h3>
							<p>Tjänsten kostar bara 6 % av det du fakturerar. Inga dolda kostnader eller avgifter tillkommer. Du får full koll på dina pengar. </p>
						</div>
						<div class="wi_33 xs-wi_50 xxs-wi_100 pad15 brdl brdb">
							<div class="sprite-image params marb10"></div>
							<h3 class="lgn_hight_s12 bold fsz20">Skräddarsytt faktureringsverktyg</h3>
							<p>RUT och ROT, ändra momssats, gör avdrag, spara till pension och semester, jobba utomlands - allt är möjligt, faktureringsverktyget hjälper dig.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="wi_100 minhei_100vh-80p ovfl_hid dflex xs-fxdir_col alit_c justc_fe xs-justc_sb pos_rel bg_eef0f0 hide" style="display:none;">
				<div class="hei_100-100p pos_abs xs-pos_sta zi1 bot0 right-100p md-right0 lg-right200p">
					<img src="<?php echo $path; ?>html/search/images/bg/man-banner-wealthy-in.png" width="2318" height="690" class="wi_auto hei_100 dblock xs-dnone" />
					<img src="<?php echo $path; ?>html/search/images/bg/man-banner-wealthy-in-mobile.png" width="768" height="479" class="dnone xs-dblock wi_100 hei_auto" />
				</div>
				<div class="wi_320p maxwi_100 pos_rel xs-pos_sta zi2 marr100 xs-marrla padtb30 padrl10">
					<h2 class="mar0 pad0 fsz36 txt_234961">Save tax in 3 mins</h2>
					<div class="mart20 lgn_hight_s15 fsz21 black_txt">With Wealthy, tax-saving investing is easy and rewarding - you could earn enough for a surfing trip.</div>
					<a href="#" class="diblock mart30 padtb10 padrl45 brdrad100 bg_1a90cd txtdec_n uppercase fsz16 white_txt">Get started</a>
				</div>
			</div>
			
			<!-- HOW IT WORKS -->
			<div class="pos_rel bgir_norep bgip_r hide">
				<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
					<div class="wrap maxwi_100">
						<img src="<?php echo $path; ?>html/search/images/bg/man-banner-bottom-wealthy-in.png" class="dblock pos_rel left0" style="-webkit-transform: translate(-1250px, 0);transform: translate(-1250px, 0);" />
					</div>
				</div>
				
				<div class="wrap maxwi_100 minhei_100vh dflex alit_c pos_rel zi2 padtb30">
					<div>
						<h2 class="marb10 pad0 talc bold fsz36 txt_234961">How it works</h2>
						<div class="maxwi_700p marrla marb30 talc lgn_hight_s15 fsz15 txt_7">Wealthy's tax-saver portfolio is eligibile under the section 80C of income-tax act. You can claim upto Rs 1.5 lakh as deduction in your taxable income.</div>
						<div class="dflex xs-dblock fxwrap_w padtb30">
							<div class="wi_50 xs-wi_100 order_2 padrl10">
								<img src="<?php echo $path; ?>html/search/images/bg/how-it-works-wealthy-in.png" width="642" height="439" class="maxwi_100 hei_auto" />
							</div>
							<div class="wi_50 xs-wi_100 order_1 padrl10 lgn_hight_s15 fsz14">
								<div class="wi_100 dflex alit_fs martb10">
									<img src="<?php echo $path; ?>html/search/images/icons/assess-saving-wealthy-in.png" width="119" height="119" class="xxs-wi_60p hei_auto fxshrink_0 marr15" />
									<div class="flex_1 padb25 brdb">
										<h3 class="marb10 pad0 bold fsz22">Assess savings for the year</h3>
										<div>Calculate how much you can still save with Wealthy in this year of the total Rs 1.5 lakh limit under the section 80C</div>
									</div>
								</div>
								<div class="wi_100 dflex alit_fs martb10">
									<img src="<?php echo $path; ?>html/search/images/icons/assess-saving-wealthy-in.png" width="119" height="119" class="xxs-wi_60p hei_auto fxshrink_0 marr15" />
									<div class="flex_1 padb25 brdb">
										<h3 class="marb10 pad0 bold fsz22">Invest without paperwork</h3>
										<div>Easy investing with our online (KYC) and paper-less application. Choose one-time or monthly (SIP) payment.</div>
									</div>
								</div>
								<div class="wi_100 dflex alit_fs martb10">
									<img src="<?php echo $path; ?>html/search/images/icons/assess-saving-wealthy-in.png" width="119" height="119" class="xxs-wi_60p hei_auto fxshrink_0 marr15" />
									<div class="flex_1 padb25">
										<h3 class="marb10 pad0 bold fsz22">Track investments</h3>
										<div>Monitor the performance of your investments online and withdraw directly to your bank account.</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wi_90 maxwi_950p marrla brdt brdb hide"></div>
			
			
			<!-- MONEY SAFE -->
			<div class="padtb30 hide">
				<div class="wrap maxwi_100 minhei_630p xs-minhei_0 dflex xs-dblock alit_fs justc_fe pos_rel">
					<div class="wi_400p maxwi_100 pos_rel zi2 xs-marrla padtb30 padrl10 xs-talc">
						<h2 class="marb10 pad0 bold fsz36 txt_234961">Is my money safe?</h2>
						<div class="lgn_hight_28 fsz15 txt_6">
							With Wealthy, your money is invested in algorithmically chosen tax-saving mutual funds, also called ELSS. To choose the best portfolio, Wealthy uses historic data and runs analyses as per Nobel Prize winning methodolgoy, called Capital Asset Pricing Model.<br/>
							Your investment goes straight to trusted Mutual Fund companies, withour ever coming to Wealthy's bank. Investments processing takes 24 working hours and post that the corresponding investment proofs will be available on your dashboard. You can use the proofs for filing returns or submitting to your HR for tax benefits!
						</div>
					</div>
					<div class="maxhei_100 pos_abs xs-pos_sta zi1 bot0 left-100p padrl10">
						<img src="<?php echo $path; ?>html/search/images/bg/is-my-money-safe-wealthy-in.png" width="983" height="557" class="wi_auto maxwi_100 hei_auto maxhei_100 dblock xs-dnone" >
						<img src="<?php echo $path; ?>html/search/images/bg/is-my-money-safe-wealthy-in-mobile.png" width="639" height="557" class="wi_auto maxwi_100 hei_auto dnone xs-dblock marrla" >
					</div>
				</div>
			</div>
			<div class="wi_100 ovfl_hid bg_f2f4f5 hide">
				<div class="wi_1200p maxwi_100 minwi_0 dflex alit_s marrla">
					<div class="wi_50 xs-wi_100 dflex alit_c">
						<div class="wi_100 padtb40 sm-padtb55 md-padtb70 lg-padtb90 padrl15 txt_708198">
							<h2 class="marb30 pad0 tall xs-talc fntwei_300 fsz28 sm-fsz32 md-fsz36 lg-fsz40 txt_a549e9">
								FAQs
								<div class="wi_50p maxwi_100 hei_4p mart5 xs-marrla bg_a549e9"></div>
							</h2>
							<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
								<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
									<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-1" data-hide="all" data-hide-base=".hide-base">
										<span>What is the Start App?</span>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
									</a>
									<div class="dnone brdrad5 bg_f" id="faq-1">
										<div class="padtbl20 padr26">
											<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
												Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
											</div>
										</div>
									</div>
								</div>
								<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
									<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-2" data-hide="all" data-hide-base=".hide-base">
										<span>Where can i download this app?</span>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
									</a>
									<div class="dnone brdrad5 bg_f" id="faq-2">
										<div class="padtbl20 padr26">
											<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
												Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
											</div>
										</div>
									</div>
								</div>
								<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
									<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-3" data-hide="all" data-hide-base=".hide-base">
										<span>How to install this app?</span>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
									</a>
									<div class="dnone brdrad5 bg_f" id="faq-3">
										<div class="padtbl20 padr26">
											<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
												Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
											</div>
										</div>
									</div>
								</div>
								<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
									<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-4" data-hide="all" data-hide-base=".hide-base">
										<span>Is this app useful for business purpose?</span>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
									</a>
									<div class="dnone brdrad5 bg_f" id="faq-4">
										<div class="padtbl20 padr26">
											<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
												Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
											</div>
										</div>
									</div>
								</div>
								<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
									<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f bg_a549e9_a fntwei_600 fsz16 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-5" data-hide="all" data-hide-base=".hide-base">
										<span>How to update this every day?</span>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
										<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
									</a>
									<div class="dnone brdrad5 bg_f" id="faq-5">
										<div class="padtbl20 padr26">
											<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s18">
												Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy. Lorem Ipsum is simply dummy text of the printing and typeseing indury Lorem Ipsum has been the industry's standard dummy text ever since the when an Lorem Ipsum is simply dummy text of the printing and typeseing industry Lorem Ipsum has been the indusn the industry's stry's standard dummy.
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wi_50 dflex xs-dnone alit_fe justc_fe padrl15">
						<img src="<?php echo $path; ?>html/smartappcss/images/smart/faq-photo.png" class="wi_auto maxwi_100 hei_auto maxhei_100 dblock" width="585" height="800" title="FAQs" alt="FAQs">
					</div>
				</div>
				<style>
					.custom-scroll::-webkit-scrollbar{
					width: 12px;
					height: 12px;
					padding: 0 3px;
					border-radius: 20px;
					background: #e9e9e9;
					}
					.custom-scroll::-webkit-scrollbar-button{
					width: 12px;
					height: 12px;
					}
					.custom-scroll::-webkit-scrollbar-track{
					width: 100px;
					}
					.custom-scroll::-webkit-scrollbar-thumb{
					border-right: 3px solid #e9e9e9;
					border-left: 3px solid #e9e9e9;
					background: #a549e9;
					}
				</style>
			</div>
		</div>
		
			<?php include 'PublicUserFooter.php'; ?>
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript">
			var i=0;
			function animateFunction() {
				var j = i+1;
				$('.banner_holder .wrap h1 span span:nth-child('+j+')').removeClass('visible_ib').addClass('hide_ib');
				i = (i+1) % 5;
				j = i+1;
				$('.banner_holder .wrap h1 span span:nth-child('+j+')').removeClass('hide_ib').addClass('visible_ib');
				setTimeout(animateFunction, 2000);
			}
			setTimeout(animateFunction, 2000);
		</script>
	</body>
</html>
