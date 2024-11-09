
<!DOCTYPE html>
<html lang="en">
<?php $path1 = $path."html/usercontent/images/"; ?>
<head>
    <meta charset="utf-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
				<title>Qmatchup</title>
				<!-- Styles -->
				<script src="https://kit.fontawesome.com/119550d688.js"></script>
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
					<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
						<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
							<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">

								<!-- Scripts -->
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	
	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
<script>
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
			
	function searchUser()
			{
				$('#error_msg_form').html('');
				if($("#reque").val()==1)
				{
					if($("#cntryph").val()==0)
					{
						$('#error_msg_form').html("Please select country!!!");
						return false;
					}
					else if($("#phoneno").val()=="" || $("#phoneno").val()==null)
					{
						$('#error_msg_form').html("Please enter phone number!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.countryname=$("#cntryph").val();
						send_data.phoneno=$("#phoneno").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==3)
				{
					if($("#code_id").val()=="" || $("#code_id").val()==null)
					{
						$('#error_msg_form').html("Please enter your verification code!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.id=$("#code_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==2)
				{
					var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
					if (!reg.test($("#email_id").val())){
						
						$("#email_id").css("background-color","#FF9494");
						$('#error_msg_form').html("Incorrect Email address format");
						return false;
						
					}
					if($("#email_id").val()=="" || $("#email_id").val()==null)
					{
						$('#error_msg_form').html("Please enter your verification email!!!");
						return false;
					}
					
					else
					{
						var send_data={};
						send_data.email_id=$("#email_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
								
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests";
								}
								
							}
						});
					}
					
				}
				else
				{
					$('#error_msg_form').html("Please select code!!!");
					return false;
				}
				
				
			}
			
			function selectCode(id)
			{
				
				
				if(id==3)
				{
					document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='block';
					document.getElementById("emailSelect").style.display='none';
				}
				else if(id==2)
				{
					document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='block';
				}
				else if(id==1)
				{
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='none';
					document.getElementById("phoneSelect").style.display='block';
				}
				else
				{
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='none';
					document.getElementById("phoneSelect").style.display='none';
				}
			}
			
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
</script>	
	
</head>

<body class="white_bg ffamily_avenir">
	<div class="column_m header xs-header xsip-header xsi-header bs_bb lgtgrey_bg hidden-xs">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey_bg">
				<div class="logo padt10 wi_50p xs-wi_50p"><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="visible-xs visible-sm fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="45" height="45" alt="email" title="email" class="lang_selector" data-value="sv" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="45" height="45" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/germanf.png" width="45" height="45" alt="email" title="email"class="lang_selector" data-value="de" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
			<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
														<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/germanf.png" width="28" height="28" alt="email" title="email"data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German </a> </div>
													</li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
                  </li>
                </ol>
									
								</div>
							</li>
						</ul>
					</li>
					
        
       
					
					
				</ul>
			</div>
			</div>
			<div class="fright xs-dnone visible_si padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="sentRequests" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
					</ul>
				</div>
			<!--sf-js-enabled sf-arrows hidden-xs-->
			<div class="top_menu frighti padt15 padb20 hidden">
				<ul class="menulist sf-menu  fsz14 ">
					
					
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz24 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						</li>
						
				</ul>
			</div>
			<div class="visible-xs visible-xxs fright marr0 xs-padt5 "> <a href="sentRequests" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
	
<div class="column_m header hei_55p  bs_bb white_bg visible-xs" id="dHeader" >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="sentRequests" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			 
				 
				<div class="clear"></div>
			</div>
		</div>	
<div class="clear"></div>
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 black_txt  xxs-fsz45 padb10 trn ffamily_avenir" >Verify ID</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Fyll i uppgifter på den som du vill ska verifiera sin identitet</a></div>
							 
								
								 					
									
									<div class="container padrl15 xs-padrl0">
								<div class="marrla xs-wi_100">
									<div class="marb0 padtrl0">
										
										
										<div class="on_clmn mart10 " >
										<div class="pos_rel">
											<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" name="reque" id= "reque" onchange="selectCode(this.value);" style="text-align-last:center;">
											<option value="0">--Välj metod--</option>
											<option value="1">Mobile</option>
											<option value="2">Email</option>
											<option value="3">Code</option>                     
											</select>
										</div>
									</div>
										<div class="on_clmn mart20" id="codeSelect" style="display:none">
											
											<div class="pos_rel">
									
										<input type="text" id="code_id" name="code_id" placeholder="Enter code" class=" wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir" >
									</div>
									</div>
									<div class="on_clmn mart20" id="emailSelect" style="display:none">
											
											<div class="pos_rel">
									
										<input type="text" id="email_id" name="email_id" placeholder="Enter email" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir" >
									</div>
									</div>
									<div  id="phoneSelect" style="display:none">
									<div class="on_clmn mart20 ">
											
											<div class="thr_clmn  wi_30"  >
												
												<div class="pos_rel">
											<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" name="cntryph" id="cntryph" style="text-align-last:center;">
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>                            
											</select>
										</div>
									</div>
										
										<div class="thr_clmn  wi_70 padl20 "  >
												
												<div class="pos_rel">
												<input type="number" name="phoneno" id="phoneno" max="9999999999" placeholder="Mobil" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir" >
											</div>
										</div>
										
									</div>
									</div>
									<div class="clear"></div>
									<div class="fsz20 red_txt ffamily_avenir" id="error_msg_form"></div>
									<div class="clear"></div>
									<?php if($selectCredits>0) { ?>
							<div class="talc  on_clmn mart35 padtb20"><a href="#" onclick="searchUser();"><input type="button" value="Submit" class="forword button_bg_color minhei_65p ffamily_avenir"  /></a>
									
									</div>
							<?php } else { ?>
							<div class="talc  on_clmn mart35 padtb20"><a href="#" data-target="#gratis_alert"   class="show_popup_modal"><input type="button" value="Submit" class="forward hei_55p fsz18  t_67cff7_bg ffamily_avenir"  /></a>
							</div>
							<?php } ?>
									
									
								</div>
								
							</div>
							
							
						</form>
					</div>
					
					
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	 
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
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
		
	 
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
</body>
</html>