<html lang="en" style="--vh: 6.75px;"> 

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	<title>Qmatchup</title>
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet">
	
	<!-- Styles -->
	<script src="https://kit.fontawesome.com/119550d688.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/constructor.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/responsive.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/css/icofont.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/css/slick.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/css/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/constructor.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/responsive.css">
	<link rel="stylesheet" type="text/css" media="all" href="../../../../html/smartappcss/css/modules.css">
  
	<!-- Scripts -->
	<script type="text/javascript" src="html/smartappcss/js/jquery.js"></script>
	<script>
	function checkLogin()
			{
			const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
			 
				if( vw<800 ) {
					$('.slick-track').attr('style','width:666px');
					$('.active_width').attr('style','width:333px');
					$('.active_width1').attr('style','width:333px');
					$('.active_width1').attr('style','left:-333px');
					$('.fix_height').attr('style','height:811.33px');
				} else {
				    $('.slick-track').attr('style','width:2326px');
					$('.active_width').attr('style','width:1163px');
					$('.active_width1').attr('style','width:1163px');
					$('.active_width1').attr('style','left:-1163px');
					$('.fix_height').attr('style','height:394.33px');
				}
			}
			
	function updateVerify()
	{
		document.getElementById('save_indexing').submit();	
	}
			</script>
</head>

<body class="font_poppins fsz14" onload="checkLogin();" style="background: #212b3a;">
<?php if($updatePreCheckinStatus['total_left']>0)
{ ?>
	<form action="../precheckedPersons/<?php echo $data['hotel_checkin_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
	<input type="hidden" id="precheck_verify" name="precheck_verify" value="1" />
	</form>
	<!-- HEADER -->
	<div class="column_m hei_45p header xs-header bs_bb red_ff2828_bg  " onclick="updateVerify();">
		<div class="wi_100 hei_45p   padrl10 red_ff2828_bg">
			
			<div class="  fleft padrl0 hidden">
							<div class="flag_top_menu flefti padb10 wi_50p padt5">
							<ul class="menulist sf-menu fsz14">
								 
								<li class="first last" style="margin: 0 15px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz15 sf-with-ul"><i class="fab fa-airbnb white_txt fsz30 padb0" aria-hidden="true"></i></a>
								</li>
								
								 
								 
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="top_menu talc padtb13 xxs-padtb11 wi_100 maxwi_100  ">
				<ul class="menulist sf-menu  fsz16   wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="white_txt pred_txt_h ffamily_avenir">Update guest information

</span></a>
					</li>
				 	 
       			 	</ul>
			</div>
			
			  <div class="clear"></div>
		</div>
	</div>
<?php } ?>
	<div class="column_m header   bs_bb trans_bg " style="height:97.44px;">
<div class="header__center center padding2080 xs-padding032 " style="display: flex;
    align-items: center; width: 100%;
    max-width: 1280px;
    margin: 0 auto;
  "><a class="header__logo xs-fsz20 " href="#" style="
    border: 2px solid #ffffff;
    padding: 10px;
    color: white;
    border-radius: 5px;
    font-family: Avenir;
    font-size: 20PX;
    line-height: 20px !important;
    "><?php echo $bookingInformationDetail['hotel_name']; ?></a>


		
			
			
			

</div>
</div>
		
	<div class="clear"></div>
		
	
	
	<!-- SUBHEADER -->
	

	

	
	
	
	
	
	
		
	
		
	
	
	
	

	
	
	

	<!-- FEATURES -->
	
	


	
	<!-- HEADER -->
	
	
	
		
	
		
	
	
	
	

	

	
	
	
	
	
	
		
	
		
	
	
	
	

	
	
	

	
	
	





	
	
	
	
	
	
	
	
	



	
	
	
	
	
	
	
	
	
	
	
	
	
				
				

	
	

	
		
	
	
	
	
					
					
					
					
	
	
		
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="column_m container mart40" style="
    background: #212b3a;
">
				<div class=" wi_100 maxwi_100 marb0  padrl25 padt0 white_bg padb0 " style="
    background: #212b3a;
">
				
				
					<div class="wrap maxwi_100 padb0" style="width: 1200px;">
						
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16" style="">
							<div class="wi_55 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s tall" style="
    font-family: avenir;
    border-radius: 25px;
">
								
								
								
								
								
								
								
								
							</div><div class="wi_50 xs-wi_100 dflex justc_c alit_s marb10 padt20 xs-padrl12 talc" style="border-bottom: 1px solid #282b34;margin-bottom: 10px;">
									<div class="wi_100 maxwi_500p ovfl_hid padt0">
										
										
										<div class="category-apps sales-marketing marrbl-2 uppercase fsz12">
											<a href="#" class="wi_66 xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt fsz16 xs-fsz12 crm featured-app">Entry code</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt salesinbox">Wi-Fi</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt salesiq"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">5 events</font></font></em>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Manuals</font></font></a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt survey">House rules</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr contactmanager black_txt" style="
    color: #cbc9c9;
"><em class="dblock pos_abs padrl5 blue_bg white_txt fsz10 new"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0 Issues</font></font></em>
Home Repair<br></a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt sites">Phonebook</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdr dark_grey_txt social">SoS Help</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30  brdr dark_grey_txt contactmanager">Book a pro</a>
											<a href="#" class="wi_33 dblock fleft pos_rel zi3_h padt30  brdr dark_grey_txt forms  " style="
">Community</a>
											
											
										</div>
									</div>
								</div>
							
						</div>
					</div>
				
				
				
				
				
			<div class="padt60 xxs-talc talc padb50">
								
								<button type="button" name="forward" class="forword minhei_55p   fsz16 padrl80 nobold"  style="
    border-radius: 5px;
    background: #3691c0;
    /* border: 2px solid black; */
    color: #f7f7f7;
"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Check out</font></font></button>
								
							</div>

	</div>

	</div><script>
				function changeStyle(link,id)
				{
					if($(link).hasClass('active'))
					{
						$(link).removeClass('active');
						$("#faq-"+id).attr('style',"display:none");
					}
					else
						{
						$(link).addClass('active');
						$("#faq-"+id).attr('style',"display:block");
					}
				}
				</script>
	<!-- FAQ -->
	
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/slick.min.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/superfish.js"></script>
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/jquery.selectric.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//modules.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/custom.js"></script>











<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		<div class="wi_55 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padr50 brdr">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">Heart Starters
</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">Having defibrillators readily available can help to save lives.

Defibrillators can raise survival rates from cardiac arrest from 6% to an incredible 74%. </h3></a>


				</div>
			</div>
<div class="wi_45 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padl50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Lost &amp; Found</font></font></h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">“Some things are simply irreplaceable. So when an honest individual finds and reports a lost item, it can really make your day.

</h3></a>


				</div>
			</div>
		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	<div class="column_m container zi5    xs-mart0 white_bg ">
				
						
					</div>
	
					<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		<div class="wi_75 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padr50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">SoS Help</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">There are times in life when you find yourself in situations where you are unable to inform relatives about your well-being. It can be due to an accident, when you receive treatment abroad, when you are detained or disappeared without a trace.</h3></a>


				</div>
			</div>

		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	
	<!-- HERO SLIDER -->
	<div class="column_m container padb40 white_bg talc padrl55 xs-padrl10 hidden" style="    margin-top: 20px;">
				<div class="wi_100  txt_708198 pad40 padt80 padb80 xs-pad15  marb15  maxwi_100 marrla" style="background-color: #0F0F0F;max-width: 1200px;border-radius: 30px;padding-bottom: 80px;">
					
					
					<h2 class="padl10 xxs-padrl25 talc marrla  white_txt  marb0 fsz120 maxwi_750p  xsi-padrl100  ffamily_avenir mart40 bold" style="
    font-size: 110px;
">TXP</h2>
						<h2 class="padl0 xxs-padrl25 talc marrla  white_txt  marb10 fsz90 maxwi_750p  xsi-padrl100  ffamily_avenir mart0" style="
    font-size: 80px;
">A Community Hub</h2><div class="marb40 xs-marb20 pad0 grey_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_750p xsi-padrl100 ffamily_avenir lgn_hight_s15">TXP stands for Tenant Experience and is a community solution with tenant in focus. </div>
						
						</div>
						
						&nbsp;
				</div>

	<!-- FEATURES -->
	
	<div class="  column_m container  wi_100 maxwi_100 marb0  padrl15 padt0 white_bg padb80 brdb hidden">
			<div class="  maxwi_100 marrla" style="
    width: 1200px;
">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc  xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 xxs-padrl0 " style="
">
				<div class="wi_100 black_txt brdr" style="/* background-color: #0F0F0F; *//* border: 2px solid black; *//* border-radius: 20px; */padding: 45px;">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#"><h3 class="mart40 marb10 pad0 black_txt fsz40 xs-fsz20 tall" style="font-family: Avenir;">73% love TXP</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">73% of all residents log into the app at least once per day. Popular features include communication feed, library and contacts.

</h3></a>


				</div>
			</div>
			

<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0  xxs-padl0 ">
				<div class="wi_100 pad20 black_txt lgtgrey_bg brdr" style="/* border-radius: 20px; */padding: 45px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 black_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">3,200 are active</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">3,200 communities have succefully signed and use it on daily basis since we started a year ago.

</h3></a>


				</div>
			</div><div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 xxs-padl0 ">
				<div class="wi_100 pad25  txt_708198 lgtgrey2_b" style="/* background-color: #0F0F0F !important; *//* border: 2px solid black; *//* border-radius: 20px; */padding: 45px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 black_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">Over 300k users</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">We have more than 300 thousands tenants using TXP. Our onboarding so far is 84%
</h3></a>


				</div>
			</div>
			
		</div>
		
	</div>


	</div>
	
	<!-- ABOUT -->
	
	
	
	<!-- AMAZING FEATURES -->
	<div class="column_m container padt80 padb80 white_bg hidden">
	<div class="wrap hei_100 bg_ffeb18   bgir_norep bgip_c bgis_cov   centerImage xxs-centerImage hidden">
					<img src="https://developer.apple.com/programs/enterprise/images/enterprise-all-hero-large.jpg" class="wi_100 hei_auto marb35">
					</div>
					<h2 class="padl10 xxs-padrl25 talc marrla  black_txt lgn_hight_95 marb10 fsz90 xs-fsz45 maxwi_960p  xsi-padrl100 xxs-lgn_hight_60 ffamily_avenir">3 in 1 product</h2>
						<div class="marb80 xs-marb20 pad0 grey_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir">TXP is a mobile app. The beauty with TXP is that it combines the 3 things our users wants and needs the most. Comfort, Security and and access to Services.  </div>

						
						
				
				</div>

<div class=" wi_100 maxwi_100 marb0  padrl15 marb40 white_bg padb80 brdb hidden">
			<div class="  maxwi_100 white_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0 marb0">
		<div class="wi_30 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 bg_1d1d1f">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f" style="
    background: #0F0F0F !important;
    border-radius: 20px;
">
					
					<img src="http://www.qricis.com/../../../../html/smartappcss/html/smartappcss//images/websiteimages/wifi.jpg" class="hidden-xs talc" width="180px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ios__geprj2n8keuu_large.jpg" class="visible-xs talc" width="262px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz30 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">Comfort</h3>
					<h3 class="marb0 xs-marb20 pad0 fsz17 tall padrl20 xs-padrl0 lgtgrey_txt" style="font-family: Avenir;
">Do incredible things on the go. Visualize 3D projects using augmented reality. Collaborate with your team on Keynote presentations. And stay connected with FaceTime, Messages, and Mail.</h3></a>


				</div>
			</div>
			<div class="clear"></div>
			<div class="wi_70 xxs-wi_100 maxwi_100    alit_s mart15 padl30 xxs-padl0 ">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 marb30  xs-marl0 xs-pad15" style="
    background: #0f0f0f;
    border-radius: 20px;
">
					<div class="dflex fxwrap_w alit_s">
					<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="hidden-xs talc" width="130px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="visible-xs talc" width="164px;">
</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart0 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt fsz30 tall padrl50 xs-padrl0" style="font-family: Avenir;">Security</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Stay connected at a glance. Handle notifications as they pop up with a single tap, track Messages, and get the most out of apps for work and wellness.</h3></a>
</div>
</div>

				</div>
				
				<div class="wi_100   txt_708198 pad25 padt80 padb80 mart15  xs-marl0 xs-pad15" style="
    background: #0f0f0f;
    border-radius: 20px;
">
				<div class="dflex fxwrap_w alit_s">
				<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">	
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="hidden-xs talc" width="258px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="visible-xs talc" width="262px;">
					</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt fsz30 tall padrl50 xs-padrl0" style="font-family: Avenir;">Service Store</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Turn your best work into a cinematic experience. Put important presentations and data-driven dashboards on display.</h3></a>
</div>

</div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
	<div class="column_m container black_bg brdb hidden">
				<div class=" wi_100 maxwi_100 marb0  padrl15 padt0 white_bg padb0 xs-padt40">
				
				
					<div class="wrap maxwi_100 padtb30" style="width: 1300px;">
						
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							<div class="wi_30 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-mart35 xxs-padrl0 padr20">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198 talc" style="
    border-radius: 25px;
">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#" style="
    border-radius: 25px;
"><div class="maxwi_80">
						<img src="http://www.qricis.com/../../../../html/smartappcss/html/smartappcss//images/websiteimages/wifi.jpg" class="maxwi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="
    border-radius: 30px;
">
					</div>
<h3 class="mart40 marb10 pad0 white_txt  fsz50 xs-fsz40 hidden" style="
    font-family: Avenir;
">CBD Olja</h3>
					<h3 class="marb40 md-marb40 lg-marb40 pad0 white_txt  fsz25 xs-fsz20 hidden" style="
    font-family: Avenir;
">A suite of self service solutions</h3></a>


				</div>
			</div>
							<div class="wi_70 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s tall padl50" style="
    font-family: avenir;
">
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex alit_c padt0 padb0 xs-pad15 xxs-padrl0 ">
									<div>
										
										<h4 class="fsz50 lgn_hight_50 xs-fsz25 black_txt padt40" style="
    line-height: 60px;
">Manage everything from your smartphone</h4>
										<p class="fsz20 grey_txt" style="
    line-height: 30px;">Uppgradera säkerheten på er förskola med SafeQid + och få marknadens säkraste system för hämtning &amp; lämning av barn.</p>
									</div>
								</div>
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s">
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0  padl0">
										
										<h4 class="fsz20 black_txt">No need to login</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">Since its an app. You are already logged in. If this was a web solution they you would have to login each time</p>
									</div>
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										
										<h4 class="fsz20 black_txt">Higher security</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">Its much safer to use an app then web. Because the app itself has it own set of security layers too</p>
									</div>
								</div>
								
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s">
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0  padl0">
										
										<h4 class="fsz20 black_txt">Convenient</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">You always have access to your community where ever you are, as long as you have your phone with you.</p>
									</div>
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										
										<h4 class="fsz20 black_txt">App beats web</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">Most, if not all of the things you which to do can be done from phone. So why use a laptop</p>
									</div>
								</div>
								
								
								
								
							</div>
						</div>
					</div>
				
				
				
				
				
			<div class="wrap   maxwi_100 lgtgrey_bg marrla brdb hidden">
		
		
		<div class="dflex fxwrap_w alit_s padt0 wi_720p marrla">
		
		<img src="../../html/usercontent/images/bg/image1.jpg" class="wi_50 xs-wi_100 valm image_auto xxs-image_dimensions_auto padt135 xs-padt0 maxhei_402p hidden" title="Free Support" alt="Free Support " style="" html="" usercontent="" images="" random="">
		
			<div class="wi_100 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 lgtgrey_bg">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 bg_f txt_708198 lgtgrey_bg">
					
					<div class="_1anKb-nl "><div data-test-target="main_h1" class="LZSItUvx"><h1 class="HLvj7Lh5 jObdbvmD fsz35 bold xs-fsz25 talc  ffamily_avenir white_txt"><span><span class="{geoClass}">SÄKER HÄMTNING &amp; LÄMNING</span></span></h1></div></div>	

<a href="#"><h3 class="mart20 xs-mart0 marb10 xs-marb0 pad0 white_txt bold fsz20 " style="
    font-family: Avenir;
">Vid en olycka eller kris har vi inte tid att tänka. Qricis är en tydlig krisapp som är utvecklad med hänsyn till hur våra hjärnor fungerar under stress. Allt onödigt har skalats bort.</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz18" style="
    font-family: Avenir;
"><ul>
<li class="first">Smidig och verifierad lämning av barn:</li>
<li>Säker hämtning av barn: Förskola och föräldrar tar gemensamt ansvar. Föräldrar säkerställer att den som skall hämta är registrerad som anhörig till barnet. Förskolan kontrollerar digitala ID-handlingen och lämnar endast ut barnen till godkända anhöriga. </li>
<li>Förhöjd kontroll med rapportering: Föräldrar får automatiskt ett meddelade när barnet lämnats och hämtats från dagis, och av vem.</li>
<li>Historik: Föräldrar och dagispersonal har tillgång till historik på vem som har hämtat, lämnat och vilka tidpunkter. </li>
<li>Access: Systemet är digitalt och kan användas i alla skärmar och läsplattor. Föräldrar kommer åt sin information från alla enheter, allt de behöver är internet.</li>
<li class="last">IP-Spärr: Även om systemet är digitalt är själva in- och ut-registreringen av barnen låst till avdelningens IP-adress. Detta gör att ingen kan komma åt informationen eller registrera en avlämning eller upphämtning utan att fysiskt vara på plats.</li>

</ul></h3></a>


				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>

	</div>

<div class="wi_100 ovfl_hid bgir_norep bgip_c bgis_cov txt_f brdt hidden">
		<div class="wi_1200p maxwi_100 minwi_0 dflex alit_c pos_rel marrla padt40   padb70 xs-padb30 md-padb50">
			<div class="wi_100">
				<h2 class="marb15 pad0 padrl15 talc fntwei_300 fsz90 sm-fsz32 md-fsz36 lg-fsz90 black_txt" style="
">Amazing features

				</h2>
				<div class="padrl15 talc lgn_hight_s15 fsz25 xs-fsz14 sm-fsz15 grey_txt">TXP is loaded with tons of amazing features and smart integrations<br>TXP is built by communities and there request on how to improve their living conditions<br>
					took a galley of type and scrambled it to make.
				</div>
				<div class="dflex fxwrap_w md-fxwrap_nw lg-fxwrap_nw alit_fs md-alit_c padt50 sm-padt60 md-padt80 lg-padt100">
					<div class="wi_50 xs-wi_100 flex_1 padl15 talr xs-tall order_2 md-order_1 lg-order_1 padr40">
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="flex_1 xs-order_2">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Application records</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy text of the printing and typeseing industry</div>
							</div>
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex xs-order_1 alit_c justc_c pos_rel zi1 xs-marr15 marl20 xs-marl0">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-1.png" width="36" height="36" title="Application records" alt="Application records">
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="flex_1 xs-order_2">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Best for business</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummyof the print typeseing ing and typeseing</div>
							</div>
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex xs-order_1 alit_c justc_c pos_rel zi1 xs-marr15 marl20 xs-marl0">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-2.png" width="36" height="36" title="Best for business" alt="Best for business">
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="flex_1 xs-order_2">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Full free chat</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy text of the printing and typeseing industry</div>
							</div>
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex xs-order_1 alit_c justc_c pos_rel zi1 xs-marr15 marl20 xs-marl0">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-3.png" width="36" height="36" title="Application records" alt="Application records">
							</div>
						</div>
					</div>
					<div class="wi_100 md-wi_230p lg-wi_263p fxshrink_0 order_1 md-order_2 lg-order_2 md-marrl15 lg-marrl30 marb30 md-marb0">
						<img src="http://www.qricis.com/../../../../html/smartappcss/html/smartappcss//images/websiteimages/wifi.jpg" class="wi_100 maxwi_270p hei_auto dblock marrla" width="263" height="535" title="Amazing Features" alt="Amazing Features" style="
    border-radius: 19px;
">
					</div>
					<div class="wi_50 xs-wi_100 flex_1 order_3 padr15 padl40 tall">
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex alit_c justc_c pos_rel zi1 marr20">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-4.png" width="36" height="36" title="Retina ready" alt="Retina ready">
							</div>
							<div class="flex_1">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Retina ready</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy text of the printing and typeseing industry</div>
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex alit_c justc_c pos_rel zi1 marr20">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-5.png" width="36" height="36" title="Secure extra" alt="Secure extra">
							</div>
							<div class="flex_1">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Secure extra</h3>
								<div class="lgn_hight_s18 grey_txt">Dummy text of the printing and typese ing industry Lorem Ipsum has</div>
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex alit_c justc_c pos_rel zi1 marr20">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-6.png" width="36" height="36" title="Night vision" alt="Night vision">
							</div>
							<div class="flex_1">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Night vision</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy of the printing and industr Lorem Ipsum.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- DESIGN -->
	
	<div class="column_m container padb80 white_bg talc padrl55 xs-padrl10 padt60 hidden">
				<div class="wi_100  txt_708198 padt80 padb80 xs-pad15  marb15  maxwi_100 marrla" style="background-color: #0F0F0F;max-width: 1200px;border-radius: 20px;padding: 80px;">
					
					
					<h2 class="padl10 xxs-padrl25 talc marrla  white_txt  marb10 fsz90 maxwi_750p  xsi-padrl100  ffamily_avenir mart0">Easy. Accessible</h2>
						
						
						</div>
						
						&nbsp;
				</div>
	<div class="clear"></div>
	
	<!-- HOW IT WORKS -->
	<div class="clear"></div>
	<div class="column_m container padt80 padb40 white_bg hidden">
	<div class="wrap hei_100 bg_ffeb18   bgir_norep bgip_c bgis_cov   centerImage xxs-centerImage hidden">
					<img src="https://developer.apple.com/programs/enterprise/images/enterprise-all-hero-large.jpg" class="wi_100 hei_auto marb35">
					</div>
					<h2 class="padl10 xxs-padrl25 talc marrla  black_txt lgn_hight_95 marb10 fsz90 xs-fsz45 maxwi_960p  xsi-padrl100 xxs-lgn_hight_60 ffamily_avenir">How it works</h2>
						<div class="marb80 xs-marb20 pad0 grey_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir">All community will receive the humble and professional support from our onboarding team in order to quickly and efficient be up and running. </div>

						
						
				
				</div>
	
	<div class="clear"></div>
	
	
	
				
				
<div class="  column_m container  wi_100 maxwi_100 marb0  padrl15 padt0 padb80 white_bg brdb hidden">
			<div class="  maxwi_100 marrla" style="
    width: 1200px;
">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc  xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 xxs-padrl0 padr15" style="
    border-radius: 20px;
">
				<div class="wi_100 pad25 txt_708198 " style="background-color: #ffffff;border-radius: 20px;border: 2px solid #0F0F0F;">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#"><h3 class="mart40 marb10 pad0 white_txt fsz40 xs-fsz20 tall" style="font-family: Avenir;color: black;">Community open an account</h3>
					<h3 class="marb40 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">Once account is open. You will have a 15 min zoom meeting with an account manager to fill in the Get started guilde.</h3></a>


				</div>
			</div>
			

<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 padrl15 xxs-padl0 ">
				<div class="wi_100 pad25   txt_708198 lgtgrey2_b" style="background-color: #ebebeb !important;border-radius: 20px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 black_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">Community invites tenants</h3>
					<h3 class="marb40 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">Now is the time for you to start adding the tenants. You may add the tenants one by one or use file import</h3></a>


				</div>
			</div><div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 padl15 xxs-padl0 ">
				<div class="wi_100 pad25  txt_708198 lgtgrey2_b" style="background-color: #0F0F0F !important;border-radius: 20px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 white_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">Tenants register &amp; connect</h3>
					<h3 class="marb40 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">You can follow success rate on how many tenants registered and connected. You can also remind tenants from here.</h3></a>


				</div>
			</div>
			
		</div>
		
	</div>
<div class="black_txt marrla talc fsz20 padrl100 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir padt30 hidden">Your account manager will have a great understanding on how to best setup your community after the zoom meeting.</div>

	</div>
	<div class="clear"></div>
	<div class="  column_m container white_bg hidden">
				<div class=" wi_100 maxwi_100 marb0  padrl15 padt0 white_bg padb0 xs-padt40  ">
				
				
					<div class="wrap maxwi_100 padt30 padb80 brdb" style="
    width: 1200px;
">
						
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							
							<div class="wi_50 order_1 xs-order_2 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s tall">
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex alit_c padt80 padb0 xs-pad15 xxs-padrl0 ">
									<div>
										
										<h4 class="fsz50 lgn_hight_50 bold xs-fsz25 black_txt">Underättelse
</h4>
										
<p class="fsz20 black_txt" style="
    line-height: 25px;
">Det finns tillfällen i livet då man hamnar i situationer där man är oförmögen att meddela anhöriga om sitt självbefinnande. Allt från olycka, vård i ditt land och utomlands, frihetsberövande från militär, polis eller kriminella, till att man är spårlöst försvunnen.
</p><p class="fsz20 grey_txt">Om du däremot har en nödkontaktlista ska kan personer, polis, sjukhus, brandkår och andra meddela oss när de har hittat dig eller vet någon om ditt självbefinnande.
</p>
									</div>
								</div>
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s lgtgrey_bg mart20">
									<div class="wi_100 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										
										<h4 class="fsz20 bold black_txt">Dig</h4>
										<p class="fsz16 black_txt">När något inträffar dig då meddelar vi din familj om din situation.</p>
									</div>
									
								</div>
								
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s mart20 lgtgrey_bg">
									<div class="wi_100 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 ">
										
										<h4 class="fsz20 bold black_txt">Dina anhöriga</h4>
										<p class="fsz16 black_txt">När något inträffar dina anhöriga då meddelar vid dig om deras situation</p>
									</div>
									
								</div>
								
							
								
							</div>
						
						<div class="wi_50 xxs-wi_100 maxwi_100 order_2   xs-order_1 dflex alit_s mart15 xxs-mart35 xxs-padrl0 padl20">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 bg_f txt_708198 white_bg">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#"><div class="maxwi_80">
						<img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-pro-12-select-cell-silver-202003?wid=940&amp;hei=1112&amp;fmt=png-alpha&amp;qlt=80&amp;.v=1583550059785" class="maxwi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support">
					</div>
<h3 class="mart40 marb10 pad0 black_txt  fsz50 xs-fsz40 hidden" style="
    font-family: Avenir;
">CBD Olja</h3>
					<h3 class="marb40 md-marb40 lg-marb40 pad0 black_txt  fsz25 xs-fsz20 hidden" style="
    font-family: Avenir;
">A suite of self service solutions</h3></a>


				</div>
			</div>
						
						
						</div>
					</div>
				
				
				
				
				
		</div>

	</div>
<div class="column_m container padt120 padb80 white_bg hidden">
	<div class="wrap hei_100 bg_ffeb18   bgir_norep bgip_c bgis_cov   centerImage xxs-centerImage hidden">
					<img src="https://developer.apple.com/programs/enterprise/images/enterprise-all-hero-large.jpg" class="wi_100 hei_auto marb35">
					</div>
					<h2 class="padl10 xxs-padrl25 talc marrla black_txt lgn_hight_95 marb10 fsz90 xs-fsz45 maxwi_960p  xsi-padrl100 xxs-lgn_hight_60 ffamily_avenir">You´re protected</h2>
						<div class="marb80 xs-marb20 pad0 grey_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</div>

						
						
				
				</div>
	<div class="clear"></div>
	<div class="column_m container padb80 white_bg talc padrl55 xs-padrl10 padt60 marrla brdb hidden" style="/* width: 1200px; */">
				<div class="wi_100  txt_708198 pad25 padt80 padb80 xs-pad15  marb15  maxwi_100 marrla" style="background-color: #0F0F0F;max-width: 1200px;border-radius: 25px;padding-top: 80px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_privacy__ftf4bnwdgwqe_large.png" class="hidden-xs talc marrla padb20" width="68px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_privacy__ftf4bnwdgwqe_large.png" class="visible-xs talc marrla padb20" width="68px;">
					<h2 class="padl10 xxs-padrl25 talc marrla  white_txt  marb10 fsz40 maxwi_750p  xsi-padrl100  ffamily_avenir">Privacy</h2>
						<div class="marb40 xs-marb20 pad0 white_txt marrla talc fsz17 padrl15 xs-fsz20 maxwi_750p xsi-padrl100 ffamily_avenir">Every Apple product is built from the ground up to protect your privacy. We don’t create user profiles, sell personal information, or share data with third parties to use for marketing or advertising. And apps share only the information that you authorize.</div>
						
						</div>
						
						<div class=" maxwi_100  mart0  padrl0 padb40 white_bg  padb0 xs-padrl0 marrla" style="
    max-width: 1200px;
">
			<div class="  maxwi_100  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall padrl0  xxsi-padb20  xs-padrl0">
		<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15">
				<div class="wi_100  white_txt pad80 xxsi-pad35 padt80 padb80 xxs-pad35  maxwi_100 marrla" style="background-color: #0F0F0F;border-radius: 25px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_environment__dh6nj4fbrjma_large.png" class="hidden-xs tall  padb20" width="68px;" height="104.77px">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_environment__dh6nj4fbrjma_large.png" class="visible-xs tall padb20" width="68px;">
					<h2 class="padl0 xxs-padrl25 tall  white_txt  marb10 fsz40 maxwi_750p    ffamily_avenir">Environment</h2>
						<div class="marb40 xs-marb20 pad0 white_txt tall fsz17 padrl0 xs-fsz20 maxwi_750p  ffamily_avenir">Apple products are designed to reduce our impact on the planet while maximizing performance and strength. We strictly monitor our supply chain during manufacturing, are careful to design for energy efficiency, and work to make our products as recyclable as possible.</div>
						
						</div>
			</div>
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 padl15 xxs-padl0 ">
				<div class="wi_100 white_txt pad80 xxsi-pad35 padt80 padb80 xxs-pad35  maxwi_100 marrla" style="background-color: #0F0F0F;border-radius: 25px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_accessibility__efpc2b1xoyi6_large.png" class="hidden-xs tall  padb20" width="68px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_accessibility__efpc2b1xoyi6_large.png" class="visible-xs tall padb20" width="68px;">
					<h2 class="padl0 xxs-padrl25 tall  white_txt  marb10 fsz40 maxwi_750p    ffamily_avenir">Accessibility</h2>
						<div class="marb40 xs-marb20 pad0 white_txt tall fsz17 padrl0 xs-fsz20 maxwi_750p  ffamily_avenir">We build Apple products to empower everyone. Every device, every piece of software, and every service is created with accessibility features built in. Because when everyone can participate in the ways that work best for them, people and businesses are at their best.</div>
						
						</div>
			</div>
			
		</div>
		
	</div>
	</div>
						&nbsp;
				</div>	<div class="clear"></div>
	<div class="clear"></div>
	
	<div class="wi_100 ovfl_hid white_bg hidden">
		<div class="wmaxwi_100 minwi_0 dflex alit_s marrla padb30" style="
    width: 1180px;
">
			<div class="wi_100 xs-wi_100 dflex alit_c">
				<div class="wi_100 padtb40 sm-padtb55 md-padtb70 lg-padtb90 padrl15 txt_708198">
					
					<h2 class="padl10   talc marrla black_txt lgn_hight_95 marb10 fsz90 xsi-fsz60 xs-fsz35    xsi-padrl100 xxs-lgn_hight_60 ffamily_avenir">FAQ</h2>
						<div class="marb40 xs-marb20 pad0 black_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir">Here are the most asked questions by communities that have not signed up. Once you have signed up we will have a support center for you with FAQ, knowledge base and articles</div>
						
						
				
				
				<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
						<div class="marb12  brdb_black brdwi_1 brdb">
							<a href="javascript:void(0);" class="wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20    fntwei_600 fsz16 sm-fsz17 black_txt   trans_all2" data-target="#faq-8" data-hide="all" data-hide-base=".hide-base" onclick="changeStyle(this,8);">
							<span class="fsz30 padr20"><i class="fas fa-check" aria-hidden="true"></i></span>	<span class="fsz24">Question 1</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p  fsz30 black_txt"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100  fsz30 black_txt"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone  " id="faq-8" style="display:none">
								<div class="padtbl20 padr26">
									<div class=" fsz18 padr20 lgn_hight_s18 black_txt">
										När ditt sparande ligger som likvider, pengar, omfattas det av Insättningsgarantin (genom Danske bank). Insättningsgarantin innebär att staten ersätter dig upp till 950 000 SEK av de likvider (rena pengar) som du har på de konton som omfattas av denna garanti, i händelse av att banken/finansinstitutet som du har ditt konto hos skulle gå i konkurs.
									</div>
								</div>
							</div>
						</div>
						
						<div class="marb12  brdb_black brdwi_1 brdb">
							<a href="javascript:void(0);" class=" wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20    fntwei_600 fsz16 sm-fsz17 black_txt trans_all2" data-target="#faq-9" data-hide="all" data-hide-base=".hide-base" onclick="changeStyle(this,9);">
							<span class="fsz30 padr20"><i class="fas fa-check" aria-hidden="true"></i></span>	<span class="fsz24">Question 2</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p  fsz30 black_txt"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100  fsz30 black_txt"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone  " id="faq-9">
								<div class="padtbl20 padr26">
									<div class=" fsz18 padr20 lgn_hight_s18 white_txt">
										När ditt sparande ligger som likvider, pengar, omfattas det av Insättningsgarantin (genom Danske bank). Insättningsgarantin innebär att staten ersätter dig upp till 950 000 SEK av de likvider (rena pengar) som du har på de konton som omfattas av denna garanti, i händelse av att banken/finansinstitutet som du har ditt konto hos skulle gå i konkurs.
									</div>
								</div>
							</div>
						</div>
						<div class="marb12  brdb_black brdwi_1 brdb">
							<a href="javascript:void(0);" class=" wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20    fntwei_600 fsz16 sm-fsz17 black_txt trans_all2" data-target="#faq-10" data-hide="all" data-hide-base=".hide-base" onclick="changeStyle(this,10);">
							<span class="fsz30 padr20"><i class="fas fa-check" aria-hidden="true"></i></span>	<span class="fsz24">Question 3</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p  fsz30 black_txt"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 fsz30 black_txt"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone  " id="faq-10">
								<div class="padtbl20 padr26">
									<div class=" fsz18 padr20 lgn_hight_s18 white_txt">
										När ditt sparande ligger som likvider, pengar, omfattas det av Insättningsgarantin (genom Danske bank). Insättningsgarantin innebär att staten ersätter dig upp till 950 000 SEK av de likvider (rena pengar) som du har på de konton som omfattas av denna garanti, i händelse av att banken/finansinstitutet som du har ditt konto hos skulle gå i konkurs.
									</div>
								</div>
							</div>
						</div>
						
						
						</div>
				</div>
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
	</div><div class="clear"></div>
	<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		
		<img src="https://safeqid.com/html/usercontent/images/bg/image2.jpg" class="wi_50 xs-wi_100 valm black_brd_10 brdrad10 pad25 xs-pad15 image_auto xxs-image_dimensions_auto  " title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="border: #000000 solid;   border-width: 10px;">
		
			<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz90 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Login</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</h3></a>

<div class="talc padtb20 xs-padt20  ffamily_avenir xxs-nofloat"><a href="#" class="_3S6pHEQs"></a><a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><input type="button" value="Läs mer" class="forword minhei_55p  fsz18 bg_green_rgb white_txt  ffamily_avenir" fdprocessedid="2cn32"></a></div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
					
					<div class="column_m container zi5 mart0  xs-mart0 hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		
		
		
			<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/demo/index.php/DemoSign"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz90 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Sign in</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</h3></a>

<div class="talc padtb20 xs-padt20  ffamily_avenir xxs-nofloat"><a href="#" class="_3S6pHEQs"></a><a href="https://www.safeqloud.com/demo/index.php/DemoSign"><input type="button" value="Läs mer" class="forword minhei_55p  fsz18 bg_green_rgb white_txt  ffamily_avenir" fdprocessedid="4fmiho"></a></div>
				</div>
			</div>
			
			<img src="https://safeqid.com/html/usercontent/images/bg/image2.jpg" class="wi_50 xs-wi_100 valm black_brd_10 brdrad10 pad25 xs-pad15 image_auto xxs-image_dimensions_auto  " title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="border: #000000 solid;   border-width: 10px;">
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
					
					<div class="column_m container zi5 mart0  xs-mart0 hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		
		<img src="https://safeqid.com/html/usercontent/images/bg/image2.jpg" class="wi_50 xs-wi_100 valm black_brd_10 brdrad10 pad25 xs-pad15 image_auto xxs-image_dimensions_auto  " title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="border: #000000 solid;   border-width: 10px;">
		
			<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/public/index.php/Eshop/itemInformation/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz90 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Payment</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</h3></a>

<div class="talc padtb20 xs-padt20  ffamily_avenir xxs-nofloat"><a href="#" class="_3S6pHEQs"></a><a href="https://www.safeqloud.com/public/index.php/Eshop/itemInformation/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09"><input type="button" value="Läs mer" class="forword minhei_55p  fsz18 bg_green_rgb white_txt  ffamily_avenir" fdprocessedid="rutr9"></a></div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	<!-- DOWNLOAD -->
		<div class="column_m container zi5 padt40  xs-mart0 black_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0 black_bg" style="width:1300px;">
					
					
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 padb60">
			<div class="  maxwi_100 marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 white_txt  fsz40 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Vi försöker säkerställa information</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Vi försöker säkerställa äktheten med meddelandet. När den har uppnått en viss nivå då godkänner vi för att information ska spridas till anhöriga</h3></a>


				</div>
			</div>
<img src="https://www.hypr.com/wp-content/uploads/true_passwordless_authentication.png" class="wi_50 xs-wi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="" html="" usercontent="" images="" random="">
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	
	<div class="column_m container zi5 padt0  xs-mart0 black_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
					
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 padb60">
			<div class="  maxwi_100 white_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc black_bg">
		
		<img src="https://www.hypr.com/wp-content/uploads/Yubikey_HYPR.jpg" class="wi_45 xs-wi_100  xs-order_2 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="" html="" usercontent="" images="" random="">
			<div class="wi_55 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  xs-order_1 dflex alit_s mart15 black_bg">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 white_txt  fsz40 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Meddela oss via app eller telefon</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Om ja, så är det en förfrågan om ditt samtycke att få ta del av dina uppgifter. Du kan få dessa från en vän, släkting, arbetsgivare, skola, hyresvärd eller leverantör.</h3></a>


				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	
		<div class="column_m container zi5 padt40  xs-mart0 black_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0 black_bg" style="width:1300px;">
					
					
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 padb60">
			<div class="  maxwi_100 marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 white_txt  fsz40 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Vi försöker säkerställa information</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Vi försöker säkerställa äktheten med meddelandet. När den har uppnått en viss nivå då godkänner vi för att information ska spridas till anhöriga</h3></a>


				</div>
			</div>
<img src="https://www.hypr.com/wp-content/uploads/true_passwordless_authentication.png" class="wi_50 xs-wi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="" html="" usercontent="" images="" random="">
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 black_bg  padb0 hidden">
			<div class="  maxwi_100 black_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_50 xxs-wi_100 maxwi_100 marb15 dflex alit_s mart45 padt10 xxs-padrl0 padr15">
				<div class="wi_100  txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_macos__n12a0rxneluq_large.jpg" class="hidden-xs talc" width="440px;" height="323px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_macos__n12a0rxneluq_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;">Mac</h3>
					<h3 class="marb40 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;
">Bring your biggest projects to life. Every Mac is designed for powerful performance — so you can build complex spreadsheets, create stunning presentations, or multitask across multiple projects.</h3></a>


				</div>
			</div>
			<div class="wi_50 xxs-wi_100 maxwi_100 marb15 dflex alit_s mart45 padt10 padl15 xxs-padl0 ">
				<div class="wi_100  txt_708198 pad25 padt80 padb80  xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ipados__c760lao1b0ia_large.jpg" class="hidden-xs talc" width="440px;" height="323px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ipados__c760lao1b0ia_large.jpg" class="visible-xs talc" width="319px;">

<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz17 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">iPad</h3>
					<h3 class="marb40 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Get power that outpaces most PC laptops in a design that goes everywhere. Scan merchandise, visualize models in 3D, and breeze through work when you multitask with Split View.</h3></a>


				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
	<div class="clear"></div>
	
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 marb40 white_bg_bg  padb0 hidden">
			<div class="  maxwi_100  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_30 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 " style="">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15" style="
    background: #0F0F0F;
">
					
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ios__geprj2n8keuu_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ios__geprj2n8keuu_large.jpg" class="visible-xs talc" width="262px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">iPhone</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Do incredible things on the go. Visualize 3D projects using augmented reality. Collaborate with your team on Keynote presentations. And stay connected with FaceTime, Messages, and Mail.</h3></a>


				</div>
			</div>
			<div class="clear"></div>
			<div class="wi_69 xxs-wi_100 maxwi_100    alit_s mart15 padl30 xxs-padl0 " style="">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 marb30  xs-marl0 xs-pad15 " style="
    background: #0F0F0F;
">
					<div class="dflex fxwrap_w alit_s">
					<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="hidden-xs talc" width="130px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="visible-xs talc" width="164px;">
</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart0 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz17 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">Apple Watch</h3>
					<h3 class="marb0 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Stay connected at a glance. Handle notifications as they pop up with a single tap, track Messages, and get the most out of apps for work and wellness.</h3></a>
</div>
</div>

				</div>
				
				<div class="wi_100   txt_708198 pad25 padt80 padb80 mart15  xs-marl0 xs-pad15" style="
    background: #0F0F0F;
">
				<div class="dflex fxwrap_w alit_s">
				<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">	
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="hidden-xs talc" width="258px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="visible-xs talc" width="262px;">
					</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz17 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">Apple TV</h3>
					<h3 class="marb0 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Turn your best work into a cinematic experience. Put important presentations and data-driven dashboards on display.</h3></a>
</div>

</div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
	<div class="clear"></div>
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 marb40 black_bg  padb0 hidden">
			<div class="  maxwi_100 black_bg padb80 marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0  talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 ">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/apps_builtin__00lcgj5wfv66_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/apps_builtin__00lcgj5wfv66_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">Built-in Apps</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Notes, Siri Shortcuts, and Reminders make simple things even easier, like signing and scanning documents to share and adding a sketch with Apple Pencil on iPad.</h3></a>


				</div>
			</div>
			
			<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 padl15 ">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/apps_store__bchtkvzilavm_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/apps_store__bchtkvzilavm_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">App Store</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Over 235,000 business apps help you get any job done, like Cisco Webex and Microsoft Excel for daily needs and industry-specific tools like Shapr3D and Scandit for specialized tasks.</h3></a>


				</div>
			</div>
			
			<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 padl15">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/apps_custom__cdwfdck6wawi_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/apps_custom__cdwfdck6wawi_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">Custom Apps</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Build your own game-changing apps using cutting-edge technology for whatever your business needs.</h3></a>


				</div>
			</div>
		</div>
		
	</div>
	</div>
	<div class="clear"></div>
	
	<div class="column_m container padt120 padb80 black_bg hidden">
					<h2 class="padl10 xxs-padrl25 tall marrla  white_txt  marb10 fsz24 maxwi_750p  xsi-padrl100  ffamily_avenir">Success Story</h2>
					<h2 class="padl10 xxs-padrl25 tall marrla  white_txt  marb10 fsz48 maxwi_750p  xsi-padrl100  ffamily_avenir">Capital One</h2>
						<div class="marb40 xs-marb20 pad0 white_txt marrla tall fsz48 padrl15 xs-fsz20 maxwi_750p xsi-padrl100 ffamily_avenir">When people love what they do, what they do is amazing.</div>
						
						
				</div>
	<div class="clear"></div>
	
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 black_bg  padb0 hidden">
			<div class="  maxwi_100 black_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb15 padr15 xxs-padrl0  ">
				<div class="wi_100  txt_708198">
					
					<img src="https://www.apple.com/v/business/f/images/overview/ss_capitalone__bhh90nopxes2_large.jpg" class="hidden-xs talc" width="594px;">
					<img src="https://www.apple.com/v/business/f/images/overview/ss_capitalone__bhh90nopxes2_large.jpg" class="visible-xs talc" width="343px;">
	


				</div>
			</div>
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb15 padl15 xxs-padl0 ">
				<div class="wi_100  txt_708198 pad25 padt200 padb80  xs-pad15 bg_1d1d1f">
				
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz28 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">"iPhone, iPad, and Mac are helping unleash the imagination of the people at Capital One, which is why we make the investment."</h3>
<h3 class="mart30   pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;">Frank LaPrade</h3>
<h3 class="marb40 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;">Chief Enterprise Services Officer</h3>

</a>


				</div>
			</div>
			
		</div>
		
	</div>
	</div>
	<script>
				function changeStyle(link,id)
				{
					if($(link).hasClass('active'))
					{
						$(link).removeClass('active');
						$("#faq-"+id).attr('style',"display:none");
					}
					else
						{
						$(link).addClass('active');
						$("#faq-"+id).attr('style',"display:block");
					}
				}
				</script>
	<!-- FAQ -->
	
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/slick.min.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/superfish.js"></script>
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/jquery.selectric.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//modules.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/custom.js"></script>










<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		<div class="wi_45 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padr50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">Home Repair</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">Cleaning is hardly the most enjoyable everyday task and unfortunately it needs to be done regularly. If you want to save time and improve your quality of life, hire a cleaning company.</h3></a>


				</div>
			</div>
<img src="https://www.dropbox.com/s/oedd1cuwkf38r3n/1bba4a91-edc0-48c8-98a7-cd8f33a57768.jpg?raw=1" class="wi_55 xs-wi_100 valm black_brd_10 brdrad10 xs-pad15 image_auto xxs-image_dimensions_auto padl50" title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="
    border-radius: 20px;
">
		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		
<img src="https://www.dropbox.com/s/oedd1cuwkf38r3n/1bba4a91-edc0-48c8-98a7-cd8f33a57768.jpg?raw=1" class="wi_55 xs-wi_100 valm black_brd_10 brdrad10 xs-pad15 image_auto xxs-image_dimensions_auto padr50" title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="
    border-radius: 20px;
">

<div class="wi_45 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padl50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">Cleaning</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">Cleaning is hardly the most enjoyable everyday task and unfortunately it needs to be done regularly. If you want to save time and improve your quality of life, hire a cleaning company.</h3></a>


				</div>
			</div>
		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		<div class="wi_45 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padr50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">Moving</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">Moving often takes a lot of time and energy. Using a mover will save you valuable time that you can spend on other things, and remember that you can also use inter-city movers.</h3></a>


				</div>
			</div>
<img src="https://www.dropbox.com/s/oedd1cuwkf38r3n/1bba4a91-edc0-48c8-98a7-cd8f33a57768.jpg?raw=1" class="wi_55 xs-wi_100 valm black_brd_10 brdrad10 xs-pad15 image_auto xxs-image_dimensions_auto padl50" title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="
    border-radius: 20px;
">
		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		
<img src="https://www.dropbox.com/s/oedd1cuwkf38r3n/1bba4a91-edc0-48c8-98a7-cd8f33a57768.jpg?raw=1" class="wi_55 xs-wi_100 valm black_brd_10 brdrad10 xs-pad15 image_auto xxs-image_dimensions_auto padr50" title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="
    border-radius: 20px;
">

<div class="wi_45 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padl50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">Renovate</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">Whether you're extending your house, renovating an apartment or digging out a basement, it can feel like a big project where you need to keep track of everything from building permits, materials, costs and choosing a construction company.</h3></a>


				</div>
			</div>
		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	
	
<div class=" wi_100 maxwi_100 marb0  padrl15 marb40 white_bg padb80 brdb hidden">
			<div class="  maxwi_100 white_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0 marb0">
		<div class="wi_30 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 bg_1d1d1f">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f" style="
    background: #0F0F0F !important;
    border-radius: 20px;
">
					
					<img src="http://www.qricis.com/../../../../html/smartappcss/html/smartappcss//images/websiteimages/wifi.jpg" class="hidden-xs talc" width="180px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ios__geprj2n8keuu_large.jpg" class="visible-xs talc" width="262px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz30 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">Comfort</h3>
					<h3 class="marb0 xs-marb20 pad0 fsz17 tall padrl20 xs-padrl0 lgtgrey_txt" style="font-family: Avenir;
">Do incredible things on the go. Visualize 3D projects using augmented reality. Collaborate with your team on Keynote presentations. And stay connected with FaceTime, Messages, and Mail.</h3></a>


				</div>
			</div>
			<div class="clear"></div>
			<div class="wi_70 xxs-wi_100 maxwi_100    alit_s mart15 padl30 xxs-padl0 ">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 marb30  xs-marl0 xs-pad15" style="
    background: #0f0f0f;
    border-radius: 20px;
">
					<div class="dflex fxwrap_w alit_s">
					<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="hidden-xs talc" width="130px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="visible-xs talc" width="164px;">
</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart0 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt fsz30 tall padrl50 xs-padrl0" style="font-family: Avenir;">Security</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Stay connected at a glance. Handle notifications as they pop up with a single tap, track Messages, and get the most out of apps for work and wellness.</h3></a>
</div>
</div>

				</div>
				
				<div class="wi_100   txt_708198 pad25 padt80 padb80 mart15  xs-marl0 xs-pad15" style="
    background: #0f0f0f;
    border-radius: 20px;
">
				<div class="dflex fxwrap_w alit_s">
				<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">	
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="hidden-xs talc" width="258px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="visible-xs talc" width="262px;">
					</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt fsz30 tall padrl50 xs-padrl0" style="font-family: Avenir;">Service Store</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Turn your best work into a cinematic experience. Put important presentations and data-driven dashboards on display.</h3></a>
</div>

</div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div><div class="column_m container black_bg brdb hidden">
				<div class=" wi_100 maxwi_100 marb0  padrl15 padt0 white_bg padb0 xs-padt40">
				
				
					<div class="wrap maxwi_100 padtb30" style="width: 1300px;">
						
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							<div class="wi_30 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-mart35 xxs-padrl0 padr20">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198 talc" style="
    border-radius: 25px;
">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#" style="
    border-radius: 25px;
"><div class="maxwi_80">
						<img src="http://www.qricis.com/../../../../html/smartappcss/html/smartappcss//images/websiteimages/wifi.jpg" class="maxwi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="
    border-radius: 30px;
">
					</div>
<h3 class="mart40 marb10 pad0 white_txt  fsz50 xs-fsz40 hidden" style="
    font-family: Avenir;
">CBD Olja</h3>
					<h3 class="marb40 md-marb40 lg-marb40 pad0 white_txt  fsz25 xs-fsz20 hidden" style="
    font-family: Avenir;
">A suite of self service solutions</h3></a>


				</div>
			</div>
							<div class="wi_70 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s tall padl50" style="
    font-family: avenir;
">
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex alit_c padt0 padb0 xs-pad15 xxs-padrl0 ">
									<div>
										
										<h4 class="fsz50 lgn_hight_50 xs-fsz25 black_txt padt40" style="
    line-height: 60px;
">Manage everything from your smartphone</h4>
										<p class="fsz20 grey_txt" style="
line-height: 30px;">Uppgradera säkerheten på er förskola med SafeQid + och få marknadens säkraste system för hämtning &amp; lämning av barn.</p>
									</div>
								</div>
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s">
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0  padl0">
										
										<h4 class="fsz20 black_txt">No need to login</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">Since its an app. You are already logged in. If this was a web solution they you would have to login each time</p>
									</div>
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										
										<h4 class="fsz20 black_txt">Higher security</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">Its much safer to use an app then web. Because the app itself has it own set of security layers too</p>
									</div>
								</div>
								
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s">
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0  padl0">
										
										<h4 class="fsz20 black_txt">Convenient</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">You always have access to your community where ever you are, as long as you have your phone with you.</p>
									</div>
									<div class="wi_50 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										
										<h4 class="fsz20 black_txt">App beats web</h4>
										<p class="fsz18 grey_txt" style="
    line-height: 20px;
">Most, if not all of the things you which to do can be done from phone. So why use a laptop</p>
									</div>
								</div>
								
								
								
								
							</div>
						</div>
					</div>
				
				
				
				
				
			<div class="wrap   maxwi_100 lgtgrey_bg marrla brdb hidden">
		
		
		<div class="dflex fxwrap_w alit_s padt0 wi_720p marrla">
		
		<img src="../../html/usercontent/images/bg/image1.jpg" class="wi_50 xs-wi_100 valm image_auto xxs-image_dimensions_auto padt135 xs-padt0 maxhei_402p hidden" title="Free Support" alt="Free Support " style="" html="" usercontent="" images="" random="">
		
			<div class="wi_100 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 lgtgrey_bg">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 bg_f txt_708198 lgtgrey_bg">
					
					<div class="_1anKb-nl "><div data-test-target="main_h1" class="LZSItUvx"><h1 class="HLvj7Lh5 jObdbvmD fsz35 bold xs-fsz25 talc  ffamily_avenir white_txt"><span><span class="{geoClass}">SÄKER HÄMTNING &amp; LÄMNING</span></span></h1></div></div>	

<a href="#"><h3 class="mart20 xs-mart0 marb10 xs-marb0 pad0 white_txt bold fsz20 " style="
    font-family: Avenir;
">Vid en olycka eller kris har vi inte tid att tänka. Qricis är en tydlig krisapp som är utvecklad med hänsyn till hur våra hjärnor fungerar under stress. Allt onödigt har skalats bort.</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz18" style="
    font-family: Avenir;
"><ul>
<li class="first">Smidig och verifierad lämning av barn:</li>
<li>Säker hämtning av barn: Förskola och föräldrar tar gemensamt ansvar. Föräldrar säkerställer att den som skall hämta är registrerad som anhörig till barnet. Förskolan kontrollerar digitala ID-handlingen och lämnar endast ut barnen till godkända anhöriga. </li>
<li>Förhöjd kontroll med rapportering: Föräldrar får automatiskt ett meddelade när barnet lämnats och hämtats från dagis, och av vem.</li>
<li>Historik: Föräldrar och dagispersonal har tillgång till historik på vem som har hämtat, lämnat och vilka tidpunkter. </li>
<li>Access: Systemet är digitalt och kan användas i alla skärmar och läsplattor. Föräldrar kommer åt sin information från alla enheter, allt de behöver är internet.</li>
<li class="last">IP-Spärr: Även om systemet är digitalt är själva in- och ut-registreringen av barnen låst till avdelningens IP-adress. Detta gör att ingen kan komma åt informationen eller registrera en avlämning eller upphämtning utan att fysiskt vara på plats.</li>

</ul></h3></a>


				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>

	</div>

<div class="wi_100 ovfl_hid bgir_norep bgip_c bgis_cov txt_f brdt hidden">
		<div class="wi_1200p maxwi_100 minwi_0 dflex alit_c pos_rel marrla padt40   padb70 xs-padb30 md-padb50">
			<div class="wi_100">
				<h2 class="marb15 pad0 padrl15 talc fntwei_300 fsz90 sm-fsz32 md-fsz36 lg-fsz90 black_txt" style="
">Amazing features

				</h2>
				<div class="padrl15 talc lgn_hight_s15 fsz25 xs-fsz14 sm-fsz15 grey_txt">TXP is loaded with tons of amazing features and smart integrations<br>TXP is built by communities and there request on how to improve their living conditions<br>
					took a galley of type and scrambled it to make.
				</div>
				<div class="dflex fxwrap_w md-fxwrap_nw lg-fxwrap_nw alit_fs md-alit_c padt50 sm-padt60 md-padt80 lg-padt100">
					<div class="wi_50 xs-wi_100 flex_1 padl15 talr xs-tall order_2 md-order_1 lg-order_1 padr40">
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="flex_1 xs-order_2">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Application records</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy text of the printing and typeseing industry</div>
							</div>
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex xs-order_1 alit_c justc_c pos_rel zi1 xs-marr15 marl20 xs-marl0">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-1.png" width="36" height="36" title="Application records" alt="Application records">
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="flex_1 xs-order_2">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Best for business</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummyof the print typeseing ing and typeseing</div>
							</div>
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex xs-order_1 alit_c justc_c pos_rel zi1 xs-marr15 marl20 xs-marl0">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-2.png" width="36" height="36" title="Best for business" alt="Best for business">
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="flex_1 xs-order_2">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Full free chat</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy text of the printing and typeseing industry</div>
							</div>
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex xs-order_1 alit_c justc_c pos_rel zi1 xs-marr15 marl20 xs-marl0">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-3.png" width="36" height="36" title="Application records" alt="Application records">
							</div>
						</div>
					</div>
					<div class="wi_100 md-wi_230p lg-wi_263p fxshrink_0 order_1 md-order_2 lg-order_2 md-marrl15 lg-marrl30 marb30 md-marb0">
						<img src="http://www.qricis.com/../../../../html/smartappcss/html/smartappcss//images/websiteimages/wifi.jpg" class="wi_100 maxwi_270p hei_auto dblock marrla" width="263" height="535" title="Amazing Features" alt="Amazing Features" style="
    border-radius: 19px;
">
					</div>
					<div class="wi_50 xs-wi_100 flex_1 order_3 padr15 padl40 tall">
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex alit_c justc_c pos_rel zi1 marr20">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-4.png" width="36" height="36" title="Retina ready" alt="Retina ready">
							</div>
							<div class="flex_1">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Retina ready</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy text of the printing and typeseing industry</div>
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex alit_c justc_c pos_rel zi1 marr20">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-5.png" width="36" height="36" title="Secure extra" alt="Secure extra">
							</div>
							<div class="flex_1">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Secure extra</h3>
								<div class="lgn_hight_s18 grey_txt">Dummy text of the printing and typese ing industry Lorem Ipsum has</div>
							</div>
						</div>
						<div class="dflex alit_c padtb15 sm-padtb20 md-padtb30 lg-padtb40">
							<div class="wi_80p xxs-wi_60p hei_80p xxs-hei_60p fxshrink_0 dflex alit_c justc_c pos_rel zi1 marr20">
								<div class="wi_100 hei_100 opa30 pos_abs zi-1 top0 left0 brd brdrad100 brdclr_f black_bg"></div>
								<img src="../../../../html/smartappcss/html/smartappcss//images/smart/af-icon-6.png" width="36" height="36" title="Night vision" alt="Night vision">
							</div>
							<div class="flex_1">
								<h3 class="marb10 pad0 fntwei_600 black_txt">Night vision</h3>
								<div class="lgn_hight_s18 grey_txt">Lorem Ipsum is simply dummy of the printing and industr Lorem Ipsum.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- DESIGN -->
	
	<div class="column_m container padb80 white_bg talc padrl55 xs-padrl10 padt60 hidden">
				<div class="wi_100  txt_708198 padt80 padb80 xs-pad15  marb15  maxwi_100 marrla" style="background-color: #0F0F0F;max-width: 1200px;border-radius: 20px;padding: 80px;">
					
					
					<h2 class="padl10 xxs-padrl25 talc marrla  white_txt  marb10 fsz90 maxwi_750p  xsi-padrl100  ffamily_avenir mart0">Easy. Accessible</h2>
						
						
						</div>
						
						&nbsp;
				</div>
	<div class="clear"></div>
	
	<!-- HOW IT WORKS -->
	<div class="clear"></div>
	<div class="column_m container padt80 padb40 white_bg hidden">
	<div class="wrap hei_100 bg_ffeb18   bgir_norep bgip_c bgis_cov   centerImage xxs-centerImage hidden">
					<img src="https://developer.apple.com/programs/enterprise/images/enterprise-all-hero-large.jpg" class="wi_100 hei_auto marb35">
					</div>
					<h2 class="padl10 xxs-padrl25 talc marrla  black_txt lgn_hight_95 marb10 fsz90 xs-fsz45 maxwi_960p  xsi-padrl100 xxs-lgn_hight_60 ffamily_avenir">How it works</h2>
						<div class="marb80 xs-marb20 pad0 grey_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir">All community will receive the humble and professional support from our onboarding team in order to quickly and efficient be up and running. </div>

						
						
				
				</div>
	
	<div class="clear"></div>
	
	
	
				
				
<div class="  column_m container  wi_100 maxwi_100 marb0  padrl15 padt0 padb80 white_bg brdb hidden">
			<div class="  maxwi_100 marrla" style="
    width: 1200px;
">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc  xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 xxs-padrl0 padr15" style="
    border-radius: 20px;
">
				<div class="wi_100 pad25 txt_708198 " style="background-color: #ffffff;border-radius: 20px;border: 2px solid #0F0F0F;">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#"><h3 class="mart40 marb10 pad0 white_txt fsz40 xs-fsz20 tall" style="font-family: Avenir;color: black;">Community open an account</h3>
					<h3 class="marb40 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">Once account is open. You will have a 15 min zoom meeting with an account manager to fill in the Get started guilde.</h3></a>


				</div>
			</div>
			

<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 padrl15 xxs-padl0 ">
				<div class="wi_100 pad25   txt_708198 lgtgrey2_b" style="background-color: #ebebeb !important;border-radius: 20px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 black_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">Community invites tenants</h3>
					<h3 class="marb40 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">Now is the time for you to start adding the tenants. You may add the tenants one by one or use file import</h3></a>


				</div>
			</div><div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 padl15 xxs-padl0 ">
				<div class="wi_100 pad25  txt_708198 lgtgrey2_b" style="background-color: #0F0F0F !important;border-radius: 20px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 white_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">Tenants register &amp; connect</h3>
					<h3 class="marb40 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">You can follow success rate on how many tenants registered and connected. You can also remind tenants from here.</h3></a>


				</div>
			</div>
			
		</div>
		
	</div>
<div class="black_txt marrla talc fsz20 padrl100 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir padt30 hidden">Your account manager will have a great understanding on how to best setup your community after the zoom meeting.</div>

	</div>
	<div class="clear"></div>
	<div class="  column_m container white_bg hidden">
				<div class=" wi_100 maxwi_100 marb0  padrl15 padt0 white_bg padb0 xs-padt40  ">
				
				
					<div class="wrap maxwi_100 padt30 padb80 brdb" style="
    width: 1200px;
">
						
						<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
							
							<div class="wi_50 order_1 xs-order_2 xs-wi_100 dflex xxs-dblock fxdir_col xs-fxdir_row xxs-dblock alit_s tall">
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex alit_c padt80 padb0 xs-pad15 xxs-padrl0 ">
									<div>
										
										<h4 class="fsz50 lgn_hight_50 bold xs-fsz25 black_txt">Underättelse
</h4>
										
<p class="fsz20 black_txt" style="
    line-height: 25px;
">Det finns tillfällen i livet då man hamnar i situationer där man är oförmögen att meddela anhöriga om sitt självbefinnande. Allt från olycka, vård i ditt land och utomlands, frihetsberövande från militär, polis eller kriminella, till att man är spårlöst försvunnen.
</p><p class="fsz20 grey_txt">Om du däremot har en nödkontaktlista ska kan personer, polis, sjukhus, brandkår och andra meddela oss när de har hittat dig eller vet någon om ditt självbefinnande.
</p>
									</div>
								</div>
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s lgtgrey_bg mart20">
									<div class="wi_100 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0">
										
										<h4 class="fsz20 bold black_txt">Dig</h4>
										<p class="fsz16 black_txt">När något inträffar dig då meddelar vi din familj om din situation.</p>
									</div>
									
								</div>
								
								<div class="wi_100 xs-wi_50 xxs-wi_100 flex_1 dflex xxs-dblock xs-fxdir_col sm-fxdir_col alit_s mart20 lgtgrey_bg">
									<div class="wi_100 xs-wi_100 sm-wi_100 flex_1 pad15 xxs-padrl0 ">
										
										<h4 class="fsz20 bold black_txt">Dina anhöriga</h4>
										<p class="fsz16 black_txt">När något inträffar dina anhöriga då meddelar vid dig om deras situation</p>
									</div>
									
								</div>
								
							
								
							</div>
						
						<div class="wi_50 xxs-wi_100 maxwi_100 order_2   xs-order_1 dflex alit_s mart15 xxs-mart35 xxs-padrl0 padl20">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 bg_f txt_708198 white_bg">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#"><div class="maxwi_80">
						<img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-pro-12-select-cell-silver-202003?wid=940&amp;hei=1112&amp;fmt=png-alpha&amp;qlt=80&amp;.v=1583550059785" class="maxwi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support">
					</div>
<h3 class="mart40 marb10 pad0 black_txt  fsz50 xs-fsz40 hidden" style="
    font-family: Avenir;
">CBD Olja</h3>
					<h3 class="marb40 md-marb40 lg-marb40 pad0 black_txt  fsz25 xs-fsz20 hidden" style="
    font-family: Avenir;
">A suite of self service solutions</h3></a>


				</div>
			</div>
						
						
						</div>
					</div>
				
				
				
				
				
		</div>

	</div>
<div class="column_m container padt120 padb80 white_bg hidden">
	<div class="wrap hei_100 bg_ffeb18   bgir_norep bgip_c bgis_cov   centerImage xxs-centerImage hidden">
					<img src="https://developer.apple.com/programs/enterprise/images/enterprise-all-hero-large.jpg" class="wi_100 hei_auto marb35">
					</div>
					<h2 class="padl10 xxs-padrl25 talc marrla black_txt lgn_hight_95 marb10 fsz90 xs-fsz45 maxwi_960p  xsi-padrl100 xxs-lgn_hight_60 ffamily_avenir">You´re protected</h2>
						<div class="marb80 xs-marb20 pad0 grey_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</div>

						
						
				
				</div>
	<div class="clear"></div>
	<div class="column_m container padb80 white_bg talc padrl55 xs-padrl10 padt60 marrla brdb hidden" style="/* width: 1200px; */">
				<div class="wi_100  txt_708198 pad25 padt80 padb80 xs-pad15  marb15  maxwi_100 marrla" style="background-color: #0F0F0F;max-width: 1200px;border-radius: 25px;padding-top: 80px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_privacy__ftf4bnwdgwqe_large.png" class="hidden-xs talc marrla padb20" width="68px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_privacy__ftf4bnwdgwqe_large.png" class="visible-xs talc marrla padb20" width="68px;">
					<h2 class="padl10 xxs-padrl25 talc marrla  white_txt  marb10 fsz40 maxwi_750p  xsi-padrl100  ffamily_avenir">Privacy</h2>
						<div class="marb40 xs-marb20 pad0 white_txt marrla talc fsz17 padrl15 xs-fsz20 maxwi_750p xsi-padrl100 ffamily_avenir">Every Apple product is built from the ground up to protect your privacy. We don’t create user profiles, sell personal information, or share data with third parties to use for marketing or advertising. And apps share only the information that you authorize.</div>
						
						</div>
						
						<div class=" maxwi_100  mart0  padrl0 padb40 white_bg  padb0 xs-padrl0 marrla" style="
    max-width: 1200px;
">
			<div class="  maxwi_100  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall padrl0  xxsi-padb20  xs-padrl0">
		<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15">
				<div class="wi_100  white_txt pad80 xxsi-pad35 padt80 padb80 xxs-pad35  maxwi_100 marrla" style="background-color: #0F0F0F;border-radius: 25px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_environment__dh6nj4fbrjma_large.png" class="hidden-xs tall  padb20" width="68px;" height="104.77px">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_environment__dh6nj4fbrjma_large.png" class="visible-xs tall padb20" width="68px;">
					<h2 class="padl0 xxs-padrl25 tall  white_txt  marb10 fsz40 maxwi_750p    ffamily_avenir">Environment</h2>
						<div class="marb40 xs-marb20 pad0 white_txt tall fsz17 padrl0 xs-fsz20 maxwi_750p  ffamily_avenir">Apple products are designed to reduce our impact on the planet while maximizing performance and strength. We strictly monitor our supply chain during manufacturing, are careful to design for energy efficiency, and work to make our products as recyclable as possible.</div>
						
						</div>
			</div>
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 padl15 xxs-padl0 ">
				<div class="wi_100 white_txt pad80 xxsi-pad35 padt80 padb80 xxs-pad35  maxwi_100 marrla" style="background-color: #0F0F0F;border-radius: 25px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_accessibility__efpc2b1xoyi6_large.png" class="hidden-xs tall  padb20" width="68px;">
					<img src="https://www.apple.com/v/business/f/images/overview/icon_accessibility__efpc2b1xoyi6_large.png" class="visible-xs tall padb20" width="68px;">
					<h2 class="padl0 xxs-padrl25 tall  white_txt  marb10 fsz40 maxwi_750p    ffamily_avenir">Accessibility</h2>
						<div class="marb40 xs-marb20 pad0 white_txt tall fsz17 padrl0 xs-fsz20 maxwi_750p  ffamily_avenir">We build Apple products to empower everyone. Every device, every piece of software, and every service is created with accessibility features built in. Because when everyone can participate in the ways that work best for them, people and businesses are at their best.</div>
						
						</div>
			</div>
			
		</div>
		
	</div>
	</div>
						&nbsp;
				</div>	<div class="clear"></div>
	<div class="clear"></div>
	
	<div class="wi_100 ovfl_hid white_bg hidden">
		<div class="wmaxwi_100 minwi_0 dflex alit_s marrla padb30" style="
    width: 1180px;
">
			<div class="wi_100 xs-wi_100 dflex alit_c">
				<div class="wi_100 padtb40 sm-padtb55 md-padtb70 lg-padtb90 padrl15 txt_708198">
					
					<h2 class="padl10   talc marrla black_txt lgn_hight_95 marb10 fsz90 xsi-fsz60 xs-fsz35    xsi-padrl100 xxs-lgn_hight_60 ffamily_avenir">FAQ</h2>
						<div class="marb40 xs-marb20 pad0 black_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_960p xsi-padrl100 ffamily_avenir">Here are the most asked questions by communities that have not signed up. Once you have signed up we will have a support center for you with FAQ, knowledge base and articles</div>
						
						
				
				
				<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
						<div class="marb12  brdb_black brdwi_1 brdb">
							<a href="javascript:void(0);" class="wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20    fntwei_600 fsz16 sm-fsz17 black_txt   trans_all2" data-target="#faq-8" data-hide="all" data-hide-base=".hide-base" onclick="changeStyle(this,8);">
							<span class="fsz30 padr20"><i class="fas fa-check" aria-hidden="true"></i></span>	<span class="fsz24">Question 1</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p  fsz30 black_txt"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100  fsz30 black_txt"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone  " id="faq-8" style="display:none">
								<div class="padtbl20 padr26">
									<div class=" fsz18 padr20 lgn_hight_s18 black_txt">
										När ditt sparande ligger som likvider, pengar, omfattas det av Insättningsgarantin (genom Danske bank). Insättningsgarantin innebär att staten ersätter dig upp till 950 000 SEK av de likvider (rena pengar) som du har på de konton som omfattas av denna garanti, i händelse av att banken/finansinstitutet som du har ditt konto hos skulle gå i konkurs.
									</div>
								</div>
							</div>
						</div>
						
						<div class="marb12  brdb_black brdwi_1 brdb">
							<a href="javascript:void(0);" class=" wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20    fntwei_600 fsz16 sm-fsz17 black_txt trans_all2" data-target="#faq-9" data-hide="all" data-hide-base=".hide-base" onclick="changeStyle(this,9);">
							<span class="fsz30 padr20"><i class="fas fa-check" aria-hidden="true"></i></span>	<span class="fsz24">Question 2</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p  fsz30 black_txt"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100  fsz30 black_txt"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone  " id="faq-9">
								<div class="padtbl20 padr26">
									<div class=" fsz18 padr20 lgn_hight_s18 white_txt">
										När ditt sparande ligger som likvider, pengar, omfattas det av Insättningsgarantin (genom Danske bank). Insättningsgarantin innebär att staten ersätter dig upp till 950 000 SEK av de likvider (rena pengar) som du har på de konton som omfattas av denna garanti, i händelse av att banken/finansinstitutet som du har ditt konto hos skulle gå i konkurs.
									</div>
								</div>
							</div>
						</div>
						<div class="marb12  brdb_black brdwi_1 brdb">
							<a href="javascript:void(0);" class=" wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20    fntwei_600 fsz16 sm-fsz17 black_txt trans_all2" data-target="#faq-10" data-hide="all" data-hide-base=".hide-base" onclick="changeStyle(this,10);">
							<span class="fsz30 padr20"><i class="fas fa-check" aria-hidden="true"></i></span>	<span class="fsz24">Question 3</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p  fsz30 black_txt"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 fsz30 black_txt"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone  " id="faq-10">
								<div class="padtbl20 padr26">
									<div class=" fsz18 padr20 lgn_hight_s18 white_txt">
										När ditt sparande ligger som likvider, pengar, omfattas det av Insättningsgarantin (genom Danske bank). Insättningsgarantin innebär att staten ersätter dig upp till 950 000 SEK av de likvider (rena pengar) som du har på de konton som omfattas av denna garanti, i händelse av att banken/finansinstitutet som du har ditt konto hos skulle gå i konkurs.
									</div>
								</div>
							</div>
						</div>
						
						
						</div>
				</div>
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
	</div><div class="clear"></div>
	<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		
		<img src="https://safeqid.com/html/usercontent/images/bg/image2.jpg" class="wi_50 xs-wi_100 valm black_brd_10 brdrad10 pad25 xs-pad15 image_auto xxs-image_dimensions_auto  " title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="border: #000000 solid;   border-width: 10px;">
		
			<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz90 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Login</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</h3></a>

<div class="talc padtb20 xs-padt20  ffamily_avenir xxs-nofloat"><a href="#" class="_3S6pHEQs"></a><a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><input type="button" value="Läs mer" class="forword minhei_55p  fsz18 bg_green_rgb white_txt  ffamily_avenir" fdprocessedid="2cn32"></a></div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
					
					<div class="column_m container zi5 mart0  xs-mart0 hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		
		
		
			<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/demo/index.php/DemoSign"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz90 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Sign in</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</h3></a>

<div class="talc padtb20 xs-padt20  ffamily_avenir xxs-nofloat"><a href="#" class="_3S6pHEQs"></a><a href="https://www.safeqloud.com/demo/index.php/DemoSign"><input type="button" value="Läs mer" class="forword minhei_55p  fsz18 bg_green_rgb white_txt  ffamily_avenir" fdprocessedid="4fmiho"></a></div>
				</div>
			</div>
			
			<img src="https://safeqid.com/html/usercontent/images/bg/image2.jpg" class="wi_50 xs-wi_100 valm black_brd_10 brdrad10 pad25 xs-pad15 image_auto xxs-image_dimensions_auto  " title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="border: #000000 solid;   border-width: 10px;">
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
					
					<div class="column_m container zi5 mart0  xs-mart0 hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		
		<img src="https://safeqid.com/html/usercontent/images/bg/image2.jpg" class="wi_50 xs-wi_100 valm black_brd_10 brdrad10 pad25 xs-pad15 image_auto xxs-image_dimensions_auto  " title="Free Support" alt="Free Support" html="" usercontent="" images="" random="" style="border: #000000 solid;   border-width: 10px;">
		
			<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/public/index.php/Eshop/itemInformation/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz90 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Payment</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Panikknapp i telefonen som hjälper er agera direkt och enligt er krisplan när ett barn är i fara, har skadats eller saknas.  Med Qricis Alarm är all personal redo med verktygen att hantera olyckan innan den har hänt.</h3></a>

<div class="talc padtb20 xs-padt20  ffamily_avenir xxs-nofloat"><a href="#" class="_3S6pHEQs"></a><a href="https://www.safeqloud.com/public/index.php/Eshop/itemInformation/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09"><input type="button" value="Läs mer" class="forword minhei_55p  fsz18 bg_green_rgb white_txt  ffamily_avenir" fdprocessedid="rutr9"></a></div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	<!-- DOWNLOAD -->
		<div class="column_m container zi5 padt40  xs-mart0 black_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0 black_bg" style="width:1300px;">
					
					
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 padb60">
			<div class="  maxwi_100 marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 white_txt  fsz40 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Vi försöker säkerställa information</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Vi försöker säkerställa äktheten med meddelandet. När den har uppnått en viss nivå då godkänner vi för att information ska spridas till anhöriga</h3></a>


				</div>
			</div>
<img src="https://www.hypr.com/wp-content/uploads/true_passwordless_authentication.png" class="wi_50 xs-wi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="" html="" usercontent="" images="" random="">
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	
	<div class="column_m container zi5 padt0  xs-mart0 black_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
					
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 padb60">
			<div class="  maxwi_100 white_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc black_bg">
		
		<img src="https://www.hypr.com/wp-content/uploads/Yubikey_HYPR.jpg" class="wi_45 xs-wi_100  xs-order_2 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="" html="" usercontent="" images="" random="">
			<div class="wi_55 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  xs-order_1 dflex alit_s mart15 black_bg">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 white_txt  fsz40 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Meddela oss via app eller telefon</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Om ja, så är det en förfrågan om ditt samtycke att få ta del av dina uppgifter. Du kan få dessa från en vän, släkting, arbetsgivare, skola, hyresvärd eller leverantör.</h3></a>


				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	
		<div class="column_m container zi5 padt40  xs-mart0 black_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0 black_bg" style="width:1300px;">
					
					
<div class=" wi_100 maxwi_100 marb0  padrl15 padt50 padb60">
			<div class="  maxwi_100 marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		<div class="wi_50 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15">
				<div class="wi_100 padtb25 md-padtb35 lg-padtb50 padrl15 md-padrl30 lg-padrl30 txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 white_txt  fsz40 lgn_hight_95 xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
">Vi försöker säkerställa information</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 white_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
">Vi försöker säkerställa äktheten med meddelandet. När den har uppnått en viss nivå då godkänner vi för att information ska spridas till anhöriga</h3></a>


				</div>
			</div>
<img src="https://www.hypr.com/wp-content/uploads/true_passwordless_authentication.png" class="wi_50 xs-wi_100 valm image_auto xxs-image_dimensions_auto" title="Free Support" alt="Free Support" style="" html="" usercontent="" images="" random="">
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	<div class="clear"></div>
	
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 black_bg  padb0 hidden">
			<div class="  maxwi_100 black_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_50 xxs-wi_100 maxwi_100 marb15 dflex alit_s mart45 padt10 xxs-padrl0 padr15">
				<div class="wi_100  txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_macos__n12a0rxneluq_large.jpg" class="hidden-xs talc" width="440px;" height="323px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_macos__n12a0rxneluq_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;">Mac</h3>
					<h3 class="marb40 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;
">Bring your biggest projects to life. Every Mac is designed for powerful performance — so you can build complex spreadsheets, create stunning presentations, or multitask across multiple projects.</h3></a>


				</div>
			</div>
			<div class="wi_50 xxs-wi_100 maxwi_100 marb15 dflex alit_s mart45 padt10 padl15 xxs-padl0 ">
				<div class="wi_100  txt_708198 pad25 padt80 padb80  xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ipados__c760lao1b0ia_large.jpg" class="hidden-xs talc" width="440px;" height="323px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ipados__c760lao1b0ia_large.jpg" class="visible-xs talc" width="319px;">

<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz17 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">iPad</h3>
					<h3 class="marb40 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Get power that outpaces most PC laptops in a design that goes everywhere. Scan merchandise, visualize models in 3D, and breeze through work when you multitask with Split View.</h3></a>


				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
	<div class="clear"></div>
	
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 marb40 white_bg_bg  padb0 hidden">
			<div class="  maxwi_100  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_30 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 " style="">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15" style="
    background: #0F0F0F;
">
					
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ios__geprj2n8keuu_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_ios__geprj2n8keuu_large.jpg" class="visible-xs talc" width="262px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">iPhone</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Do incredible things on the go. Visualize 3D projects using augmented reality. Collaborate with your team on Keynote presentations. And stay connected with FaceTime, Messages, and Mail.</h3></a>


				</div>
			</div>
			<div class="clear"></div>
			<div class="wi_69 xxs-wi_100 maxwi_100    alit_s mart15 padl30 xxs-padl0 " style="">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 marb30  xs-marl0 xs-pad15 " style="
    background: #0F0F0F;
">
					<div class="dflex fxwrap_w alit_s">
					<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="hidden-xs talc" width="130px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_watchos__fbcu0f92ujyq_large.jpg" class="visible-xs talc" width="164px;">
</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart0 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz17 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">Apple Watch</h3>
					<h3 class="marb0 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Stay connected at a glance. Handle notifications as they pop up with a single tap, track Messages, and get the most out of apps for work and wellness.</h3></a>
</div>
</div>

				</div>
				
				<div class="wi_100   txt_708198 pad25 padt80 padb80 mart15  xs-marl0 xs-pad15" style="
    background: #0F0F0F;
">
				<div class="dflex fxwrap_w alit_s">
				<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padr15 xxs-padl0 ">	
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="hidden-xs talc" width="258px;">
					<img src="https://www.apple.com/v/business/f/images/overview/productivity_tvos__b1mktmalk0ya_large.jpg" class="visible-xs talc" width="262px;">
					</div>
<div class="wi_50 xxs-wi_100 maxwi_100    alit_s mart15 padl15 xxs-padl0 ">
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz17 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">Apple TV</h3>
					<h3 class="marb0 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="
    font-family: Avenir;
">Turn your best work into a cinematic experience. Put important presentations and data-driven dashboards on display.</h3></a>
</div>

</div>
				</div>
			</div>
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
	<div class="clear"></div>
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 marb40 black_bg  padb0 hidden">
			<div class="  maxwi_100 black_bg padb80 marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0  talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 ">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/apps_builtin__00lcgj5wfv66_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/apps_builtin__00lcgj5wfv66_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">Built-in Apps</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Notes, Siri Shortcuts, and Reminders make simple things even easier, like signing and scanning documents to share and adding a sketch with Apple Pencil on iPad.</h3></a>


				</div>
			</div>
			
			<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-padrl0 padr15 padl15 ">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/apps_store__bchtkvzilavm_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/apps_store__bchtkvzilavm_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">App Store</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Over 235,000 business apps help you get any job done, like Cisco Webex and Microsoft Excel for daily needs and industry-specific tools like Shapr3D and Scandit for specialized tasks.</h3></a>


				</div>
			</div>
			
			<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 padl15">
				<div class="wi_100   txt_708198 pad25 padt80 padb80 xs-pad15 bg_1d1d1f">
					
					<img src="https://www.apple.com/v/business/f/images/overview/apps_custom__cdwfdck6wawi_large.jpg" class="hidden-xs talc" width="197px;">
					<img src="https://www.apple.com/v/business/f/images/overview/apps_custom__cdwfdck6wawi_large.jpg" class="visible-xs talc" width="319px;">
	<a href="#"><h3 class="mart40 marb10 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;">Custom Apps</h3>
					<h3 class="marb40 xs-marb20 pad0    fsz17 tall padrl20 xs-padrl0 white_txt" style="font-family: Avenir;
">Build your own game-changing apps using cutting-edge technology for whatever your business needs.</h3></a>


				</div>
			</div>
		</div>
		
	</div>
	</div>
	<div class="clear"></div>
	
	<div class="column_m container padt120 padb80 black_bg hidden">
					<h2 class="padl10 xxs-padrl25 tall marrla  white_txt  marb10 fsz24 maxwi_750p  xsi-padrl100  ffamily_avenir">Success Story</h2>
					<h2 class="padl10 xxs-padrl25 tall marrla  white_txt  marb10 fsz48 maxwi_750p  xsi-padrl100  ffamily_avenir">Capital One</h2>
						<div class="marb40 xs-marb20 pad0 white_txt marrla tall fsz48 padrl15 xs-fsz20 maxwi_750p xsi-padrl100 ffamily_avenir">When people love what they do, what they do is amazing.</div>
						
						
				</div>
	<div class="clear"></div>
	
	<div class=" wi_100 maxwi_100 marb0  padrl15 padb40 black_bg  padb0 hidden">
			<div class="  maxwi_100 black_bg marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc padrl55 xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb15 padr15 xxs-padrl0  ">
				<div class="wi_100  txt_708198">
					
					<img src="https://www.apple.com/v/business/f/images/overview/ss_capitalone__bhh90nopxes2_large.jpg" class="hidden-xs talc" width="594px;">
					<img src="https://www.apple.com/v/business/f/images/overview/ss_capitalone__bhh90nopxes2_large.jpg" class="visible-xs talc" width="343px;">
	


				</div>
			</div>
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb15 padl15 xxs-padl0 ">
				<div class="wi_100  txt_708198 pad25 padt200 padb80  xs-pad15 bg_1d1d1f">
				
<a href="#" class=" "><h3 class="mart40 marb10 pad0 white_txt  fsz28 bg_d7e9f0 tall padrl50 xs-padrl0" style="font-family: Avenir;">"iPhone, iPad, and Mac are helping unleash the imagination of the people at Capital One, which is why we make the investment."</h3>
<h3 class="mart30   pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;">Frank LaPrade</h3>
<h3 class="marb40 xs-marb20 pad0 white_txt  fsz17 tall padrl50 xs-padrl0" style="font-family: Avenir;">Chief Enterprise Services Officer</h3>

</a>


				</div>
			</div>
			
		</div>
		
	</div>
	</div>
	<script>
				function changeStyle(link,id)
				{
					if($(link).hasClass('active'))
					{
						$(link).removeClass('active');
						$("#faq-"+id).attr('style',"display:none");
					}
					else
						{
						$(link).addClass('active');
						$("#faq-"+id).attr('style',"display:block");
					}
				}
				</script>
	<!-- FAQ -->
	
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/slick.min.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/superfish.js"></script>
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/jquery.selectric.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//modules.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/custom.js"></script>











<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		<div class="wi_55 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padr50 brdr">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">Heart Starters
</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">Having defibrillators readily available can help to save lives.

Defibrillators can raise survival rates from cardiac arrest from 6% to an incredible 74%. </h3></a>


				</div>
			</div>
<div class="wi_45 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padl50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">Lost &amp; Found</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">“Some things are simply irreplaceable. So when an honest individual finds and reports a lost item, it can really make your day.

</h3></a>


				</div>
			</div>
		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	<div class="column_m container zi5    xs-mart0 white_bg ">
				
						
					</div>
	
					<div class="column_m container zi5    xs-mart0 white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width: 1200px;">
					
				
<div class=" wi_100 maxwi_100 marb0  padrl0 padt80 white_bg  padb80 brdb">
			<div class="  maxwi_100 white_bg  marrla">
		
		
		<div class="dflex fxwrap_w alit_s padt0 tall">
		
		<div class="wi_75 xxs-wi_100 xsi-wi_100 xsip-wi_100  maxwi_100  dflex alit_s mart15 padr50">
				<div class="wi_100 md-padtb35 lg-padtb20 md-padrl30 lg-padrl30   txt_708198">
					
					<div class="maxwi_80">
						
					</div>

<a href="https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true"><h3 class="mart40 xs-mart0 marb10 xs-marb0 pad0 black_txt  fsz60  xs-fsz45 xxs-lgn_hight_60" style="
    font-family: Avenir;
    line-height: 65px;
">SoS Help</h3>
					<h3 class="marb40 xs-marb20 xs-mart20 pad0 black_txt  fsz25 xs-fsz20 padt20" style="
    font-family: Avenir;
">There are times in life when you find yourself in situations where you are unable to inform relatives about your well-being. It can be due to an accident, when you receive treatment abroad, when you are detained or disappeared without a trace.</h3></a>


				</div>
			</div>

		
			
			
		</div>
		<div class="hidden mart0 xs-mart50 talc">
			<img src="html/usercontent/images/smart/features-photo.png" width="1022" height="250" class="maxwi_100 hei_auto valm" title="Amazing Features" alt="Amazing Features">
		</div>
	</div>
	</div>
					
					<div class="clear"></div>		
				
			</div>
						
					</div>
	
	
	<!-- HERO SLIDER -->
	<div class="column_m container padb40 white_bg talc padrl55 xs-padrl10 hidden" style="    margin-top: 20px;">
				<div class="wi_100  txt_708198 pad40 padt80 padb80 xs-pad15  marb15  maxwi_100 marrla" style="background-color: #0F0F0F;max-width: 1200px;border-radius: 30px;padding-bottom: 80px;">
					
					
					<h2 class="padl10 xxs-padrl25 talc marrla  white_txt  marb0 fsz120 maxwi_750p  xsi-padrl100  ffamily_avenir mart40 bold" style="
    font-size: 110px;
">TXP</h2>
						<h2 class="padl0 xxs-padrl25 talc marrla  white_txt  marb10 fsz90 maxwi_750p  xsi-padrl100  ffamily_avenir mart0" style="
    font-size: 80px;
">A Community Hub</h2><div class="marb40 xs-marb20 pad0 grey_txt marrla talc fsz25 padrl15 xs-fsz20 maxwi_750p xsi-padrl100 ffamily_avenir lgn_hight_s15">TXP stands for Tenant Experience and is a community solution with tenant in focus. </div>
						
						</div>
						
						&nbsp;
				</div>

	<!-- FEATURES -->
	
	<div class="  column_m container  wi_100 maxwi_100 marb0  padrl15 padt0 white_bg padb80 brdb hidden">
			<div class="  maxwi_100 marrla" style="
    width: 1200px;
">
		
		
		<div class="dflex fxwrap_w alit_s padt0 talc  xsi-padrl25 xxsi-padb20  xs-padrl0">
		<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 xxs-padrl0 " style="
">
				<div class="wi_100 black_txt brdr" style="/* background-color: #0F0F0F; *//* border: 2px solid black; *//* border-radius: 20px; */padding: 45px;">
					
					<div class="maxwi_80">
						
					</div>
	<a href="#"><h3 class="mart40 marb10 pad0 black_txt fsz40 xs-fsz20 tall" style="font-family: Avenir;">73% love TXP</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">73% of all residents log into the app at least once per day. Popular features include communication feed, library and contacts.

</h3></a>


				</div>
			</div>
			

<div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0  xxs-padl0 ">
				<div class="wi_100 pad20 black_txt lgtgrey_bg brdr" style="/* border-radius: 20px; */padding: 45px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 black_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">3,200 are active</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">3,200 communities have succefully signed and use it on daily basis since we started a year ago.

</h3></a>


				</div>
			</div><div class="wi_33 xxs-wi_100 maxwi_100  dflex alit_s mart15 marb0 xxs-padl0 ">
				<div class="wi_100 pad25  txt_708198 lgtgrey2_b" style="/* background-color: #0F0F0F !important; *//* border: 2px solid black; *//* border-radius: 20px; */padding: 45px;">
					
					<div class="maxwi_80">
						
					</div>

<a href="#"><h3 class="mart40 marb10 pad0 black_txt   fsz40 xs-fsz20 tall" style="font-family: Avenir;">Over 300k users</h3>
					<h3 class="marb0 xs-marb20 pad0 grey_txt  fsz18 tall" style="
    font-family: Avenir;
">We have more than 300 thousands tenants using TXP. Our onboarding so far is 84%
</h3></a>


				</div>
			</div>
			
		</div>
		
	</div>


	</div>
	
	<!-- ABOUT -->
	
	
	
	<!-- AMAZING FEATURES -->
	


	


	<!-- DESIGN -->
	
	
	
	
	
	
	
	
	
	
	
	
				
				

	
	

	
		
	
	
	
	
					
					
					
					
	
	
		
	
	
	
	
	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!-- FAQ -->
	
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/slick.min.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/superfish.js"></script>
	
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/jquery.selectric.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//modules.js"></script>
	<script type="text/javascript" src="../../../../html/smartappcss/html/smartappcss//js/custom.js"></script>









</body>
