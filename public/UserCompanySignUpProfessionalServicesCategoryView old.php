<!doctype html>
 

<html>
	
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
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
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateCombine.js"></script>
	   <script>
	   	function changeDisplay()
		{
			if($('#qrMenu').hasClass('hidden'))
			{
				$('#qrMenu').removeClass('hidden')
				
				$('#qrMenu').css('display','block');
			}
			else
				{
				$('#qrMenu').addClass('hidden')
				$('#qrMenu').css('display','none');
			}
		}	

function changeDisplay1()
		{
			if($('#qrMenu1').hasClass('hidden'))
			{
				$('#qrMenu1').removeClass('hidden')
				
				$('#qrMenu1').css('display','block');
			}
			else
				{
				$('#qrMenu1').addClass('hidden')
				$('#qrMenu1').css('display','none');
			}
		}	 
	   
	   </script>
	 </head>
	
	<body class="white_bg ffamily_avenir">
		
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">  
					<li class="last">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18" onclick="changeDisplay();"><span class="fas fa-globe black_txt" aria-hidden="true"></span></a>
						<ul id="qrMenu" class="hidden" >
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru">Russian</a></li>
                  
                  
                  <li>
				  
				  
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
							<ul class="menulist sf-menu fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
                     </li>
								 
								
								
								
							</ul>
						</div>
				
					</div>					 
				  
			<div class="top_menu frighti padt10 padb10" style="width:150px !important;">
				<ul class="menulist sf-menu  fsz16 ">
					 
       			
					<li style="margin-right:20px !important;">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25 sf-with-ul" onclick="changeDisplay1();"><span class="black_txt fas fa-globe"></span></a>
						<ul id="qrMenu1" class="hidden" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en" onclick="changeDisplay1();">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv" onclick="changeDisplay1();">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru" onclick="changeDisplay1();">Russian</a></li>
                  
                  
                  <li>
				  
				  
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
	
	<div class="column_m pos_rel">
			
			<!-- CONTENT -->
				<div class="column_m talc lgn_hight_22 fsz16 mart40 ">
				<div class="wrap maxwi_100 padrl25 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10  xs-mart0 xs-pad0">
					
					
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn changedText" style=" line-height: 90px;">Pick one</h1>
									</div>
									<div class="mart0 xs-marb20 marb35 xxs-talc talc"><a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn changedText">Pick the one you need help with.</a></div>
					
					
									<div class="wi_100 xs-wi_100 dflex justc_c alit_s marb10 padb40 xs-padrl12 talc padt10" >
									<div class="wi_100 maxwi_500p ovfl_hid padt10">
										
										
										<div class="category-apps sales-marketing marrbl-2 uppercase fsz13">
										<?php $i=0;
												
												foreach($professionalCategoryDetail as $category => $value) 
												{
													
												if($value['id']!=9)
												{													
												?> 
											<a href="professionalSubcategoryList/<?php echo $value['enc']; ?>" class="<?php if($i==0) echo 'wi_66 fsz16'; else echo 'fsz13 wi_33'; ?> xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt  xs-fsz12 crm featured-app "><div class="<?php if($i==0) echo 'mart50'; else echo 'mart40 '; ?> talc changedText"><?php echo $value['category_name']; ?></div></a>
											 
												<?php } else {  ?>
												<a href="professionalHomeRepairCategoryList/<?php echo $value['enc']; ?>" class="<?php if($i==0) echo 'wi_66 fsz16'; else echo 'fsz13 wi_33'; ?> xxs-wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_blue_h brdr dark_grey_txt  xs-fsz12 crm featured-app "><div class="<?php if($i==0) echo 'mart50'; else echo 'mart40 '; ?> talc changedText"><?php echo $value['category_name']; ?></div></a>
												<?php } $i++;  } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg"></div>
										</div>
									</div>
								</div>

							
							
							
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>

		
		<div class="column_m pos_rel hidden">
			 
			<!-- CONTENT -->
				<div class="column_m talc lgn_hight_22 fsz16 mart40 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Categories</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Here is a list of professional service categories</a></div>
					 
					 
                         <div class="on_clmn brdb marb5">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Category list" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" fdprocessedid="vl1vgr">
										 
									</div>
									 </div>
							 
							 
							 <div class="tab_content active" id="utab_Popular" style="display: block;">
									
									<?php $i=0;
												
												foreach($professionalCategoryDetail as $category => $value) 
												{
													
													
												?> 
									
									 
										  <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
									<a href="professionalSubcategoryList/<?php echo $value['enc']; ?>">	<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> 
													<div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['category_name'],0,1); ?></div>
																	</div>
													
													<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt"><?php echo $value['category_name']; ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">Service category </span>  </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										</a>
											</div>
											</div>
												
									   
												<?php } ?>
										 		
									    	
										</div>
										
								 <div class="clear"></div>
									 
								 
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		 
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	</div>
	 
		<div class="hei_80p hidden-xs"></div>
		
	 
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
        <script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/autosize.min.js"></script>
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