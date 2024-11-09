<!doctype html>
<html>
		<?php
			$path1 = $path."html/usercontent/images/";
		function base64_to_jpeg($base64_string, $output_file) {
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
		 
		if($childDetail ['profile_pic']!=null) { $filename="../estorecss/".$childDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$childDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; }

	$path1 = $path."html/usercontent/images/";
	?>
		<head>
	<meta charset="utf-8">
 
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<script>
		 
			
		  
		function show_popup()
		{
			if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#popup_fade").removeClass('active');
				$("#popup_fade").attr('style','display:none;');
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				
			}
			else
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			}
		}
		
		function closemob_popup()
		{
			
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			
		}
		
		
		function show_phone()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_phone").addClass('active');
				$("#gratis_popup_phone").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_phone").removeClass('active');
				$("#gratis_popup_phone").attr('style','display:none;');
				
			}
			}
			
			
			function show_save()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_saveq").addClass('active');
				$("#gratis_popup_saveq").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_saveq").removeClass('active');
				$("#gratis_popup_saveq").attr('style','display:none;');
				
			}
			}
			
			function show_savev()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_verify").addClass('active');
				$("#gratis_popup_verify").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_verify").removeClass('active');
				$("#gratis_popup_verify").attr('style','display:none;');
				
			}
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
			
			function informEmployee()
			{
				$("#error_msg_form").html('');
				if($("#ssn").val()=="" ||  $("#ssn").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter ssn');
					return false;
				}
				else
				{
					var send_data={};
				
				
					send_data.ssn=$("#ssn").val();
					$.ajax({
					type:"POST",
					url:"../checkUserAvailability",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						
						if(data1==0)
						{
						$("#error_msg_form").html("SSN is already in use by another user  !!!");
						return false;
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
					url:"../verifyOtp",
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
					document.getElementById("updateform").submit();
						}
					}
				});
				}
			}
			 
			 
			</script>
	</head>
	
	<body class="white_bg ffamily_avenir xs-white_bg">
	<div id="headData">
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorRequestList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorRequestList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					 
                <div class="clear"></div>

            </div>
        </div>
		</div>
		<div class="clear" id=""></div>
		
	
		 
		<div class="column_m pos_rel " >
			
			 <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginPhone" onclick="checkFlag();"  style="display:none;">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					 
<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart20 xs-pad0 xs-mart0">
								
			
					<div class="padb10 xs-pad0">
					<h1 class="padl0 padb5 talc fsz50 xs-fsz25 black_txt hidden-xs"><span ><img src="<?php echo  $imgs; ?>" class="cropped_image   borderr grey_brd5" width="40" height="40" /> </span><span class="lgn_hight_40"><?php echo $row_summary['name']; ?></span></h1>
					<div class="on_clmn visible-xs">
						<div class="thr_clmn wi_20 padl40">	
							<img src="<?php echo  $imgs; ?>" class="cropped_image   borderr grey_brd5" width="40" height="40" />  
							</div>
							<div class="thr_clmn wi_80 xs-padt10">	
								<h1 class="padl0 padb5 tall fsz50 xs-fsz25 black_txt xs-pad0 xs-padl20"> <?php echo $row_summary['name']; ?></h1>
							</div>
							</div>
							
					
					
				
						<p class="lgtgrey2_bg padt10 talc fsz18 xs-padb10 padb20 wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xxxs-marb35 dark_grey_txt">Signera med lösenordet du har fått per sms.</p>
					</div>
 
			 
		
		<form method="POST" action="approveOtp" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
			
			
			<div class="on_clmn mart10 xxs-mart10 marb25">
											 
				<div class="pos_rel">
					
					<input type="text" name="otp" id="otp" placeholder="" max="9999999" class="wi_30 xs-wi_40 rbrdr pad10  brdb talc  minhei_65p  black_txt fsz32 ffamily_avenir" style="border-bottom: 9px dashed;" onkeyup="checkOtp();">
					
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
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0"><img src="../../../../html/usercontent/images/random/backspace.png" height="25" weight="25"></h3>
																		 
																		
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
			<div class="column_m container zi5 mart20  xs-mart0 white_bg xs-white_bg" id="loginBank"  style="display:block;">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  brdrad3 white_bg xs-white_bg">
						<div class="padtb0 brdrad3 ">
						
							<div class="padb20  talc padt20">
										<div class="padrl0 ">
											<img src="<?php echo $imgs; ?>" width="160" height="160" class="white_brd borderr">
											
										</div>
									</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 yellow_txt bold"><?php if($childDetail['is_approved']==0) echo 'Pending'; else if($childDetail['is_approved']==2) echo 'Rejected'; else if($childDetail['is_approved']==1) echo 'Approved'; ?></p>
<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt"><?php echo $childDetail['company_name']; ?></h1>
						
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb0 xs-padb5 grey_new_txt"><?php echo $childDetail['name']; ?></p>
						 
						
							
						
						<p class="lgn_hight_16 padt0 talc fsz20   padb10 marb20 xs-padb5 xxs-marb100 grey_new_txt"><?php echo date('m/y',strtotime($childDetail['created_on']))."      123";?></p>
						
						
						<form action="../updateSSN/<?php echo $data['pid']; ?>" method="POST" name="updateform" id="updateform">
							 
								 
									<div class="xs-marb20 marb35  xxs-talc talc <?php if($childDetail['ssn']!=null || $childDetail['ssn']!="") echo 'hidden'; ?>"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Please add your social security number.</a></div>
							 
								
									<div class="on_clmn mart10 xxs-mart10 marb35">
										<div class="thr_clmn  wi_30 padr10"  > 
										<div class="pos_rel">
													<select id="ccountry" name="ccountry"  class="wi_100 minhei_65p fsz18 fsz18 nobrdt nobrdl nobrdr llgrey_txt brdb  xxs-minhei_60p trans_bg nobold tall padl0 ffamily_avenir"  style="text-align-last:center;" disabled>
														
														<?php  foreach($resultContry as $category => $value) 
																{
																	$category = htmlspecialchars($category); 
																?>
																
																<option value="<?php echo $value['id']; ?>" <?php if($value['id']==$childDetail['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg" disabled><?php echo $value['country_name']; ?></option>
															<?php 	}	?>
														
													</select>
												</div>
												</div>
												<div class="thr_clmn  wi_70 padl10"  >
										<div class="pos_rel">
										<input type="text" name="ssn"  placeholder="Personnummer " id="ssn" value="<?php echo $childDetail['ssn']; ?>" class="txtind10 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828   wi_100 trans_bg required minhei_65p xxs-minhei_60p  talc  ffamily_avenir" <?php if($childDetail['ssn']!=null || $childDetail['ssn']!="") echo 'readonly'; ?>>
									</div>
									</div>
									</div>
									 
								<div class="valm fsz20 red_txt ffamily_avenir talc" id="error_msg_form"> </div>		
								<div class="clear"></div>
							<div class="padtb20 xxs-talc talc <?php if($childDetail['ssn']!=null || $childDetail['ssn']!="") echo 'hidden'; ?>">
								
								<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18 ffamily_avenir  " onclick="informEmployee();">Update</button>
								
							</div>
							<!-- /bottom-wizard -->
						</form>
						
						

						<?php  if($childDetail['is_approved']==0 && ($childDetail['ssn']!=null || $childDetail['ssn']!="")) { ?>
						<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb40   xs-padb0">
						
						 
						
						 	<div class="wi_25-12p marl123 xxs-mar87">
						<a href="../../DayCareRequest/approveRequest/<?php echo $data['pid']; ?>" class="fsz30 ">
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #e4e4e4; color: #e4e4e4" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="black_txt fab fa-airbnb fa-stack-1x fab1 bold pad0" aria-hidden="true" style="color:#fcaf16;"></i>
																				</span></a>
						<p class="fsz14  padt5 grey_new_txt">Accept</p>
						</div>
						 
						<div class="wi_25-12p marl10">
					 
				<a href="../../DayCareRequest/rejectRequest/<?php echo $data['pid']; ?>" class="fsz30 ">
				 
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #e4e4e4; color: #e4e4e4;" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="far fa-building fa-stack-1x fab1 bold pad0" aria-hidden="true" style="color:#01b7f2;"></i>
																				</span></a>
						<p class="fsz14  padt5 grey_new_txt">Reject</p>
						</div>
						
						 
						</div>
						
	 				
						
						<?php } ?>
					</div>
					
					
					
				</div>
						
			</div>
		
			
		</div>
			
		</div>
	 
	 <div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	 </div>
	 
		<div id="popup_fade" class="opa0 opa55_a black_bg" onclick="closemob_popup();"></div>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		 
		
	</body>
	
</html>