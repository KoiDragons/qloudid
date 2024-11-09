<!doctype html>
<html>
	
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnew.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		
		<script type="text/javascript" async src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
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
				
				
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				
				if($("#username").val() == "")
				{
					alert("Enter username");
					$("#username").css("background-color","#FF9494");
					return false;
				}
				if (!reg.test($("#username").val())){
                    
                    $("#username").css("background-color","#FF9494");
                    alert("Incorrect Email address format");
                    return false;
                    
				}
				if($("#password").val() == "" )
				{
                    $("#password").css("background-color","#FF9494");
					alert("Enter Password");
                    return false;
				}
				
				
				
				document.getElementById("loginform").submit();
			}
			
		</script>
	</head>
		<body class="white_bg">
		<?php $path1 = $path."html/usercontent/images/"; 
		
		//include 'UserPublicHeader.php';
		?>
			 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="LoginAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="fright xs-dnone sm-dnone padt15 padb10 hidden">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel   marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  fsz30  black_txt_h" style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </li>
						
					</ul>
				</div> 
            <div class="clear"></div>
         </div>
      </div>
		 
<div class="column_m header hei_55p  bs_bb white_bg visible-xs" >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="LoginAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 <div class="fright   padt10 padb10 hidden">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock   fleft pos_rel   marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  fsz30  black_txt_h" style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </li>
						
					</ul>
				</div> 
			 
				 
				<div class="clear"></div>
			</div>
		</div>		
			
			<div class="clear" id=""></div>
	
		<!-- LOGIN FORM -->
		<div class="column_m marb30 mart40  talc lgn_hight_22 fsz16 xs-mart20" id="loginBank1"  onclick="checkFlag();">
				<div class="padrl10 white_bg xs-padrl25">
					<div class="wrap maxwi_100   xs-nobrdb   xs-padb0  xs-mart0">
						
							<div class="wi_500p maxwi_100  pos_rel zi5 marrla pad30  xs-pad0  ">
								<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/random/bankid_high_rgb.png" height="128" width="128"/></span></div>
								<h1 class="marb0  xxs-talc talc fsz35 xs-fsz25 bold marb5 black_txt trn hidden" >Logged out</h1>
						<div class="padb20 padt10 xxs-talc talc"> <a href="#" class="black_txt fsz20 xs-fsz20 xxs-talc talc edit-text jain_drop_company trn " >You have been logged out by free will or due to none-activity.</a></div>
					
					<div class="container padrl15 xs-padrl0">
						
						<div class="marrla xs-wi_100">
							
							<form action="LoginAccount/loginAccount<?php if(isset($data)) { ?>?next=<?php echo $data['client']; if(isset($data['apply'])) echo "&apply=".$data['apply']; else if(isset($data['purchase'])) echo "&purchase=".$data['purchase'];  else if(isset($data['login'])) echo "&login=".$data['login']; } ?>" method="POST" method="POST" id="loginform" >
								
									
									
									<div class="marb10 padtb10 ">
				
				
				
				<div class="on_clmn mart10 xxs-mart10">
												
				<div class="pos_rel">
				<input type="text" name="username" id="username" placeholder="Email" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> </div>
				</div>
				<div class="on_clmn mart10">
				<div class="pos_rel">
				<input type="password" name="password" id="password" placeholder="Password" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> 
				</div>
				</div>
				<div class="clear"></div>
				<div class="on_clmn mart10 xxs-mart10">
				<div class="tw_clmn padrl0 xs-padrl0">
				<label class="dblock fsz12 fleft">
				<input type="checkbox" name="staylogin11" id="staylogin11" /> <span class="marl5 fsz16 xs-fsz16 valm ">Remember me</span> </label>
				</div>
				<div class="tw_clmn padl10 talr lgn_hight_18 fsz16"> <a href="ForgotPswd">Forgot password?</a> </div>
				</div>
				<div class="clear"></div>
				
				
				</div>
				<div class="talc  padt20"><a href="#" onclick="validateLogin();"><input type="button" value="Logga in" class="forword button_bg_color minhei_55p ffamily_avenir"  /></a>
										<input type="hidden" name="login" >
									
									</div>
				
			
				
				
				
				</form>
							<div class="martb10 talc fsz18 hidden"><a href="CreateAccount">Create a new account</a>
							</div>
							
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="wi_100 hidden  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="https://www.safeqloud.com/public/index.php/LostandFoundWelcome" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>Lost & Found</span>
					</a>
					 
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					 
					<a href="https://www.safeqloud.com/public/index.php/HelpPeople" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span class="fa fa-file-text-o"></span>
						</div>
						<span>Help People</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Create request
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							You got an invitation
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Inform relatives
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
							Photo
						</a>
					</li>
					<li class="dblock mar0 padrl15">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
							Audio Note
						</a>
					</li>
				</ul>
				<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
					<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
				</div>
			</div>
		</div>
		
		</div>
					
		
		<div class="clear"></div>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/superfish.js"></script>
		<!--<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/icheck.js"></script>-->
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/loggout.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/loggoutPlace.js"></script>
	</body>
	
</html>