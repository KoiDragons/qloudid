<!doctype html>
 
	
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		 
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
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
					 
						 <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
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
					
					
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir">Vtech</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Here is the list of all Estate</a></div>
					 
					 
						 <div class="wrap maxwi_100 dflex  alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb padt35 marb5">
								<div class="white_bg tall xs-talc">
								 
									
									<div class="marb0">
									<a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text ffamily_avenir">Estate</a>
									</div>
									</div>
									
									<div class="padrl10">
															<a href="../propertyStatus/<?php echo $data['cid']; ?>" class="diblock padrl20 brd brdrad3 green_bg_00ff9996   ws_now lgn_hight_29 fsz14 black_txt ">

																<span class="valm ffamily_avenir">Add</span>
															</a> 
														</div>
								
								
							</div>
						 
									 <div class="padb0 xs-padrl0 xs-padb0   mart10  ">
									 <div class="clear"></div>
								<?php $i=1; 
								foreach($displayproperties as $category => $value) 
												{
												?> 
								<a href="../foreignPropertyActionInfo/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>"> <div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="<?php if($value['is_activated']==0 && $value['vitech_city_id']==0) echo 'lgtgrey_bg'; else if($value['is_activated']==0 && $value['vitech_city_id']>0) echo 'yellow_bg_f6fe8b'; else if($value['is_activated']==1) echo 'green_bg_00ff9996'; ?>  bg_fffbcc_a brdrad5">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_65p marr15 "> <div class="wi_65p   minhei_65p   fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a <?php if($value['is_activated']==0 && $value['vitech_city_id']==0) echo 'white_bg'; else if($value['is_activated']==0 && $value['vitech_city_id']>0) echo 'yellow_bg_d8de89'; else if($value['is_activated']==1) echo 'green_bg_81ceaa'; ?>  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo $i; ?></div>
																	</div>
																	
																	 
													
													<div class="fleft wi_55 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo $value['objectNumber']; ?></span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt   "><?php echo $value['numberOfBedrooms'].' bedrooms,'; echo $value['area'].' kvm'; ?></span> 
													<span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt   "><?php echo $value['startingPrice'].' euro'; ?></span>
													 </div>
													 
												 
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									</div> </a>
							 		  <?php $i++; } ?>
									  
									  
						<div class="clear"></div>
					</div>
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