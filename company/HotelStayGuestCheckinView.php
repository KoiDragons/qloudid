<!doctype html>
 
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
		
		function updateAuthorization()
		{
			var dataValue=$("#card_authorized_checked").val();
			if(dataValue==1)
			{
				$("#card_authorized_checked").val(0);
				var newHtml='<div class="tbp-radio__wrapper tbp-radio__wrapper-default"><label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath"><a href="javascript:void(0);" onclick="updateAuthorization();"> <div class="tbp-radio__container"><input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="card_authorized" name="card_authorized" value="over bath"> <div class="tbp-radio__button"></div>  <div class="tbp-radio__label">Is card asked for authorization</div> </div></a><div class="tbp-radio__children"></div></label> </div>';
				$("#4").html('');
				$("#4").html(newHtml);
				 
			}
			else
			{
				$("#card_authorized_checked").val(1);
				$("#card_authorized").attr('checked','checked');	
				
			}
		}
		
		
		function updateCard()
		{
			var dataValue=$("#printed_card_checked").val();
			if(dataValue==1)
			{
				$("#printed_card_checked").val(0);
				var newHtml='<div class="tbp-radio__wrapper tbp-radio__wrapper-default"><label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath"><a href="javascript:void(0);" onclick="updateCard();"> <div class="tbp-radio__container"><input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="printed_card" name="printed_card" value="over bath"> <div class="tbp-radio__button"></div>  <div class="tbp-radio__label">Is registration card printed out & signed </div> </div></a><div class="tbp-radio__children"></div></label> </div>';
				$("#3").html('');
				$("#3").html(newHtml);
				 
			}
			else
			{
				$("#printed_card_checked").val(1);
				$("#printed_card").attr('checked','checked');	
				
			}
		}
		
		
		function updatePassport()
		{
			var dataValue=$("#valid_passport_checked").val();
			if(dataValue==1)
			{
				$("#valid_passport_checked").val(0);
				var newHtml='<div class="tbp-radio__wrapper tbp-radio__wrapper-default"><label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath"><a href="javascript:void(0);" onclick="updatePassport();"> <div class="tbp-radio__container"><input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="valid_passport" name="valid_passport" value="over bath"> <div class="tbp-radio__button"></div>  <div class="tbp-radio__label">Valid passport copy </div> </div></a><div class="tbp-radio__children"></div></label> </div>';
				$("#2").html('');
				$("#2").html(newHtml);
				 
			}
			else
			{
				$("#valid_passport_checked").val(1);
				$("#valid_passport").attr('checked','checked');	
				
			}
		}
		
		
		function updatePersonal()
		{
			var dataValue=$("#personal_details_checked").val();
			if(dataValue==1)
			{
				$("#personal_details_checked").val(0);
				var newHtml='<div class="tbp-radio__wrapper tbp-radio__wrapper-default"><label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath"><a href="javascript:void(0);" onclick="updatePersonal();"> <div class="tbp-radio__container"><input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="personal_details" name="personal_details" value="over bath"> <div class="tbp-radio__button"></div>  <div class="tbp-radio__label">All Personal details </div> </div></a><div class="tbp-radio__children"></div></label> </div>';
				$("#1").html('');
				$("#1").html(newHtml);
				 
			}
			else
			{
				$("#personal_details_checked").val(1);
				$("#personal_details").attr('checked','checked');	
				
			}
		}
		 
			function submitAlarm()
			{
				
				$("#errorMsg").html('');
				if($("#cleaned_room").val()==0)
				{
				$("#errorMsg").html('please wait while room is ready for check in');	
				return false;
				}
				
				if($("#personal_details_checked").val()==0)
				{
				$("#errorMsg").html('please verify personal details');	
				return false;
				}
				
				if($("#valid_passport_checked").val()==0)
				{
				$("#errorMsg").html('please verify passport details');	
				return false;
				}
				
				if($("#printed_card_checked").val()==0)
				{
				$("#errorMsg").html('please verify if card is printed');	
				return false;
				}
				
				if($("#card_authorized_checked").val()==0)
				{
				$("#errorMsg").html('please verify if card is authorized');	
				return false;
				}
				 
					document.getElementById('save_indexing').submit();
				
				
			}
			 
			 
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../../bookingListForRoomAllocation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
					 
						 <a href="../../../bookingListForRoomAllocation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
                     </li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir">Check-in</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">This is check-in page for <?php echo $bookingDetail['first_name'].' '.$bookingDetail['last_name']; ?></a></div>
					 
					 
						 
						
									 
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is a room assigned" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
											
											
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($bookingDetail['room_id']>0) { echo 'checked'; } ?>" >
																<input type="checkbox" class="default" data-true="" data-false="" >
															 </div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									 
									 <div id="errorMsg" class="fsz20 red_txt padtb20 tall"></div>
									 
									 	 
									 
									<?php if($bookingDetail['room_id']>0) { ?> 
								 	<div id="bathroom_info" >
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd"><?php if($bookingDetail['checked_in']==1) echo 'Room is already occupied please wait till room is ready for checkin.'; else { if($bookingDetail['is_approved_cleaning']==0) echo 'Room is dirty please wait till room is ready for checkin.'; else echo 'This room is cleaned,inspected and vacant';  } ?></p>
												   <div class="chip-container">
													  <a href="javascript:void(0);" ><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip <?php if($bookingDetail['checked_in']==1) echo 'chip_is-selected-red'; else { if($bookingDetail['is_approved_cleaning']==0) echo 'chip_is-selected-red'; else echo 'chip_is-selected-green';  } ?>">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text"><?php echo $bookingDetail['room_name']; ?></span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 
													 
													 
													 
												   </div>
												</div>
												</div>
										
											</div>
												
												<div class="clear"></div>
											<div class="padb0 xs-padrl0 xs-padb0   mart10  ">
									 <div class="clear"></div>
									 
								<div class="marrl0 padb10 brdb_dfe3e6 fsz16 white_bg tall padt20">
								<a href="#profile" class="expander-toggler dark_grey_txt xs-fsz16 tall bold active">Guest detail 
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile" class=" " style="display:block;">	
										  <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Adults</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Total adults that will checkin?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
									 	 <?php foreach($adultsCheckedInList  as $category => $value) { ?>
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo $value['name']; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													<?php if($value['is_user']==1) { ?>
													<a href="../../../guestRoomCheckinUserInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Update</button>
																			</div> 
																			</a>
																			
													<?php } else { ?>
													<a href="#" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Update</button>
																			</div> 
																			</a>
													<?php } ?>
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									<?php }   for($i=1; $i<=$guestAdultRemainingCount;$i++) { ?> 
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Adult<?php echo $i; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													
													<a href="../../../guestRoomCheckinAdultInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Add</button>
																			</div> 
																			</a>
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									
									<?php } ?>
										<div class="clear"></div>
									 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Children</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Total children that will checkin?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
									 <?php foreach($dependentsCheckedInList  as $category => $value) { ?>
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo $value['name']; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													 
													<a href="#" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Update</button>
																			</div> 
																			</a>
																			
													 
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									<?php }   for($i=1; $i<=$guestChildrenRemainingCount;$i++) { ?> 
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Child<?php echo $i; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													
													<a href="../../../guestRoomCheckinDependentList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Add</button>
																			</div> 
																			</a>
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									
									<?php } ?>
									
									<div class="clear"></div>
									</div>
					 		 

										

													
								 
												 
									 
								
								
								 
						
						<div class="clear"></div>
					</div>
											<div class="clear"></div>
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div data-testid="shower-type-radio-questions" class="css-1abdbqe">
							   <label for="shower-type-radio-questions" class="css-1rlpief bold">Do you have...</label>
							   <div id="spacer" spacing="small" class="css-1coujgl"></div>
							   <form>
								  <div class="css-1kbx24p" id="1">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" for="A standalone shower-walk in">
										   <a href="javascript:void(0);" onclick="updatePersonal();"><div class="tbp-radio__container">
											  <input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--checked tbp-radio--A standalone shower tbp-radio--A standalone shower-walk in" id="personal_details" name="personal_details" value="walk in" >
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">All Personal details</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								  <div id="spacer" spacing="small" class="css-1coujgl"></div>
								  

									<div class="css-1kbx24p" id="2">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updatePassport();"> <div class="tbp-radio__container">
											  <input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="valid_passport" name="valid_passport" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Valid passport copy</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								<div id="spacer" spacing="small" class="css-1coujgl"></div>
								<div class="css-1kbx24p" id="3">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateCard();"> <div class="tbp-radio__container">
											  <input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="printed_card" name="printed_card" value="over bath">
											  <div class="tbp-radio__button"></div>
											  <div class="tbp-radio__label">Is registration card printed out &amp; signed </div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
								<div  spacing="small" class="css-1coujgl"></div>
								<div class="css-1kbx24p" id="4">
									 <div class="tbp-radio__wrapper tbp-radio__wrapper-default">
										<label class="tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" for="An over-bath shower-over bath">
										  <a href="javascript:void(0);" onclick="updateAuthorization();"> <div class="tbp-radio__container">
											  <input type="checkbox" class="tbp-radio__input tbp-radio tbp-radio--unchecked tbp-radio--An over-bath shower tbp-radio--An over-bath shower-over bath" id="card_authorized" name="card_authorized" value="over bath">
											  
											  <div class="tbp-radio__button"></div>
											   
											  <div class="tbp-radio__label">Is card asked for authorization</div>
										   </div></a>
										   <div class="tbp-radio__children"></div>
										</label>
									 </div>
								  </div>
							   </form>
							</div>
											</div>
													
											 
											 
											 
									</div>
											<div class="clear"></div>
										
											
											
											
											</div>
													
											 
											 
											 
									</div>
									<div class="clear"></div>
									
									
									</div>
									<div class="clear"></div>
									<div class="padtb20 xxs-talc talc">
									<a href="javascript:void(0);" onclick="submitAlarm();"><button="" type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18">Proceed</a>
									</div>
									<form action="../../../updateCheckinInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" method="POST" id="save_indexing" name="save_indexing">
									<input type='hidden' id='cleaned_room' name="cleaned_room" value='<?php if($bookingDetail['checked_in']==1) echo 0; else { if($bookingDetail['is_approved_cleaning']==0) echo 0; else echo 1;  } ?>' />
									      
									<input type="hidden" id="personal_details_checked" name="personal_details_checked" value="0" />
									<input type="hidden" id="valid_passport_checked" name="valid_passport_checked" value="0" />
									<input type="hidden" id="printed_card_checked" name="printed_card_checked" value="0" />
									<input type="hidden" id="card_authorized_checked" name="card_authorized_checked" value="0" />
									</form>
									<?php } else { ?>
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									<div class="css-1jzh2co martb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">Room not allocated</p>
												   <div class="chip-container">
													  <a href="../../../selectRoom/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip <?php if($bookingDetail['checked_in']==1) echo 'chip_is-selected-red'; else { if($bookingDetail['is_approved_cleaning']==0) echo 'chip_is-selected-red'; else echo 'chip_is-selected-green';  } ?>">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Allocate room</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 
													 
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
									 </div>
												</div>
												</div>
												</div>
												<div class="clear"></div>
													<div class="padb0 xs-padrl0 xs-padb0   mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10 brdb_dfe3e6 fsz16 white_bg tall padt20">
								<a href="#profile" class="expander-toggler dark_grey_txt xs-fsz16 tall bold active">Guest detail 
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile" class=" " style="display:block;">	
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Adults</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Total adults that will checkin?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
									 	 <?php foreach($adultsCheckedInList  as $category => $value) { ?>
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo $value['name']; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													<?php if($value['is_user']==1) { ?>
													<a href="../../../guestRoomCheckinUserInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Update</button>
																			</div> 
																			</a>
																			
													<?php } else { ?>
													<a href="#" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Update</button>
																			</div> 
																			</a>
													<?php } ?>
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									<?php }   for($i=1; $i<=$guestAdultRemainingCount;$i++) { ?> 
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Adult<?php echo $i; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													
													<a href="../../../guestRoomCheckinAdultInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Add</button>
																			</div> 
																			</a>
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									
									<?php } ?>
										<div class="clear"></div>
									<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Children</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Total children that will check in</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
									
									 <?php foreach($dependentsCheckedInList  as $category => $value) { ?>
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo $value['name']; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													 
													<a href="#" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Update</button>
																			</div> 
																			</a>
																			
													 
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									<?php }   for($i=1; $i<=$guestChildrenRemainingCount;$i++) { ?> 
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt10 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Child<?php echo $i; ?></span>
													  
													 </div>
													<div class="xxxs-wi_25 fleft wi_30  marr30 xs-mar0 ">
													
													<a href="../../../guestRoomCheckinDependentList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" class="xs-padr20">  
													<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Add</button>
																			</div> 
																			</a>
													   </div>
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
											 
											 
									</div>
									
									<?php } ?>
									
									<div class="clear"></div>
									</div>
					 		 

										

													
								 
												 
									 
								
								
								 
						
						<div class="clear"></div>
					</div>
										
												
									<?php } ?>
									</div>
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
			
		</div>
		 
		
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	 
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		function updatePopup(id,id1)
		{
			$("#did").val(id);
			$("#d_name1").val(id1);
			
		}
		// Charts
		google.charts.load('current', { 'packages': ['corechart'] });
		
		
		// Line Chart
		google.charts.setOnLoadCallback(drawLineChartInhouse);
		function drawLineChartInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartStaffing);
		function drawLineChartStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartRecruiting);
		function drawLineChartRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
		function drawLineChartBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// Donut Chart
		// - yearly
		google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
		function drawDonutChartYearlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
		function drawDonutChartYearlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
		function drawDonutChartYearlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
		function drawDonutChartYearlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - monthly
		google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
		function drawDonutChartMonthlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
		function drawDonutChartMonthlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
		function drawDonutChartMonthlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
		function drawDonutChartMonthlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - daily
		google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
		function drawDonutChartDailyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
		function drawDonutChartDailyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
		function drawDonutChartDailyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
		function drawDonutChartDailyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		tinyMCE.init({
			selector: '.texteditor',
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
			//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
			menubar: false,
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
		});
	</script>

	 
 </body>

</html>