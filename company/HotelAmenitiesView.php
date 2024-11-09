<!doctype html>
 
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
		function checkHotel(id,id1)
		{
			if(id==1)
			{
				window.location.href='https://www.safeqloud.com/company/index.php/HotelStay/roomsList/<?php echo $data['cid']; ?>/'+id1;
			}
		}
			function submitAlarm()
			{
				
				$("#errorMsg").html('');
				if($("#alarm_number").val()=="" || $("#alarm_number").val()==null)
				{
				$("#errorMsg").html('please enter alarm number');	
				return false;
				}
				if(isNaN($("#alarm_number").val())) 
				{
					$("#error_msg_form").html('Alarm number must be a numeric value');
					return false;
				}
				if($("#description").val()=="" || $("#description").val()==null)
				{
				$("#errorMsg").html('please enter description');	
				return false;
				}
				
					
					document.getElementById('save_indexing').submit();
				
				
			}
			
			 
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../locationInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
					 
						 <a href="../../locationInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
                     </li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Hotel</h1>
									</div>
									<div class="mart10 marb20 xxs-talc talc xxs-black_brd   xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" ><?php echo $hotelDetailInfo['hotel_name']; ?>, <?php echo $hotelDetailInfo['visiting_address']; ?></a></div>
									
									<a href="../../roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>">
									<div class="column_m container  marb5   fsz14 dark_grey_txt visible-xs" >
												<div class=" white_bg bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="../../../../../html/usercontent/images/datat.png" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft  wi_75 xxs-wi_80    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">Data host</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Store &amp; distribute content and images</span>  </div>
													  
												 
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
													   
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
								</a>
									<div class="column_m container  marb5   fsz14 dark_grey_txt visible-xs" >
												<div class=" lgtgrey_bg bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="../../../../../html/usercontent/images/safety.png" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft  wi_75 xxs-wi_80    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">Guest safety</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Store &amp; distribute content and images</span>  </div>
													  
												 
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
													   
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
										
												 
									<div class="column_m container  marb5   fsz14 dark_grey_txt visible-xs" >
												<div class=" white_bg bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="../../../../../html/usercontent/images/stay2.png" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft  wi_75 xxs-wi_80    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">Hotel stay</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Store &amp; distribute content and images</span>  </div>
													  
												 
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
													   
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
								 
									<div class="column_m container  marb5   fsz14 dark_grey_txt visible-xs" >
												<div class=" lgtgrey_bg bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="../../../../../html/usercontent/images/event.png" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft  wi_75 xxs-wi_80    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">Hotel event</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Store &amp; distribute content and images</span>  </div>
													  
												 
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs ">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
													   
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
										
											
										 
										 
						 
						  
									<div class="xs-wi_100 sm-wi_50 xsip-wi_50 wi_50 fleft bs_bb padrb20 talc xs-padr0 hidden-xs">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="../../roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="xxs-padrl115 wi_100 hei_90p dflex bs_bb padrl55">
																		<img src="../../../../../html/usercontent/images/datat.png" height="70" width="70" class="brdrad5 padb0">
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">Data host</h3>
																		<span class="dblock  marb5 padt10 talc midgrey_txt fsz16">Store &amp; distribute content and images.</span> 
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
									 
												<div class="xs-wi_100 sm-wi_50 xsip-wi_50 wi_50 fleft bs_bb padl20 padb20 talc xs-padl0 hidden-xs">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="xxs-padrl115 wi_100 hei_90p dflex bs_bb padrl55">
																		<img src="../../../../../html/usercontent/images/safety.png" height="70" width="70" class="brdrad5 padb0">
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">Guest safety</h3>
																		<span class="dblock  marb5 talc padt10 midgrey_txt fsz16">Store &amp; distribute content and images.</span> 
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
											 <div class="xs-wi_100 sm-wi_50 xsip-wi_50 wi_50 fleft bs_bb padrb20 talc xs-padr0 hidden-xs">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="xxs-padrl115 wi_100 hei_90p dflex bs_bb padrl55">
																		<img src="../../../../../html/usercontent/images/stay2.png" height="70" width="70" class="brdrad5 padb0">
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">Hotel Stay</h3>
																		<span class="dblock  marb5 padt10 talc midgrey_txt fsz16">Store &amp; distribute content and images.</span> 
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
									 
												<div class="xs-wi_100 sm-wi_50 xsip-wi_50 wi_50 fleft bs_bb padl20 padb20 talc xs-padl0 hidden-xs">
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="xxs-padrl115 wi_100 hei_90p dflex bs_bb padrl55">
																		<img src="../../../../../html/usercontent/images/event.png" height="70" width="70" class="brdrad5 padb0">
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">Hotel Event</h3>
																		<span class="dblock  marb5 talc padt10 midgrey_txt fsz16">Store &amp; distribute content and images.</span> 
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												 		
										
												 
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
			
		</div>
		 
		
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	 
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	 
 </body>

</html>