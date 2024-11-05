<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Account activated</title>
	<!-- Styles -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/signup/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/signup/login/html/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/signup/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/signup/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/signup/login/html/css/modules.css" />
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
	<script>
		var currentLang = 'sv';
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
	
	<!-- HEADER -->
	<div class="column_m header header_small padrl10 white_bg brdb">
		<div class="padtb5">
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="https://www.qloudid.com/user/index.php/NewPersonal/userAccount"> <h3 class="marb0 pad0 fsz22 black_txt " style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3>  </a>
			</div>
			<div class="fleft padl10">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10"></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng">
								<img src="<?php echo $path; ?>html/signup/login/html/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd">
								<img src="<?php echo $path; ?>html/signup/login/html/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="usermenu">
				<ul>
					<li class="right">
						<a href="#" class="translate blue_btn bold xs-padrl10i" id="usermenu_singin" data-en="Sign In" data-sw="Logga In">Sign Up</a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	
	<!-- LOGIN FORM -->
	<div class="column_m mart0 padtb30 fsz14">
		<div class="wrap maxwi_100">
			
			<!-- 1 - 2 - 3 breadcrumbs -->
			<div class="container marb30 padrbl15">
				<div class="grey_bg">
					<div class="dblue_bg wi_100 hei_10p"></div>
				</div>
			</div>
			
			<div class="container padrl15">
				<h1 class="marb10 talc fsz46 xs-fsz32">Your account is activated</h1>
				<h3 class="marb10 talc fsz26 xs-fsz20">Login and get started</h3>
				
				<div class="maxwi_320p marrla">
					<div class="marb20 pad10 brd white_bg">
						<form action="LoginAccount/loginAccount" method="POST" method="POST" id="loginform" onsubmit="return validateLogin();">
							<h4 class="mart15 padrl10 bold">Login</h4>
							<div class="on_clmn padtb10">
								<div class="on_clmn padrl10">
									<input type="text" name="username" id="username" placeholder="Email" class="wi_100 pad10 brd yellow_bg" />
								</div>
								<div class="on_clmn padrl10">
									<input type="password" name="password" id="password" placeholder="Password" class="wi_100 pad10 brd nobrdt yellow_bg" />
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
									<a href="https://www.qmatchup.com/beta/user/index.php/ForgotPswd">Forgot Password?</a>
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
				<div class="marb10 talc">
					<span>One account for all your digital activities</span>
				</div>
				
				
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/custom.js"></script>
</body>

</html>