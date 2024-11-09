
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Qmatchup</title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/style.css" />
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
<script>
function changeBg(id)
{
					if($("#"+id).hasClass('lgtgrey2_bg'))
						{
							$(".yellow_bg").addClass('lgtgrey2_bg');
							$(".yellow_bg").removeClass('yellow_bg');
							$("#"+id).removeClass('lgtgrey2_bg');
							$("#"+id).addClass('yellow_bg');
							$("#com").val(id);
						}
						else
						{
							$("#"+id).addClass('lgtgrey2_bg');
							$("#"+id).removeClass('yellow_bg');
							$("#com").val();
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
				var msg="User does not exist.<a href='https://www.safeqloud.com/user/index.php/CreateAccount'>Sign up</a>";
				$("#warning").html(msg);
				}
					else if(data1==5)
					{
				$("#warning").html('');
				var msg="Wrong password. <a href='https://www.safeqloud.com/user/index.php/ForgotPswd'>Forgot password?</a>";
				$("#warning").html(msg);
				}	
					else if(data1==2 || data1==3 || data1==4)
					{
				window.location.href='https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests?rid=<?php echo $data['r_id']; ?>';
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

		<div class="column_m header header_small bs_bb bg_colorn_new" >
			<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15">
					<a href="https://www.safeqloud.com/"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10">
					<div class="languages">
						<a href="#" id="language_selector" class="padrl10">
							<img src="../../../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US">
						</a>
						<ul class="wi_100 mar0 pad5 blue_bg">
							<li class="dblock">
								<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
								</a>
							</li>
							<li class="dblock">
								<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="fright xs-dnone sm-dnone">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://www.safeqloud.com" id="usermenu_singin" class="translate hei_30pi dblock padrl25  uppercase lgn_hight_30 white_txt white_txt_h bg_f80" data-en="Close" data-sw="Close">Close</a> </li>
					</ul>
				</div>
				<div class="top_menu top_menu_custom mart2">
					<ul class="menulist">
						<li class="xs-mar0i sm-mar0i">
							<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <span class="fa fa-qrcode white_txt fsz26"></span> </a>
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Personal</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
													</div>Cloud ID</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
													</div>Verify</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-3.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Cloud ID</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-vrf" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Verify</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Activate</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-eng" class="proposals">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-4.png" width="45" height="45" title="" alt="" />
													</div>Business</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-5.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-6.png" width="45" height="45" title="" alt="" />
													</div>Basic - Free</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-7.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>By organization</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act-ind" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>By industry</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-8.png" width="45" height="45" title="" alt="" />
													</div>HR Portal</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-9.png" width="45" height="45" title="" alt="" />
													</div>Sales</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-10.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-11.png" width="45" height="45" title="" alt="" />
													</div>Telemarketing</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
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
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Employees</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Customers</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
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
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.safeqloud.com" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div> 
<form method="post">
<div class="column_m pos_rel">
		<!-- CONTENT -->
			<div class="column_m container zi5  mart40" >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<div class="maxwi_320p  marrla">
				<h1 class="talc fsz40 bold"><?php echo $GetStartedUser['name']; ?> want to access your detail</h1>
				<h3 class="marb10 talc fsz18 black_txt brdb_b">Do you agree</h3>
				
				<div class="container padrl10 white_bg fsz14 dark_grey_txt brd">

				
				
				
					<div class="mart30 talc marb20">
					<input type="button" value="no" class="show_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp" data-target="#gratis_popup_login">
					<input type="button" value="yes" class="show_popup_modal marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5" data-target="#gratis_popup_login">
					
					</div>
  
				</div>
				</div>
 </div>
 </div>
 <div id="popup_fade" class="opa0 opa55_a black_bg"></div>
 </div>
 
</form>

<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad10 brd" id="gratis_popup_login">
		<div class="modal-content pad25 brd brdrad10">
			<div id="search_new">
				<h3 class="pos_rel marb10 pad0 padr40 bold fsz25 dark_grey_txt">
					Please Login
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Email</label>
					<input type="text" id="username" name="username" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Email">
				</div>
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="password">
				</div>
				<div id="warning"> </div>
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Login" class="marl5 pad8 nobrd green_bg uppercase bold fsz14  curp white_txt brdrad5" onclick="validateLogin();" />
					
				</div>
				
			</div>
			
		</div>
	</div>