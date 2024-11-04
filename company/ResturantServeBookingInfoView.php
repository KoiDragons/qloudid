<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_time.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script>
   function updateDayopen(id,link)
   {
	   dayValue=id;
	   foodValue=0;
   }
   
   function updateFood(id)
   {
	   foodValue=id;
	   dayValue=0;
   }
		function submitform()
		{
			
		 
			document.getElementById('save_indexing').submit();
			}
		
		  
				
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs hidden-xsi">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../resturantList/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs visible-xsi">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm visible-xsi fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../resturantList/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="top_menu frighti padt10 padb10 wi_60i visible-xs visible-sm visible-xsi">
				<ul class="menulist sf-menu  fsz16 ">
					 
       			
					<li class="marri15">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25 sf-with-ul"><span class="fas fa-bars black_txt"></span></a>
						<ul style="display: none;">
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									<li><a href="javascript:void(0);">Resturant</a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				 
				 
					<li><a href="../../diningHallInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Table info</a></li>
				  <li><a href="../../serveBookingInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" >Table setting</a></li>
                 
				    <li><a href="../../tableReservationRequestList/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Booking info</a></li>
                   
                  
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
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
					<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								
								<div class="column_m padb10 hidden">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p talc fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																<span class="fa-stack   t_67cff7_bg  white_txt">
																				 <i class="" aria-hidden="true"></i>
																				  <i class="far fa-handshake fa-stack-1x padl5" aria-hidden="true"></i>
																				</span>
																	
																	<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30"> <span>Resturant</span>  </div>
															</a>																	
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>
											 
							<ul class="dblock marr35 padt250 padl10 fsz18 mart0">
							 
						<li class="dblock padr10 padb15   ">
						<a href="../../diningHallInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Table info</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
						 
								<li class="dblock padr10 padb15">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >Table setting</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
						 					
						 				 
						 	 <li class="dblock padr10 padb15 padt5">
						<a href="../../tableReservationRequestList/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Booking info</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>	
						  					
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
						<div class="wi_500p col-xs-12 col-sm-12 fleft pos_rel zi5   padl60 xsi-padrl0 xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc tall fsz55 xxs-fsz65 bold lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Booking</h1>
									</div>
									<div class="mart10 marb5 xxs-talc tall  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Set booking hours for <?php echo $resturantinfo['resturant_name']; ?></a></div>
					 
					 
							
							<form action="../../editBookingTimeInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 <?php if($resturantWorkCount['breakfast_available']==1) { ?>
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have booking for breakfast?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_booking']==1) echo 'checked'; else echo ''; }?>" onclick="updateFood(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
								 		
											 
											 
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_booking']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="food_1">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Maximum sitting time" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir "readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50"> 
											<div class="pos_rel">
												
												<select name="breakfast_minimum_time" id="breakfast_minimum_time"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_minimum_time']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_minimum_time']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_minimum_time']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_minimum_time']==4) echo 'selected'; } ?> >2 hours</option>  
											</select>
											</div>	
											 
											</div>
											

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Minimum time before closing" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_time_before_closing" id="breakfast_time_before_closing"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_time_before_closing']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_time_before_closing']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_time_before_closing']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_time_before_closing']==4) echo 'selected'; } ?> >2 hours</option>  
											 
											</select>
											</div>	
											 
											</div>
											</div>
									 	</div>
							 <?php } ?>
										 <?php if($resturantWorkCount['brunch_available']==1) { ?>
										 <div class="on_clmn  mart20   brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have booking for brunch?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_booking']==1) echo 'checked'; else echo ''; } ?> " onclick="updateFood(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
								 		
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_booking']==0) echo 'hidden'; else echo ''; }  else echo 'hidden'; ?>" id="food_2">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Maximum sitting time" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir "readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50"> 
											<div class="pos_rel">
												
												<select name="brunch_minimum_time" id="brunch_minimum_time"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_minimum_time']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_minimum_time']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_minimum_time']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_minimum_time']==4) echo 'selected'; } ?> >2 hours</option>  
											</select>
											</div>	
											 
											</div>
											

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Minimum time before closing" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_time_before_closing" id="brunch_time_before_closing"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_time_before_closing']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_time_before_closing']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_time_before_closing']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_time_before_closing']==4) echo 'selected'; } ?> >2 hours</option>  
											 
											</select>
											</div>	
											 
											</div>
											</div>
									 
									
									 
								 	 	</div>
										 <?php } ?>
										 <?php if($resturantWorkCount['lunch_available']==1) { ?>	 
									<div class="on_clmn  mart20   brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have booking for lunch?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_booking']==1) echo 'checked'; else echo ''; } ?>" onclick="updateFood(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
									 		 
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_booking']==0) echo 'hidden'; else echo ''; }  else echo 'hidden'; ?>" id="food_3">
								  <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Maximum sitting time" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir "readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50"> 
											<div class="pos_rel">
												
												<select name="lunch_minimum_time" id="lunch_minimum_time"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_minimum_time']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_minimum_time']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_minimum_time']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_minimum_time']==4) echo 'selected'; } ?> >2 hours</option>  
											</select>
											</div>	
											 
											</div>
											

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Minimum time before closing" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_time_before_closing" id="lunch_time_before_closing"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_time_before_closing']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_time_before_closing']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_time_before_closing']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_time_before_closing']==4) echo 'selected'; } ?> >2 hours</option>  
											 
											</select>
											</div>	
											 
											</div>
											</div>
									 
									
									 
								 	 </div>
										 <?php } ?>
										  <?php if($resturantWorkCount['dinner_available']==1) { ?>
										 <div class="on_clmn   mart20  brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have booking for dinner?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_booking']==1) echo 'checked'; else echo ''; } ?> " onclick="updateFood(4,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_booking']==0) echo 'hidden'; else echo ''; }  else echo 'hidden'; ?>" id="food_4">
								  <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Maximum sitting time" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir "readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50"> 
											<div class="pos_rel">
												
												<select name="dinner_minimum_time" id="dinner_minimum_time"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_minimum_time']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_minimum_time']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_minimum_time']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_minimum_time']==4) echo 'selected'; } ?> >2 hours</option>  
											</select>
											</div>	
											 
											</div>
											

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Minimum time before closing" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_time_before_closing" id="dinner_time_before_closing"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_time_before_closing']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_time_before_closing']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_time_before_closing']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_time_before_closing']==4) echo 'selected'; } ?> >2 hours</option>  
											 
											</select>
											</div>	
											 
											</div>
											</div>
									 
									  	
									
									  	</div>
										  <?php } ?>
										  
										 <?php if($resturantWorkCount['alcohol_available']==1) { ?>
								 	 <div class="on_clmn  mart20   brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have booking for Beverage?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($resturantWorkCount)){ if($resturantWorkCount['alcohol_booking']==1) echo 'checked'; else echo ''; } ?>" onclick="updateFood(5,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 
								 		
											 
											 
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_booking']==0) echo 'hidden'; else echo ''; }  else echo 'hidden'; ?>" id="food_5">
								  <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Maximum sitting time" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir "readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50"> 
											<div class="pos_rel">
												
												<select name="alcohol_minimum_time" id="alcohol_minimum_time"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_minimum_time']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_minimum_time']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_minimum_time']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_minimum_time']==4) echo 'selected'; } ?> >2 hours</option>  
											</select>
											</div>	
											 
											</div>
											

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Minimum time before closing" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											<div class="thr_clmn  wi_50  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="alcohol_time_before_closing" id="alcohol_time_before_closing"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<option value="1" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_time_before_closing']==1) echo 'selected'; } ?> >30 minutes</option> 
											<option value="2" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_time_before_closing']==2) echo 'selected'; } ?> >60 minutes</option> 	 
											<option value="3" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_time_before_closing']==3) echo 'selected'; } ?> >90 minutes</option>  
											<option value="4" <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_time_before_closing']==4) echo 'selected'; } ?> >2 hours</option>  
											 
											</select>
											</div>	
											 
											</div>
											</div>
									 
									  	
									
									 </div>
										 <?php } ?>
								 		
										<input type="hidden" id="food1" name="food1" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['breakfast_booking']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									  	 
										 
										 <input type="hidden" id="food2" name="food2" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['brunch_booking']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									  
										 
										 <input type="hidden" id="food3" name="food3" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['lunch_booking']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									  	
										 
										 <input type="hidden" id="food4" name="food4" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['dinner_booking']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									  
										 
										 <input type="hidden" id="food5" name="food5" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['alcohol_booking']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									  	
										 <input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
						</div>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	 						