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
	<body class="white_bg">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Food and drinks</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please provide available food type and timing</a></div>
					 
					 
							
							<form action="../../../editWorkingTimeInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>/<?php echo $data['wid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you serve breakfast" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateFood(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
								 		
											 
											 
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 hidden" id="food_1">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Monday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="M" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_1">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_mon_open" id="breakfast_mon_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="breakfast_mon_close" id="breakfast_mon_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tuesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_2">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_tue_open" id="breakfast_tue_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="breakfast_tue_close" id="breakfast_tue_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 
								 	
									  
									  <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Wednesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="W" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_3">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_wed_open" id="breakfast_wed_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="breakfast_wed_close" id="breakfast_wed_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Thursday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(4,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_4">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_thu_open" id="breakfast_thu_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="breakfast_thu_close" id="breakfast_thu_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Friday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="F" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(5,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_5">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_fri_open" id="breakfast_fri_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="breakfast_fri_close" id="breakfast_fri_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
										 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Saturday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(6,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_6">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_sat_open" id="breakfast_sat_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="breakfast_sat_close" id="breakfast_sat_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Sunday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(7,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_7">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="breakfast_sun_open" id="breakfast_sun_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="breakfast_sun_close" id="breakfast_sun_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	</div>
										
										
										 <div class="on_clmn  mart20  brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you serve brunch" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateFood(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
								 		
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 hidden" id="food_2">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Monday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="M" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(11,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_11">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_mon_open" id="brunch_mon_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="brunch_mon_close" id="brunch_mon_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tuesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(12,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_12">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_tue_open" id="brunch_tue_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="brunch_tue_close" id="brunch_tue_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 
								 	
									  
									  <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Wednesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="W" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(13,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_13">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_wed_open" id="brunch_wed_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="brunch_wed_close" id="brunch_wed_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Thursday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(14,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_14">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_thu_open" id="brunch_thu_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="brunch_thu_close" id="brunch_thu_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Friday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="F" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(15,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_15">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_fri_open" id="brunch_fri_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="brunch_fri_close" id="brunch_fri_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
										 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Saturday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(16,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_16">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_sat_open" id="brunch_sat_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="brunch_sat_close" id="brunch_sat_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Sunday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(17,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_17">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="brunch_sun_open" id="brunch_sun_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="brunch_sun_close" id="brunch_sun_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	</div>
										
											 
									<div class="on_clmn  mart20  brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you serve lunch" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateFood(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
									 		 
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 hidden" id="food_3">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Monday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="M" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(21,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_21">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_mon_open" id="lunch_mon_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_mon_close" id="lunch_mon_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tuesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(22,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_22">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_tue_open" id="lunch_tue_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_tue_close" id="lunch_tue_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 
								 	
									  
									  <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Wednesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="W" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(23,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_23">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_wed_open" id="lunch_wed_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_wed_close" id="lunch_wed_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Thursday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(24,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_24">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_thu_open" id="lunch_thu_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_thu_close" id="lunch_thu_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Friday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="F" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(25,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_25">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_fri_open" id="lunch_fri_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_fri_close" id="lunch_fri_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
										 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Saturday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(26,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_26">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_sat_open" id="lunch_sat_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_sat_close" id="lunch_sat_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Sunday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(27,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_27">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_sun_open" id="lunch_sun_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_sun_close" id="lunch_sun_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	</div>
										
										 <div class="on_clmn   mart20 brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you serve dinner" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateFood(4,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 hidden" id="food_4">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Monday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="M" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(31,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_31">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_mon_open" id="dinner_mon_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="dinner_mon_close" id="dinner_mon_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tuesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(32,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_32">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_tue_open" id="dinner_tue_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="dinner_tue_close" id="dinner_tue_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 
								 	
									  
									  <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Wednesday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="W" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(33,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_33">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_wed_open" id="dinner_wed_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="dinner_wed_close" id="dinner_wed_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Thursday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(34,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_34">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_thu_open" id="dinner_thu_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="dinner_thu_close" id="dinner_thu_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Friday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="F" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(35,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_35">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_fri_open" id="dinner_fri_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="dinner_fri_close" id="dinner_fri_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
										 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Saturday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(36,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_36">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_sat_open" id="dinner_sat_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="dinner_sat_close" id="dinner_sat_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Sunday" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateDayopen(37,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="hidden" id="day_37">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="dinner_sun_open" id="dinner_sun_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="dinner_sun_close" id="dinner_sun_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  xxs-minhei_60p minhei_65p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<option value="00:00">00:00</option> 
											<option value="00:30">00:30</option> 
											<option value="01:00">01:00</option> 
											<option value="01:30">01:30</option> 
											<option value="02:00">02:00</option> 
											<option value="02:30">02:30</option>
											<option value="03:00">03:00</option> 
											<option value="03:30">03:30</option> 
											<option value="04:00">04:00</option>
											<option value="04:30">04:30</option> 
											<option value="05:00">05:00</option> 
											<option value="05:30">05:30</option> 
											<option value="06:00">06:00</option> 
											<option value="06:30">06:30</option> 
											<option value="07:00">07:00</option> 
											<option value="07:30">07:30</option> 
											<option value="08:00">08:00</option> 
											<option value="08:30">08:30</option> 
											<option value="09:00">09:00</option> 
											<option value="09:30">09:30</option> 
											<option value="10:00">10:00</option> 
											<option value="10:30">10:30</option> 
											<option value="11:00">11:00</option> 
											<option value="11:30">11:30</option> 
											<option value="12:00">12:00</option>
											<option value="12:30">12:30</option> 
											<option value="13:00">13:00</option> 
											<option value="13:30">13:30</option> 
											<option value="14:00">14:00</option> 
											<option value="14:30">14:30</option> 
											<option value="15:00">15:00</option> 
											<option value="15:30">15:30</option>
											<option value="16:00">16:00</option> 
											<option value="16:30">16:30</option> 
											<option value="17:00">17:00</option>
											<option value="17:30">17:30</option> 
											<option value="18:00">18:00</option> 
											<option value="18:30">18:30</option> 
											<option value="19:00">19:00</option> 
											<option value="19:30">19:30</option> 
											<option value="20:00">20:00</option> 
											<option value="20:30">20:30</option> 
											<option value="21:00">21:00</option> 
											<option value="21:30">21:30</option> 
											<option value="22:00">22:00</option> 
											<option value="22:30">22:30</option> 
											<option value="23:00">23:00</option> 
											<option value="23:30">23:30</option> 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	</div>
										
								 	
										<input type="hidden" id="food1" name="food1" value='0' />
									  	 <input type="hidden" id="day1" name="day1" value='0' />
										 <input type="hidden" id="day2" name="day2" value='0' />
										 <input type="hidden" id="day3" name="day3" value='0' />
										 <input type="hidden" id="day4" name="day4" value='0' />
										 <input type="hidden" id="day5" name="day5" value='0' />
										 <input type="hidden" id="day6" name="day6" value='0' />
										 <input type="hidden" id="day7" name="day7" value='0' />
										 
										 <input type="hidden" id="food2" name="food2" value='0' />
									  	 <input type="hidden" id="day11" name="day11" value='0' />
										 <input type="hidden" id="day12" name="day12" value='0' />
										 <input type="hidden" id="day13" name="day13" value='0' />
										 <input type="hidden" id="day14" name="day14" value='0' />
										 <input type="hidden" id="day15" name="day15" value='0' />
										 <input type="hidden" id="day16" name="day16" value='0' />
										 <input type="hidden" id="day17" name="day17" value='0' />
										 
										 <input type="hidden" id="food3" name="food3" value='0' />
									  	 <input type="hidden" id="day21" name="day21" value='0' />
										 <input type="hidden" id="day22" name="day22" value='0' />
										 <input type="hidden" id="day23" name="day23" value='0' />
										 <input type="hidden" id="day24" name="day24" value='0' />
										 <input type="hidden" id="day25" name="day25" value='0' />
										 <input type="hidden" id="day26" name="day26" value='0' />
										 <input type="hidden" id="day27" name="day27" value='0' />
										 
										 <input type="hidden" id="food4" name="food4" value='0' />
									  	 <input type="hidden" id="day31" name="day31" value='0' />
										 <input type="hidden" id="day32" name="day32" value='0' />
										 <input type="hidden" id="day33" name="day33" value='0' />
										 <input type="hidden" id="day34" name="day34" value='0' />
										 <input type="hidden" id="day35" name="day35" value='0' />
										 <input type="hidden" id="day36" name="day36" value='0' />
										 <input type="hidden" id="day37" name="day37" value='0' />
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
	 						