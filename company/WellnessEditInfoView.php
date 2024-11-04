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
	 
   }
		function submitform()
		{
			
			$("#errorMsg1").html('');
			 
			if($("#center_type").val()==0)
			{
				
				$("#errorMsg1").html('Please select type');
				return false;
			}
			if($("#p_id").val()==0)
			{
				
				$("#errorMsg1").html('Please select location');
				return false;
			}
			 if($("#center_name").val()==null || $("#center_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter spa or fitness center name');
				return false;
			}
			
			document.getElementById('save_indexing').submit();
			}
		
		  
				
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../categories/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../categories/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
					
				<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								 
								<ul class="dblock marr20 padt250 padl10 fsz18">
								
											<li class="dblock padrb10 first">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space"> About</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
												<li class="dblock padrb10 padt5  ">
						<a href="../../categories/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Categories </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>  
									<li class="dblock padrb10">
						<a href="../../healthServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>"   class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Wellness request</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>		
											<li class="dblock padrb10">
						<a href="../../../BussinessImages/displayInformation/<?php echo $data['wid']; ?>/bi9rQnJTT2VZNmwwNVVBTWkvbzA5Zz09" target="_blank" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Add images</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_500p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xsi-padrl20 xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Wellness</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20 ffamily_avenir" >Add your Spa & Fitness places</a></div>
					 
					 
							
							<form action="../../editWellnessInfo/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											<div class="on_clmn   mart10 ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Type of wellness center" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
											 
											<div class="on_clmn mart0 ">
											 
											<div class="pos_rel">
												
												<select name="center_type" id="center_type"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 <option value="0">Select type</option> 
													 
														
														<option value="1" class="lgtgrey2_bg" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['center_type']==1) echo 'selected'; } ?>>Spa</option>
														<option value="2" class="lgtgrey2_bg" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['center_type']==2) echo 'selected'; } ?>>Fitness</option>
														 <option value="3" class="lgtgrey2_bg" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['center_type']==3) echo 'selected'; } ?>>Hair</option>
														<option value="4" class="lgtgrey2_bg" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['center_type']==4) echo 'selected'; } ?>>Barber</option>
														<option value="5" class="lgtgrey2_bg" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['center_type']==5) echo 'selected'; } ?>>Nails</option>
													 
											</select>
												
											</div>
										 
											 
										</div>
										
									<div class="on_clmn   mart20 ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Location" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>	
										
										
									 <div class="on_clmn mart0 ">
											 
											<div class="pos_rel">
												
												<select name="p_id" id="p_id"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 <option value="0">Select location</option> 
													<?php  foreach($locationDetail as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['property_id']==$value['id']) echo 'selected'; } ?>><?php echo $value['visiting_address']; ?></option>
													<?php 	}	?>
											</select>
												
											 
											</div>
										</div>
										
									
											<div class="on_clmn   mart20 ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Wellness name" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
											 
											
											 <div class="on_clmn mart0  ">
											 
											<div class="pos_rel">
												
												<input type="text" name="center_name" id="center_name" placeholder="Name" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(!empty($wellnessDetailInfo)){echo $wellnessDetailInfo['center_name']; } ?>"/> 
												
											 
											</div>
											 
											</div>
											
											
											<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Opening hrs" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 <div class="container column_m lgtgrey2_bg mart10 padrl20">
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Monday" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<input type="text" value="M" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['mon_open']==1) echo 'checked'; } ?>" onclick="updateDayopen(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['mon_open']==1) echo ''; else echo 'hidden'; } ?>" id="day_1">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="m_open" id="m_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p trans_bg   black_txt tall padl0 ffamily_avenir"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['mon_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="m_close" id="m_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['mon_close_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tuesday" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['tue_open']==1) echo 'checked'; } ?>" onclick="updateDayopen(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['tue_open']==1) echo ''; else echo 'hidden'; } ?>" id="day_2">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="tue_open" id="tue_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['tue_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="tue_close" id="tue_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['tue_close_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 
								 	
									  
									  <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Wednesday" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<input type="text" value="W" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['wed_open']==1) echo 'checked'; } ?> " onclick="updateDayopen(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['wed_open']==1) echo ''; else echo 'hidden'; } ?>" id="day_3">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="wed_open" id="wed_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['wed_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="wed_close" id="wed_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['wed_close_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Thursday" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<input type="text" value="T" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['thu_open']==1) echo 'checked'; } ?>" onclick="updateDayopen(4,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['thu_open']==1) echo ''; else echo 'hidden'; } ?>" id="day_4">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="thu_open" id="thu_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['thu_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											  
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="thu_close" id="thu_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['thu_close_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Friday" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<input type="text" value="F" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['fri_open']==1) echo 'checked'; } ?> " onclick="updateDayopen(5,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['fri_open']==1) echo ''; else echo 'hidden'; } ?>" id="day_5">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="fri_open" id="fri_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['fri_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?> 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="fri_close" id="fri_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['fri_close_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
										 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Saturday" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sat_open']==1) echo 'checked'; } ?>" onclick="updateDayopen(6,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sat_open']==1) echo ''; else echo 'hidden'; } ?>" id="day_6">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="sat_open" id="sat_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sat_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="sat_close" id="sat_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sat_close_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Sunday" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<input type="text" value="S" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sun_open']==1) echo 'checked'; } ?>" onclick="updateDayopen(7,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sun_open']==1) echo ''; else echo 'hidden'; } ?>" id="day_7">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="sun_open" id="sun_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sun_open_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="sun_close" id="sun_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($wellnessDetailInfo)){if($wellnessDetailInfo['sun_close_time']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	</div>
									  	 <input type="hidden" id="day1" name="day1" value='<?php if(!empty($wellnessDetailInfo)){ echo $wellnessDetailInfo['mon_open']; } ?>' />
										 <input type="hidden" id="day2" name="day2" value='<?php if(!empty($wellnessDetailInfo)){ echo $wellnessDetailInfo['tue_open']; } ?>' />
										 <input type="hidden" id="day3" name="day3" value='<?php if(!empty($wellnessDetailInfo)){ echo $wellnessDetailInfo['wed_open']; } ?>' />
										 <input type="hidden" id="day4" name="day4" value='<?php if(!empty($wellnessDetailInfo)){ echo $wellnessDetailInfo['thu_open']; } ?>' />
										 <input type="hidden" id="day5" name="day5" value='<?php if(!empty($wellnessDetailInfo)){ echo $wellnessDetailInfo['fri_open']; } ?>' />
										 <input type="hidden" id="day6" name="day6" value='<?php if(!empty($wellnessDetailInfo)){ echo $wellnessDetailInfo['sat_open']; } ?>' />
										 <input type="hidden" id="day7" name="day7" value='<?php if(!empty($wellnessDetailInfo)){ echo $wellnessDetailInfo['sun_open']; } ?>' />
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
	 						