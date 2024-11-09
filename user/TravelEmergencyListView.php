<!doctype html>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
		function updateCountry(id)
			{
				var send_data={};
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"updateCountry",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
					if(data1)
					{
					 
						window.location.href="https://www.safeqloud.com/user/index.php/Travel/emergencyListing";
					}
				}
				});
				
				 
				
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
                        <a href="../Dependents/approvedDependents" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			<div class="wi_200p fleft padl20 padtb5 hidden-xs ">
			 
      <div class="fleft">
      <select  class="wi_100 minhei_40p fsz18 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 dropdown-bg   trans_bg nobold tall padl0 ffamily_avenir"  style="text-align-last:center;"  onchange="updateCountry(this.value);">
														
														<?php  foreach($countryOption as $category => $value) 
																{
																	$category = htmlspecialchars($category); 
																?>
																
																<option value="<?php echo $value['id']; ?>"  <?php if($value['id']==$travelCountry['country_id'])  echo 'selected';  ?> class="lgtgrey2_bg"  ><?php echo $value['country_name']; ?></option>
															<?php 	}	?>
														
													</select>
      </div>
       
        
      </div>
	   <?php if(!empty($hotelConnectionDetail )) { ?>
				<div class="fright   padtbz10   " >
						<ul class="mar0 pad0">
							<div class="  padtrl10">
								<a href="hotelAmenities" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir"><?php echo $hotelConnectionDetail['hotel_name']; ?> </span>
								</a>
							</div>
							
							
							
						</ul>
					</div> 
				<?php } ?>
    </div>   
            <div class="clear"></div>
         </div>
       
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../Dependents/approvedDependents" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
				<div class="wi_200p fleft padl20 padtb5  ">
			 
      <div class="fleft">
      <select  class="wi_100 minhei_40p fsz18 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 dropdown-bg   trans_bg nobold tall padl0 ffamily_avenir"  style="text-align-last:center;"  onchange="updateCountry(this.value);">
														
														<?php  foreach($countryOption as $category => $value) 
																{
																	$category = htmlspecialchars($category); 
																?>
																
																<option value="<?php echo $value['id']; ?>"  <?php if($value['id']==$travelCountry['country_id'])  echo 'selected';  ?> class="lgtgrey2_bg"  ><?php echo $value['country_name']; ?></option>
															<?php 	}	?>
														
													</select>
      </div>
       
        
      </div>	
                <?php if(!empty($hotelConnectionDetail )) { ?>
				<div class="fright   padtbz10  padt0 " >
						<ul class="mar0 pad0">
							<div class="  padtrl10">
								<a href="hotelAmenities" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir"><?php echo $hotelConnectionDetail['hotel_name']; ?> </span>
								</a>
							</div>
							
							
							
						</ul>
					</div> 
				<?php } ?>
				
				<div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		
		<div class="column_m pos_rel">
			
		 <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 "  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart20 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Travel</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" > Important informaton about <span id="cname"><?php echo $travelCountry['country_name']; ?></span></a></div>
									
									
					 
					<div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                              <a href="#" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" >Events</a>
                                            <a href="#" class="dinlblck mar5 padrl30     bg_94cffd brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Emergency</a>
                                              

                                        </div>
										
										 
										
										<?php $i=0;
												
												foreach($emergencyDetail as $category => $value) 
												{
												if($value['is_active']==1)
												{
													continue;
												}													
													
												?> 
											<a href="<?php if($value['link_info']=='#') echo 'companyList/'.$value['enc']; else echo 'alarmList'; ?>">
											<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['emergency_name'],0,1); ?> </div>
																	</div>
													
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo html_entity_decode($value['emergency_name']); ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">A list of <?php echo html_entity_decode($value['emergency_name']); ?> in your area</span>  </div>
													 
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
		
								 				 
											</div>
											
				 
</div>
<div class="clear"></div>
</div>
</div>



<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>


 
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

</div>

 
<!-- Slide fade -->
<div id="slide_fade"></div>

<!-- Menu list fade -->
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
 </body>

</html>