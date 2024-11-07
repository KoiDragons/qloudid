<!doctype html>
<html>
	<head>
		<meta name="google-site-verification" content="fAZkhLH9sxgymYB5B7htwd1QSN8AXDY-6BP8UfGr68c" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smartappcss/css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smartappcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smartappcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smartappcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smartappcss/css/icofont.css" />
	
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
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
	<?php $path1 = $path."html/usercontent/images/"; ?>
	<body class="white_bg">
		
		<div class="column_m header xs-header  bs_bb white_bg">
			<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10  white_bg">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 wi_140p">
					<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
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
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue first"> <a href="https://www.qloudid.com" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h " data-en="Privat" data-sw="Privat">Privat</a> </li>
						
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
		
		
	
	<div class="clear"></div>
		
		<div class="column_m container  white_bg" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<div class="wi_960p col-xs-12 col-sm-12 fleft pos_rel zi5 ">
						
						
								
		<!-- NEW BANNER -->
			<div class="column_m padtb30 mart40 fsz14 lgn_hight_22 dark_grey_txt brdb_new">
			<div class="container">
				<div class="">
								<h2 class="padl10 talc fsz40 bold">Appstore</h2>
								
								<div class="marrla martb20 talc fsz25 txt_7">Wealthy's tax-saver portfolio is eligibile under the section 80C of income-tax act. You can claim upto Rs 1.5 lakh as deduction in your taxable income.</div>

								
								<div class="tab_container mart5">
									
									<!-- Popular -->
									<div class="tab_content hide active" id="utab_Popular" style="display: block;">
										
										<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/ManageEmployee/magazineAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Min Arbetsplats</h3>
														<span class="dblock marb5 midgrey_txt">HR </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										
										
										<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/vacancy/index.php/VacancyList/vacancyAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../estorecss/appstore2.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Min Hyresvärd</h3>
														<span class="dblock marb5 midgrey_txt">HR</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/ManageCvBank/magazineAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Min Skola</h3>
														<span class="dblock marb5 midgrey_txt">HR</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/Personalhandboken/userAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../estorecss/appstore3.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Min Idrott</h3>
														<span class="dblock marb5 midgrey_txt">HR</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										<div class="clear"></div>
									</div>
									
									<!-- Analytics -->
									<div class="tab_content hide" id="utab_Analytics" style="display: none;">
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/ManageEmployee/magazineAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Employee CRM</h3>
														<span class="dblock marb5 midgrey_txt">HR </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/vacancy/index.php/VacancyList/vacancyAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore2.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Recruiting Employees</h3>
														<span class="dblock marb5 midgrey_txt">HR</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/ManageCvBank/magazineAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">CV Bank</h3>
														<span class="dblock marb5 midgrey_txt">HR</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/Personalhandboken/userAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore3.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Personalhandboken</h3>
														<span class="dblock marb5 midgrey_txt">HR</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/ManageRequest/requestAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore6.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Employee Self Service</h3>
														<span class="dblock marb5 midgrey_txt">HR</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										<div class="clear"></div>
									</div>
									
									<!-- Advertising -->
									<div class="tab_content hide" id="utab_Advertising" style="display: none;">
									
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/reseller_vacancy/index.php/VacancyList/vacancyListAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09/2" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore5.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Recruiting Resellers</h3>
														<span class="dblock marb5 midgrey_txt">Sales</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/ManageCustomers/customersList/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore5.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Customer Self Service</h3>
														<span class="dblock marb5 midgrey_txt">Sales </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
								
								<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/SalesCRM/crmAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore5.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Sales CRM</h3>
														<span class="dblock marb5 midgrey_txt">Sales </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										<div class="clear"></div>
									</div>
									
									<!-- A/B Testing -->
									<div class="tab_content hide" id="utab_AB_Testing" style="display: none;">
											<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/CompanyMagazineArticles/addArticle/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore4.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Branding</h3>
														<span class="dblock marb5 midgrey_txt">Marketing </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="../../CompanyMagazineArticles/articlesList/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore6.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">M Private Page</h3>
														<span class="dblock marb5 midgrey_txt">Marketing</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="../../CompanyMagazineArticles/publicArticles/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore3.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">M Public Page</h3>
														<span class="dblock marb5 midgrey_txt">Marketing</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/NewsLetter/addTemplate/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore6.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Email Marketing</h3>
														<span class="dblock marb5 midgrey_txt">Marketing</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="../../EmailCampaigns/campaignsAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore2.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Email subscribers</h3>
														<span class="dblock marb5 midgrey_txt">Marketing </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									<!-- Attribution -->
									<div class="tab_content hide" id="utab_Attribution" style="display: none;">
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/reseller_vacancy/index.php/VacancyList/supplierListAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09/2" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore4.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Recruiting Suppliers</h3>
														<span class="dblock marb5 midgrey_txt">Finance</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="../../ManageConnection/connectionList/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Supplier Self Service</h3>
														<span class="dblock marb5 midgrey_txt">Finance </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="https://www.qmatchup.com/beta/company/index.php/SupplierCRM/crmAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="../../../../estorecss/appstore5.png" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">SupplierCRM</h3>
														<span class="dblock marb5 midgrey_txt">Finance </span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										<div class="clear"></div>
									</div>
									
									<!-- CRMs -->
									<div class="tab_content hide" id="utab_CRMs" style="display: none;">
										
										<div class="xs-wi_100 wi_33 fleft bs_bb pad8 talc">
											<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
												<div class="trf_y-12p_ph trans_all2">
													<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
														<img src="images/segment/6.svg" class="dblock wi_100 maxwi_120p  maxhei_100p padtb5">
													</div>
													
													<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
														<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">Salesforce</h3>
														<span class="dblock marb5 midgrey_txt">CRMs</span>
														<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
													</div>
												</div>
											</a>
										</div>
										
										<div class="clear"></div>
									</div>
									
									
									
								</div>
				</div>
			</div>
		</div>
					
			
				</div>
				</div>
				</div>
					
					<div class="column_m mart30 xs-padtb10 talc lgn_hight_22 fsz16">
					<div class="wrap maxwi_100 padrl10 lgtgrey2_bg">
					
						
						<div class="wi_100 dflex xs-fxdir_col alit_s xs-alit_c justc_c mart0">
							<div class="wi_33 xs-wi_100 maxwi_400p flex_1 xs-brdb padr30">
								<span class="icon icon1"></span>
								<img src="https://www.safeqloud.com/html/usercontent/images/workplace/8.png" class="wi_100 hei_auto dblock marb10">

								
								
							</div>
							<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
							<div class="wi_33 xs-wi_100 maxwi_400p flex_1 pad15 fsz16">
								<span class="icon icon2"></span>
								
<h4 class="bold fsz28 padt10">Med sitt team</h4>
								<p>Nivå team - innebär att Produkt &amp; Förmåns utbud utökas till "Chef&amp;Team". Du kan anpassa utbudet för varje teammedlem. Förmånshantering ingår </p>
								
							</div>
							<div class="fxshrink_0 xs-dnone  sm-marrl15 "></div>
							
						</div>
					</div>
					
				</div>
<div class="wrap maxwi_100 padrl5 talc fsz16 mart40 hide">
			<h2 class="padb10 padl10 bold fsz40 xs-fsz22 darkgrey_txt tall">Smarta inköp - Börja idag</h2>
		<p class="padb10 padl10 fsz26 tall">Välj de rabatter du vill nyttja nedan eller läs mer.</p>
		
		<!-- Tab header 
		<ul class="tab-header mar0 pad0 brdb">
			<li class="diblock marrl10 padrl5">
				<a href="#" class="dblock padb15 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a fsz18 grey_txt pred2_txt_a active" data-id="tab-Deals">Deals</a>
			</li>
			<li class="diblock marrl10 padrl5">
				<a href="#" class="dblock padb15 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a fsz18 grey_txt pred2_txt_a" data-id="tab-Products">Products</a>
			</li>
		</ul>-->
		
		<div class="tab-container">
			<div class="tab-content active" id="tab-Deals" style="display: block;">
				<div class="dflex fxwrap_w alit_s padt10">
				
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h  brdrad3 white_bg">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Gold</h3>
						        <div class="marb15 talc">
						            <a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				    
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">SA</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Sales</h3>
						        <div class="marb15 talc">
						            <a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				    
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">MA</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Marketing</h3>
						        <div class="marb15 talc">
						            <a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				    
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">FI</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Finance</h3>
						        <div class="marb15 talc">
						            <a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				
				</div>
			</div>	
			<div class="tab-content" id="tab-Products">
				<div class="dflex fxwrap_w alit_s padt10">
					
					<div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">FI</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Finance</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Gold</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				    
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">SA</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Sales</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				    
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">MA</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Marketing</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="wrap maxwi_100 mart10 padrl5 hide">

		<div class="dflex fxwrap_w justc_sb alit_s ">
			<div class="wi_50-10p xs-wi_100-10p padtl10 ">
				<div class="marb20 pad15  bxsh_black02_h white_bg">

					<div class="column_m bs_bb marb5 mart0">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1">
												<h2 class="mart0 marb10 pad0 tall lgn_hight_s12 fsz34">Kom igång: Ansöka om företagslån</h2>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												<p>Grundkrav för en låneansökan på Toborrow:</p>
												<ul class="mar0 pad0 tall">
													<li class="wi_100 dflex marb15 first">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<em>Omsättning minst 1 miljon kronor</em>
														</div>
													</li>
													<li class="wi_100 dflex marb15">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<em>En fungerande verksamhet</em>
														</div>
													</li>
													
												</ul>
												
												
												<h3 class="mart15 padb15 fsz24">Så finansieras lånet</h3>
												<p>Hos Toborrow samlas tusentals långivare som finansierar ditt lån genom att lägga bud i en aktion. På så vis tävlar våra långivare som att erbjuda dig den lägsta räntan. När budgivningen är slutförd kan du ta ställning till erbjudandet i lugn och ro.</p>
												<div class="mart15">
													<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
												</div>
											</div>
										
											
										</div>
										
									</div>

					
					<div class="clear dnone xxs-dblock"></div>

					<div class="marl140 xxs-mar0">

						
						
						
						
						

						



						
						
						<div class="clear"></div>

					</div>

					<div class="clear"></div>
				</div>
			</div>
			
			<div class="wi_50-10p xs-wi_100">
					<div class="dflex fxwrap_w alit_s">

						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>

					</div>
			</div>
		</div>
	</div>
	
	<div class="wrap maxwi_100 mart10 padrl5 hide">

		<div class="dflex fxwrap_w justc_sb alit_s ">
			<div class="wi_50-10p xs-wi_100-10p padtl10 ">
				<div class="marb20 pad15  bxsh_black02_h white_bg">

					<div class="column_m bs_bb marb5 mart0">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="xs-wi_100 flex_1">
												<h2 class="mart0 marb10 pad0 tall lgn_hight_s12 fsz34">Kom igång: Ansöka om företagslån</h2>
												<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
												<p>Grundkrav för en låneansökan på Toborrow:</p>
												<ul class="mar0 pad0 tall">
													<li class="wi_100 dflex marb15 first">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<em>Omsättning minst 1 miljon kronor</em>
														</div>
													</li>
													<li class="wi_100 dflex marb15">
														<span class="fa fa-check wi_32p brdrad100 tmgreen_bg talc lgn_hight_32 white_txt"></span>
														<div class="flex_1 alself_s padl10">
															<em>En fungerande verksamhet</em>
														</div>
													</li>
													
												</ul>
												
												
												<h3 class="mart15 padb15 fsz24">Så finansieras lånet</h3>
												<p>Hos Toborrow samlas tusentals långivare som finansierar ditt lån genom att lägga bud i en aktion. På så vis tävlar våra långivare som att erbjuda dig den lägsta räntan. När budgivningen är slutförd kan du ta ställning till erbjudandet i lugn och ro.</p>
												<div class="mart15">
													<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Prova Plus för 1 kr!</a>
												</div>
											</div>
										
											
										</div>
										
									</div>

					
					<div class="clear dnone xxs-dblock"></div>

					<div class="marl140 xxs-mar0">

						
						
						
						
						

						



						
						
						<div class="clear"></div>

					</div>

					<div class="clear"></div>
				</div>
			</div>
			
			<div class="wi_50-10p xs-wi_100">
					<div class="dflex fxwrap_w alit_s">

						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
							<div class="toggle-parent wi_100 dflex alit_s">
								<div class="wi_100 dnone_pa padt10">
									<div class="marb15 talc">
										<div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
									</div>
									<h3 class="marb15 talc bold fsz16">Gold</h3>
									<div class="marb15 talc">
										<a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#gratis_popup">0 TOTAL</a>
									</div>
									<p class="talc midgrey_txt">
										Last updated at 1 hour
									</p>
								</div>
								<div class="wi_100 hide dblock_pa padt30 padb20">
									<h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
									<div class="marb10 padrl20">
										<a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
									</div>
									<div class="padrl20">
										<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
									</div>
								</div>
							</div>
							<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
								<div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
									1 Member
								</div>
								<div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
									<a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
								</div>
								<div class="clear"></div>
							</div>
						</div>

					</div>
			</div>
		</div>
	</div>
	
				<!-- Courses in Dev -->
				<div class="wrap maxwi_100 marb50 padrl10 hide">
					<div class="marrl10  xs-marrl0 sm-marrl0 white_bg">
							
							<div class="marb10 brdb mart20">
								<h2 class="fleft mar0 padb5 fsz22">HR</h2>
								<div class="fright pos_rel padt10 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade1" data-classes="active">
										<span>Setup 60% complete</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown1" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					<div class="dflex alit_s marrl-15 slick-initialized slick-slider slick-dotted" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1" role="toolbar">
						
						
						
						
						
						
					<div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 350px; transform: translate3d(-100px, 0px, 0px);" role="listbox"><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide02" data-slick-index="-4" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide03" data-slick-index="-3" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide04" data-slick-index="-2" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide05" data-slick-index="-1" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-current slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide00" data-slick-index="0" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									</a><h4 class="dflex padtb10 bold fsz14 txt_6"><a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1"></span></a><a href="https://www.qmatchup.com/beta/company/index.php/ManageEmployee/magazineAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" tabindex="0">Employee CRM</a>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide01" data-slick-index="1" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide02" data-slick-index="2" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide03" data-slick-index="3" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide04" data-slick-index="4" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide05" data-slick-index="5" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide00" data-slick-index="6" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									</a><h4 class="dflex padtb10 bold fsz14 txt_6"><a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1"></span></a><a href="https://www.qmatchup.com/beta/company/index.php/ManageEmployee/magazineAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" tabindex="-1">Employee CRM</a>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide01" data-slick-index="7" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide02" data-slick-index="8" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide03" data-slick-index="9" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div></div></div><ul class="slick-dots" style="display: block;" role="tablist"><li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation00" id="slick-slide00"><button type="button" data-role="none" role="button" tabindex="0">1</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation01" id="slick-slide01"><button type="button" data-role="none" role="button" tabindex="0">2</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation02" id="slick-slide02"><button type="button" data-role="none" role="button" tabindex="0">3</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation03" id="slick-slide03"><button type="button" data-role="none" role="button" tabindex="0">4</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation04" id="slick-slide04"><button type="button" data-role="none" role="button" tabindex="0">5</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation05" id="slick-slide05"><button type="button" data-role="none" role="button" tabindex="0">6</button></li></ul></div>
				</div>
				
				
				<!-- Courses in Business -->
				<div class="wrap maxwi_100 marb50 padrl10 hide">
					<div class="marrl10  xs-marrl0 sm-marrl0 white_bg">
							
							<div class="marb10 brdb mart20">
								<h2 class="fleft mar0 padb5 fsz22">Sales</h2>
								<div class="fright pos_rel padt10 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown2,#profile-fade1" data-classes="active">
										<span>Setup 60% complete</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown2" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					<div class="dflex alit_s marrl-15 slick-initialized slick-slider slick-dotted" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1" role="toolbar">
						
						
						
						
						
						
					<div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 350px; transform: translate3d(-100px, 0px, 0px);" role="listbox"><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide12" data-slick-index="-4" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide13" data-slick-index="-3" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide14" data-slick-index="-2" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide15" data-slick-index="-1" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-current slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide10" data-slick-index="0" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									</a><h4 class="dflex padtb10 bold fsz14 txt_6"><a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1"></span></a><a href="https://www.qmatchup.com/beta/company/index.php/ManageCustomers/customersList/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" tabindex="0">Sales CRM</a>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide11" data-slick-index="1" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide12" data-slick-index="2" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide13" data-slick-index="3" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide14" data-slick-index="4" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide15" data-slick-index="5" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide10" data-slick-index="6" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									</a><h4 class="dflex padtb10 bold fsz14 txt_6"><a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1"></span></a><a href="https://www.qmatchup.com/beta/company/index.php/ManageCustomers/customersList/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" tabindex="-1">Sales CRM</a>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide11" data-slick-index="7" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide12" data-slick-index="8" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide13" data-slick-index="9" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div></div></div><ul class="slick-dots" style="display: block;" role="tablist"><li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation10" id="slick-slide10"><button type="button" data-role="none" role="button" tabindex="0">1</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation11" id="slick-slide11"><button type="button" data-role="none" role="button" tabindex="0">2</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation12" id="slick-slide12"><button type="button" data-role="none" role="button" tabindex="0">3</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation13" id="slick-slide13"><button type="button" data-role="none" role="button" tabindex="0">4</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation14" id="slick-slide14"><button type="button" data-role="none" role="button" tabindex="0">5</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation15" id="slick-slide15"><button type="button" data-role="none" role="button" tabindex="0">6</button></li></ul></div>
				</div>
				
				<!-- Courses in Business -->
				<div class="wrap maxwi_100 marb50 padrl10 hide">
					<div class="marrl10  xs-marrl0 sm-marrl0 white_bg">
							
							<div class="marb10 brdb mart20">
								<h2 class="fleft mar0 padb5 fsz22">Supplier</h2>
								<div class="fright pos_rel padt10 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown3,#profile-fade1" data-classes="active">
										<span>Setup 60% complete</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown3" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					<div class="dflex alit_s marrl-15 slick-initialized slick-slider slick-dotted" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1" role="toolbar">
						
						
						
						
						
						
					<div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 350px; transform: translate3d(-100px, 0px, 0px);" role="listbox"><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide22" data-slick-index="-4" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide23" data-slick-index="-3" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide24" data-slick-index="-2" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide25" data-slick-index="-1" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-current slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide20" data-slick-index="0" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									</a><h4 class="dflex padtb10 bold fsz14 txt_6"><a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1"></span></a><a href="https://www.qmatchup.com/beta/company/index.php/ManageConnection/connectionList/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" tabindex="0">Supplier CRM</a>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide21" data-slick-index="1" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide22" data-slick-index="2" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide23" data-slick-index="3" aria-hidden="false">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="0"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="0">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="0">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide24" data-slick-index="4" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide25" data-slick-index="5" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide20" data-slick-index="6" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									</a><h4 class="dflex padtb10 bold fsz14 txt_6"><a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1"></span></a><a href="https://www.qmatchup.com/beta/company/index.php/ManageConnection/connectionList/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09" tabindex="-1">Supplier CRM</a>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide21" data-slick-index="7" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide22" data-slick-index="8" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div><div class="padt10 padrl15 padb50 slick-slide slick-cloned" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide23" data-slick-index="9" aria-hidden="true">
							<div class="maxwi_215p pos_rel marrla brdrad5 lgtgrey_bg">
								<div class="pos_abs zi5 top0 right0 talc">
									<span class="fa fa-ellipsis-h dblock pos_abs zi1 pos_cenY right15p opa0_ph fsz36 white_txt"></span>
									<ul class="dflex opa0 opa1_ph pos_rel zi2 mar0 pad5 bg_255_07">
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico1.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico2.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico3.png" alt="" class="dblock"></a>
										</li>
										<li class="dblock mar0 pad0">
											<a href="#" class="dblock pad5" tabindex="-1"><img src="../../../../usercontent/images/share-ico4.png" alt="" class="dblock"></a>
										</li>
									</ul>
								</div>
								<a href="#" class="dblock pos_rel padt15 padrl10 padb5 txt_6" tabindex="-1">
									<div class="pos_abs top-4p left10p">
										<img src="../../../../usercontent/images/hot-saller.png" width="57" height="36" alt="">
									</div>
									
									<div class="pos_rel">
										<div class="wi_65p minhei_40p dflex fxdir_col alit_c justc_c pos_abs bot10p left-15p lgn_hight_12 fsz10 white_txt">
											<img src="../../../../usercontent/images/discount-img.png" width="65" height="37" class="pos_abs zi1 top150p left0" alt="">
											<span class="pos_rel zi2">50%<br>OFF</span>
										</div>
										<img src="../../../../usercontent/images/product.png" width="137" height="190" class="maxwi_100 hei_auto dblock marrla" alt="" title="">
									</div>											
										
										
									<h4 class="dflex padtb10 bold fsz14 txt_6">
										<img src="../../../../usercontent/images/tag.png" width="21" height="27" class="fxshrink_0 marr8">
										<span class="flex_1">Data Entry &amp; Processing and dummy text</span>
									</h4>
									<div class="dflex fxwrap_w justc_sb">
										<span class="fsz20 txt_0b679a">$99.9</span>
										<div class="fxshrink_0 fsz11">
											<div class="dflex">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-yellow.png" alt="">
												<img src="../../../../usercontent/images/star-grey.png" alt="">
											</div>
											<span class="dblock talc">270 reviews</span>
										</div>
									</div>
								</a>
								<div class="wi_100 hei_0 hei_50p_ph xs-hei_50p sm-hei_50p ovfl_hid dflex justc_c alit_c pos_abs top100 left0 mart-5 talc brdradbl5 lgtgrey_bg trans_all2">
									<a href="#" class="minhei_30p diblock padtb5 padrl20 brd brdclr_brdclr_74b807 brdclr_3_h brdrad5 bglgrad_green2 bgrgrad_black_h font_arial bold fsz15 white_txt" tabindex="-1">Select</a>
								</div>
							</div>
						</div></div></div><ul class="slick-dots" style="display: block;" role="tablist"><li class="slick-active" aria-hidden="false" role="presentation" aria-selected="true" aria-controls="navigation20" id="slick-slide20"><button type="button" data-role="none" role="button" tabindex="0">1</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation21" id="slick-slide21"><button type="button" data-role="none" role="button" tabindex="0">2</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation22" id="slick-slide22"><button type="button" data-role="none" role="button" tabindex="0">3</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation23" id="slick-slide23"><button type="button" data-role="none" role="button" tabindex="0">4</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation24" id="slick-slide24"><button type="button" data-role="none" role="button" tabindex="0">5</button></li><li aria-hidden="true" role="presentation" aria-selected="false" aria-controls="navigation25" id="slick-slide25"><button type="button" data-role="none" role="button" tabindex="0">6</button></li></ul></div>
				</div>
				<!-- Getapp -->
				<div class="column_m  white_bg hide">
					<div class="wrap maxwi_100 padrl10">
						
						<div class="dflex fxwrap_w marrl-15">
						
							<!-- Recently Reviewed -->
							<div class="wi_50 xs-wi_100 padrl15">
								<div class="padb15">
									<h3 class="fsz16">Recently Reviewed</h3>
									
									<div class="dflex xxs-fxwrap_w alit_fs marb20 pad15 bxsh_getappgrey white_bg">
										
										<div class="wi_120p xxs-wi_100 fxshrink_0 dflex fxwrap_w xxs-fxwrap_nw">
											<a href="#" class="dblock fxshrink_0">
												<img src="../../../../usercontent/images/getapp/1.jpg" width="120" height="120" class="hei_auto dblock marr10 marb20">
											</a>
											<div class="flex_1">
												<div class="marb5 getappgreen_txt">
													<i class="fa fa-check-square"></i> Verified Reviewer
												</div>
												<div class="marb5 getappgrey_txt">
													<i class="fa fa-edit"></i> 1 review
												</div>
												<div class="marb5 getappgrey_txt">
													<i class="fa fa-calendar-o"></i> Joined Mar 2017
												</div>
												<div class="mart15">
													<img width="24" height="24" class="tooltip marr10" src="../../../../usercontent/images/getapp/link.svg" title="Verified LinkedIn user">
													<img width="24" height="24" class="tooltip marr10" src="../../../../usercontent/images/getapp/app.svg" title="Reviewed 1 app">
												</div>
											</div>	
										</div>
										
										<div class="flex_1 padl20 xxs-pad0">
											
											<h4 class="fsz16 bold">Customer</h4>
											<div class="padb10">
												<div class="rating-wrap dinlblck">
													<div class="rating wi_100"></div>
												</div>
												Reviewed 4 days ago by <a href="#">Norazim Yadiy Mohd Yusof</a>
											</div>
											<p class="padb10">
												<strong>Role:</strong> IT Executive at UDA Holdings Bhd
											</p>
											<p class="padb10">
												Easily one of the best customer relation management system available in the market out there, Plus the vendor's support and sales team, is very commited in ensuring the functionality and system to follow the business requirement and in timely manner.Definitly recommended to all.
											</p>
											<div>
												<strong class="dblock marb10 fsz14">Rating breakdown</strong>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Value for money
												</div>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Ease of use
												</div>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Features
												</div>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Customer support
												</div>
											</div>
											
											<div class="clear mart30 padb30 brdt"></div>
											
											
											
											<a href="#" class="wi_40p fright">
												<img src="../../../../usercontent/images/getapp/logo1.png" class="maxwi_100 hei_auto dblock">
											</a>
											<div class="marr50">
												<h4 class="padb5 fsz16"><a href="#" class="dblue_txt">NABD System</a></h4>
												Multi-channel Customer support &amp; Help Desk software-FREE PLAN
											</div>
											<div class="clear"></div>
											
										</div>
										
										<div class="clear"></div>
									</div>
									
									<div class="dflex xxs-fxwrap_w alit_fs marb20 pad15 bxsh_getappgrey white_bg">
										
										<div class="wi_120p xxs-wi_100 fxshrink_0 dflex fxwrap_w xxs-fxwrap_nw">
											<a href="#" class="dblock fxshrink_0">
												<img src="../../../../usercontent/images/getapp/2.jpg" width="120" height="120" class="hei_auto dblock marr10 marb20">
											</a>
											<div class="flex_1">
												<div class="marb5 getappgreen_txt">
													<i class="fa fa-check-square"></i> Verified Reviewer
												</div>
												<div class="marb5 getappgrey_txt">
													<i class="fa fa-edit"></i> 1 review
												</div>
												<div class="marb5 getappgrey_txt">
													<i class="fa fa-calendar-o"></i> Joined Mar 2017
												</div>
												<div class="mart15">
													<img width="24" height="24" class="tooltip marr10" src="../../../../usercontent/images/getapp/link.svg" title="Verified LinkedIn user">
													<img width="24" height="24" class="tooltip marr10" src="../../../../usercontent/images/getapp/app.svg" title="Reviewed 1 app">
												</div>
											</div>
										</div>
										
										<div class="flex_1 padl20 xxs-pad0">
											
											<h4 class="fsz16 bold">Couldn't live without it.</h4>
											<div class="padb10">
												<div class="rating-wrap dinlblck">
													<div class="rating wi_100"></div>
												</div>
												Reviewed 4 days ago by <a href="#">Norazim Yadiy Mohd Yusof</a>
											</div>
											<p class="padb10">
												<strong>Role:</strong> Recruiter Helping To Hire The Right Talent | Career Transition Coaching
											</p>
											<p class="padb10">
												<strong>Industry:</strong> Staffing and Recruiting
											</p>
											<p class="padb10">
												<strong>Company size:</strong> 1-10
											</p>
											<p class="padb10">
												I started on dropbox when it was in beta, and it literally prolonged the life of my 2009 macbook pro through 2016 by allowing me to save 1000's of pictures, videos etc remotely without bogging down my (eventually) ancient hard drive.
											</p>
											<div>
												<strong class="dblock marb10 fsz14">Rating breakdown</strong>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Value for money
												</div>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Ease of use
												</div>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Features
												</div>
												<div class="marb2">
													<div class="rating-wrap dinlblck">
														<div class="rating wi_100"></div>
													</div>
													Customer support
												</div>
											</div>
											
											<div class="clear mart30 padb30 brdt"></div>
											
											
											
											<a href="#" class="wi_40p fright">
												<img src="../../../../usercontent/images/getapp/logo2.png" class="maxwi_100 hei_auto dblock">
											</a>
											<div class="marr50">
												<h4 class="padb5 fsz16"><a href="#" class="dblue_txt">Dropbox</a></h4>
												File syncing, storage and sharing platform.
											</div>
											<div class="clear"></div>
											
										</div>
										
										<div class="clear"></div>
									</div>
									
								</div>
							</div>
							
							
							<!-- Trending Business Apps -->
							<div class="wi_50 xs-wi_100 padrl15 white_bg">
								<div class="padb15">
									<h3 class="fsz16">Trending Business Apps</h3>
									
									<div class="dflex fxwrap_w alit_s justc_sb marrl-8">
										
										<div class="wi_50 xxs-wi_100 dflex alit_s marb25 padrl8">
											<div class="wi_100 bxsh_getappgrey white_bg">
												<a href="#" class="dblock brd nobrdt nobrdr nobrdl brdclr_dblue brdwi_3">
													<img src="../../../../usercontent/images/getapp/app1.png" class="wi_100 hei_auto dblock">
												</a>
												<div class="pad10">
													<h4 class="wi_100 ovfl_hid dblock marb10 padb10 brdb ws_now txtovfl_el bold fsz14">
														<a href="#" class="dark_grey_txt">Kickserv</a>
													</h4>
													
													<div class="wi_50 fleft">
														<div>Reviews: <strong>104</strong></div>
														<div>Rating: <strong>4.47</strong></div>
													</div>
													<div class="wi_50 fleft bs_bb padt5 talr">
														<div class="rating-wrap dinlblck">
															<div class="rating wi_100"></div>
														</div>
													</div>
													<div class="clear"></div>
													
													<a href="#" class="show_slide_modal dblue_btn wi_100 bs_bb mart20 talc" data-target="#show_more_trending"><span class="fsz14">More info</span></a>
													
													<div class="mart15 padt10 brdt">
														
														<a href="#" class="fleft"><img src="../../../../usercontent/images/getapp/app_logo1.png" width="25"></a>
														<div class="marl30">
															<strong>Kickserv</strong><br>
															Operations Management 
														</div>
														
														<div class="clear"></div>
													</div>
													
												</div>
											</div>
										</div>
										<div class="wi_50 xxs-wi_100 dflex alit_s marb25 padrl8">
											<div class="wi_100 bxsh_getappgrey white_bg">
												<a href="#" class="dblock brd nobrdt nobrdr nobrdl brdclr_dblue brdwi_3">
													<img src="../../../../usercontent/images/getapp/app1.png" class="wi_100 hei_auto dblock">
												</a>
												<div class="pad10">
													<h4 class="wi_100 ovfl_hid dblock marb10 padb10 brdb ws_now txtovfl_el bold fsz14">
														<a href="#" class="dark_grey_txt">Kickserv</a>
													</h4>
													
													<div class="wi_50 fleft">
														<div>Reviews: <strong>104</strong></div>
														<div>Rating: <strong>4.47</strong></div>
													</div>
													<div class="wi_50 fleft bs_bb padt5 talr">
														<div class="rating-wrap dinlblck">
															<div class="rating wi_100"></div>
														</div>
													</div>
													<div class="clear"></div>
													
													<a href="#" class="show_slide_modal dblue_btn wi_100 bs_bb mart20 talc" data-target="#show_more_trending"><span class="fsz14">More info</span></a>
													
													<div class="mart15 padt10 brdt">
														
														<a href="#" class="fleft"><img src="../../../../usercontent/images/getapp/app_logo1.png" width="25"></a>
														<div class="marl30">
															<strong>Kickserv</strong><br>
															Operations Management 
														</div>
														
														<div class="clear"></div>
													</div>
													
												</div>
											</div>
										</div>
										<div class="wi_50 xxs-wi_100 dflex alit_s marb25 padrl8">
											<div class="wi_100 bxsh_getappgrey white_bg">
												<a href="#" class="dblock brd nobrdt nobrdr nobrdl brdclr_dblue brdwi_3">
													<img src="../../../../usercontent/images/getapp/app1.png" class="wi_100 hei_auto dblock">
												</a>
												<div class="pad10">
													<h4 class="wi_100 ovfl_hid dblock marb10 padb10 brdb ws_now txtovfl_el bold fsz14">
														<a href="#" class="dark_grey_txt">Kickserv</a>
													</h4>
													
													<div class="wi_50 fleft">
														<div>Reviews: <strong>104</strong></div>
														<div>Rating: <strong>4.47</strong></div>
													</div>
													<div class="wi_50 fleft bs_bb padt5 talr">
														<div class="rating-wrap dinlblck">
															<div class="rating wi_100"></div>
														</div>
													</div>
													<div class="clear"></div>
													
													<a href="#" class="show_slide_modal dblue_btn wi_100 bs_bb mart20 talc" data-target="#show_more_trending"><span class="fsz14">More info</span></a>
													
													<div class="mart15 padt10 brdt">
														
														<a href="#" class="fleft"><img src="../../../../usercontent/images/getapp/app_logo1.png" width="25"></a>
														<div class="marl30">
															<strong>Kickserv</strong><br>
															Operations Management 
														</div>
														
														<div class="clear"></div>
													</div>
													
												</div>
											</div>
										</div>
										<div class="wi_50 xxs-wi_100 dflex alit_s marb25 padrl8">
											<div class="wi_100 bxsh_getappgrey white_bg">
												<a href="#" class="dblock brd nobrdt nobrdr nobrdl brdclr_dblue brdwi_3">
													<img src="../../../../usercontent/images/getapp/app1.png" class="wi_100 hei_auto dblock">
												</a>
												<div class="pad10">
													<h4 class="wi_100 ovfl_hid dblock marb10 padb10 brdb ws_now txtovfl_el bold fsz14">
														<a href="#" class="dark_grey_txt">Kickserv</a>
													</h4>
													
													<div class="wi_50 fleft">
														<div>Reviews: <strong>104</strong></div>
														<div>Rating: <strong>4.47</strong></div>
													</div>
													<div class="wi_50 fleft bs_bb padt5 talr">
														<div class="rating-wrap dinlblck">
															<div class="rating wi_100"></div>
														</div>
													</div>
													<div class="clear"></div>
													
													<a href="#" class="show_slide_modal dblue_btn wi_100 bs_bb mart20 talc" data-target="#show_more_trending"><span class="fsz14">More info</span></a>
													
													<div class="mart15 padt10 brdt">
														
														<a href="#" class="fleft"><img src="../../../../usercontent/images/getapp/app_logo1.png" width="25"></a>
														<div class="marl30">
															<strong>Kickserv</strong><br>
															Operations Management 
														</div>
														
														<div class="clear"></div>
													</div>
													
												</div>
											</div>
										</div>
										
									
									</div>
								
								</div>
							</div>
							
						</div>
						
						<!-- Recent Posts -->
						<div class="">
							<h3 class="fsz16">Recent Posts from GetApp</h3>
							<div class="dflex fxwrap_w alit_s marrl-15">
								
								<div class="xs-wi_100 wi_33 xs-wi_50 xxs-wi_100 dflex alit_s marb10 padrl15">
									<div class="marb10 bxsh_getappgrey">
										<a href="#" class="fsz14 dblue_txt">
											<img src="../../../../usercontent/images/getapp/1.png" class="wi_100 hei_auto dblock">
											<div class="hei_90p bs_bb marrl15 padt25 lgn_hight_18">What is blockchain technology? 4 small business owners explain</div>
										</a>
									</div>
								</div>
								
								<div class="xs-wi_100 wi_33 xs-wi_50 xxs-wi_100 dflex alit_s marb10 padrl15">
									<div class="marb10 bxsh_getappgrey">
										<a href="#" class="fsz14 dblue_txt">
											<img src="../../../../usercontent/images/getapp/2.png" class="wi_100 hei_auto dblock">
											<div class="hei_90p bs_bb marrl15 padt25 lgn_hight_18">Don’t be another Uber: How to build a corporate culture in the gig economy</div>
										</a>
									</div>
								</div>
								
								<div class="xs-wi_100 wi_33 xs-wi_50 xxs-wi_100 dflex alit_s marb10 padrl15">
									<div class="marb10 bxsh_getappgrey">
										<a href="#" class="fsz14 dblue_txt">
											<img src="../../../../usercontent/images/getapp/3.png" class="wi_100 hei_auto dblock">
											<div class="hei_90p bs_bb marrl15 padt25 lgn_hight_18">Save the data: why it’s time to start using customer analytics</div>
										</a>
									</div>
								</div>
								
								<div class="xs-wi_100 wi_33 xs-wi_50 xxs-wi_100 dflex alit_s marb10 padrl15">
									<div class="marb10 bxsh_getappgrey">
										<a href="#" class="fsz14 dblue_txt">
											<img src="../../../../usercontent/images/getapp/4.jpg" class="wi_100 hei_auto dblock">
											<div class="hei_90p bs_bb marrl15 padt25 lgn_hight_18">Top Reviewed Project Management Software for Construction Professionals</div>
										</a>
									</div>
								</div>
								
								<div class="xs-wi_100 wi_33 xs-wi_50 xxs-wi_100 dflex alit_s marb10 padrl15">
									<div class="marb10 bxsh_getappgrey">
										<a href="#" class="fsz14 dblue_txt">
											<img src="../../../../usercontent/images/getapp/5.png" class="wi_100 hei_auto dblock">
											<div class="hei_90p bs_bb marrl15 padt25 lgn_hight_18">6 Accounting Software Tips for First-Time Small Business Buyers</div>
										</a>
									</div>
								</div>
								
								<div class="xs-wi_100 wi_33 xs-wi_50 xxs-wi_100 dflex alit_s marb10 padrl15">
									<div class="marb10 bxsh_getappgrey">
										<a href="#" class="fsz14 dblue_txt">
											<img src="../../../../usercontent/images/getapp/6.png" class="wi_100 hei_auto dblock">
											<div class="hei_90p bs_bb marrl15 padt25 lgn_hight_18">How to Choose Personal Trainer Software: A Handy Checklist</div>
										</a>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
				
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
		</div>
		
		
		<!-- CALLBACK -->
		<div class="column_m zi10 frtred_bg hide">
			<div class="wrap maxwi_100 padtb60 padrl15 talc white_txt fsz16">
				<h2 class="padb15 fsz44 white_txt">Räkna ut kostnaden för ditt medlemskap</h2>
				<p class="padb15 uppercase">Välj medlemskap, ange postnummer och antal anställda och se årskostnad</p>
				<form>
					<div class="dflex fxwrap_w justc_c marrl-5">
						<div class="wi_25 sm-xs-wi_100 wi_33 xs-xs-wi_100 wi_33 xxs-wi_100 bs_bb marb15 padrl5">
							<label class="sr-only" for="callback-select-button">Type</label>
							<select class="wi_100 jui-select" id="callback-select" data-button-classes="wi_100_i hei_36p padt9 padrl15 nobrd frtdred_bg_i white_txt_i" data-icon-classes="fa fa-angle-down marr-10 bgi_none_i txtind0" data-menu-classes="fsz16" style="display: none;">
								<option value="1">Företagare</option>
								<option value="2">Nystartad företagare</option>
								<option value="3">Ung företagare</option>
								<option value="4">Student</option>
								<option value="5">Stödjande</option>
							</select><span tabindex="0" id="callback-select-button" role="combobox" aria-expanded="false" aria-autocomplete="list" aria-owns="callback-select-menu" aria-haspopup="true" class="ui-selectmenu-button ui-selectmenu-button-closed ui-corner-all ui-button ui-widget wi_100_i hei_36p padt9 padrl15 nobrd frtdred_bg_i white_txt_i"><span class="ui-selectmenu-icon ui-icon ui-icon-triangle-1-s fa fa-angle-down marr-10 bgi_none_i txtind0"></span><span class="ui-selectmenu-text">Företagare</span></span>
						</div>
						<div class="wi_25 sm-xs-wi_100 wi_33 xs-xs-wi_100 wi_33 xxs-wi_100 bs_bb marb15 padrl5">
							<label class="sr-only" for="callback-text">Ange ditt postnummer</label>
							<input type="text" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt" id="callback-text" placeholder="Ange ditt postnummer"> </div>
						<div class="wi_25 sm-xs-wi_100 wi_33 xs-xs-wi_100 wi_33 xxs-wi_100 bs_bb marb15 padrl5">
							<label class="sr-only" for="callback-number">Ange antal anställda</label>
							<input type="number" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt" id="callback-number" placeholder="Ange antal anställda"> </div>
						<div class="wi_100p xxs-wi_100 bs_bb marb15 padrl5">
							<button type="submit" class="wi_100 hei_36p nobrd brdrad3 white_bg frtgrey_bg_h fsz16 frtred_txt curp trans_all2">Räkna ut</button>
						</div>
					</div>
				</form>
				<p class="padt15 padb15 uppercase"> <a href="#" class="white_txt" target="_blank">Läs mer om medlemskapet</a> </p>
			</div>
		</div>
		<div class="clear"></div>
		
		
		<!-- ADVANTAGES -->
		<div class="column_m zi10 frtlgrey_bg hide">
			<div class="wrap maxwi_100 padt30 padb10 padrl15 fsz16 dark_grey_txt">
				<h2 class="padb15 talc fsz44 dark_grey_txt">Förmåner &amp; Försäkringar</h2>
				<p class="padb15 uppercase talc">Ingår i ditt medlemskap</p>
				<div class="dflex alit_s marrl-15 padt15 slick-initialized slick-slider" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1" role="toolbar">
					
					
					
					
				<div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 100px; transform: translate3d(0px, 0px, 0px);" role="listbox"><div class="pos_rel marb30 padrl15 padb40 slick-slide slick-current slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide30" data-slick-index="0" aria-hidden="false">
						<div> <img src="../../../../usercontent/images/news/foretagarna1.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Affärsnätverket" alt="Affärsnätverket">
							<h3 class="padb10 fsz24 dark_grey_txt">Affärsnätverket</h3>
							<div> Hitta andra företagare och få nya kunder med Företagarnas Affärsnätverk. Sök medlemmar, beställ offerter och gör affärer! </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt" tabindex="0">Läs mer</a> </div>
					</div><div class="pos_rel marb30 padrl15 padb40 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide31" data-slick-index="1" aria-hidden="false">
						<div> <img src="../../../../usercontent/images/news/foretagarna2.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Försäkringar" alt="Försäkringar">
							<h3 class="padb10 fsz24 dark_grey_txt">Försäkringar</h3>
							<div> Omfattande försäkringspaket anpassat för dig som företagare. Vi har försäkringar för dig, ditt företag och dina anställda. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt" tabindex="0">Läs mer</a> </div>
					</div><div class="pos_rel marb30 padrl15 padb40 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide32" data-slick-index="2" aria-hidden="false">
						<div> <img src="../../../../usercontent/images/news/foretagarna3.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Rådgivningen" alt="Rådgivningen">
							<h3 class="padb10 fsz24 dark_grey_txt">Rådgivningen</h3>
							<div> Ring våra jurister kostnadsfritt när du behöver hjälp med en juridisk fråga! Eller sök rätt på svaret i vår FAQ. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt" tabindex="0">Läs mer</a> </div>
					</div><div class="pos_rel marb30 padrl15 padb40 slick-slide slick-active" style="width: 25px;" tabindex="-1" role="option" aria-describedby="slick-slide33" data-slick-index="3" aria-hidden="false">
						<div> <img src="../../../../usercontent/images/news/foretagarna4.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Förmåner" alt="Förmåner">
							<h3 class="padb10 fsz24 dark_grey_txt">Förmåner</h3>
							<div> Spar tid och pengar genom att nyttja våra medlemsförmåner. Erbjudanden och rabatter på allt från bilar, drivmedel, resor, telefoni och hårdvara. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt" tabindex="0">Läs mer</a> </div>
					</div></div></div></div>
			</div>
			<style>
				.slick-dots li button:before {
					font-size: 15px;
					color: #89c403!important;
				}
			</style>
		</div>
		<div class="clear"></div>
		
		
		<!-- FOOTER -->
		
		<!-- Menu list fade -->
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist2-dropdown" data-target="#menulist2-dropdown,#menulist2-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown3" data-target="#menulist-dropdown3,#menulist-dropdown3" data-classes="active" data-toggle-type="separate"></a>
		
		<!-- Dynamic filter menu -->
		<ul class="filter-add-menu filter-add-radio hide" id="filter-add-category">
			<li class="has-submenu">
				<a href="#" class="dblock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu1">
					Web, Mobile &amp; Software Dev<span class="fa fa-chevron-right fright"></span>
				</a>
				<ul>
					<li>
						<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu1">
							All subcategories <span class="count">(0)</span>
						</a>
					</li>
					<li class="has-submenu">
						<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu11">
							Software Development<span class="count">(0)</span><span class="fa fa-chevron-right fright"></span>
						</a>
						<ul>
							<li>
								<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu1">
									All subcategories <span class="count">(0)</span>
								</a> 
							</li>
							<li class="has-submenu">
								<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu111">
									Software Development<span class="count">(0)</span><span class="fa fa-chevron-right fright"></span>
								</a>
								<ul>
									<li>
										<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu1">
											All subcategories <span class="count">(0)</span>
										</a>
									</li>
									<li>
										<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu1111">
											Software Development<span class="count">(0)</span>
										</a> 
									</li>
									<li>
										<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu1112">
											Ecommerce Development<span class="count">(0)</span>
										</a> 
									</li>
									<li>
										<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu1113">
											Game Development<span class="count">(0)</span>
										</a> 
									</li>
								</ul>
								<div class="clear"></div> 
							</li>
							<li>
								<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu112">
									Ecommerce Development<span class="count">(0)</span>
								</a> 
							</li>
							<li>
								<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu113">
									Game Development<span class="count">(0)</span>
								</a> 
							</li>
						</ul>
						<div class="clear"></div> 
					</li>
					<li>
						<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu12">
							Ecommerce Development<span class="count">(0)</span>
						</a> 
					</li>
					<li>
						<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu13">
							Game Development<span class="count">(0)</span>
						</a> 
					</li>
				</ul>
				<div class="clear"></div>
			</li>
			<li class="has-submenu">
				<a href="#" class="dblock" data-text="IT &amp; Networking" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu2">
					IT &amp; Networking<span class="fa fa-chevron-right fright"></span>
				</a>
				<ul>
					<li>
						<a href="#" class="dlock" data-text="IT &amp; Networking" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu2">
							All subcategories <span class="count">(0)</span>
						</a> 
					</li>
					<li>
						<a href="" class="dblock" data-text="Database Administration" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu21">
							Database Administration<span class="count">(0)</span>
						</a> 
					</li>
					<li>
						<a href="" class="dblock" data-text="ERP / CRM Software" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu22">
							ERP / CRM Software<span class="count">(0)</span>
						</a> 
					</li>
					<li>
						<a href="" class="dblock" data-text="Information Security" data-category="Category" data-additional="checkbox1" data-name="radio2" data-value="submenu23">
							Information Security<span class="count">(0)</span>
						</a> 
					</li>
				</ul>
				<div class="clear"></div>
			</li>
		</ul>
		
		<!-- Locations input datalist -->
		<ul class="filter-datalist-menu filter-text-datalist-menu filter-add-checkbox hide" id="location_search_dl">
			<li disabled="disabled">
				<span class="dblock">
					Regions
				</span>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Africa" data-category="Location" data-value="africa" data-name="africa">
					Africa
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Antarctica" data-category="Location" data-value="antarctica" data-name="antarctica">
					Antarctica
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Asia" data-category="Location" data-value="asia" data-name="asia">
					Asia
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Europe" data-category="Location" data-value="europe" data-name="europe">
					Europe
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Oceania" data-category="Location" data-value="oceania" data-name="oceania">
					Oceania
				</a>
			</li>
			<li disabled="disabled">
				<span class="dblock">
					Countries
				</span>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Albania" data-category="Location" data-value="albania" data-name="albania">
					Albania
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Kazakhstan" data-category="Location" data-value="kazakhstan" data-name="kazakhstan">
					Kazakhstan
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Russia" data-category="Location" data-value="russia" data-name="russia">
					Russia
				</a>
			</li>
		</ul>
		
		<!-- Tests input datalist -->
		<ul class="filter-datalist-menu filter-text-datalist-menu filter-add-checkbox hide" id="tests_search_dl">
			<li>
				<a href="#" class="dblock" data-text="3ds Max 9" data-category="Test" data-additional="test_scores" data-value="3ds_Max_9" data-name="3ds_Max_9">
					3ds Max 9
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Accounting Principles" data-category="Test" data-additional="test_scores" data-value="Accounting_Principles" data-name="Accounting_Principles">
					Accounting Principles
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Accounting Skills Test" data-category="Test" data-additional="test_scores" data-value="Accounting_Skills_Test" data-name="Accounting_Skills_Test">
					Accounting Skills Test
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Accounts Payable" data-category="Test" data-additional="test_scores" data-value="Accounts_Payable" data-name="Accounts_Payable">
					Accounts Payable
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Adobe Flash CS3" data-category="Test" data-additional="test_scores" data-value="Adobe_Flash_CS3" data-name="Adobe_Flash_CS3">
					Adobe Flash CS3
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Adobe Illustrator" data-category="Test" data-additional="test_scores" data-value="Adobe_Illustrator" data-name="Adobe_Illustrator">
					Adobe Illustrator
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="C++ Programming" data-category="Test" data-additional="test_scores" data-value="C++_Programming" data-name="C++_Programming">
					C++ Programming
				</a>
			</li>
			<li>
				<a href="#" class="dblock" data-text="Compiler Design" data-category="Test" data-additional="test_scores" data-value="compiler_design" data-name="compiler_design">
					Compiler Design
				</a>
			</li>
		</ul>
		
		<!-- Filter input datalist -->
		<div class="filter-datalist-menu filter-range-datalist-menu hide" id="area_search_dl">
			<!-- * NOTE
				- data-weight is required for min/max relationships
				- based on it max values will be hidden if min is selected and otherwise
			-->
			<div class="filter-range-menu-wrap">
				<ul class="filter-range-menu-min wi_50 fleft bs_bb mar0 pad0">
					<li disabled="disabled">
						<span class="dblock">Min</span>
					</li>
					<li>
						<a href="#" class="dblock" data-text="10m²" data-category="Area" data-weight="10">10m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="20m²" data-category="Area" data-weight="20">20m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="30m²" data-category="Area" data-weight="30">30m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="40m²" data-category="Area" data-weight="40">40m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="50m²" data-category="Area" data-weight="50">50m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="60m²" data-category="Area" data-weight="60">60m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="70m²" data-category="Area" data-weight="70">70m²</a>
					</li>
				</ul>
				<ul class="filter-range-menu-max wi_50 fleft bs_bb mar0 pad0">
					<li disabled="disabled">
						<span class="dblock">Max</span>
					</li>
					<li>
						<a href="#" class="dblock" data-text="10m²" data-category="Area" data-weight="10">10m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="20m²" data-category="Area" data-weight="20">20m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="30m²" data-category="Area" data-weight="30">30m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="40m²" data-category="Area" data-weight="40">40m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="50m²" data-category="Area" data-weight="50">50m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="60m²" data-category="Area" data-weight="60">60m²</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="70m²" data-category="Area" data-weight="70">70m²</a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="padtb10 talr">
				<button class="datalist-menu-close marr5 lgtgrey_btn min_height">OK</button>
			</div>
		</div>
		
		<!-- Filter input datalist -->
		<div class="filter-datalist-menu filter-range-datalist-menu hide" id="price_search_dl">
			<div class="filter-range-menu-wrap">
				<ul class="filter-range-menu-min wi_50 fleft bs_bb mar0 pad0">
					<li disabled="disabled">
						<span class="dblock">Min</span>
					</li>
					<li>
						<a href="#" class="dblock" data-text="50 kr" data-category="Price" data-weight="0">50 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="100 tkr" data-category="Price" data-weight="10">100 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="200 tkr" data-category="Price" data-weight="20">200 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="300 tkr" data-category="Price" data-weight="30">300 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="400 tkr" data-category="Price" data-weight="40">400 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="500 tkr" data-category="Price" data-weight="50">500 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="750 tkr" data-category="Price" data-weight="60">750 000</a>
					</li>
				</ul>
				<ul class="filter-range-menu-max wi_50 fleft bs_bb mar0 pad0">
					<li disabled="disabled">
						<span class="dblock">Max</span>
					</li>
					<li>
						<a href="#" class="dblock" data-text="50 kr" data-category="Price" data-weight="0">50 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="100 tkr" data-category="Price" data-weight="10">100 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="200 tkr" data-category="Price" data-weight="20">200 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="300 tkr" data-category="Price" data-weight="30">300 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="400 tkr" data-category="Price" data-weight="40">400 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="500 tkr" data-category="Price" data-weight="50">500 000</a>
					</li>
					<li>
						<a href="#" class="dblock" data-text="750 tkr" data-category="Price" data-weight="60">750 000</a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="padtb10 talr">
				<button class="datalist-menu-close marr5 lgtgrey_btn min_height">OK</button>
			</div>
		</div>
	<div id="popup_fade" class="opa0 opa55_a black_bg" style="position: fixed;"></div>
		
	</div>
		<div class="column_m martb30 xs-padtb10 talc lgn_hight_22 fsz16 lgtgrey2_bg ">
			
			
						
					<div class="wrap maxwi_100 padrl10 mart30">
					<div class="padb30 mart20 tall">
								<h3 class="padb10  fsz32 black_txt"><a href="#" class="black_txt padb10 bold">Nätverket är för</a></h3>
								<div class="dflex alit_fs justc_sb brdb">
									<span class="flex_1  padb10 fsz18">Convince investors by demonstrating your understanding of how to build a scaling company.</span>
									<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd">
										<span class="fa fa-plus dblock dnone_pa"></span>
										<span class="fa fa-minus dnone dblock_pa"></span>
									</a>
								</div>
								
							</div>
					
						
						<div class="wi_100 dflex xs-fxdir_col alit_s xs-alit_c justc_c mart0">
							<div class="wi_50 xs-wi_100 maxwi_320p flex_1 padtb30 xs-brdb ">
								<span class="icon icon1"></span>
								<h4 class="fsz65 ">0-49 </h4><br>
								<h4 class="fsz20 marb20 padt10 bold">Antal anställda </h4>
								<!--<p>Ett digitalt nätverk av verifierade chefer och företagsledare från små, medelstora och stora bolag inom olika branscher och offentliga sektorn.</p>-->
								<!--<a href="#" class="martrl5 dblue_btn">Submit</a>-->
							</div>
							<div class="fxshrink_0 xs-dnone marrl30 sm-marrl15 brdl"></div>
							<div class="wi_50 xs-wi_100 maxwi_320p flex_1 padtb30">
								<span class="icon icon2"></span>
								<h4 class="fsz65 ">50-249 </h4><br>
								<h4 class="fsz20 marb20 padt10 bold">Antal anställda </h4>
							<!--	<p>Våra medlemmar träffar personer med samma chefsroll, för att säkerställa att utbyte av information, erfarenheter, tips och idéer är hög relevanta. Vi kvalitetsäkrar medlemmarnas roller och bolagets storlek årligen.</p>-->
								<!--<a href="#" class="martrl5 dblue_btn">Submit</a>-->
							</div>
							<div class="fxshrink_0 xs-dnone marrl30 sm-marrl15 brdl"></div>
							<div class="wi_50 xs-wi_100 maxwi_400p flex_1 padtb30">
								<span class="icon icon3"></span>
								<h4 class="fsz65 ">+250</h4><br>
								<h4 class="fsz20 marb20 padt10 bold">Antal anställda </h4>
								<!--<p>Get real-time information about every activity a customer and prospect engages in. With SalesSignals you can know now, so you can act now. </p>-->
								
							</div>
						</div>
					</div>
				</div>
			
			<div class="column_m martb30 xs-padtb10 talc lgn_hight_22 fsz16 white_bg">
			<div class="start-perks column_m martb30 xs-padtb10 talc lgn_hight_22 fsz16 ">
		
					<div class="wrap maxwi_100 padrl10">
						
							<div class="padb15 mart20 tall">
								<h3 class="padb10  fsz32 black_txt"><a href="#" class="black_txt padb10 bold">Chefer får...</a></h3>
								<div class="dflex alit_fs justc_sb brdb">
									<span class="flex_1  padb10 fsz18">Convince investors by demonstrating your understanding of how to build a scaling company.</span>
									<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd">
										<span class="fa fa-plus dblock dnone_pa"></span>
										<span class="fa fa-minus dnone dblock_pa"></span>
									</a>
								</div>
								
							
							
							</div>
						<div class="wi_100 dflex fxwrap_w alit_s xs-alit_c justc_c pos_rel mart30">
							<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr  xs-nobrdr brdb">
								<img src="../../html/usercontent/images/workplace/5.png" class="wi_100 hei_auto dblock marb10">
								<h3 class="lgn_hight_s12 bold fsz20 padt10"> FAQ Nätverket</h3>
								<p>Här kan personer med samma roll som du ställa eller/och svara på frågor till varandra. Alla frågor och svar är anonyma och endast för medlemmar. Och inga utomstående kommer kunna ta del av de och ringa för att sälja. </p>
							</div>
							<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr  sm-nobrdr xs-nobrdr brdb">
								<img src="../../html/usercontent/images/workplace/2.png" class="wi_100 hei_200p dblock marb10 padrl20">
								<h3 class="lgn_hight_s12 bold fsz20 padt10">Trendwatch</h3>
								<p>Trendwatch är en PublicistPlatform för företag, myndigheter eller organisationer som önskar sprida kunskap digitalt. I dagsläget har vi ca 7000 anslutna källor och drygt 30 000 artiklar indexerade inom olika områden.</p>
								<a href="#" class="martrl5 dblue_btn">Submit</a>
							</div>
							<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15   xs-nobrdr brdb">
								<img src="../../html/usercontent/images/workplace/3.png" class="wi_90 hei_auto dblock marb10 padl25">
								<a href="#"><h3 class="lgn_hight_s12 bold fsz20 padt10">Appar &amp; Mallar</h3></a>
								<p>Apparna går under forskning och framsteg och är utvecklade i samråd och/eller efter förfrågan från våra kunder. Apparna är indelade i kategorier och arbetsprocesser.</p>
							</div>
							<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr  sm-nobrdr xs-nobrdr ">
								<img src="../../html/usercontent/images/workplace/4.png" class="wi_100 hei_auto dblock marb20 mart5">
								<a href="#"><h3 class="lgn_hight_s12 bold fsz20 padt10">Smarta Inköp</h3></a>
								<p>Smarta inköp är en serie av konceptlösningar i samarbete med tusentals kvalificerade leverantörer och färdigutveckladeköpprocesser. Under Smart Inköp hittar våra kunder rätt leverantör snabbt.</p>
							</div>
							<div class="wi_33 sm-wi_50 xs-wi_100 maxwi_400p flex_1 pad15 brdr  xs-nobrdr ">
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
			
			<div class="column_m martb30 xs-padtb10 talc lgn_hight_22 fsz16 lgtgrey2_bg">
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
					
					<?php include 'PublicUserFooter.php'; ?>
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
