<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Login</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
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
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
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
		<?php include 'googleanalytical.php'; ?>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
			function changeHeader()
			{
				
				window.location.href="https://www.safeqloud.com/user/index.php/LoginAccountEng";
				
			}
		</script>
		<script>
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
	
	<?php $path1 = $path."html/usercontent/images/"; ?>
	
	
	
		<body class="white_bg ffamily_avenir">
		<?php $path1 = $path."html/usercontent/images/"; 
		
		
		?>
		<div class="column_m header hei_65p xs-hei_55p  bs_bb white_bg" id="dHeader" >
				<div class="wi_100 hei_65p xs-hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="hidden-xs fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			 <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class=" diblock padl7 padr7 brdrad3 fsz30 seggreen_47E2A1_txt"><i class="fas fa-plus " aria-hidden="true"></i></a> </div>
				 
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
				
				<!-- LOGIN FORM -->
				<div class="column_m marb30 mart40 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0" id="loginBank1"  onclick="checkFlag();">
				<div class="padrl10 white_bg xs-padrl25">
					<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0  xs-mart0">
						
							<div class="wi_500p maxwi_100  pos_rel zi5 marrla pad30  xs-pad0  ">
								
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz80 xxs-fsz60  padb10 black_txt trn ffamily_avenir">Wrong</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Wrong email or password added. Try again.</a></div>
					
					
							<div class="container padrl15 xs-padrl0">
							<div class="marrla xs-wi_100">
							<form action="LoginAccount/loginAccount<?php if(isset($data)) { ?>?next=<?php echo $data['client']; if(isset($data['apply'])) echo "&apply=".$data['apply']; else if(isset($data['purchase'])) echo "&purchase=".$data['purchase'];  else if(isset($data['login'])) echo "&login=".$data['login']; } ?>" method="POST" method="POST" id="loginform"  name="loginform">
							<div class="marb10 padtb10 ">
				
				
				
				<div class="on_clmn mart10 xxs-mart10">
												
				<div class="pos_rel">
				<input type="text" name="username" id="username" placeholder=" E-post adress" class="ffamily_avenir wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> </div>
				</div>
				<div class="on_clmn mart10">
				<div class="pos_rel">
				<input type="password" name="password" id="password" placeholder=" Ditt lösenord" class="ffamily_avenir wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> 
				</div>
				</div>
				<div class="clear"></div>
				<div class="on_clmn mart10 xxs-mart10">
				<div class="tw_clmn padrl0 xs-padrl0">
				<label class="dblock fsz12 fleft">
				<input type="checkbox" name="staylogin11" id="staylogin11" /> <span class="marl5 fsz16 xs-fsz16 valm ffamily_avenir">Kom ihåg mig</span> </label>
				</div>
				<div class="tw_clmn padl10 talr lgn_hight_18 fsz16 ffamily_avenir"> <a href="ForgotPswd"> Glöm lösenord?</a> </div>
				</div>
				<div class="clear"></div>
				
				
				</div>
				<div class="talc  padt20"><a href="#" onclick="validateLogin();"><input type="button" value="Logga in" class="forword button_bg_color minhei_55p ffamily_avenir"  /></a>
										<input type="hidden" name="login" >
									
									</div>
								
								
								
							</form>
							
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/custom.js"></script>
	</body>
	
</html>				