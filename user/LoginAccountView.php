
<!DOCTYPE html>
 
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Qloudid</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/skeleton.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/layout.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/main.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/base.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		 
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smart/css/icofont.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		 <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script> 
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

<!-- JavaScript
	================================================== -->

    

    
	
   <script src="<?php echo $path; ?>html/usercontent/js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->

	<script src="<?php echo $path; ?>html/coronahelpcss/ticker.js" type="text/javascript"></script>
	 <link rel="shortcut icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	 <link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/helper.css">

<script type="text/javascript">
 function changeDisplay()
	{
		if($('#ulDisplay').css('display') == 'none')
		{
		$('#ulDisplay').attr('style','display:block');	
		}
		else
		{
			$('#ulDisplay').attr('style','display:none');	
		}
		
	}
	
	function closePopup()
	{
		if($('#ulDisplay').css('display') == 'block')
		{
		$('#ulDisplay').attr('style','display:none');	
		}
		 
	}
window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
			function changeHeader()
			{
				
				window.location.href="https://www.qloudid.com/user/index.php/LoginAccountEng";
				
			}
		
			var currentLang = 'sv';
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
	
			
			
			function validateLogin()
			{
				
				$('#error_msg_form').html('');
				 $("#error_msg_form").addClass('hidden');
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				
				if($("#username").val() == "")
				{
					$("#error_msg_form").removeClass('hidden');
					$('#error_msg_form').html("Enter username");
				$("#username").css("background-color","#FF9494");
				return false;
				}
				if (!reg.test($("#username").val())){
				
				$("#username").css("background-color","#FF9494");
				$("#error_msg_form").removeClass('hidden');
				$('#error_msg_form').html("Incorrect Email address format");
				return false;
				
				}
				if($("#password").val() == "" )
				{
				$("#password").css("background-color","#FF9494");
				$("#error_msg_form").removeClass('hidden');
				$('#error_msg_form').html("Enter Password");
				return false;
				}
				
				
				
				document.getElementById('loginform').submit();
				}
				
    
</script>
</head>
<body class="ffamily_avenir white_bg">
<div class="column_m header hei_45p xs-header xsip-header xsi-header bs_bb white_bg hidden">
				<div class="wi_100 hei_45p xs-pos_fix padt0 padrl10 black_bg">
				
				<div class="logo marr15 wi_140p xs-wi_130p ">
				
					<a href="#"> <h3 class="marb0 pad0 fsz20 white_txt padt5 padb10" style="font-family: Avenir;">Qualeefy</h3> </a>
					
				
				</div>
			 <div class="fright xs-dnone sm-dnone padt10 padb0 hei_45p">
					<ul class="mar0 pad0 sf-menu fsz16">
						<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" >Logga in</a></li>
					 
	<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" data-en="About us" data-sw="About us">About us</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="DigitalID.php" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" data-en="Our Technology" data-sw="Our Technology">Our Technology</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" data-en="Portfolio" data-sw="Portfolio">Portfolio</a></li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr10 padr10 padt10  brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz16 black_txt" style="font-family: Avenir;">About</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="column_m header xs-header xsip-header xsi-header bs_bb hidden-xs">
				<div class="wi_100  xs-pos_fix padtb5 padrl10 lgtgrey2_bg xs-lgtgrey_bg">
				
				<div class="logo marr15 wi_140p xs-wi_130p ">
				
					<a href="https://www.qloudid.com/public/index.php/QloudidPersonalEng"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb0 ffamily_avenir">Qloudid</h3> </a>
					
				
				</div>
			 <div class="fright xs-dnone sm-dnone padt5 padb0">
					<ul class="mar0 pad0 sf-menu fsz16 sf-js-enabled sf-arrows">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first"><a href="https://www.qloudid.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt black_bg ffamily_avenir" data-en="Sign in" data-sw="Sign in">Sign in</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel padr20"><a href="https://www.qloudid.com/user/index.php/CreateAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 lgn_hight_30 black_txt ffamily_avenir padt5">Sign up</a></li>
	 
	 <li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="https://www.qloudid.com/public/index.php/CorporateServicesEng" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Business</a></li>
		<li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="https://www.qloudid.com/public/index.php/QloudidPersonalEng" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Private</a></li>					
					</ul>
				</div>
				
				 
			<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="diblock padl15 padr0 brdrad3 fsz30 black_txt"><i class="fas fa-bars" aria-hidden="true"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	  <div class="column_m header xs-hei_55p  bs_bb lgtgrey2_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey2_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/public/index.php/QloudidPersonalEng" class="lgn_hight_s1  padl10 fsz30 sf-with-ul nobold"><i class="fas fa-home black_txt " aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="top_menu talc    wi_60i " style="padding-top:5px;">
				<ul class="menulist sf-menu  fsz25  bold wi_100 sf-js-enabled sf-arrows">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir nobold">Qloudid</span></a>
					</li>
				 	 
       			 	</ul>
			</div> 
			<div class="top_menu frighti   padb10 visible-xs maxwi_60p" style="padding-top:8px;">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">
					 
       			
					<li class="last marr0 padr10">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz30 nobold"><span class="fas fa-bars black_txt " aria-hidden="true"  onclick="changeDisplay();"></span></a>
						<ul style="display: none;" id="ulDisplay">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last marr0">
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									 
									<li>
                    <div class="line martb10"></div>
                  </li>
				 
										
                  <li><a href="https://www.qloudid.com/public/index.php/QloudidPersonalEng" class="fsz20">Personal</a></li>
				   
                  <li><a href="https://www.qloudid.com/public/index.php/CorporateServicesEng" class="fsz20">Business</a></li>
                  <li><a href="https://www.qloudid.com/user/index.php/CreateAccount" class="fsz20">Sign up</a></li>
                   <li><a href="#" class="fsz20">Sign in</a></li> 
                  <li>
                    <div class="line marb10"></div>
                  </li>
										
										
										 
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>

	<!-- Header Section
	================================================== -->
	<div class="white_bg">
		<div class="wi_1200p maxwi_100 container xs-wi_100">
			<div class="wi_1200p maxwi_100 twenty columns header_container xs-wi_100 white_bg xxsip-marl0 ">
				<div class="wi_760p xsi-wi_100 columns header_left alpha padt90 xs-padt0 xs-talc maxwi_100">
					<div class="header_left_inner">
						 
						<div class="clearfix small_padding"></div>
						 
						<div class="clearfix"></div>
						<h2 class="red_ff2828_txt fsz90 ffamily_avenir nobold xxs-fsz54 lgn_hight_100 xs-lgn_hight_55">Newsflash 
</h2>
<h2 class="black_txt bold fsz100 ffamily_avenir bold xxs-fsz54 lgn_hight_80 xs-lgn_hight_55">Qricis Friends
</h2>	
	
						<h3 class="header_text ffamily_avenir lgn_hight_35 xs-lgn_hight_30 fsz30 xs-fsz20 black_txt padt10">
							A newly added product on Qloud ID by Qricis.com
						</h3>	
						<h3 class="header_text ffamily_avenir lgn_hight_35 xs-lgn_hight_30 fsz30 xs-fsz20 black_txt padt10">
							With Qricis, users will be able to get help with contact-free deliveries of grocery shopping or medicine with the help from our awesome volunteers.
						</h3>
						<div class="clearfix "></div>
						<div class="container">
							
					</div>
					
					<div class="dflex fxwrap_w xxs-justc_c   marl-10 xxs-marl-15 hidden">
							<a href="https://www.qloudid.com/public/index.php/CoronaHelp/detailInfo/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" class="wi_200p hei_45p dflex alit_c justc_c pos_rel zi1 mart15 marl15 brdrad50 txtdec_n xs-padrl15  bold fsz16 xs-fsz16 black_txt " target="_blank" tabindex="0">
								<div class="wi_100 hei_120 opa0_ph pos_abs zi-1 top5 left0  bglgrad_r_46c8ff_81d37e bg_62cec1 xs-nobrd  xs-bg_62cec1 brdrad50 xs-bglgrad_r_46c8ff_81d37e trans_opa2"></div>
								<div class="wi_100 hei_120 opa0 opa1_ph pos_abs zi-1 top5 left0 brdrad50 bglgrad_r_46c8ff_81d37e bg_62cec1 trans_opa2"></div>
								 
								Jag behöver hjälp
							</a>
							 
						</div>
					
					
				</div>

				
				 
						</div>

			<div class="seven columns header_right white_bg maxwi_375p omega xs-wi_100 box_shadow_00000070 mart40">
					<div class="header_right_inner padrtl35i white_bg padb0 ">
						
						<div class="clearfix"></div>
						 <div class="talc fsz35 red_txt hidden"><img src="<?php echo $path; ?>html/usercontent/images/random/bankid_high_rgb.png" height="128" width="128"/></span></div>
						 <div class="padb0 talc fsz60 padt20"><i class="fas fa-first-aid red_ff2828_txt"></i></div>
									<div class="mart20 xs-mart0 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Sign in & get started</a></div>
						<form action="LoginAccount/loginAccount<?php if(isset($data)) { ?>?next=<?php echo $data['client']; if(isset($data['apply'])) echo "&apply=".$data['apply']; else if(isset($data['purchase'])) echo "&purchase=".$data['purchase'];  else if(isset($data['login'])) echo "&login=".$data['login']; } ?>" method="POST" name="loginform" id="loginform"  accept-charset="ISO-8859-1" autocomplete="off" >
						<div class="clearfix"></div>
						<fieldset   >
							 
						  
						    <label for="email">
						    <input type="email" class="wi_100 nobrdt nobrdr nobrdl bg_ff5bad38   brdb_black brd_width_1 red_ff2828_brdclr talc  xxs-minhei_50p minhei_55p fsz18 red_ff2828_txt ffamily_avenir  marb20" placeholder="Email" name="username" id="username" autocomplete="off" />
						    </label>
						    
						   
						    <label for="phone"> 
						    <input type="password"  class="wi_100 nobrdt nobrdr nobrdl bg_ff5bad38   brdb_black brd_width_1 red_ff2828_brdclr talc  xxs-minhei_50p minhei_55p fsz18 red_ff2828_txt ffamily_avenir marb15" placeholder="Password" name="password" id="password"  autocomplete="off"/>
						    </label>
							
							<input type="hidden" name="login" >
							
							 <div class="clear"></div>
							<div class="on_clmn marb20">
				<div class="tw_clmn padrl0 xs-padrl0">
				<label class="dblock fsz12 fleft">
				<input type="checkbox" name="staylogin11" id="staylogin11" /> <span class="marl5 fsz16 xs-fsz16 valm ">Remember me</span> </label>
				</div>
				<div class="tw_clmn padl10 talr lgn_hight_18 fsz16"> <a href="ForgotPswd">Forgot password?</a> </div>
				</div>
				<div class="clear"></div>
						 <div class="valm fsz16 red_txt marb20 hidden" id="error_msg_form"> </div>
						 
						 <div class="padt20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p red_ff2828_bg fsz18 padrl80" onclick="validateLogin();">Sign in</button>
								
							</div>
						    
						    
						</fieldset>
						</form>
					 
						<div class="clearfix"></div>
						<a href="LoginAccount/ssnInfoLogin"><div class="talc fsz16 padb40">Login with SSN instead</div></a>
					</div>
				
				
				
				</div>
				
			</div>
		</div>
	</div>



<!-- features Section
	================================================== -->
	<div class="features_section hidden">
		<div class="container wi_1200p maxwi_100" >
			<div class="sixteen columns wi_1200p maxwi_100">
				<div class="one-third column wi_385p alpha xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-home pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Best Homes</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
				<div class="one-third column wi_385p xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-credit pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Great Prices</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
				<div class="one-third column omega wi_385p xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-tools pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Free Support</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>


<!-- End Document
================================================== -->
</body>
</html>