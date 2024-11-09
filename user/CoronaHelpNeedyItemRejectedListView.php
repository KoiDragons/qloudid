<!doctype html>
<?php

	$path1 = "../../html/usercontent/images/";
	 ?>

<html>

	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="refresh" content="10;https://www.safeqloud.com/user/index.php/CoronaHelp/listItemsDetailRejected" />-->
			<meta name="viewport" content="width=device-width,initial-scale=1">
				<title>Qmatchup</title>
				<!-- Styles -->
				
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
				  <script src="https://kit.fontawesome.com/119550d688.js"></script>
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
								
								function closePop()
		{
			document.getElementById("popup_fade").style.display='none';
			$("#popup_fade").removeClass('active');
			document.getElementById("person_informed").style.display='none';
			$(".person_informed").removeClass('active');
		}
		function checkFlag()
		{
			if($(".popupShow").hasClass('active'))
			{
				$(".popupShow").removeClass('active')
				$(".popupShow").attr('style','display:none');
			}
			
		}
		function togglePopup()
		{
			if($(".popupShow").hasClass('active'))
			{
				$(".popupShow").removeClass('active')
				$(".popupShow").attr('style','display:none');
			}
			else
			{
				$(".popupShow").addClass('active')
				$(".popupShow").attr('style','display:block');
			}
		}
									 
									var currentLang = 'sv';
								</script>
							</head>

							<body class="white_bg ffamily_avenir">

								<!-- HEADER -->
							<div class="column_m header xs-hei_55p  bs_bb lgtgrey2_bg xs-white_bg hidden-xs" id="headerData"  >
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey2_bg xs-white_bg">
					<div class="logo  marr15 wi_140p xs-wi_80p hidden-xs hidden-sm visible-xxs">
						<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 grey_txt padt10 padb10 logofamily"  >Qloud ID</h3> </a>
					</div>
				 
					<div class="hidden-xs hidden-sm fleft padl20 padr10 ">
						<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
							<ul class="menulist sf-menu  fsz14">
								
								<li class="hidden-xs first last" style="margin: 0 30px 0 0;">
										<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15 ffamily_avenir">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../html/usercontent/images/slide/flag_sw.png" width="28" height="28" alt="email" title="email" data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector ffamily_avenir" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../html/usercontent/images/slide/flag_us.png" width="28" height="28" alt="email" title="email" data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector ffamily_avenir" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../html/usercontent/images/slide/germanf.png" width="28" height="28" alt="email" title="email" data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector ffamily_avenir" data-value="de" onclick="togglePopup();">  German </a> </div>
													</li>
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt ffamily_avenir">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt ffamily_avenir">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt ffamily_avenir">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
					</div>
					
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt" >
									
									<span class="valm ffamily_avenir">Close</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					  
					<div class="clear"></div>
					
				</div>
			</div>
			
		 
<div class="column_m header hei_55p  bs_bb white_bg visible-xs" >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left " aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			  <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="itemDetailInfo" class=" diblock padl7 padr7 brdrad3 fsz30 seggreen_47E2A1_txt"><i class="fas fa-plus " aria-hidden="true"></i></a> </div>
				 
				<div class="clear"></div>
			</div>
		</div>		
			
			<div class="clear" id=""></div>
	

								<div class="column_m pos_rel">
								
							 
 
 <!-- CONTENT -->
									  <div class="column_m container zi5  mart40 xs-mart0" onclick="checkFlag();" id="loginBank">
                <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0  ">

										<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
									 
									
									<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<span class="fa-stack ">
																				 <i class="far fa-circle fa-stack-2x red_ff2828_bg red_ff2828_txt" aria-hidden="true"></i>
																				  <i class="white_txt fab fa-airbnb fa-stack-1x" aria-hidden="true"></i>
																				</span>
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30"> <span>Corona</span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>
									<ul class="marr20 pad0">
									<li class=" dblock padr10  padl8 fsz16 ">
											<a href="itemDetailInfo" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   brdclr_pblue2_a   pblue2_bg_a black_txt panlyellow_bg_h  black_txt_a" >
												 
												<span class="valm trn">Lägg till varor</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										 
										
									</ul>
									
									
									
									 
									
									<ul class="dblock marr20  padl10 fsz16">
										
										<li class="dblock padrb10">
	<a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb_blue red_ff2828_brdclr  black_txt  padb10"> <span class="valm trn" style="letter-spacing: 2px;">Shopping list</span> 
	<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
										 
							<li class="dblock padrb10 padt5">
	<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Support</span> 
	<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>			
										 
										
										
										
										
										
									
										
										
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					  <div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">

                        <div class="padb20 xxs-padb0 ">
						
						<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 bg_e6e5e5  " onclick="checkFlag();">
	
	<div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 bg_e6e5e5  brdb_new tall xs-nobrdb">
	
	<div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  ">
								<div class="padb40 talc fsz45"><i class="fas fa-trash-alt grey_txt"></i></div>
			<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 grey_txt trn ffamily_avenir">Trash</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="grey_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Here is the trash can</a></div>
									</div>
	
	</div>
	
	</div>
               <div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  " >
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Approve stores</a></div>
                           </div>
                        </div>
                     </div>               
							
							 
											 <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt  mart20">
                                <div class="container ">
                                    <div class="">

                                        <div class="tab-header mart10 padb10 brdb_blue1 red_ff2828_brdclr talc hidden">
                                            <a href="listItemsDetailRequired" class="dinlblck mar5 padrl30 xs-padrl10 brd tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz14 black_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir"  >Items</a>
                                            <a href="listItemsDetailDelivered" class="dinlblck mar5 padrl30 xs-padrl10 brd tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz14 black_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir"  >Delivered</a>
											 <a href="listItemsDetailReceived" class="dinlblck mar5 padrl30 xs-padrl10 brd tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz14 black_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir"  >Received</a>
											 <a href="#" class="xs-padrl10 padrl30 fsz18  red_ff2828_txt blue_67cff7_a lgn_hight_36 active" data-id="utab_AB_Testing"><i class="fas fa-trash-alt"></i></a>
                                        </div>

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            
										 
										 
                                             
											<div class="tab_content active" id="utab_AB_Testing" style="display: block;">
											<?php $i=0;
												
												foreach($itemListRejected as $category => $value) 
												{
													
													
												?> 
													 
													<div class=" white_bg   brdb" style="">
										<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 "> 
																	
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p "><img src="../../<?php echo $value['image']; ?>" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
											<div class="fleft wi_50     "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir"><?php echo $value['total_packets'].' packets'; ?></span>
<span class="trn fsz18  black_txt ffamily_avenir  "><?php echo $value['item_detail']; ?></span>  </div>
													
													 
													<a href="markRejectRequired/<?php echo $value['enc']; ?>"><div class="fright wi_10 padl0  marl15 fsz40  xs-marl0 xxs-marr20 padb0 hidden ">
														<span class="far fa-times-circle  red_txt"></span>
													</div></a>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> 		
													
									
															 	<?php } ?>
															
																
                                                <div class="clear"></div>
                                            </div>

											 </div>
                                    </div>
                                </div>

                            </div>

													 

								

													 
													<div class="clear"></div>
												</div>

												<div class="clear"></div>
											</div>


										</div>
										<div class="clear"></div>
									</div>
 
									<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
								</div>
								 
								<div id="slide_fade"></div>

								 
								<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>

								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>

								
							</body>

						</html>