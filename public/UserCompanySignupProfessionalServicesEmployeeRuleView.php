
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateCombine.js"></script>
		<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateLable.js"></script>-->
		<script type="text/javascript">
	
function changeLanguage(id)
		{
			var send_data={};
				 send_data.area_id=id;
				 send_data.bodyText=$('#bodyText').html();
				 $.ajax({
							type:"POST",
							url:"../../updateLanguageData",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
							$('#bodyText').html('');
							$('#bodyText').html(data1); 	  	
								  
							}
						});	
		}

function changeDisplay()
		{
			if($('#qrMenu').hasClass('hidden'))
			{
				$('#qrMenu').removeClass('hidden')
				
				$('#qrMenu').css('display','block');
			}
			else
				{
				$('#qrMenu').addClass('hidden')
				$('#qrMenu').css('display','none');
			}
		}	

function changeDisplay1()
		{
			if($('#qrMenu1').hasClass('hidden'))
			{
				$('#qrMenu1').removeClass('hidden')
				
				$('#qrMenu1').css('display','block');
			}
			else
				{
				$('#qrMenu1').addClass('hidden')
				$('#qrMenu1').css('display','none');
			}
		}			
	  
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

	<body class="white_bg ffamily_avenir">
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../../completeProfile/<?php echo $data['cid']; ?>/<?php echo $data['domain_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">  
					<li class="last">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18" onclick="changeDisplay();"><span class="fas fa-globe black_txt" aria-hidden="true"></span></a>
						<ul id="qrMenu" class="hidden" >
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru">Russian</a></li>
                  
                  
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
		 	<div class="column_m header hei_60p bs_bb lgtgrey2_bg visible-xs">
				<div class="wi_100 hei_60p xs-pos_fix padtb5 padrl0 lgtgrey2_bg">
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../completeProfile/<?php echo $data['cid']; ?>/<?php echo $data['domain_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
                     </li>
								 
								
								
								
							</ul>
						</div>
				
					</div>					 
				  
			<div class="top_menu frighti padt10 padb10" style="width:150px !important;">
				<ul class="menulist sf-menu  fsz16 ">
					 
       			
					<li style="margin-right:20px !important;">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25 sf-with-ul" onclick="changeDisplay1();"><span class="black_txt fas fa-globe"></span></a>
						<ul id="qrMenu1" class="hidden" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en" onclick="changeDisplay1();">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv" onclick="changeDisplay1();">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru" onclick="changeDisplay1();">Russian</a></li>
                  
                  
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
	<div class="column_m pos_rel">
			
		 <div class="column_m talc lgn_hight_22 fsz16 mart40"  >
				<div class="wrap maxwi_100 padrl15 xs-padrl25">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_65 xxs-lgn_hight_50 padb0 black_txt trn ffamily_avenir changedText"  >Rules</h1>
									</div>
									<div class="mart10 marb5 xxs-tall talc  xs-padb0 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20 changedText" >Please update booking rules for one employee</a></div>
								 
									
							 
							<form action="../../../updateBookingRulesInfo/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>/<?php echo $data['domain_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">	
 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Cancellation policy</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please provide the time period for booking cancellation?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
							  
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											 <div class="pos_rel">
												
												<select id="cancellation_policy" name="cancellation_policy" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
														
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
												 <label for="cancellation_policy" class="floating__label tall nobold padl10" data-content="Policy">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											 
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												<select id="cancellation_policy_period" name="cancellation_policy_period" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
												 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['cancellation_policy_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												<label for="cancellation_policy_period" class="floating__label tall nobold padl10" data-content="Policy period">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											</div>
										 </div>
											 
											 
										</div>
					 
									 <div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Allow deletion of already delivered or ongoing bookings</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
										 
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
					 
									 
									 
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Future booking</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Limit the number of future bookings a booking can make</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
									<div class="on_clmn   ">
											 
											<div class="pos_rel">
												<select id="number_of_future_booking" name="number_of_future_booking" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
											 
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
											<label for="number_of_future_booking" class="floating__label tall nobold padl10" data-content="Future bookings">
											<span class="hidden--visually">
											  Last name</span></label>	
											</div>
										 
										 
										  
											 
										</div>
					 
									<div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
												 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">You only book for yourself(make your own bookins)</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
										 
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
	 
										 <div class="on_clmn  ">
											<div class="pos_rel  ">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Earliest</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">The earliest one can book is in...</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												<select id="earliest_booking" name="earliest_booking" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
												 
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
												<label for="earliest_booking" class="floating__label tall nobold padl10" data-content="Time">
											<span class="hidden--visually">
											  Last name</span></label>
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
													<select id="earliest_booking_period" name="earliest_booking_period" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
												 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['earliest_booking_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												<label for="earliest_booking_period" class="floating__label tall nobold padl10" data-content="Period">
											<span class="hidden--visually">
											  Last name</span></label>	
											</div>
										 </div>
											 
											 
										</div>
					 

										 <div class="on_clmn  ">
											<div class="pos_rel">
										<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Time gap</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Number of days/weeks that must pass between a user's booking occasions</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												<select id="booking_occassion" name="booking_occassion" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
												 
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
											<label for="booking_occassion" class="floating__label tall nobold padl10" data-content="Time">
											<span class="hidden--visually">
											  Last name</span></label>	
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												<select id="booking_occassion_period" name="booking_occassion_period" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
												 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['booking_occassion_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
											<label for="booking_occassion_period" class="floating__label tall nobold padl10" data-content="Period">
											<span class="hidden--visually">
											  Last name</span></label>	
											</div>
										 </div>
											 
											 
										</div>
					 
					 
										
										 <div class="on_clmn  ">
											<div class="pos_rel  ">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Bookings</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How many booking one should be be able to do over a period of time</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_40 padr5">
											 
											 <div class="pos_rel">
												
												<input type="number" min="1" name="booking_over_a_period" id="booking_over_a_period" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $bookingRulesInfo['booking_over_a_period']; ?>"  fdprocessedid="x4hy36"> 
												
											 <label for="booking_over_a_period" class="floating__label tall nobold padl10" data-content="Total bookings">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
										 </div>
										 
										  <div class="thr_clmn  wi_30 padrl5">
										  
											<div class="pos_rel">
												
												<input type="number" min="1" name="minimum_booking_period_time" id="minimum_booking_period_time" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" value="<?php echo $bookingRulesInfo['minimum_booking_period_time']; ?>" /> 
											  <label for="minimum_booking_period_time" class="floating__label tall nobold padl10" data-content="Time">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_30 padl5">
											<div class="pos_rel">
												<select id="minimum_booking_period_time_period" name="minimum_booking_period_time_period" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
												 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['minimum_booking_period_time_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['minimum_booking_period_time_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
											<label for="minimum_booking_period_time_period" class="floating__label tall nobold padl10" data-content="Period">
											<span class="hidden--visually">
											  Last name</span></label>	
											</div>
										 </div>
											 
											 
										</div>
					 


										 <div class="on_clmn  ">
											<div class="pos_rel  ">
										<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Advance booking</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How far into the future one should be be able to book</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
									 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
											<select id="future_book" name="future_book" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">	
												 
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
											<label for="future_book" class="floating__label tall nobold padl10" data-content="Time">
											<span class="hidden--visually">
											  Last name</span></label>	
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												<select id="future_book_period" name="future_book_period" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
												 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($bookingRulesInfo['future_book_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
											<label for="future_book_period" class="floating__label tall nobold padl10" data-content="Period">
											<span class="hidden--visually">
											  Last name</span></label>		
											</div>
										 </div>
											 
											 
										</div>
					 

									 <div class="on_clmn  ">
											<div class="pos_rel  ">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Per day events</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How many shared events can be handled per day</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<input type="number" min="1" name="shared_events_per_day" id="shared_events_per_day" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" value="<?php echo $bookingRulesInfo['shared_events_per_day']; ?>" /> 
											 <label for="shared_events_per_day" class="floating__label tall nobold padl10" data-content="Events per day">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
										 	 
										</div>
					 
										<div class="on_clmn  ">
											<div class="pos_rel  ">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Employee fee per shared event</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<input type="number" min="0" name="shared_events_fee" id="shared_events_fee" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" value="<?php echo $bookingRulesInfo['shared_events_fee']; ?>" /> 
											  <label for="shared_events_fee" class="floating__label tall nobold padl10" data-content="Employee fee">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
										 	 
										</div>
										
										 <div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">If employee can except more event on request</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
										 
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
									   <div class="on_clmn  ">
											<div class="pos_rel  ">
									<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Requests</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How many booking on request per day</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
									 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											  
											<div class="pos_rel">
												
												<input type="number" min="1" name="max_booking_on_request" id="max_booking_on_request" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" value="<?php echo $bookingRulesInfo['max_booking_on_request']; ?>" /> 
											  <label for="max_booking_on_request" class="floating__label tall nobold padl10" data-content="Max booking requests">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
										  </div>
					  
									    <div class="on_clmn  ">
											<div class="pos_rel  ">
										<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Extra fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Extra fee for event on request</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
																	
	
										 
										 
									</div>
									 </div>
										 
									<div class="on_clmn   ">
											  
											<div class="pos_rel">
												
												<input type="number" min="0" name="extra_fee_booking_on_request" id="extra_fee_booking_on_request" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" value="<?php echo $bookingRulesInfo['extra_fee_booking_on_request']; ?>" /> 
											  <label for="extra_fee_booking_on_request" class="floating__label tall nobold padl10" data-content="Extra fee">
											<span class="hidden--visually">
											  First name</span></label>
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
