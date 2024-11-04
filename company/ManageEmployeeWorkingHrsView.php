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
   function updateWorkingOpen(id,link)
   {
	   workEmp=1;
	   dayValueId=id;
	   lunchTime=0;
	   /*if($('#working_day_'+id).val()==0)
	   {
		   $('#working_day_'+id).val(1);
		   $("#day_"+id).removeClass('hidden');
		   $("#lunchTimeInfo_"+id).removeClass('hidden');
		    
	   }
	   else
		   {
		   
		   $('#lunch_time_'+id).val(0);
		   $('#working_day_'+id).val(0);
		   $("#day_"+id).addClass('hidden');
		   $("#lunchTimeInfo_"+id).addClass('hidden');
		   $('#work_start_time_'+id).val(1);
		   $('#work_end_time_'+id).val(1);
		   $('#lunch_start_time_'+id).val(1);
		   $('#lunch_end_time_'+id).val(1);
		   $('week_'+id).addClass('checked');
		   $("#lunch_"+id).addClass('hidden');
		   
	   }*/
   }
   
   
   function updateLunchTime(id,link)
   {
	   workEmp=0;
	   lunchTime=1;
	   dayValueId=id;
	   /*if($('#lunch_time_'+id).val()==0)
	   {
		   $('#lunch_time_'+id).val(1);
		    $("#lunch_"+id).removeClass('hidden');
		   
	   }
	   else
		   {
		   $('#lunch_time_'+id).val(0);
			$('#lunch_start_time_'+id).val(1);
		   $('#lunch_end_time_'+id).val(1);
		   $('week_'+id).addClass('checked');
		   $("#lunch_"+id).addClass('hidden');
	   }*/
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
                        <a href="../../magazineAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="fright xs-dnone padtbz10 sm-dnone <?php if($countWorkingTimeInfo==0) echo 'hidden'; ?>">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="../../serviceAccount/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" class=" diblock padrl0  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir">Update services<i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
								</a>
							</div>
							
							
							
						</ul>
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
									<a href="../../magazineAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
				 <div class="visible-xs visible-sm fright marr0 padt5 <?php if($countWorkingTimeInfo==0) echo 'hidden'; ?>"> <a href="../../serviceAccount/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" class=" diblock padl7 padr7 brdrad3 fsz30  "><i class="fas fa-plus " aria-hidden="true" style="color: #d9e7f0;"></i></a> </div> 
					
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
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space">Working hrs</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
											<li class="dblock padrb10 padt5 <?php if($countWorkingTimeInfo==0) echo 'hidden'; ?>">
											<a href="../../serviceAccount/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Services </span> 
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
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Working hrs</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Update working hrs for the employee</a></div>
					 
					 
							
							<form action="../../updateWorkingTimeInfo/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
									 
								 		
											 
											 
										 <div class="container column_m lgtgrey2_bg   padrl20 ">
										 <?php foreach($employeeWorkDetail  as $category => $value) { ?>
								 <div class="on_clmn  lgtgrey2_bg brdt">
								 
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="<?php echo $value['day_name']; ?>" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="<?php echo substr($value['day_name'],0,1); ?>" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   <?php if($value['working_day']==1) echo 'checked'; else echo '';  ?> " onclick="updateWorkingOpen(<?php echo $value['day_id']; ?>,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if($value['working_day']==0) echo 'hidden'; else echo ''; ?>" id="day_<?php echo $value['day_id']; ?>">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="work_start_time_<?php echo $value['day_id']; ?>" id="work_start_time_<?php echo $value['day_id']; ?>"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value['work_start_time']==$value1['id']) echo 'selected'; ?> ><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="work_end_time_<?php echo $value['day_id']; ?>" id="work_end_time_<?php echo $value['day_id']; ?>"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value['work_end_time']==$value1['id']) echo 'selected';  ?>><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
										
								 <div class="on_clmn  lgtgrey2_bg <?php if($value['working_day']==0) echo 'hidden'; else echo '';  ?>" id="lunchTimeInfo_<?php echo $value['day_id']; ?>">
								 
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Lunch" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="L" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  week_<?php echo $value['day_id']; ?> <?php if($value['lunch_time']==1) echo 'checked'; else echo '';  ?> " onclick="updateLunchTime(<?php echo $value['day_id']; ?>,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if($value['lunch_time']==0) echo 'hidden'; else echo ''; ?>" id="lunch_<?php echo $value['day_id']; ?>">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="lunch_start_time_<?php echo $value['day_id']; ?>" id="lunch_start_time_<?php echo $value['day_id']; ?>"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value['lunch_start_time']==$value1['id']) echo 'selected'; ?> ><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="lunch_end_time_<?php echo $value['day_id']; ?>" id="lunch_end_time_<?php echo $value['day_id']; ?>"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value['lunch_end_time']==$value1['id']) echo 'selected';  ?>><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
										
											
										
										 <input type="hidden" id="working_day_<?php echo $value['day_id']; ?>" name="working_day_<?php echo $value['day_id']; ?>" value="<?php echo $value['working_day']; ?>" />
										 <input type="hidden" id="lunch_time_<?php echo $value['day_id']; ?>" name="lunch_time_<?php echo $value['day_id']; ?>" value="<?php echo $value['lunch_time']; ?>" />
										 <?php } ?>
									  	</div>
										
										
										 
											 
								 	
										 
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
	 						