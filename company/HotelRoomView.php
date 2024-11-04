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
			function submitAlarm()
			{
				
				$("#errorMsg").html('');
				if($("#alarm_number").val()=="" || $("#alarm_number").val()==null)
				{
				$("#errorMsg").html('please enter alarm number');	
				return false;
				}
				if(isNaN($("#alarm_number").val())) 
				{
					$("#error_msg_form").html('Alarm number must be a numeric value');
					return false;
				}
				if($("#description").val()=="" || $("#description").val()==null)
				{
				$("#errorMsg").html('please enter description');	
				return false;
				}
				
					
					document.getElementById('save_indexing').submit();
				
				
			}
			
			 
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738">
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			<div class="fright   padtbz10   "  >
						<ul class="mar0 pad0">
							<div class="  padtrl10">
								<a href="../../../roomDetailInformation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['id']; ?>" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir">Add<i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
								</a>
							</div>
							
							
							
						</ul>
					</div>  
			  
            <div class="clear"></div>
         </div>
      </div>	
			
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25"><span class="fas fa-bars" aria-hidden="true"></span></a>
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
		  <div class="column_m container zi5  mart40 xs-mart0"  >
                <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0  ">
					<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
								
								
								<div class="column_m padb10 ">
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
																<div class="padt20 fsz30"> <span>Hotel</span>  </div>
															</a>																	
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>
											<ul class="marr20 pad0">
												<li class=" dblock padl8">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
														<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
														<span class="valm trn">Add room</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
													</a>
												</li>
												 
											</ul>
											
							<ul class="dblock marr20  padl10 fsz16">
							<li class="dblock padrb10">
						<a href="../../../../BussinessImages/displayInformation/<?php echo $data['lid']; ?>/QkhHaWQzcnBweFU5MDRIMllxY3IzQT09" target="_blank" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Add images</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
							
											<li class="dblock padrb10   last first">
						<a href="../../../hotelInformation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Hotel info</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
												<li class="dblock padrb10   last first">
						<a href="../../../checkInDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Check in & out</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
											<?php if($teamCount['num']==0) { ?>
											<li class="dblock padrb10   last first">
						<a href="../../../teamDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Team</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
											<?php } else { ?>
											<li class="dblock padrb10   last first">
						<a href="../../../teamListing/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $teamList[0]['enc']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Team</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
											<?php } ?>
										<li class="dblock padrb10   last first">
						<a href="../../../amenitiesDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Amenities</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 		
								<li class="dblock padrb10">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10 nobrd brdb brd_width_2 brd_fcaf17 tb_67cff7_bg black_txt  padb10"> <span class="valm trn" style="letter-spacing: 2px;">Rooms</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
											 
						<li class="dblock padrb10  padt5">
						<a href="../../../resturantList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Resturants </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
										 
								<li class="dblock padrb10  padt5">
						<a href="../../../wellnessList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Spa and fitness </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>			
											
									<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Coffee </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Nightclub/Bar </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
											<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Parking </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
										<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Pool, Spa, Gym  </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Executive lounge </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
											
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Transportation </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
												
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Activities </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
								
								<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Entertainment </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
											
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Common areas </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		

							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">General services </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Dry Cleaning</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Photos </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Videos </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
							<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Temporary   </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>						
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xsi-padrl20 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 t_67cff7_bg     " onclick="checkFlag();">
	
	<div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 t_67cff7_bg     brdb_new tall xs-nobrdb">
	
	<div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  ">
								<div class="padb40 xxs-padb35 talc fsz45 xxs-fsz65 nobold"><i class="fas fa-bed txt_0b5673" aria-hidden="true"></i></div>
			<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 lgn_hight_50 xxs-fsz45   xxs-lgn_hight_45 padb10 xs-padb0 txt_0b5673  trn ffamily_avenir">Rooms</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="txt_0b5673 fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">A list of all rooms at this hotel</a></div>
									</div>
	
	</div>
 
	</div>
	
	<div class="column_m   talc lgn_hight_22 fsz16 bg_ffde00  ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   bg_ffde00    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir"> <a href="../../../roomDetailInformation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['id']; ?>" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">+Add room</a></div>
                           </div>
                        </div>
                     </div>
									 
						<div class="column_m  fsz14 lgn_hight_22 dark_grey_txt brdt_ff5bad tb_67cff7_bg marb5 mart20">
									 
						 
								<?php $i=0;
												
												foreach($roomDetail as $category => $value) 
												{
													
													
												?> 
												
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['room_name'],0,1); ?> </div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt "><?php  echo $value['room_name']; ?> </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt "><?php echo $value['room_type']." - ";  if($roomTypeDetail['is_available']==1) echo 'Available'; else { if($value['room_available']==1) echo 'Available'; else echo 'Unavailable'; } ?></span>  </div>
													 
													   
												<a href="../../../editRoomDetailInformation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['id']; ?>/<?php echo $value['enc']; ?>">	  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-edit" aria-hidden="true"></span> 
													</div></a>
													  
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											</a>
												

													
								 
												<?php } ?>
									 								
									<div class="clear"></div>
		
									 <div  id="LocationDetailInfo">
													</div>	
										<div class="clear"></div>
										</div>
										<div class="padtb20   talc <?php if($roomCount['num']<=10) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_locations(this);">View more</a>
									</div>	

										<script>
										function add_more_locations(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"../../moreRoomDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#LocationDetailInfo"),
												html=html1;
												
												$tbody
												.append($(html))
												.find('input.check')
												.iCheck({
													checkboxClass: 'icheckbox_minimal-aero',
													radioClass: 'iradio_minimal-aero',
													increaseArea: '20%'
												});
											}
										});
										
										return false;
									}
									</script>
									 
								 
						<div class="clear"></div>
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
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	 
 </body>

</html>