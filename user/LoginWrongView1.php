<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/css/additional.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/css/jquery-ui-1.10.4.custom.html" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/css/jquery.bxslider.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		<?php include 'googleanalytical.php'; ?>
<script>
	window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126618362-1');
</script>
		<script>
			document.addEventListener("DOMContentLoaded", function(event)
			{
				window.waitlisted.start(
				{
					domain: "hr.app.waitlisted.co",
					form: "49bc621e6077c06a53193840d3d54b84"
				})
			});
			var currentLang = 'sv';
		</script>
	</head>
	
	<?php $path1 = $path."html/usercontent/images/"; ?>

	<body class="white_bg">
		<div class="column_m header  bs_bb white_bg">
		<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc">
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15 wi_140p">
				<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr30">
			<div class="languages">
					<a href="#" id="language_selector" class="padrl10 black_txt"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="US" alt="US"></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="US" alt="US">
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden">
							</a>
						</li>
					</ul>
				</div>
			</div>
		<div class="usermenu">
					<ul>
						<li class="right hei_30p">
							<a href="#" class="translate orange_btn bold xs-padrl10i hei_30p " id="usermenu_singin" data-en="Sign In" data-sw="Logga In">Sign Up</a>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.qloudid.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
			
		</div>
	</div>
	<div class="clear"></div>
		
		<!-- Login form -->
		<div class="column_m mart0 padtb30 fsz14">
			<div class="wrap">
				<div class="container padrl15">
					
					<h1 class="talc bold">Wrong password or username</h1>
					<h3 class="marb10 talc">Please try again with your personal id.</h3>
					
					<div class="wi_35 marrlauto" style="margin: 0 auto;">
						<div class="marb20 pad10 brd white_bg">
							<form action="LoginWrong/loginAccount<?php if(isset($data)) { ?>?next=<?php echo $data['client']; if(isset($data['apply'])) echo "&apply=".$data['apply']; else if(isset($data['purchase'])) echo "&purchase=".$data['purchase'];  else if(isset($data['login'])) echo "&login=".$data['login']; } ?>" method="POST" method="POST" id="loginform" onsubmit="return validateLogin();">
								<h4 class="mart15 padrl10 bold">Login</h4>
								<div class="on_clmn padtb10">
									<div class="on_clmn padrl10">
										<input type="text" name="username" id="username" placeholder="Email" class="wi_100 pad10 brd yellow_bg" />
									</div>
									<div class="on_clmn padrl10">
										<input type="password" name="password" placeholder="Password" class="wi_100 pad10 brd nobrdt yellow_bg" />
									</div>
									<div class="clear"></div>
								</div>
								<!-- * stay signed in / forgot pass -->
								<div class="on_clmn padtb10">
									<div class="tw_clmn padrl10">
										<label class="dblock fsz12">
											<input type="checkbox" name="staylogin11" id="staylogin11"  /> <span class="marl5 valm">Stay signed in</span>
										</label>
									</div>
									<div class="tw_clmn padrl10 talr lgn_hight_18 fsz12">
										<a href="https://www.qloudid.com/user/index.php/ForgotPswd">Forgot Password?</a>
									</div>
									<div class="clear"></div>
								</div>
								
								<!-- * submit -->
								<div class="on_clmn padt10">
									<div class="padrl10 talc">
										<input type="submit" value="Nästa" class="dblue_btn min_height"/>
										<input type="hidden" name="login" >
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</form>
						</div>
					</div>
					
					
					<div class="marb30 talc hidden"><a href="CreateAccount">Create an account</a></div>
					<div class="marb10 talc"><span>One Qmatchup Account for everything Qmatchup</span></div>
					<div class="talc"><img src="<?php echo $path; ?>html/signup/images/wlogostrip_230x17_1x.png" /></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/js/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/js/index.js"></script>
		<script>
			$(document).ready(function()
			{
				$('.bxslider').bxSlider(
				{
					auto: false,
					pager: true,
				});
			});
			
			
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
	</body>
	
</html>