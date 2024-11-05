
<!DOCTYPE html>
 
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
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
var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=40;
			var send_data1={};
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
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
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
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
					document.getElementById("updateform").submit();
						}
					}
				});
				}
			}
			
			 
			function informEmployee()
			{
				
				$("#error_msg_form").html('');
				 
				if($("#uphno").val()=="")
				{
					$("#error_msg_form").html('Please enter phone number.!!');
					
					return false;
				}
				else if($("#uphno").val().charAt(0)==0) 
				{
					$("#error_msg_form").html('Phone number cant start with Zero');
					return false;
				}
				else if(isNaN($("#uphno").val())) 
				{
					$("#error_msg_form").html('Phone number must be a numeric value');
					return false;
				}
				else if($("#uphno").val().length<5) 
				{
					$("#error_msg_form").html('Phone number must be minimum five digit');
					return false;
				}
				else if($("#uphno").val()==0) 
				{
					$("#error_msg_form").html('Phone number can not be Zero');
					return false;
				}
				else if($("#uphno").val()==$("#userPhone").val())
				{
					$("#error_msg_form").html('Please enter other phone number. you are using same number now!!');
					
					return false;
				}
				else
				{
					
					var send_data={};
					send_data.countryname=$("#cntry").val();
					send_data.phoneno=$("#uphno").val();
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
								$("#error_msg_form").html('Please enter another/valid phone number');
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
		 	
			
			function checkUserPhone()
			{
				
				$("#error_msg_form").html('');
				 
				if($("#userPhone").val()==0) 
				{
					$("#error_msg_form").html('Phone number not available');
					return false;
				}
				 
				else
				{
					
					var send_data={};
					send_data.countryname=$("#cntry").val();
					send_data.phoneno=$("#userPhone").val();
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
								$("#error_msg_form").html('Please enter another/valid phone number');
							}
							else
							{
								
								$("#loginBank").hide();
								$("#headData").hide();
								$("#loginPhoneOld").attr('style','display:block');
								$("#infor_id1").val(data1);
							}
							
						}
					});
				}
			}
		 	
			function checkOtp1()
			{
				$("#error_msg_opt1").html('');
				if($("#otp1").val()=="")
				{
					$("#error_msg_opt1").html('Fyll i lösenordet');
					return false;
					
				}
				if($("#otp1").val().length==7)
				{
				var send_data={};
				
				send_data.otp=$("#otp1").val();
				send_data.infor_id=$("#infor_id1").val();
				
				$.ajax({
					type:"POST",
					url:"verifyOtpUpdate",
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
							window.location.href="http://www.qloudid.com/user/index.php/NewPersonal/userAccount"
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
			 	
				function ChangeInputOld(id)
			 {
				if(id<10)
				{
					newVal=$("#otp1").val()+id;
					$("#otp1").val(newVal);
				}
				else
				{
					newVal=$("#otp1").val().slice(0, -1); 
					$("#otp1").val(newVal);
				}
				
				checkOtp1();
			 }
			
		</script>
			
			
</head>

<body class="white_bg ffamily_avenir">
		<?php $path1 = $path."html/usercontent/images/"; 
		
		
		?>
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	 <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginPhone" onclick="checkFlag();"  style="display:none;">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					 
<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart20 xs-pad0 xs-mart0">
								
			<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz80 xxs-fsz45 nobold padb10 blue_67cff7 trn ffamily_avenir">Signature</h1>
									</div>
									<div class="mart10 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Signera med ditt sms-lösenordet.</a></div>
 
			 
		
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
	
	 <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginPhoneOld" onclick="checkFlag();"  style="display:none;">
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
 
			 
		
		 
			
			
			<div class="on_clmn mart10 xxs-mart10 marb25">
											 
				<div class="pos_rel">
					
					<input type="text" name="otp1" id="otp1" placeholder="" max="9999999" class="wi_30 xs-wi_40 rbrdr pad10  brdb talc  minhei_65p  black_txt fsz32 ffamily_avenir" style="border-bottom: 9px dashed;" onkeyup="checkOtp1();">
					
				</div>
			</div>
			<input type="hidden" id="infor_id1" name="infor_id1" value="" />
			<div class="red_txt" id="error_msg_opt1"></div>
			<div class="container column_m martb20 padtb20">
			<div class=" wi_33  fleft bs_bb  talc padb10">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padrl30">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(1);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(2);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(3);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(4);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(5);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(6);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInputOld(7);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInputOld(8);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(9);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr  " onclick="ChangeInputOld(0);">
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
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad25 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr xxs-padl14 padl17 " onclick="ChangeInputOld(10);">
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
		
				
		  
		 
	</div>
				
				
			</div>
			<div class="clear">
			
 </div>
	</div>
	<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40   xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn">Mobile</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Update your mobile/cell number for security and communication purposes.</a></div>
									
								 
									<form action="../NewPersonal/userAccount" method="POST" name="updateform" id="updateform">
									
									<div class="on_clmn mart10 xxs-mart10 marb35">
											<div class="thr_clmn  wi_30 "  > 
										<div class="pos_rel">
													<select id="ccountry" name="ccountry"  class="wi_100 minhei_65p fsz18 fsz18 nobrdt nobrdl nobrdr llgrey_txt brdb  xxs-minhei_60p trans_bg nobold tall padl0 ffamily_avenir"  style="text-align-last:center;" disabled>
														
														<?php  foreach($resultContry as $category => $value) 
																{
																	$category = htmlspecialchars($category); 
																?>
																
																<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==$row_summary['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg" disabled>+<?php echo $value['country_code']; ?></option>
															<?php 	}	?>
														
													</select>
												</div>
												</div>
												<div class="thr_clmn  wi_70 padl20"  >
												<input type="text" name="uphno"  placeholder="Mobil " id="uphno"  class="txtind10 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828  wi_100 trans_bg required minhei_65p xxs-minhei_60p  talc  ffamily_avenir" value="<?php if($resultOrg1['phone_number']!="" || $resultOrg1['phone_number']!= null) echo $resultOrg1['phone_number']; else echo "0"; ?>">
												</div>
											</div>
										 
									 
									
										 
									 
									<input type="hidden" name="updateSecurity" id="updateSecurity" />
											<input type="hidden" name="userPhone" id="userPhone" value="<?php if($resultOrg1['phone_number']!="" || $resultOrg1['phone_number']!= null) echo $resultOrg1['phone_number']; else echo "0"; ?>" />	
											 
								<div id="error_msg_form" class="red_txt fsz20 ffamily_avenir"></div>
								 <div class="clear"></div> 
							<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword hei_55p fsz18  t_67cff7_bg ffamily_avenir" onclick="informEmployee();">Update</button>
								
							</div>
								 
								
								<div class="mart10 xxs-talc talc fsz14 ffamily_avenir">
								
								If you are the owner of this current phone number. You will receive an sms with code once you submit.
								<?php if($resultOrg1['phone_verified']!=1) { ?>
								<a href="javascript:void(0);" onclick="checkUserPhone();" >Click here</a> to verify your current number.
								<?php } ?>
							</div>
						</form>
					 				
					
					</div>
					
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
 
	 
		
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
</body>
</html>