﻿<!doctype html>
<html>
	<?php
	 
		$path1 = $path."html/usercontent/images/";
		 
	
	?>
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
			
			function removeActive()
			{
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			
			function rActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			
			function raActive()
			{
				
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			
			function rbActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown2").removeClass('active');
			}
			
			var currentLang = 'sv';
										function sendInformation()
										{
										$("#error_msg_form").html('');

										var bg_url = $('#image-data').css('background-image');

										if(bg_url!="" || bg_url!=null || bg_url!="none")
										{
										$('#image-data1').val(bg_url);
										}
										
										if($("#item").val()=="" || $("#item").val()==null)
										{
										 
										$("#error_msg_form").html('Please enter item name');
										return false;
										}
										 
										if($("#pkts").val()==0 || $("#pkts").val()==null)
										{
										 
										$("#error_msg_form").html('Please select total packets');
										return false;
										}
										if($("#svrty").val()==0 || $("#svrty").val()==null)
										{
										 
										$("#error_msg_form").html('Please select severity of item');
										return false;
										}
										document.getElementById('save_indexing').submit();	
										
										
										
										}




			
		
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
                        <a href="listItemsDetailRequired" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
	
	 
			<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="listItemsDetailRequired" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>							
		<div class="clear" id=""></div>
		
		
		 
		<div class="column_m pos_rel">
			<!-- CONTENT -->
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart0 xs-pad0">
						<form action="addItem" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
						<div class="marb25">
						
									<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20  brdclr_white">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd borderr">
											<div class="cropped_image  borderr grey_brd5"   id="image-data" name="image-data"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
							 
								
							</div>
						
					 <div class="mart0 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz18 xxs-talc talc edit-text jain_drop_company trn " >Please add item details.</a></div>
						 <div class="column_m container  marb25   fsz14 dark_grey_txt">
						 
						 <div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt  bg_green  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-shopping-basket"></span></div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Item detail</span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
										 
										<input type="text"  name="item" id="item"   class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir">
										 		 
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
						 
				 	  				
													<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt  bg_green  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Total packets  </span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
										 
									<select class="padt0 jain2 dblock black_txt ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd trans_bg" id="pkts" name="pkts"  >
											<option value="0">Select</option>
											 
												<option value="1">1</option>
											 	<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
											 	<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												
														
										</select>
										 		 
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										 
										 <div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt  bg_green  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Severity  </span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
										 
									<select class="padt0 jain2 dblock black_txt ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd trans_bg" id="svrty" name="svrty"  >
											<option value="0">Select</option>
											 
												<option value="1">Very urgent</option>
											 	<option value="2">Urgent</option>
												<option value="3">Normal</option>
												 
												
														
										</select>
										 		 
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
										 <div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt  bg_green  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Who Will deliver  </span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
										 
									<select class="padt0 jain2 dblock black_txt ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd trans_bg" id="who_will_deliver" name="who_will_deliver"  >
											 
											 
												<option value="1">My home</option>
											 	<option value="2">Volunteer</option>
												 
												 
												
														
										</select>
										 		 
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										 
										
						 </div>
						 <div class="clear"></div>
						 <div class="red_txt fsz20" id="error_msg_form"></div>
						  <div class=" padtb20 talc fsz16  " onclick="sendInformation();"> <a href="#" class="forword hei_55p fsz18  t_67cff7_bg ffamily_avenir" >Update </a> </div>
						 
						</form>
						
					
						
						
					</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			 
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		 
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	</body>
	
</html>