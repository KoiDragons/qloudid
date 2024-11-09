<!doctype html>
<?php
	
	$path1 = $path."html/usercontent/images/";
	
?>

<html>
	
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
	
								<script>
								function hide_utab(id)
								{
									if(id==1)
									{
									$('#utab_Popular').addClass('hide');	
									$('#utab_Analytics').removeClass('hide');	
									}
									else if(id==2)
									{
									$('#utab_Analytics').addClass('hide');	
									$('#utab_Popular').removeClass('hide');	
										
									}
								}
								function closePop()
		{
			document.getElementById("popup_fade").style.display='none';
			$("#popup_fade").removeClass('active');
			document.getElementById("person_informed").style.display='none';
			$(".person_informed").removeClass('active');
		}
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
									function updateId(id)
									{
									$("#popup_fade").addClass('active');
									$("#popup_fade").attr('style','display:block;');
									$("#gratis_popup_alert").addClass('active');
									$("#gratis_popup_alert").attr('style','display:block;');
									$("#lost_id").val(id);
									}


			function checkOtp()
			{
				$("#error_msg_opt").html('');
				if($("#otp").val()=="")
				{
					$("#error_msg_opt").html('Fyll i lösenordet');
					return false;
					
				}
				 
				if($("#otp").val().length==7)
				{
				var send_data={};
				
				send_data.otp=$("#otp").val();
				send_data.infor_id=$("#infor_id").val();
				
				$.ajax({
					type:"POST",
					url:"verifyOtp",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						 
						if(data1==0)
						{
							$("#error_msg_opt").html('Fyll i rätt lösenord');
						}
						else 
						{
							 
							document.getElementById("save_indexing_otp").submit();
						}
					}
				});
				}
			}
			 function ChangeInput(id)
			 {
				if(id<10)
				{
					newVal=$("#otp").val()+id;
					$("#otp").val(newVal);
				}
				else
				{
					newVal=$("#otp").val().slice(0, -1); 
					$("#otp").val(newVal);
				}
				
				checkOtp();
			 }
			function confirmUser(id)
			{
				
				$("#error_msg_form").html('');
				
					$.ajax({
						type:"POST",
						url:"informUser",
						
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
								$('#headData').hide();
								$("#loginBank").hide();
								$("#headerData").hide();
								$("#loginPhone").attr('style','display:block');
								$("#aHeader").attr('style','display:block');
								$("#dHeader").attr('style','display:none');
								$("#infor_id").val(data1);
								$("#depend_id").val(id);
						
							
						}
					});
				
			}
			
			
									var currentLang = 'sv';
								</script>
							</head>
	
	<body class="white_bg ffamily_avenir">
		<div id="headData">
	<div class="column_m header xs-header bs_bb lgtgrey2_bg hidden-xs">
		<div class="wi_100 hei_65p   padtb5 padrl10 lgtgrey2_bg">
			
			<div class="logo wi_140p xs-wi_80p xxxs-wi_140p">
				<a href="#"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10 ffamily_avenir" >Qloud ID</h3> </a>
			</div>
			<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 padt5 xxxs-padt10 xm-padt10" style="width: 50px;">
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
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="sv" onclick="changeLanguage(1);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="sv" onclick="changeLanguage(1);">  Svenska</a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="en" onclick="changeLanguage(0);"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="en" onclick="changeLanguage(0);">  Engelska </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
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
			 
			<!--sf-js-enabled sf-arrows hidden-xs-->
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16 ">
					<li class="hidden-xs padr10">
						<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow"><span class="black_txt pred_txt_h ffamily_avenir">Consents</span></a>
					</li>
				 	<li class="hidden-xs padr10"><a href="https://www.safeqloud.com/user/index.php/NewPersonal/userAccount" class="black_txt lgn_hight_s1 fsz18 sf-with-ul"><span class="black_txt fas fa-user"></span></a>
          <ul style="display: none;">
            <li class="hidden-xs">
              <div class="top_arrow"></div>
            </li>
         
          </ul>
        </li>
       			
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						<ul style="display: none;">
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									<li><a href="javascript:void(0);"><?php echo substr($row_summary['name'],0,10); ?></a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				 
										
                  <li><a href="javascript:void(0);">Inställningar</a></li>
				  <li><a href="javascript:void(0);" class="show_popup_modal" data-target="#chagePassword">Ändra lösenord</a></li>
                  <li><a href="javascript:void(0);">Support</a></li>
                  <li><a href="javascript:void(0);">Policy</a></li>
                  
                  <li>
                    <div class="line marb10"></div>
                  </li>
										
										
										<li><a href="https://www.safeqloud.com/user/index.php/UserLogout?action=logout" class="trn">Logga ut</a>
										</li>
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="visible-xs visible-xxs  fright marr10 padr10 brdr brdwi_3 xs-padt5"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
			<div class="clear"></div>
		</div>
	</div>

		
		
		
	 
	<div class="column_m header hei_55p bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl0 white_bg"  >
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/NewPersonal/userAccount" class="lgn_hight_s1  padl10 fsz25 sf-with-ul"><i class="fas fa-user" aria-hidden="true"></i></a>
								</li>
								
								 
								
								
								
							</ul>
						</div>
				
					</div>					 
				 
			<div class="top_menu frighti padt10 padb10" style="width:150px !important;">
				<ul class="menulist sf-menu  fsz16 ">
					<li class="hidden-xs padr10">
						<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow"><span class="black_txt pred_txt_h ffamily_avenir">Consents</span></a>
					</li>
				 	<li class="hidden-xs padr10"><a href="https://www.safeqloud.com/user/index.php/NewPersonal/userInfo" class="black_txt lgn_hight_s1 fsz18 sf-with-ul"><span class="black_txt fas fa-user"></span></a>
          <ul style="display: none;">
            <li class="hidden-xs">
              <div class="top_arrow"></div>
            </li>
         
          </ul>
        </li>
       			
					<li style="margin-right:20px !important;">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25 sf-with-ul"><span class="fa fa-qrcode  "></span></a>
						<ul style="display: none;">
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									<li><a href="javascript:void(0);"><?php echo substr($row_summary['name'],0,10); ?></a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				 
										
                  <li><a href="javascript:void(0);">Inställningar</a></li>
				  <li><a href="javascript:void(0);" class="show_popup_modal" data-target="#chagePassword">Ändra lösenord</a></li>
                  <li><a href="javascript:void(0);">Support</a></li>
                  <li><a href="javascript:void(0);">Policy</a></li>
                  
                  <li>
                    <div class="line marb10"></div>
                  </li>
										
										
										<li><a href="https://www.safeqloud.com/user/index.php/UserLogout?action=logout" class="trn">Logga ut</a>
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
		</div>
		
		
			<div class="column_m pos_rel">
								
								<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginPhone" onclick="checkFlag();"  style="display:none;">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					 
<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart20 xs-pad0 xs-mart0">
								
			<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz80 xxs-fsz45 nobold padb10 blue_67cff7 trn ffamily_avenir">Signature</h1>
									</div>
									<div class="mart10 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Signera med ditt sms-lösenordet.</a></div>
				 
			 
		
		<form method="POST" action="approveDependent" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
			
			
			<div class="on_clmn mart25 xxs-mart30 marb10">
											 
				<div class="pos_rel">
					
					<input type="text" name="otp" id="otp" placeholder="" max="9999999" class="wi_30 xs-wi_60 rbrdr pad10  brdb talc  minhei_65p  blue_67cff7 fsz30" style="border-bottom: 3px dashed #dedede; letter-spacing:10px;" onkeyup="checkOtp();">
					
				</div>
			</div>
			<input type="hidden" id="depend_id" name="depend_id" />
			<input type="hidden" id="infor_id" name="infor_id" value="" />
			<div class="red_txt ffamily_avenir fsz20" id="error_msg_opt"></div>
			<div class="container column_m martb15 padtb20">
			<div class=" wi_33  fleft bs_bb  talc padb20">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(1);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">1</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(2);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">2</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(3);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">3</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
														<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(4);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">4</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(5);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">5</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(6);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">6</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
														<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr" onclick="ChangeInput(7);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">7</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr" onclick="ChangeInput(8);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">8</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(9);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">9</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												
												
														<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="#" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   white_bg  trans_all2 borderr  ">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0"></h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(0);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">0</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   white_bg  trans_all2 borderr xxs-padl14 padl17 " onclick="ChangeInput(10);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0"> </h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
			
			</div>
		
				
		 </form>
		 
	</div>
				
				
			</div>
			<div class="clear">
			
 </div>
	</div>
 
 	 
 
 <!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Hello</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >It´s nice to see you again, <?php echo $row_summary['first_name']; ?></a></div>
					 
			
			 
					 
					<div class="tab-header martb10 padb10 xs-talc brdb_black nobrdt nobrdl nobrdr talc">
                                            <a href="../ReceivedRequest" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" >To-do</a>
                                            <a href="approvedDependents" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" >Private</a>
                                              <a href="#" class="dinlblck mar5 padrl30     black_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" >Your children</a>
                                             

                                        </div>
							
								 
									
							 
											 
										
										 
						
										
										
							
							  

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content active" id="utab_Popular" style="display: block;">
											<?php  
												$i=0;
												foreach($dependentDetailApproved as $category => $value) 
												{
													
													
												?> 
													<a href="<?php if($value['dependent_type']==1) echo 'dependentInfo'; else if($value['dependent_type']==2) echo 'dependentElderInfo'; else if($value['dependent_type']==3) echo 'dependentDisableInfo';?>/<?php echo $value['enc']; ?>"   >
										<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?>   bg_fffbcc_a ">
										<div class="container padrl10 padb15 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="<?php echo $value['image']; ?>" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													 
													
													<div class="fleft wi_70 xxs-wi_75   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz18 bold padb0  ffamily_avenir"><?php if($value['dependent_type']==1) echo 'Child'; else if($value['dependent_type']==2) echo 'Elder'; else if($value['dependent_type']==3) echo 'Disable'; ?></span>
													<span class="trn fsz14  black_txt ffamily_avenir  "><?php echo $value['name']; ?></span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div>
									</div>
									</a>
									
									
															 	<?php  $i++; } ?>
															
												<?php 
												
												foreach($dependentDetailAdded as $category => $value) 
												{
													
													
												?> 
												 
										<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?>   bg_fffbcc_a ">
										<div class="container padrl10 padb15 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['name'],0,1); ?> </div>
																	</div>
													 
													
													<div class="fleft wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz18 bold padb0  ffamily_avenir"><?php if($value['dependent_type']==1) echo 'Child'; else if($value['dependent_type']==2) echo 'Elder'; else if($value['dependent_type']==3) echo 'Disable'; ?></span>
													<span class="trn fsz14  black_txt ffamily_avenir  "><?php echo $value['name']; ?></span>  </div>
													
													
													<div class="xxs-fleft fright wi_20 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Activate" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi" onclick="confirmUser(<?php echo $value['id']; ?>);">Activate</button>
																			</div>
																			 
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div>
									</div>
									   	<?php $i++; } ?>				
                                                <div class="clear"></div>
                                            </div>

                                            <!-- Advertising -->
                                            <div class="tab_content hide" id="utab_Analytics" style="display: none;">
                                               
												 
                                            </div>

                                             </div>
                                   

										 <div class="clear"></div>			 
									
								<div class="on_clmn padtb20 marb10  ">
											 
											 
												<a href="dependentDetails"><input type="button" value="Add child" class="forword minhei_55p  fsz18 ffamily_avenir bg_ffde00  black_txt curp"></a>
												
											 
											<div class="clear"></div>
										</div>	
                        

													 
													<div class="clear"></div>
												</div>

												<div class="clear"></div>
											</div>


										</div>
										<div class="clear"></div>
									</div>
 


<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>


<!-- Edit news popup -->
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">TJÄNSTEN är en del av vårt premiuminnehåll</h3>
			<div class="marb20">
				<img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" />
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_75 dflex fxwrap_w marrla marb20 tall">
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Hålla dig  uppdaterad inom arbetsrätt</span>
				</div>
				<!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Använda smarta webblösningar</span>
				</div>
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
				</div>
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Utföra bakgrundskontroller på din personal eller nästa rekryt </span>
				</div>
				<!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Men nästa gång behovet dyker upp då finns allting färdigt.</span>
				</div>-->
			</div>
			
			<div class="marb10">
				<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Please provide your unique code here" />
			</div>
			<div>
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();"/>
				<input type="hidden" id="indexing_save_unique" name="indexing_save_unique" >
			</div>
			<div class="marb10 padtb10 pos_rel">
				<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div>
				<span class="diblock pos_rel zi2 padrl10 white_bg">
					eller om du redan har en prenumeration
				</span>
			</div>
			<div class="padb0">
				<a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a>
			</div>
		</form>
	</div>
</div>



<!-- Sales popup -->
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form>
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
			<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
			</div>
			<div class="marb25">
			<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
			<div>
				<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
			</div>
		</form>
	</div>
</div>


<!-- Marketing popup -->
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form>
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
			<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
			</div>
			<div class="marb25">
			<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
			<div>
				<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
			</div>
		</form>
	</div>
</div>


<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

</div>

<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_alert">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Error!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">You are not connected</span>
				</div>
				
				
			</div>
			
			 
		</div>
	</div>
	


	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_confirm">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to Confirm?</span>
				</div>
				
				
			</div>
			
			<form action="../refuseRent/<?php echo $data['cid']; ?>" method="POST">
			
			<input type="hidden" id="location_id" name="location_id" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_offer">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to Confirm?</span>
				</div>
				
				
			</div>
			
			<form action="../refuseOffer/<?php echo $data['cid']; ?>" method="POST">
			
			<input type="hidden" id="location_id_offer" name="location_id_offer" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_employee">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to Confirm?</span>
				</div>
				
				
			</div>
			
			<form action="../refuseEmployee/<?php echo $data['cid']; ?>" method="POST">
			
			<input type="hidden" id="location_id_employee" name="location_id_employee" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_yes">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to Confirm?</span>
				</div>
				
				
			</div>
			
			<form action="../acceptRent/<?php echo $data['cid']; ?>" method="POST">
			
			<input type="hidden" id="location_id_yes" name="location_id_yes" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
<!-- Slide fade -->
<div id="slide_fade"></div>

<!-- Menu list fade -->
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>

								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
 </body>

</html>