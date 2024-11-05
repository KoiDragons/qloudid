<html><head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css">
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		 
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
			 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10"  >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../invoiceAddressesUser/<?php echo $data['checkout_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16">  
					<li class="last first">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18 sf-with-ul" onclick="changeDisplay();"><span class="fas fa-globe black_txt" aria-hidden="true"></span></a>
						<ul id="qrMenu" class="hidden">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li class="first"><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru">Russian</a></li>
                  
                  
                  <li class="last">
				  
				  
                    <div class="line marb10"></div>
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
		 	<div class="column_m header hei_60p bs_bb lgtgrey2_bg visible-xs">
				<div class="wi_100 hei_60p xs-pos_fix padtb5 padrl0 lgtgrey2_bg">
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../invoiceAddressesUser/<?php echo $data['checkout_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
                     </li>
								 
								
								
								
							</ul>
						</div>
				
					</div>					 
				  
			<div class="top_menu frighti padt10 padb10" style="width:150px !important;">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">
					 
       			
					<li style="margin-right:20px !important;" class="first last">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25" onclick="changeDisplay1();"><span class="black_txt fas fa-globe"></span></a>
						<ul id="qrMenu1" class="hidden" style="display: block;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li class="first"><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en" onclick="changeDisplay1();">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv" onclick="changeDisplay1();">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru" onclick="changeDisplay1();">Russian</a></li>
                  
                  
                  <li class="last">
				  
				  
                    <div class="line marb10"></div>
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
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 " id="loginBank">
				<div class="wrap maxwi_100 padrl25 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_65 xxs-lgn_hight_50 padb0 black_txt trn ffamily_avenir changedText">Verify</h1>
									</div>
									<div class="mart10 marb5 xxs-tall talc xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20 changedText">Please verify your payment details and submit</a></div>
									
									 
					 
					 <div class="column_m container fsz14 dark_grey_txt brdb marb5">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Details</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
           
					 
									  	
								 
									 <a href="../invoiceAddressesUser/<?php echo $data['checkout_id']; ?>">	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText"><?php echo $verificationInfomation['invoice_address'].'-'.$verificationInfomation['invoice_port_number']; ?> </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText"><?php echo $verificationInfomation['invoice_city'].','.$verificationInfomation['invoice_country']; ?></span> 
													<span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText"><?php echo $verificationInfomation['invoice_zip']; ?></span>
													  </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-edit txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
												</div>
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>

										<a href="../listCards/<?php echo $data['checkout_id']; ?>">	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText"><?php echo $verificationInfomation['name_on_card']; ?> </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText"><?php echo $verificationInfomation['card_number2']; ?></span> 
													 
													  </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 ">
														  <span class="fas fa-edit txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>	 
												<div class="clear"></div>
					 <div class="padt20 xxs-talc talc padb50 mart35">
								
								<a href="../confirmReservation/<?php echo $data['checkout_id']; ?>" ><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #000000; color: #ffffff;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Confirm reservation</font></font></button></a>
								
							</div>							
						 </div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/vacancycontent/js/custom.js"></script>
	<script>
				var tinyMCE_options = {
					selector: '.texteditor',
					plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
					toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
					//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
					//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
					menubar: false,
					max_chars : "25000",
					toolbar_items_size: 'small',
					style_formats: [
					{
						title: 'Bold text',
						inline: 'b'
					},
					{
						title: 'Red text',
						inline: 'span',
						styles:
						{
							color: '#ff0000'
						}
					},
					{
						title: 'Red header',
						block: 'h1',
						styles:
						{
							color: '#ff0000'
						}
					},
					{
						title: 'Example 1',
						inline: 'span',
						classes: 'example1'
					},
					{
						title: 'Example 2',
						inline: 'span',
						classes: 'example2'
					},
					{
						title: 'Table styles'
					},
					{
						title: 'Table row 1',
						selector: 'tr',
						classes: 'tablerow1'
					}],
					templates: [
					{
						title: 'Test template 1',
						content: 'Test 1'
					},
					{
						title: 'Test template 2',
						content: 'Test 2'
					}]
				}
				tinyMCE.init(tinyMCE_options);
				
			</script>
		
	
	 						</div></body></html>