<!doctype html>
<html>
		<?php 
		
		function base64_to_jpegencode($base64_string, $output_file) {
			// open the output file for writing
			$ifp = fopen( $output_file, 'wb' ); 
			
			// split the string on commas
			// $data[ 0 ] == "data:image/png;base64"
			// $data[ 1 ] == <actual base64 string>
			$data = explode( ',', $base64_string );
			//print_r($data); die;
			// we could add validation here with ensuring count( $data ) > 1
			fwrite( $ifp, base64_decode( $data[1] ) );
			
			// clean up the file resource
			fclose( $ifp ); 
			
			return $output_file; 
		}
		if($_POST['image-data1']!='none')
		{
		$_POST['image-data1']=str_replace('"','',$_POST['image-data1']); $value_p = base64_to_jpegencode( $_POST['image-data1'], '../estorecss/tmp'.$data['user_id'].'.jpg' );
		}
		else
		{
		$value_p="../html/usercontent/images/default-profile-pic.jpg";	
		}
		$path1 = $path."html/usercontent/images/"; ?>
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
			<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
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
		<script>
			var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=40;
			var send_data1={};
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
			
			function submit_value_user()
			{
				 
				$("#error_msg_form").html('');
				if($("#total_value").val()=="")
				{
					alert("No data found!!!")
					return false;
				}
				else
				{
					
					if($("#updateSecurity").val()==2)
					{
					 
						$("#loginBank").hide();
						$("#loginBankMsg").attr('style','display:block');
						$("#headerData").attr('style','display:none');
						
						var send_data={};
						send_data.prnumber="<?php echo $_POST['ssn']; ?>";
						$.ajax({
							type:"POST",
							url:"../BankidCheck/initiate",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1)
								{
									send_data1.orderRef=data1;
									a = setInterval(ajaxSend, timeInterval);
								}
								else 
								{
									$("#errorMsg").html('error request');
									return false;
								}
							}
						});
						
					}
					else 
					{
					var send_data={};
					send_data.countryname=$("#cntryph").val();
					send_data.phoneno=$("#phoneno").val();
					$.ajax({
						type:"POST",
						url:"verifyUserDetail",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							//alert(data1); return false;
							if(data1==0)
							{
								$("#errPhone").html('Please enter another/valid phone number');
							}
							else
							{
								
								$("#loginBank").hide();
								$("#headData").hide();
								$("#loginPhone").attr('style','display:block');
								$("#infor_id").val(data1);
							}
							
						}
					});
					}
					
					
				}
				
			}
			
			function verifyUser()
			{
				
				
				if($("#cntryph").val()==0)
				{
					alert("Please select country!!!");
					return false;
				}
				else if($("#phoneno").val()=="" || $("#phoneno").val()==null)
				{
					alert("Please enter phone number!!!");
					return false;
				}
				else
				{
					var send_data={};
					send_data.countryname=$("#cntryph").val();
					send_data.phoneno=$("#phoneno").val();
					$.ajax({
						type:"POST",
						url:"verifyUserDetail",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							//alert(data1); return false;
							if(data1==0)
							{
								$("#errPhone").html('Please enter another/valid phone number');
							}
							else
							{
								
								$("#gratis_popup_phone").removeClass('active');
								$("#gratis_popup_phone").attr('style','display:none;');
								$("#gratis_popup_login").addClass('active');
								$("#gratis_popup_login").attr('style','display:block;');
								$("#infor_id").val(data1);
							}
							
						}
					});
				}
				
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
							document.getElementById("save_indexing_user").submit();
						}
					}
				});
				}
			}
			
			
			
			function ajaxSend()
			{ 
				$.ajax({
					type:"POST",
					url:"../BankidCheck/checkOrderReference",
					data:send_data1,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data2){
						if(data2!='complete')
						{
							timeout++;
							if(data2==1)
							{
								clearInterval(a);
								$("#errorMsg").html("Det BankID du försöker använda är för gammalt eller spärrat. Använd ett annat BankID eller hämta ett nytt hos din internetbank.");
								return false;
							}
							else if(data2==2)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten. Försök igen.");
								return false;
							}
							else if(data2==3)
							{
								clearInterval(a);
								$("#errorMsg").html("BankID-appen verkar inte finnas i din dator eller telefon. Installera den och hämta ett BankID hos din internetbank. Installera appen från din appbutik eller https://install.bankid.com.");
								return false;
							}
							else if(data2==4)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten.");
								return false;
							}
							else if(timeout>tout)
							{
								clearInterval(a);
								$("#loginBankMsg").attr('style','display:none');
								$("#loginFailMsg").attr('style','display:block');
								return false;
							} 
							else 
							{
								$("#errorMsg").html(data2);
								return false;
							}
						}
						else 
						{
							$("#updateSecurity").val(2);
							document.getElementById("save_indexing_user").submit();
							
							
						}
						
					}
				});
				
			}
			var newVal='';
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
			
			
			function submit_value_user_app()
			{
				 
				$("#error_msg_form").html('');
				if($("#total_value").val()=="")
				{
					alert("No data found!!!")
					return false;
				}
				document.getElementById("save_indexing_user").submit();
			}
			
			
			</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<div class="column_m header xs-header xsip-header xsi-header bs_bb lineargrey_bg hidden"  id="headData">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lineargrey_bg"  >
								<div class="logo marr15 wi_60p">
				<a href="https://www.qloudid.com"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">QiD</h3> </a>
			</div>
			<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 padt5 xxxs-padt20 xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1; ?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
			<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
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
			
				<div class="fright xs-dnone sm-dnone padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl "> <a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
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
				<div class="visible-xs visible-sm fright marr0 padr0 xsi-padt10"> <a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear" id=""></div>
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginPhone" onclick="checkFlag();"  style="display:none;">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					 
<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart20 xs-pad0 xs-mart0">
								
			
					<div class="padb10 xs-pad0">
					<h1 class="padl0 padb5 talc fsz50 xs-fsz25 black_txt hidden-xs"><span ><img src="../../<?php echo $value_p; ?>" class="cropped_image   borderr grey_brd5" width="40" height="40" /> </span><span class="lgn_hight_40"><?php echo $_POST['name'].' '.$_POST['l_name']; ?></span></h1>
					<div class="on_clmn visible-xs">
						<div class="thr_clmn wi_20 padl40">	
							<img src="../../<?php echo $value_p; ?>" class="cropped_image   borderr grey_brd5" width="40" height="40" />  
							</div>
							<div class="thr_clmn wi_80 xs-padt10">	
								<h1 class="padl0 padb5 tall fsz50 xs-fsz25 black_txt xs-pad0 xs-padl20"> <?php echo $_POST['name'].' '.$_POST['l_name']; ?></h1>
							</div>
							</div>
							
					
					
				
						<p class="lgtgrey2_bg padt10 talc fsz18 xs-padb10 padb20 wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xxxs-marb35 dark_grey_txt">Signera med lösenordet du har fått per sms.</p>
					</div>
 
			 
		
		<form method="POST" action="approveOtp" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
			
			
			<div class="on_clmn mart10 xxs-mart10 marb25">
											 
				<div class="pos_rel">
					
					<input type="text" name="otp" id="otp" placeholder="" max="9999999" class="wi_30 xs-wi_40 rbrdr pad10  brdb talc  minhei_65p  black_txt fsz32" style="border-bottom: 9px dashed;" onkeyup="checkOtp();">
					
				</div>
			</div>
			<input type="hidden" id="infor_id" name="infor_id" value="" />
			<div class="red_txt" id="error_msg_opt"></div>
			<div class="container column_m martb20 padtb20">
			<div class=" wi_33  fleft bs_bb  talc padb10">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(1);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">1</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(2);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">2</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(3);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">3</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
														<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(4);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">4</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(5);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">5</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(6);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">6</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
														<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(7);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">7</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(8);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">8</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(9);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">9</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												
												
														<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="#" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  ">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">,</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInput(0);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">0</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb10 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr xxs-padl14 padl17 " onclick="ChangeInput(10);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0"><img src="../../../html/usercontent/images/random/backspace.png" height="25" weight="25"></h3>
																		 
																		
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

	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart65 mart95 marb0" id="loginBankMsg" style="display:none;">
			<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
				<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
					
				<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/random/bankid_high_rgb.png" height="128" width="128"/></span></div>
				<div class="padb10 padt20">
					<h1 class="padb5 talc fsz40 xs-fsz20 xxs-marrl30  bold lgn_hight_45 xxs-lgn_hight_35" id="errorMsg"></h1>
					<h1 class="padb5 talc fsz40 xs-fsz20 bold xxs-marrl30  lgn_hight_45 xxs-lgn_hight_35" id="cinMsg"></h1>
					
				</div>
				
				
			</div><div class="clear"></div>
			
			
			
		</div>
	</div>
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart65 mart95 marb0" id="loginFailMsg" style="display:none;">
		<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
				
			<div class="talc fsz75 red_txt"> <img src="<?php echo $path; ?>html/usercontent/images/random/bankid_high_rgb.png" height="128" width="128" /></span></div>
			<div class="padb10 padt20">
				<h1 class="padb5 talc fsz40 xs-fsz20 bold lgn_hight_45  xxs-marrl30  xxs-lgn_hight_35" >Internt tekniskt fel. Försök igen.</h1>
				
				
			</div>
			
			<div class="mart20 talc">
				<a href="https://www.qloudid.com/user/index.php/GetStartedNew">	<input type="button" value="Pröva igen" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" ></a>
				
			</div>
		</div><div class="clear"></div>
		
		
		
	</div>
</div>	
<div class="column_m xs-padtb10  lgn_hight_22 fsz16 mart40 xs-mart20" onclick="checkFlag();" id="loginBank">
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  ">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart20 xs-pad0 xs-mart0">
					<div class="padb10 xs-pad0">
					<h1 class="padl0 padb5 talc fsz50 xs-fsz25 black_txt hidden-xs"><span ><img src="../../<?php echo $value_p; ?>" class="cropped_image   borderr grey_brd5" width="40" height="40" /> </span><span class="lgn_hight_40"><?php echo $_POST['name'].' '.$_POST['l_name']; ?></span></h1>
					<div class="on_clmn visible-xs">
						<div class="thr_clmn wi_20 padl40">	
							<img src="<?php  echo '../../'.$value_p; ?>" class="cropped_image   borderr grey_brd5" width="40" height="40" />  
							</div>
							<div class="thr_clmn wi_80 xs-padt10">	
								<h1 class="padl0 padb5 tall fsz50 xs-fsz25 black_txt xs-pad0 xs-padl20"> <?php echo $_POST['name'].' '.$_POST['l_name']; ?></h1>
							</div>
							</div>
							
					
					
				
						<p class="lgtgrey2_bg padt10 talc fsz18 xs-padb10 padb20 wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xxxs-marb35 dark_grey_txt">Var god och bekräfta dina ändrade uppgifter nedan.</p>
					</div>
 				
					
					</div>
					<!-- Center content -->
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 martb20 white_bg brdrad3">
						<div class="padtb0 brdrad3 white_bg">
							
								
								<div class="result-item padtb20 <?php if(($_POST['byssn']+$_POST['fn']+$_POST['ln']+$_POST['dobc']+$_POST['sexc'])==0) echo 'hidden'; ?>">
									<div class="dflex alit_c">
										<div class="flex_1">
											
											<div class="fsz16 dgrey_txt bold">
												<span class="marr5 valm">General</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span><?php echo $_POST['general']; ?></span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone" style="display: none;">
										<ul class="mar0 pad0 padt10 fsz14">
										 
											 
											<li class="dflex mart10  padb5 <?php if($_POST['fn']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#" class="black_txt">Name</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['name']; ?> </span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['ln']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Last name</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['l_name']; ?> </span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['dobc']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Date of Birth</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['dob']; ?></span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['sexc']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Gender</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['sex']; ?></span>
											</li>
										 <li class="dflex mart10  padb5 <?php if($_POST['byssn']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Personnummer</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['ssn']; ?></span>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="result-item padb20 <?php if(($_POST['byaddress']+$_POST['zp']+$_POST['cty'])==0) echo 'hidden'; ?>">
									<div class="dflex alit_c">
										<div class="flex_1">
											
											<div class="fsz16 dgrey_txt bold">
												<span class="marr5 valm">Address</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span><?php echo $_POST['post']; ?></span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone" style="display: none;">
										<ul class="mar0 pad0 padt10 fsz14">
										 
											 
											<li class="dflex mart10  padb5 <?php if($_POST['byaddress']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#" class="black_txt">Address</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['addrs1']; ?> </span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['prt']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Port nr</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['pnumber']; ?> </span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['zp']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Zipcode</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['dzip']; ?></span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['cty']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Stad</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['dcity']; ?></span>
											</li>
											
											<li class="dflex mart10  padb5 <?php if($_POST['iadr']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#" class="black_txt">Invoice Address</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['iaddress']; ?> </span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['iprt']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Invoice Port nr</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['i_port_number']; ?> </span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['izp']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Invoice Zipcode</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['izip']; ?></span>
											</li>
											<li class="dflex mart10  padb5 <?php if($_POST['icty']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Invoice Stad</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['icity']; ?></span>
											</li>
											
											
											<li class="dflex mart10  padb5 <?php if($_POST['fln']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Name on door</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['flname']; ?></span>
											</li>
										 
											 
											<li class="dflex mart10  padb5 <?php if($_POST['ecode']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#"  class="black_txt">Entry code</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['entry_code']; ?></span>
											</li>
										</ul>
									</div>
								</div>
								
								<div class="result-item padb20 <?php if($_POST['byphone']==0) echo 'hidden'; ?>">
									<div class="dflex alit_c">
										<div class="flex_1">
											
											<div class="fsz16 dgrey_txt bold">
												<span class="marr5 valm">Phone number</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span><?php echo $_POST['byphone']; ?></span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone" style="display: none;">
										<ul class="mar0 pad0 padt10 fsz14">
										 
											 
											<li class="dflex mart10  padb5">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#" class="black_txt">Phone Number</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['phone']; ?> </span>
											</li>
											 
										 
										</ul>
									</div>
								</div>
								
								<div class="result-item padb20 <?php if($_POST['bank']==0) echo 'hidden'; ?>">
									<div class="dflex alit_c">
										<div class="flex_1">
											
											<div class="fsz16 dgrey_txt bold">
												<span class="marr5 valm">Bank</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span><?php echo $_POST['bank']; ?></span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone" style="display: none;">
										<ul class="mar0 pad0 padt10 fsz14">
										 
											 
											<li class="dflex mart10  padb5 <?php if($_POST['cn']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#" class="black_txt">Clearing number</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['clear_number']; ?> </span>
											</li>
											 
											 <li class="dflex mart10  padb5 <?php if($_POST['bc']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#" class="black_txt">Bank account number</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['bank_acc']; ?> </span>
											</li>
											 
											 <li class="dflex mart10  padb5 <?php if($_POST['bn']==0) echo 'hidden'; ?>">
												<div class="wi_50 ovfl_hid ws_now txtovfl_el">
													<a href="#" class="black_txt">Bank name</a>
												</div>
												<span class="fxshrink_0 marl10"><?php echo $_POST['langu']; ?> </span>
											</li>
											 
										 
										</ul>
									</div>
								</div>
								
						</div>
						
					</div>
					<div id="errPhone" class="fsz20 red_txt ffamily_avenir"></div>
					<form method="POST" action="verifyAppInfo" id="save_indexing_user" name="save_indexing_user"  accept-charset="ISO-8859-1">
					<input type="hidden" id="total_value" name="total_value" value='<?php echo json_encode($_POST,true); ?>'>
					<input type="hidden" id="updateSecurity" name="updateSecurity" value="<?php echo $row_summary['grading_status']; ?>" />
					</form>
					<div class="talc  "> <a href="#"  ><input type="button" onclick="submit_value_user_app();" value="Bekräftar" class="forword minhei_55p ffamily_avenir"  ></a>
										
									
									</div>
					
				</div>
			</div><div class="clear"></div>
			<div class="hei_80p"></div>
		
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_phone">
	<div class="modal-content pad25  nobrdb talc brdrad5 ">
		
		<h2 class="marb10 pad0 bold fsz24 black_txt talc">Signera med sms kod</h2>
		
		<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
			
			
			
			<div class="wi_100 marb0 talc">
				
				<span class="valm fsz16">Var vänlig och registrera ditt mobil nummer. Därefter kommer du att motta ett sms med en kod som du kan använda för att bekräfta signeringen. </span>
			</div>
			
			
		</div>
		
		
		<div class="on_clmn padb10">
			
			<div class="on_clmn ">
				<div class="thr_clmn wi_50">	
					
					
					
					<div class="pos_rel padl0">
						<input type="text" id="cntryph" name="cntryph" value="<?php echo $resultOrg1['country_phone'];?>"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5"  disabled="true">
						
						
					</div>
					
				</div>
				<div class="thr_clmn padl10 wi_50">
					
					
					<div class="pos_rel padr0">
						
						
						<input type="number" id="phoneno" name="phoneno" max="9999999999" value="<?php echo $resultOrg1['phone_number'];?>" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter phone" disabled="true">
					</div>
				</div>
			</div>
		</div>
		
		<div class="on_clmn mart10 marb20">
			<input type="button" value="Skicka" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="verifyUser();">
			
		</div>
		
		
		
	</div>
</div>

<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
	</div>

		
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