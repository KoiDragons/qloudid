<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="../../../../../html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/stylenew.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/floatingLabel.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/constructor.css">
		 
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/responsive.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/modulesnewy_bg.css">
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
			$('#error_msg_form').html('');
		 if($('#day2').val()==1)
		 {
			 if($('#service_tax').val()==0)
			 {
				 $('#error_msg_form').html('please select total service tax');
				 return false;
			 }
		 }
		 
		 if($('#day3').val()==1)
		 {
			 if($('#total_vat').val()==0)
			 {
				 $('#error_msg_form').html('please select total VAT');
				 return false;
			 }
		 }
		 
		  if($('#day4').val()==1)
		 {
			 if($('#night_charges').val()==0)
			 {
				 $('#error_msg_form').html('please enter total night charges');
				 return false;
			 }
			 
			 if(isNaN($("#night_charges").val())) 
				{
					$("#error_msg_form").html('Night charges must be a numeric value');
					return false;
				}
		 }
		 
		 
		 if($('#day5').val()==1)
		 {
			 if($('#total_free_km').val()==0)
			 {
				 $('#error_msg_form').html('please enter total free km');
				 return false;
			 }
			 
			 if(isNaN($("#total_free_km").val())) 
				{
					$("#error_msg_form").html('Free km must be a numeric value');
					return false;
				}
				
		     if($('#per_km_fee').val()==0)
			 {
				 $('#error_msg_form').html('please enter per km fee');
				 return false;
			 }
			 
			 if(isNaN($("#per_km_fee").val())) 
				{
					$("#error_msg_form").html('Per km fee must be a numeric value');
					return false;
				}
		 }
		 
		  if($('#insurance_per_day_fee').val()==0)
			 {
				 $('#error_msg_form').html('please enter insurance fee per day');
				 return false;
			 }
			 
			 if(isNaN($("#insurance_per_day_fee").val())) 
				{
					$("#error_msg_form").html('Insurance fee per day must be a numeric value');
					return false;
				}
				
		     if($('#insurance_period_fee').val()==0)
			 {
				 $('#error_msg_form').html('please enter insurance period fee');
				 return false;
			 }
			 
			 if(isNaN($("#insurance_period_fee").val())) 
				{
					$("#error_msg_form").html('Insurance period fee must be a numeric value');
					return false;
				}
		 
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
                        <a href="../../requiredDetail/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../requiredDetail/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
				 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Car rental</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please provide booking rules for your office</a></div>
			 
					 
							
							<form action="../../updateBookingRulesDetail/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
									  <div class="container column_m      ">
								 <div class="on_clmn  mart20 brdb">
								 
									<div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If cancellation fee applicable?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['cancellation_fee_applicable']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											<div class="<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['cancellation_fee_applicable']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_1">
											 <div class="on_clmn  mart20">
											<div class="pos_rel">
												
												<select name="cancellation_fee_24_hrs" id="cancellation_fee_24_hrs"  class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  style="height: 65px !important;"> 
												<?php 
												for($i=0; $i<=100; $i=$i+5) 
												{
												?> 
											<option value="<?php echo $i; ?>" <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['cancellation_fee_24_hrs']==$i) echo 'selected'; } ?> ><?php echo $i; ?></option> 
												<?php } ?>
											 
											 
											</select>
											<label for="car_color" class="floating__label tall nobold padl10" data-content="Cancellation fee less then 24 hrs(%)">
											<span class="hidden--visually">
											 A</span></label>
											</div>	
											 
											</div>
											 <div class="on_clmn  mart20">
											<div class="pos_rel">
												
												<select name="cancellation_fee_12_hrs" id="cancellation_fee_12_hrs"  class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;"> 
												<?php 
												for($i=0; $i<=100; $i=$i+5) 
												{
												?> 
											<option value="<?php echo $i; ?>" <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['cancellation_fee_12_hrs']==$i) echo 'selected'; } ?> ><?php echo $i; ?></option> 
												<?php } ?>
											 
											 
											</select>
											<label for="car_color" class="floating__label tall nobold padl10" data-content="Cancellation fee less then 12 hrs(%)">
											<span class="hidden--visually">
											 A</span></label>
											</div>	
											 
											</div>
											
											</div>
										
									 

										</div>
								 	
									<div class="container column_m      ">
								 <div class="on_clmn  mart20 brdb">
								 
									<div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If service tax applicable?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['service_tax_applicable']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											<div class="<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['service_tax_applicable']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_2">
											 <div class="on_clmn  mart20">
											<div class="pos_rel">
												
												<select name="service_tax" id="service_tax"  class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;"> 
												<?php 
												for($i=0; $i<=100; $i++) 
												{
												?> 
											<option value="<?php echo $i; ?>" <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['service_tax']==$i) echo 'selected'; } ?> ><?php echo $i; ?></option> 
												<?php } ?>
											 
											 
											</select>
											<label for="car_color" class="floating__label tall nobold padl10" data-content="Service tax">
											<span class="hidden--visually">
											 A</span></label>
											</div>	
											 
											</div>
											 
											</div>
										
									 

										</div>
								 	
									<div class="container column_m      ">
								 <div class="on_clmn  mart20 brdb">
								 
									<div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If VAT applicable?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['vat_applicable']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(3,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											<div class="<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['vat_applicable']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_3">
											 <div class="on_clmn  mart20">
											<div class="pos_rel">
												
												<select name="total_vat" id="total_vat"  class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;"> 
												<?php 
												for($i=0; $i<=100; $i++) 
												{
												?> 
											<option value="<?php echo $i; ?>" <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['total_vat']==$i) echo 'selected'; } ?> ><?php echo $i; ?></option> 
												<?php } ?>
											 
											 
											</select>
											<label for="car_color" class="floating__label tall nobold padl10" data-content="Total VAT">
											<span class="hidden--visually">
											 A</span></label>
											</div>	
											 
											</div>
											 
											</div>
										
									 

										</div>
								 	
									
									<div class="container column_m      ">
								 <div class="on_clmn  mart20 brdb">
								 
									<div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If night charges applicable?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['night_charges_applicable']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(5,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											<div class="<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['night_charges_applicable']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_5">
											<div class="on_clmn  mart20  ">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $carRentalWorkCount['night_charges']; ?>" min="1" name="night_charges" id="night_charges" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="night_charges" class="floating__label tall nobold padl10" data-content="Night charges">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											</div>
										
									 

										</div>
								 	
									
									<div class="container column_m      ">
								 <div class="on_clmn  mart20 brdb">
								 
									<div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If there is a limit on KM per day?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['unlimited_free_km']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(6,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											<div class="<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['unlimited_free_km']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_6">
											<div class="on_clmn  mart20  ">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $carRentalWorkCount['total_free_km']; ?>" min="1" name="total_free_km" id="total_free_km" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="total_free_km" class="floating__label tall nobold padl10" data-content="Total free kms per day">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="on_clmn  mart20  ">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $carRentalWorkCount['per_km_fee']; ?>" min="1" name="per_km_fee" id="per_km_fee" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="per_km_fee" class="floating__label tall nobold padl10" data-content="Fee per KM">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>
											 
											</div>
										
									 

										</div>
										
										
											<div class="on_clmn  mart20  ">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $carRentalWorkCount['insurance_per_day_fee']; ?>" min="1" name="insurance_per_day_fee" id="insurance_per_day_fee" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="insurance_per_day_fee" class="floating__label tall nobold padl10" data-content="Insurance fee per day">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="on_clmn  mart20  ">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $carRentalWorkCount['insurance_period_fee']; ?>" min="1" name="insurance_period_fee" id="insurance_period_fee" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="insurance_period_fee" class="floating__label tall nobold padl10" data-content="Period fee for insurance">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>
								 	
									 	</div>
										
									 
								 		
										 
									  	 <input type="hidden" id="day1" name="day1" value='<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['cancellation_fee_applicable']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day2" name="day2" value='<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['service_tax_applicable']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day3" name="day3" value='<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['vat_applicable']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day4" name="day4" value='<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['deposit_fee_applicable']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day5" name="day5" value='<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['night_charges_applicable']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day6" name="day6" value='<?php if(!empty($carRentalWorkCount)){if($carRentalWorkCount['unlimited_free_km']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										  
										 
										 
										 <input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
							
							<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir">Update</button></a> </div>
					 
							
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
	 						