<!doctype html>
<?php
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
	$path1 = "../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		
		
		<script>
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
			 function checkFlag() {
                if ($(".popupShow").hasClass('active')) {
                    $(".popupShow").removeClass('active')
                    $(".popupShow").attr('style', 'display:none');
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
		
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../moreInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../moreInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
				<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Pricing</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" > Please update your service pricing information</a></div>
					 
					 
                        <div class="padb20 xxs-padb0 ">
                            

                            <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
                                <div class="container ">
                                    <div class="">

                                      <div class="  martb0 padb30 xs-talc  nobrd talc">
                                            
                                              <a href="../../addPrice/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>" class="dinlblck mar5 padrl10     bg_98cf44 brdrad50  lgn_hight_60 fsz60  white_txt white_txt_ah ffamily_avenir">+</a>
                                             

                                        </div>
										
										<div class="on_clmn brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Price list" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>

                                        <div class="tab_container mart10">
					 
							 
							 
							 
							 <div class="tab_content active" id="utab_Popular" style="display: block;">
									
									
									
									 
										<div id='allRequest'>
											<?php $i=0;
												
												foreach($servicePriceList as $category => $value) 
												{
													
													
												?> 
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
									<a href="../../editPrice/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>/<?php echo $value['enc']; ?>">	<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> 
													<div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['price_title'],0,1); ?></div>
																	</div>
													
													<div class="fleft xs-wi_50 wi_75  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt"><?php echo $value['price_title']; ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt"><?php if($value['subscription_info']==1) echo 'One time'; else { if($value['recurring_type']==1) echo 'Hourly';  else if($value['recurring_type']==2) echo 'Daily';  else if($value['recurring_type']==3) echo 'Weekly'; else if($value['recurring_type']==4) echo 'Monthly'; else if($value['recurring_type']==5) echo 'Every 3 Month'; else if($value['recurring_type']==6) echo 'Every 6 Month'; else if($value['recurring_type']==7) echo 'Yearly'; else if($value['recurring_type']==8){ if($value['custom_cycle']==1) echo $value['custom_time'].' Hourly'; else if($value['custom_cycle']==2) echo $value['custom_time'].' Daily'; else if($value['custom_cycle']==3) echo $value['custom_time'].' Weekly'; if($value['custom_cycle']==4) echo $value['custom_time'].' Monthly'; if($value['custom_cycle']==7) echo $value['custom_time'].' Yearly'; } } ?><?php echo ' - '.$value['price'].' SEK'; ?></span>  </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												
										<?php } ?>
										</div>
										
								 <div class="clear"></div>
									 
								</div>
								
							 
								
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
       
</body>

</html>