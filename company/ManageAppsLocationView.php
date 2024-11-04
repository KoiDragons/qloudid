<!doctype html>


<html>

	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		 <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">

								<script>

									var available_yes=0;
									function selectLocation()
									{
										$("#error_location").html('');
										if($('#location').val()=="" || $('#location').val()==null)
										{
											$("#error_location").html('please select location');
											return false;
										}
										else
										{
											document.getElementById('save_indexing_location').submit();
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
								</script>
							</head>

							<body class="white_bg ffamily_avenir">
<?php $path1 = $path."html/usercontent/images/"; ?>
								<div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../assignApps/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="../assignApps/<?php echo $data['cid']; ?>" class=" diblock padl7 padr7 brdrad3 fsz30 seggreen_47E2A1_txt"><i class="fas fa-plus " aria-hidden="true"></i></a> </div>
			 
				<div class="clear"></div>
			</div>
		</div>
       <div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738">
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../locationInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
                <div class="fright xs-dnone visible_si padt10">
                    <ul class="mar0 pad0">

                        <li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="../assignApps/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase ffamily_avenir lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Assign app</a> </li>
						
						 
                    </ul>
                </div>
                
                <div class="clear"></div>
            </div>
        </div>

	<div class="clear" id=""></div>

								<div class="column_m pos_rel">

									<!-- SUB-HEADER -->



									<!-- CONTENT -->
									<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45 padb10 black_txt trn"  >Licenses</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Here is a list of apps, your company, is using..</a></div>
					
												
											<div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                              
                                            <a href="#" class="dinlblck mar5 padrl30     bg_94cffd brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">By location</a>
                                              

                                        </div>		 
												
												
													<?php 
													foreach($appsAssignedLocation as $category => $value) 
													{
														
														
													?> 
												<div class="column_m container tab-header  talc dark_grey_txt mart5">
							
							<div class="wrap maxwi_100 dflex   alit_fe justc_sb  pos_rel padb0 ">
                                <div class="white_bg tall">

                                    <!-- Logo -->
                                    <div class="dark_grey_txt fsz18  bold padb0"><?php if($value['is_headquarter']==1) echo 'Huvudkontor '; else echo 'Kontor' ?></div>

                                    <div class="marb0  "> <a href="#" class="blacka1_txt fsz16    edit-text jain_drop_company"><?php echo $value['visiting_address']; ?></a></div>
                                    <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
                                        <!-- Meta -->

                                    </a>
                                </div>
								 

                            </div>
						
							 
							</div>
												 
												
												 
																<div class="column_m container  marb20   fsz14 dark_grey_txt">

																	<?php 
													foreach($value['apps_detail'] as $category => $value1) 
													{
														
														
													?> 
														<a href="../editAssignedApps/<?php echo $data['cid']; ?>/<?php echo $value1['enc']; ?>">
														<div class="column_m container  marb0   fsz14 dark_grey_txt ">	
																		<div class=" white_bg mart5  brdrad3 brd_1 bg_fffbcc_a marb10 " style="">
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													  
													<div class="fleft wi_50p marr15 xs-mar0 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36 brdrad1000 yellow_bg_a   "> <span class="fas fa-exclamation-triangle red_txt"></span> </div>
																	</div>
													 
													 																										
													<div class="fleft wi_60 xxs-wi_80 sm-wi_60 xsip-wi_60 xs-mar0 ">
													
													
													  <span class="edit-text padt10 xsm-padt15 jain2 dblock brdb brdclr_lgtgrey2 fsz20"><?php echo $value1['app_name']." (".$value1['total_desk'].")"; ?></span> </div>
													 
													
													 
													 													 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right"></span>
													</div>
													 												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
															</div>	
															</a>


 	

																	<?php } ?>		

																	
																</div>




														 


															 

																
													<?php } ?>
														 
													
														 





														</div>

													<div class="clear"></div>
												</div>

												<div class="clear"></div>

											</div>

										</div>
										<div class="clear"></div>
									</div>
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
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>

																						 
																					 																								</body>

																																												</html>