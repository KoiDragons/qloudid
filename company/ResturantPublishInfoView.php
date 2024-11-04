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
	   if(id==1)
	   {
		   if($("#day1").val()==0)
		   {
			   $('#dining').removeClass('hidden');
		   }
		   else
			   {
			   $('#dining').addClass('hidden');
				}
		    var send_data={};
				send_data.publish_res=$("#day1").val();
				$.ajax({
					type:"POST",
					url:"../../publishDropin/<?php echo $data['rid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
				}
				});
	   }
	   else  if(id==2)
	   {
		    var send_data={};
				send_data.publish_res=$("#day2").val();
				$.ajax({
					type:"POST",
					url:"../../publishBookTable/<?php echo $data['rid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
				}
				});
	   }
	   else  if(id==3)
	   {
		    var send_data={};
				send_data.publish_res=$("#day3").val();
				$.ajax({
					type:"POST",
					url:"../../publishMenu/<?php echo $data['rid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
				}
				});
	   }
   }
   function updateDining(id)
   {
	   var send_data={};
		send_data.publish_res=$("#dining"+id).val();
		send_data.id=id;
	 if($("#dining"+id).val()==0)
		   {
			   $("#dining"+id).val(1);
		   }
		   else
			   {
			   $("#dining"+id).val(0);
				}  

		
				$.ajax({
					type:"POST",
					url:"../../publishDiningQueue/<?php echo $data['rid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
				}
				});
   }
   function updateFood(id)
   {
	   foodValue=id;
	   dayValue=0;
	   var send_data={};
				send_data.publish_res=$("#food1").val();
				$.ajax({
					type:"POST",
					url:"../../publishResturant/<?php echo $data['rid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
				}
				});
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
                 <li><a href="../../workingInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Opening hours</a></li>
				    <li><a href="../../menuInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Menu</a></li>
					
				  <li><a href="../../roomServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" >Room service</a></li>
                 
				    <li><a href="../../photoInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Add images</a></li>
					 
                    
                  
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
											 
							<ul class="dblock marr20 padt250 padl10 fsz18 mart0">
								<li class="dblock padrb10   ">
						<a href="../../editResturantInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >About</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 	
							<li class="dblock padrb10   ">
						<a href="../../cuisineTypeInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Type</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 					
								<li class="dblock padrb10">
						<a href="../../workingInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Opening hours</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
						 					
						<li class="dblock padrb10">
						<a href="../../menuInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Menu</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>					 
						 	 <li class="dblock padrb10   ">
						<a href="../../roomServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Room service</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>	
												  
								<li class="dblock padrb10">
						<a href="../../photoInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>"  class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Add images</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>	

					 
						<li class="dblock padrb10">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >Publish</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
							 						
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
						<div class="wi_500p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xsi-padrl0 xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Publish</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please select eat and drink publish information</a></div>
					 
					 
							
							 
								
								 
								<div class="marb0 padtrl0">		 
							 
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to publish on dstrict?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_resturant']==1) echo 'checked'; else echo ''; }?>" onclick="updateFood(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
								 		
											 
											 
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_resturant']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="food_1">
										 <?php if($appdownloadStatus==1) { ?>
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_75">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Publish Drop-in" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir  " readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_dropin']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 <div class="container column_m lgtgrey2_bg   padrl20 <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_dropin']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="dining">
										<?php  foreach($resturantDiningHallList as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_75">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="<?php echo $value['dining_hall_name']; ?>" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir  " readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($value['is_published']==1) echo 'checked'; else echo ''; ?> " onclick="updateDining(<?php echo $value['id']; ?>,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<?php } ?>
										</div>
										 <?php } ?>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_75">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Publish book a table" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir " readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_book_table']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
												</div>
								 	
									  	
									
									 
								 	
									  
									  <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_75">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Publish menu" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_menu']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 </div>
								 	
								
											</div>
								 	</div>
										
										
 
										 <?php  foreach($resturantDiningHallList as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<input type="hidden" id="dining<?php echo $value['id']; ?>" name="dining<?php echo $value['id']; ?>" value='<?php echo $value['is_published']; ?>' />
														<?php } ?>
										<input type="hidden" id="food1" name="food1" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_resturant']==0) echo '0'; else echo '1'; } else echo '0'; ?>' />
									  	 <input type="hidden" id="day1" name="day1" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_dropin']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day2" name="day2" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_book_table']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day3" name="day3" value='<?php if(!empty($resturantWorkCount)){if($resturantWorkCount['publish_menu']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 
										 
										 <input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							 
						 
							
						    <div class="clear"></div>
					 
							
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
	 						