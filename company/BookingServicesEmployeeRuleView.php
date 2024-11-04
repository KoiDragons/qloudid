
<!doctype html>
<html class="home">
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
	function updateBookingRequest()
	{
		moreBookingOnRequest=1;
	}
	function updateDeletion() 
	{
		bookingDeletion=1;
	}
	
	function updateOwnBooking() 
	{
		bookingYOurself=1;
	}
	 function submitform()
	 {
		 $("#errorMsg1").html('');
	 if($('#booking_over_a_period').val()=='' || $('#booking_over_a_period').val()==null)
	 {
		$("#errorMsg1").html('Please enter value for max booking over a time'); 
		return false;
	 }
	  if($('#minimum_booking_period_time').val()=='' || $('#minimum_booking_period_time').val()==null)
	 {
		$("#errorMsg1").html('Please enter value for minimum time on max booking over a time'); 
		return false;
	 }
	 document.getElementById('save_indexing').submit();
	 }
	</script>
</head>

	<body>
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../employeeList/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../employeeList/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
				 
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					 
							<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir">Rules</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please update booking rules for selected employee</a></div>
							<form action="../../updateBookingRulesInfo/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							   <div class="on_clmn   mart10  ">
											<div class="pos_rel  ">
									
										<input type="text" value=" Cancellation policy" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="cancellation_policy" id="cancellation_policy" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											<option value="0" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==0) echo 'selected'; ?> >0</option>
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==1) echo 'selected'; ?>>1</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==2) echo 'selected'; ?>>2</option>
											<option value="3" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==3) echo 'selected'; ?>>3</option>
											<option value="4" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==4) echo 'selected'; ?>>4</option>
											<option value="5" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==5) echo 'selected'; ?>>5</option>
											<option value="6" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==6) echo 'selected'; ?>>6</option>
											<option value="7" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==7) echo 'selected'; ?>>7</option>
											<option value="8" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==8) echo 'selected'; ?>>8</option>
											<option value="9" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==9) echo 'selected'; ?>>9</option>
											<option value="10" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==10) echo 'selected'; ?>>10</option>
											<option value="11" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy']==11) echo 'selected'; ?>>11</option>		 
											</select>
												
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="cancellation_policy_period" id="cancellation_policy_period" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												
											</div>
										 </div>
											 
											 
										</div>
					 
									 <div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do not allow deletion of already delivered or ongoing bookings" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($bookingRulesInfo['delete_of_ongoing_booking']==0) echo ''; else echo 'checked'; ?>" onclick="updateDeletion();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
					 
					  <input type="hidden" id="delete_of_ongoing_booking" name="delete_of_ongoing_booking" value="<?php if($bookingRulesInfo['delete_of_ongoing_booking']==0) echo '0'; else echo '1'; ?>" />
					 
									 <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="Limit the number of future bookings a booking can make " class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<select name="number_of_future_booking" id="number_of_future_booking" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											<option value="0" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==0) echo 'selected'; ?> >0</option>
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==1) echo 'selected'; ?>>1</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==2) echo 'selected'; ?>>2</option>
											<option value="3" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==3) echo 'selected'; ?>>3</option>
											<option value="4" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==4) echo 'selected'; ?>>4</option>
											<option value="5" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==5) echo 'selected'; ?>>5</option>
											<option value="6" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==6) echo 'selected'; ?>>6</option>
											<option value="7" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==7) echo 'selected'; ?>>7</option>
											<option value="8" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==8) echo 'selected'; ?>>8</option>
											<option value="9" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==9) echo 'selected'; ?>>9</option>
											<option value="10" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==10) echo 'selected'; ?>>10</option>
											<option value="11" class="lgtgrey2_bg" <?php if($bookingRulesInfo['number_of_future_booking']==11) echo 'selected'; ?>>11</option>		 
											</select>
												
											</div>
										 
										 
										  
											 
										</div>
					 
									<div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="You only book for yourself(make your own bookins)" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($bookingRulesInfo['book_for_yourself']==0) echo ''; else echo 'checked'; ?>" onclick="updateOwnBooking();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
					 
					  <input type="hidden" id="book_for_yourself" name="book_for_yourself" value="<?php if($bookingRulesInfo['book_for_yourself']==0) echo '0'; else echo '1'; ?>" />
	 
										 <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="The earliest one can book is in..." class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="earliest_booking" id="earliest_booking" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											<option value="0" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==0) echo 'selected'; ?> >0</option>
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==1) echo 'selected'; ?>>1</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==2) echo 'selected'; ?>>2</option>
											<option value="3" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==3) echo 'selected'; ?>>3</option>
											<option value="4" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==4) echo 'selected'; ?>>4</option>
											<option value="5" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==5) echo 'selected'; ?>>5</option>
											<option value="6" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==6) echo 'selected'; ?>>6</option>
											<option value="7" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==7) echo 'selected'; ?>>7</option>
											<option value="8" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==8) echo 'selected'; ?>>8</option>
											<option value="9" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==9) echo 'selected'; ?>>9</option>
											<option value="10" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==10) echo 'selected'; ?>>10</option>
											<option value="11" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking']==11) echo 'selected'; ?>>11</option>		 
											</select>
												
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="earliest_booking_period" id="earliest_booking_period" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												
											</div>
										 </div>
											 
											 
										</div>
					 

										 <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="Number of days/weeks that must pass between a user's booking occasions" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="booking_occassion" id="booking_occassion" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											<option value="0" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==0) echo 'selected'; ?> >0</option>
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==1) echo 'selected'; ?>>1</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==2) echo 'selected'; ?>>2</option>
											<option value="3" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==3) echo 'selected'; ?>>3</option>
											<option value="4" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==4) echo 'selected'; ?>>4</option>
											<option value="5" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==5) echo 'selected'; ?>>5</option>
											<option value="6" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==6) echo 'selected'; ?>>6</option>
											<option value="7" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==7) echo 'selected'; ?>>7</option>
											<option value="8" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==8) echo 'selected'; ?>>8</option>
											<option value="9" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==9) echo 'selected'; ?>>9</option>
											<option value="10" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==10) echo 'selected'; ?>>10</option>
											<option value="11" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion']==11) echo 'selected'; ?>>11</option>		 
											</select>
												
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="booking_occassion_period" id="booking_occassion_period" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												
											</div>
										 </div>
											 
											 
										</div>
					 
					 
										
										 <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="How many booking one should be be able to do over a period of time" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_40 padr5">
											<div class="pos_rel">
												
												<input type="number" min="1" name="booking_over_a_period" id="booking_over_a_period" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $bookingRulesInfo['booking_over_a_period']; ?>" /> 
											 
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_30 padrl5">
											<div class="pos_rel">
												
												<input type="number" min="1" name="minimum_booking_period_time" id="minimum_booking_period_time" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $bookingRulesInfo['minimum_booking_period_time']; ?>" /> 
											 
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_30 padl5">
											<div class="pos_rel">
												
												<select name="minimum_booking_period_time_period" id="minimum_booking_period_time_period" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['minimum_booking_period_time_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['minimum_booking_period_time_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												
											</div>
										 </div>
											 
											 
										</div>
					 


										 <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="How far into the future one should be be able to book" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="future_book" id="future_book" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											<option value="0" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==0) echo 'selected'; ?> >0</option>
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==1) echo 'selected'; ?>>1</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==2) echo 'selected'; ?>>2</option>
											<option value="3" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==3) echo 'selected'; ?>>3</option>
											<option value="4" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==4) echo 'selected'; ?>>4</option>
											<option value="5" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==5) echo 'selected'; ?>>5</option>
											<option value="6" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==6) echo 'selected'; ?>>6</option>
											<option value="7" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==7) echo 'selected'; ?>>7</option>
											<option value="8" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==8) echo 'selected'; ?>>8</option>
											<option value="9" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==9) echo 'selected'; ?>>9</option>
											<option value="10" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==10) echo 'selected'; ?>>10</option>
											<option value="11" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book']==11) echo 'selected'; ?>>11</option>		 
											</select>
												
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="future_book_period" id="future_book_period" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												
											</div>
										 </div>
											 
											 
										</div>
					 

									 <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="How many shared events can be handled per day" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<input type="number" min="1" name="shared_events_per_day" id="shared_events_per_day" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $bookingRulesInfo['shared_events_per_day']; ?>" /> 
											 
											</div>
										 	 
										</div>
					 
										<div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="Employee fee per shared event" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<input type="number" min="0" name="shared_events_fee" id="shared_events_fee" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $bookingRulesInfo['shared_events_fee']; ?>" /> 
											 
											</div>
										 	 
										</div>
										
										 <div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If employee can except more event on request" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($bookingRulesInfo['more_booking_on_request']==0) echo ''; else echo 'checked'; ?>" onclick="updateBookingRequest();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
										</div>
					 
					  <input type="hidden" id="more_booking_on_request" name="more_booking_on_request" value="<?php if($bookingRulesInfo['more_booking_on_request']==0) echo '0'; else echo '1'; ?>" />
										
									<div class="<?php if($bookingRulesInfo['more_booking_on_request']==0) echo 'hidden';?>" id="ExtraEventOnRequest">   
									   <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="How many booking on request per day" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											  
											<div class="pos_rel">
												
												<input type="number" min="1" name="max_booking_on_request" id="max_booking_on_request" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $bookingRulesInfo['max_booking_on_request']; ?>" /> 
											 
											</div>
										  </div>
					  
									    <div class="on_clmn   mart20  ">
											<div class="pos_rel  ">
									
										<input type="text" value="Extra fee for event on request" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											  
											<div class="pos_rel">
												
												<input type="number" min="0" name="extra_fee_booking_on_request" id="extra_fee_booking_on_request" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $bookingRulesInfo['extra_fee_booking_on_request']; ?>" /> 
											 
											</div>
										  </div>
										  
										  </div>
									   
									   
										 <div class="clear"></div>
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Update</button></a> </div>
							
						</div>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
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
</html>
