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
	<!-- HEADER -->
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			   <div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">
					<li class="hidden-xs padr10 first">
						<a href="https://www.safeqloud.com/company/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>"><span class="black_txt pred_txt_h ffamily_avenir">Consents</span></a>
					</li>
					<li class="hidden-xs padr10 first">
						<a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>"><span class="black_txt pred_txt_h ffamily_avenir">Offices</span></a>
					</li>
				  </ul>
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
									<a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	 
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Admin</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" ><?php echo $companyDetail['address'].' | '.$companyDetail['city'].' | '.$companyDetail['zip'].' | '.$companyDetail['country']; ?></a></div>
					
						<div class="padb20 xxs-padb0 ">
						
						<div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
						 <?php if($headquarterDetail['count']==0 || $headquarterDetail['rent_permises']==0 || $headquarterDetail['offer_education']==0 || $headquarterDetail['add_employee']==0) { ?>
						  <a href="../../CompanyProperty/todoInfo/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10    brd_fcaf17_a t_fcaf17_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir" >Todos</a>
							<?php } ?>
                                            <a href="../companyAccount/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir">Company</a>
                                         
                                          <a href="../resourceAccount/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir">Resource</a>    
                                             
												<a href="#" class="dinlblck mar5 padrl30     bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Apps</a>
                                        </div>
						
						  
												
												
													<?php 
													foreach($appsAssignedLocation as $category => $value) 
													{
														
														
													?> 
												 
												<a href="../../ManageAppsLocation/appsLocationInfo/<?php echo $data['cid']; ?>"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['app_name'],0,1); ?> </div>
																	</div>
													
													<div class="fleft wi_75  xxs-wi_80 xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">App</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt"><?php echo $value['app_name']." (".$value['total_desk'].")"; ?></span>  </div>
													 
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
												 
												 

																
													<?php } ?>
														 
													
														 
											<div class="clear"></div>

						<div class="padtb20 talc fsz18 "><a href="https://www.safeqloud.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class="blue_67cff7 trans_bg brdb blue_btn  tb_67cff7_bg    trn xxs-brd_width ">Usage apps</a>
				</div>


														</div>

													<div class="clear"></div>
												</div>

												<div class="clear"></div>

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

																						<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
																					 																							</body>

																																												</html>