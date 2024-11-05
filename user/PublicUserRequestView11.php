<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
		
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
			
			function changeClass(link)
				{
					
					$(".class-toggler").removeClass('active');
					$(link).addClass('active');
				}
				
			function openPop()
			{
			$("#popup_fade").addClass('active');
			$("#popup_fade").attr('style','display:block');
			$("#gratis_popup_login").addClass('active');
			$("#gratis_popup_login").attr('style','display:block');
			}
			function closePop()
			{
			$("#popup_fade").removeClass('active');
			$("#popup_fade").attr('style','display:none');
			$("#gratis_alert").removeClass('active');
			$("#gratis_alert").attr('style','display:none');
			}	
				
		</script>
		
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
				
				
				
				var send_data={};
				
				send_data.username=$("#username").val();
				send_data.password=$("#password").val();
				$.ajax({
					type:"POST",
					url:"../../PublicUserRequest/loginAccount?rid=<?php echo $data['r_id']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
					
					if(data1==1)
					{
				$("#warning").html('');
				var msg="User does not exist.<a href='https://www.qloudid.com/user/index.php/CreateAccount'>Sign up</a>";
				$("#warning").html(msg);
				}
					else if(data1==5)
					{
				$("#warning").html('');
				var msg="Wrong password. <a href='https://www.qloudid.com/user/index.php/ForgotPswd'>Forgot password?</a>";
				$("#warning").html(msg);
				}	
					else if(data1==2 || data1==3 || data1==4)
					{
				window.location.href='https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests?rid=<?php echo $data['r_id']; ?>';
					}
					
					else 
					{
				$("#warning").html('');
				var msg="Login Error !!! Please try again later";
				$("#warning").html(msg);
				}		
						
					}
				});
			}				
					
			
	
			
		</script>
		
		
		
	</head>
	
	<?php $path1 = $path."html/usercontent/images/"; ?>
	
	<body class="lgtgrey2_bg" id="bodyBg">
				<div class="column_m header  bs_bb lgtgrey2_bg">
		<div class="wi_100 hei_65p xs-pos_fix pos_fix  padtb5 padrl10 lgtgrey2_bg">
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
		<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="#" class="translate hei_30pi dblock lgn_hight_30 black_txt  white_txt_h fsz20" >Ring 010-1510125</a> </li>
						
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg uppercase lgn_hight_30 white_txt  white_txt_h  brdl" data-en="Close" data-sw="Close">Close</a> </li>
					</ul>
				</div>
			
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
				<div class="clear"></div>
			
		</div>
	</div>
	
	
		<div class="clear"></div>
		<!-- LOGIN FORM -->
		<div class="column_m xs-padb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart0 mart30 marb0" id="loginBank">
			<div class="padrl10 xs-padrl15">
				<div class="wrap maxwi_100   xs-nobrdb  xs-padb0 mart0 xs-mart0">
					<div class="dflex xs-fxwrap_w alit_c">
						<div class="hidden-xs visible-sm hidden">
							<h4 class="bold fsz30 padb10 tall hidden-xs visible-sm">Verifiera ID med BankID</h4>
							<h3 class="fsz18 padb20 tall hidden-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
						</div>
						
						<div class="wi_40 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc">
							
							
							<div class="padb0 xxs-pad0 xxs-padb0">
								
								<div class="padb20 brdb_red_new">
									<img src="../../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
								</div>
								
								
								<div class="marb0 padrl0 first">
									
								
									<div class="padb10 xs-padrl0 mart10" id="submit_button_in_popup"> <a href="#" class="show_popup_modal wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" data-target="#gratis_popup_login" onclick="openPop();">Skicka förfrågan  </a> </div>
									
									
								</div>
								
								
								
								
								
							</div>
							
							
						</div>
						<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc padl80 xs-padr0 xs-padl0">
							<h4 class="bold fsz35 xs-fsz25 padb10 tall lgn_hight_40">Begär ID kontroll med BankID</h4>
							<h3 class="fsz20 padt0 padb30 tall ">Skicka en förfrågan till privatperson att verifiera sitt ID med sitt mobila BankID. </h3>
							<h3 class="fsz18 padb0 tall bold">Hur det fungerar</h3>
							
							<ul class="mart10 padl20 tall">
							<li class="black_txt fsz16">Be personen vara redo med sin mobilt BankID-app.</li>
								<li class="black_txt fsz16">Fyll i person nr mottagarens person nr. </li>
								<li class="black_txt fsz16">Klicka på Skicka förfrågan</li>
								<li class="black_txt fsz16">Klart!</li>
								
								</ul>
								
							<ul class="mart10 pad0 tall">
								
								
								<li class="dblock mar0 marb10 pad0">
									<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
										<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
										<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
										Vad händer sedan?
									</a>
									<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
										<p>När mottagaren signerat din förfrågan om identifiering så ser du resultatet på din skärm. Om personen dessutom har ett registrerat Qloud ID-konto får du dessutom tillgång till mottagarens profil under begränsad tid (24 timmar). 
											</p>
										<p>Du får fullständiga uppgifter om en identifierad person!</p>
									</div>
								</li>
								
								
							</ul>
						</div>
						
					</div>
				</div>
			</div>
			
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect  brdrad5"  id="gratis_popup_connect">
			<div class="modal-content pad25  brdrad5 ">
				<div id="connect_id">
					
					
				</div>
			</div>
			
		</div>
		
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_user">
			<div class="modal-content pad25 brd brdrad10">
				<div id="search_user">
					<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
						No result found
						<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
					</h3>
					
					
					
					
					
					
				</div>
				
			</div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_login">
			<div class="modal-content pad25 brd nobrdb talc brdrad5">
				
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Please Login</h3>
					<div class="marb20">
						<img src="../../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
					
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="pad15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="text" id="username" name="username" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Email">
					</div>
					</div>
					
						<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="password" id="password" name="password" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="password">
					</div>
					</div>
					<div id="warning" class="red_txt"></div>
					<div class="mart20">
						<input type="button" value="Search" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="validateLogin();">
						
						
					</div>
					
					
					
				
			</div>
		</div>
	
	
		
		
		<div class="clear"></div>
		<script type="text/javascript" src="../../html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../../html/usercontent/modules.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/custom.js"></script>
		
		
		
		
	</body>
</html>																			