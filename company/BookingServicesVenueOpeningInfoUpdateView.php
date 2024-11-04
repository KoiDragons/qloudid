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
                        <a href="../../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
				 
										
                  <li><a href="../../editResturantInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">About</a></li>
				  <li><a href="../../cuisineTypeInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" >Type</a></li>
                  
				    <li><a href="../../menuInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Menu</a></li>
					
				  <li><a href="../../roomServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" >Room service</a></li>
                 
				    <li><a href="../../../BussinessImages/displayInformation/<?php echo $data['rid']; ?>/cXZGMGwveWlTUUI4VDI5MFpNaEZrUT09">Add images</a></li>
					 
					 <li><a href="../../publishInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Publish</a></li>
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
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl0 xs-padrl15 xsi-padrl134">
					
					 
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >OPEN</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Set opening hours for <?php echo $venueInformationDetail['venue_name']; ?></a></div>
					 
					 
							
							<form action="../../editWorkingTimeInfo/<?php echo $data['cid']; ?>/<?php echo $data['venue_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Update opening hrs for the venue" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
								 		
											 
											 
										 <div class="container column_m lgtgrey2_bg   padrl20 " id="food_1">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Monday" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="M" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['mon_open']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['mon_open']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_1">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="mon_open" id="mon_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['mon_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="mon_close" id="mon_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['mon_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tuesday" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['tue_open']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['tue_open']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_2">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="tue_open" id="tue_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['tue_open_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="tue_close" id="tue_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['tue_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 
								 	
									  
									  <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Wednesday" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="W" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['wed_open']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['wed_open']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_3">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="wed_open" id="wed_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['wed_open_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="wed_close" id="wed_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['wed_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Thursday" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['thu_open']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(4,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['thu_open']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_4">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="thu_open" id="thu_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['thu_open_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="thu_close" id="thu_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['thu_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Friday" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="F" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['fri_open']==1) echo 'checked'; else echo ''; } ?>" onclick="updateDayopen(5,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['fri_open']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_5">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="fri_open" id="fri_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['fri_open_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="fri_close" id="fri_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['fri_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
										 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Saturday" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sat_open']==1) echo 'checked'; else echo ''; } ?>" onclick="updateDayopen(6,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sat_open']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_6">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="sat_open" id="sat_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sat_open_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="sat_close" id="sat_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sat_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Sunday" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sun_open']==1) echo 'checked'; else echo ''; } ?>" onclick="updateDayopen(7,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sun_open']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_7">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="sun_open" id="sun_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sun_open_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="sun_close" id="sun_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sun_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	</div>
										
										
										 <div class="on_clmn  mart20   brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have booking for night timings?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['night_booking_available']==1) echo 'checked'; else echo ''; } ?> " onclick="updateFood(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
								 		
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['night_booking_available']==0) echo 'hidden'; else echo ''; }  else echo 'hidden'; ?>" id="food_2">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_40">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Night timings" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="Timings" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										 
											<div class=" " id="day_11">
											<div class="thr_clmn  wi_30  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="night_time_start" id="night_time_start"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
										<?php 
												foreach($workingHrs as $category => $value) 
												{
													if($value['id']<39) { continue; }
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['night_time_start']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_30  "> 
											<div class="pos_rel">
												
												<select name="night_time_close" id="night_time_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
													
													if($value['id']>17) { continue; }
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['night_time_close']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 </div>
										
											 
									<div class="on_clmn  mart20   brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have lunch lunch break?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['lunch_available']==1) echo 'checked'; else echo ''; } ?>" onclick="updateFood(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
									 		 
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['lunch_available']==0) echo 'hidden'; else echo ''; }  else echo 'hidden'; ?>" id="food_3">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_40">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Lunch timings" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="Timings" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										 
											<div class="" id="day_21">
											<div class="thr_clmn  wi_30  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_start_time" id="lunch_start_time"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
													if($value['id']<25 || $value['id']>33) { continue; }
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['lunch_start_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_30  "> 
											<div class="pos_rel">
												
												<select name="lunch_close_time" id="lunch_close_time"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
													if($value['id']<26 || $value['id']>35) { continue; }
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['lunch_close_time']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 </div>
										 
								 		
										 
									  	 <input type="hidden" id="day1" name="day1" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['mon_open']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day2" name="day2" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['tue_open']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day3" name="day3" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['wed_open']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day4" name="day4" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['thu_open']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day5" name="day5" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['fri_open']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day6" name="day6" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sat_open']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day7" name="day7" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['sun_open']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 
										 <input type="hidden" id="food2" name="food2" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['night_booking_available']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									   
										 
										 <input type="hidden" id="food3" name="food3" value='<?php if(!empty($venueWorkingInformationDetail)){if($venueWorkingInformationDetail['lunch_available']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									  	
										  
										 
										 
										 <input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Update" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	 						