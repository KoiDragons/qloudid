<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Qmatchup</title>
	<!--<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
	 
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		<script>
		
		 function updateHourlyInfo() 
		 {
			hourlyFeeApp=1;		 
		 }
		 
		 function updateFullDayInfo()
		 {
			fulldayFeeUpdate=1; 
		 }
		function updateCleaning()
		{
		cleaningFeeApp=1;	
		}
		function updateHalfDayInfo()
		{
			halfDayOpen=1;
		}
		function updateReservation()
		{
			reservationFeeApp=1;
		}
		function submitform()
		{
			 
			$("#errorMsg1").html('');
			if($("#half_day_booking_available").val()==1)
			{
			if($("#pre_lunch_price").val()==null || $("#pre_lunch_price").val()=="" || $("#pre_lunch_price").val()==0)
			{
				
				$("#errorMsg1").html('Please enter half day price');
				return false;
			}
			
			 
			if(isNaN($("#pre_lunch_price").val()))
			{
				
				$("#errorMsg1").html('Half day price price must be a numeric value');
				return false;
			}
			
			if($("#post_lunch_price").val()==null || $("#post_lunch_price").val()=="" || $("#post_lunch_price").val()==0)
			{
				
				$("#errorMsg1").html('Please enter Half day price post lunch');
				return false;
			}
			
			 
			if(isNaN($("#post_lunch_price").val()))
			{
				
				$("#errorMsg1").html('Half day price post lunch must be a numeric value');
				return false;
			}	
			}
			
			if($("#full_day_booking_available").val()==1)
			{
			if($("#full_day_price").val()==null || $("#full_day_price").val()=="")
			{
				
				$("#errorMsg1").html('Please enter full day price');
				return false;
			}
			
			if($("#full_day_price").val()==0)
			{
				
				$("#errorMsg1").html('Full day price cant be 0');
				return false;
			}
			
			if(isNaN($("#full_day_price").val()))
			{
				
				$("#errorMsg1").html('Full day price must be a numeric value');
				return false;
			}
			}
			
			
			if($("#hourly_booking_available").val()==1)
			{
			if($("#hourly_price").val()==null || $("#hourly_price").val()=="")
			{
				
				$("#errorMsg1").html('Please enter hourly price');
				return false;
			}
			
			if($("#hourly_price").val()==0)
			{
				
				$("#errorMsg1").html('Hourly price cant be 0');
				return false;
			}
			
			if(isNaN($("#hourly_price").val()))
			{
				
				$("#errorMsg1").html('Hourly price must be a numeric value');
				return false;
			}
			}
			
			
			if($("#minimum_price").val()==null || $("#minimum_price").val()=="")
			{
				
				$("#errorMsg1").html('Please enter minimum price');
				return false;
			}
			
			if($("#minimum_price").val()==0)
			{
				
				$("#errorMsg1").html('Minimum price cant be 0');
				return false;
			}
			
			if(isNaN($("#minimum_price").val()))
			{
				
				$("#errorMsg1").html('Minimum price must be a numeric value');
				return false;
			}
			if($("#reservation_fee_applicable").val()==1)
			{
			 if($("#reservation_deposit").val()==null || $("#reservation_deposit").val()=="" || $("#reservation_deposit").val()==0)
			{
				
				$("#errorMsg1").html('Please enter reservation deposit');
				return false;
			}
			
			 
			
			if(isNaN($("#reservation_deposit").val()))
			{
				
				$("#errorMsg1").html('Reservation deposit must be a numeric value');
				return false;
			}	
			}
			
			if($("#cleaning_fee_applicable").val()==1)
			{
			if($("#cleaning_fee").val()==null || $("#cleaning_fee").val()=="" || $("#cleaning_fee").val()==0)
			{
				
				$("#errorMsg1").html('Please enter cleaning fee');
				return false;
			}
			
			
			if(isNaN($("#cleaning_fee").val()))
			{
				
				$("#errorMsg1").html('Cleaning fee must be a numeric value');
				return false;
			}
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
                        <a href="../../completeVenueInformation/<?php echo $data['cid']; ?>/<?php echo $data['vid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../completeVenueInformation/<?php echo $data['cid']; ?>/<?php echo $data['vid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Pricing</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Update pricing of venue  </a></div>
					 
					 
							
							<form action="../../updateVenueBookingPricing/<?php echo $data['cid']; ?>/<?php echo $data['vid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 <input type="hidden" id="half_day_booking_available" name="half_day_booking_available" value="<?php echo $venueInformationDetail['half_day_booking_available']; ?>" />
								<div class="marb0 padtrl0">		 
							 <div class="on_clmn  brdb">
							 <div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Half day booking available?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
							 <div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['half_day_booking_available']==1) echo 'checked'; else echo ''; } ?> " onclick="updateHalfDayInfo();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											<div class="<?php if(!empty($venueInformationDetail)){if($venueInformationDetail['half_day_booking_available']==1) echo ''; else echo 'hidden'; } ?>" id="halfDayBooking">
									 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="pre_lunch_price" id="pre_lunch_price"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=0 value="<?php echo $venueInformationDetail['pre_lunch_price']; ?>" /> 
												<label for="pre_lunch_price" class="floating__label tall nobold" data-content="Pre lunch price" >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div>
							 
							  <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="post_lunch_price" id="post_lunch_price"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=0 value="<?php echo $venueInformationDetail['post_lunch_price']; ?>" /> 
												<label for="post_lunch_price" class="floating__label tall nobold" data-content="Post lunch price" >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div>
										
										</div>
									
									<input type="hidden" id="full_day_booking_available" name="full_day_booking_available" value="<?php echo $venueInformationDetail['full_day_booking_available']; ?>" />
									<div class="on_clmn  brdb">
							 <div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Full day booking available?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
							 <div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['full_day_booking_available']==1) echo 'checked'; else echo ''; } ?> " onclick="updateFullDayInfo();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											
										 <div class="on_clmn mart20 <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['full_day_booking_available']==1) echo ''; else echo 'hidden'; } ?>" id="fullDay">
										 
											<div class="pos_rel">
												
												<input type="number" name="full_day_price" id="full_day_price"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=0 value="<?php echo $venueInformationDetail['full_day_price']; ?>" /> 
												<label for="full_day_price" class="floating__label tall nobold" data-content="Rent per day " >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div>
										
										<input type="hidden" id="hourly_booking_available" name="hourly_booking_available" value="<?php echo $venueInformationDetail['hourly_booking_available']; ?>" />
										
											<div class="on_clmn  brdb">
							 <div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Hourly booking available?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
							 <div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['hourly_booking_available']==1) echo 'checked'; else echo ''; } ?> " onclick="updateHourlyInfo();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
											
										 <div class="on_clmn mart20 <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['hourly_booking_available']==1) echo ''; else echo 'hidden'; } ?>" id="hourlyPrice">
										 
											<div class="pos_rel">
												
												<input type="number" name="hourly_price" id="hourly_price"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=0 value="<?php echo $venueInformationDetail['hourly_price']; ?>" /> 
												<label for="hourly_price" class="floating__label tall nobold" data-content="Hourly price " >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div>
										 
										 
										 <div class="on_clmn  brdb">
							 <div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Night booking is <?php if($venueWorkingInformationDetail['night_booking_available']==0) echo 'not'; ?> available." class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										 
									</div>
									</div>
										 
											</div>
										 
											 <div class="on_clmn mart20 <?php if($venueWorkingInformationDetail['night_booking_available']==0) echo 'hidden'; ?>">
										 
											<div class="pos_rel">
												
												<input type="number" name="nightly_price" id="nightly_price"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=200 value="<?php echo $venueInformationDetail['nightly_price']; ?>" /> 
												<label for="nightly_price" class="floating__label tall nobold" data-content="Rent per night " >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div>

										
										  <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="minimum_price" id="minimum_price"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=200 value="<?php echo $venueInformationDetail['minimum_price']; ?>" /> 
												<label for="minimum_price" class="floating__label tall nobold" data-content="Minimum spend " >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div> 
											 
											 <input type="hidden" id="reservation_fee_applicable" name="reservation_fee_applicable" value="<?php echo $venueInformationDetail['reservation_fee_applicable']; ?>" />
										  <div class="on_clmn  brdb">
										  <div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Reservation fee applicable?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
							 <div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['reservation_fee_applicable']==1) echo 'checked'; else echo ''; } ?> " onclick="updateReservation();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
										 
										 
										  <div class="on_clmn mart20 <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['reservation_fee_applicable']==1) echo ''; else echo 'hidden'; } ?>" id="reservationFee">
										 
											<div class="pos_rel">
												
												<input type="number" name="reservation_deposit" id="reservation_deposit"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=0  value="<?php echo $venueInformationDetail['reservation_deposit']; ?>" /> 
												<label for="reservation_deposit" class="floating__label tall nobold" data-content="Deposit fee" >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div> 
										 
										  <div class="on_clmn  brdb">
										  <div class="thr_clmn  wi_70">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Cleaning fee applicable?" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
							 <div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['cleaning_fee_applicable']==1) echo 'checked'; else echo ''; } ?> " onclick="updateCleaning();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											</div>
										 
										 
										  <div class="on_clmn mart20 <?php if(!empty($venueInformationDetail)){if($venueInformationDetail['cleaning_fee_applicable']==1) echo ''; else echo 'hidden'; } ?>" id="cleaningFee">
										 
											<div class="pos_rel">
												
												<input type="number" name="cleaning_fee" id="cleaning_fee"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=0  value="<?php echo $venueInformationDetail['cleaning_fee']; ?>" /> 
												<label for="cleaning_fee" class="floating__label tall nobold" data-content="Cleaning fee" >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div>  
										
										 
										 
										 
									 
										
									  <input type="hidden" id="cleaning_fee_applicable" name="cleaning_fee_applicable" value="<?php echo $venueInformationDetail['cleaning_fee_applicable']; ?>" />
									  <div class="clear"></div>
								<div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								    <div class="clear"></div>
									
									<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword hei_55p fsz18  t_67cff7_bg ffamily_avenir" onclick="submitform();">Update</button>
								
							</div>
					 
							</form>
							
						 
							
						
							
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	<script>
				var tinyMCE_options = {
					selector: '.texteditor',
					plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
					toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
					//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
					//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
					menubar: false,
					max_chars : "25000",
					toolbar_items_size: 'small',
					style_formats: [
					{
						title: 'Bold text',
						inline: 'b'
					},
					{
						title: 'Red text',
						inline: 'span',
						styles:
						{
							color: '#ff0000'
						}
					},
					{
						title: 'Red header',
						block: 'h1',
						styles:
						{
							color: '#ff0000'
						}
					},
					{
						title: 'Example 1',
						inline: 'span',
						classes: 'example1'
					},
					{
						title: 'Example 2',
						inline: 'span',
						classes: 'example2'
					},
					{
						title: 'Table styles'
					},
					{
						title: 'Table row 1',
						selector: 'tr',
						classes: 'tablerow1'
					}],
					templates: [
					{
						title: 'Test template 1',
						content: 'Test 1'
					},
					{
						title: 'Test template 2',
						content: 'Test 2'
					}]
				}
				tinyMCE.init(tinyMCE_options);
				
		  
		
	  
				
			</script>
			
	
	</body>
	 						