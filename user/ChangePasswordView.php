<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<!-- Styles -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/signup/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126618362-1');
</script>
	<script>
		var currentLang = 'sv';
		function validateLogin()
{
    
    //alert("hi");
    
                 var cpass=$("#cpassword").val();
				 var user=<?php echo $data['user_id']; ?>;
                    if($("#cpassword").val() == "")
					{
						alert("Enter current password");
						$("#cpassword").css("background-color","#FF9494");
						return false;
					}
					

					
					if($("#newpassword").val() == "" )
                    {
                    $("#newpassword").css("background-color","#FF9494");
					alert("Enter New Password");
                    return false;
                    }
					
                    if($("#repassword").val() == "" )
                    {
                    $("#repassword").css("background-color","#FF9494");
					alert("Re-Enter New Password");
                    return false;
                    }
					
					if($("#repassword").val() != $("#newpassword").val())
                    {
                    $("#repassword").css("background-color","#FF9494");
					$("#newpassword").css("background-color","#FF9494");
					alert("New password must match !!");
                    return false;
                    }
                    
					$.get("ChangePassword/checkPassword/"+cpass+"/"+user,function(data1,status){
							   
								  if(data1==0)
									{
										$("#cpassword").css("background-color","#FF9494");
										alert("Your current password don't match !!");
										return false;
									}
									else
									{
									document.getElementById("loginform").submit();	
									}
								  
								  
								  });
                    
}

	</script>
</head>

<body class="white_bg">
	
	<!-- HEADER -->
	<div class="column_m header header_small bs_bb lgtblue2_bg" style="background-color: #bbd2de;">
		<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 lgtblue2_bg" style="background-color: #bbd2de;">
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="#"> <img src="<?php echo $path;?>html/usercontent/images/qmatchup_logo_blue.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10"></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="top_menu frighti padt10">
				<ul class="menulist sf-menu">
					<li>
						<a href="javascript:void(0);" ><span class="black_txt pred_txt_h">+<?php echo $row_summary['first_name']; ?>...</span></a>
					</li>
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-envelope-o black_txt"></span></a>
						<ul>
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="application_menu pad20">
									<ol>
										<li>
											<a href="http://jain.com" target="_blank" class="business_prof"> <span></span> First App </a>
										</li>
										<li>
											<a href="http://www.gh.in" target="_blank" class="swedBank"> <span></span> testing 1.2 </a>
										</li>
										<li>
											<a href="http://www.ee.se" target="_blank" class="business_prof"> <span></span> Jobseeking </a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m"> <a href="#" target="_blank" class="contractor_btn"><span></span>View More</a> </div>
			
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-cog black_txt"></span></a>
					</li>
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-bell-o black_txt"></span></a>
					</li>
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-qrcode black_txt"></span></a>
						<ul>
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="setting_menu pad15">
									<div class="fsz13">Sign in as</div>
									<ol class="">
										<li><a href="javascript:void(0);"><?php echo $row_summary['name']; ?></a>
										</li>
										<li>
											<div class="line martb10"></div>
										</li>
										<li>
											<div class="line marb10"></div>
										</li>
										<li><a href="UserLogout?action=logout">Logout</a>
										</li>
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="zoho_hr_portal7_subscription.html" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	
	<!-- LOGIN FORM -->
	<div class="column_m mart0 padtb30 fsz14">
		<div class="wrap maxwi_100">
			
			<div class="container padrl15">
				<h1 class="talc">One account. All of Qmatchup.</h1>
				<h3 class="marb10 talc">Change Password with your Qmatchup Account</h3>
				<div class="maxwi_320p marrla">
					<div class="marb20 pad10 brd white_bg">
							<form action="ChangePassword/changePassword" method="POST" id="loginform">
							<h4 class="mart15 padrl10 bold">Change Password</h4>
							<div class="on_clmn padtb10">
								<div class="on_clmn padrl10">
								<input type="password" name="cpassword" id="cpassword" placeholder="Current Password" class="wi_100 pad10 brd logyellow_bg" /> </div>
								<div class="on_clmn padrl10">
									<input type="password" name="newpassword" id="newpassword" placeholder="New Password" class="wi_100 pad10 brd logyellow_bg" /> </div>
								<div class="on_clmn padrl10">
									<input type="password" name="repassword" id="repassword" placeholder="Retype Password" class="wi_100 pad10 brd nobrdt logyellow_bg" /> </div>
								<div class="clear"></div>
							</div>
							<!-- * stay signed in / forgot pass 
							<div class="on_clmn padtb10">
								<div class="tw_clmn padrl10">
									<label class="dblock fsz12">
										<input type="checkbox" name="staylogin11" id="staylogin11" /> <span class="marl5 valm">Stay signed in</span> </label>
								</div>
								
								<div class="clear"></div>
							</div> -->
							<!-- * submit -->
							<div class="on_clmn padt10">
							
								<div class="padrl10 talc"> <input type="button" value="Nästa" class="dblue_btn min_height" onclick="validateLogin();"/>
									 <input type="hidden" name="login" > </div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</form>
					</div>
				</div>
				<!--<div class="marb30 talc"><a href="CreateAccount">Create a new account</a>
				</div>-->
				<div class="marb10 talc"><span>One Qmatchup Account for everything Qmatchup</span>
				</div>
				<!--<div class="talc"><img src="<?php echo $path; ?>html/usercontent/images/wlogostrip_230x17_1x.png" />
				</div>-->
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
</body>

</html>