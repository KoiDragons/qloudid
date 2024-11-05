<!doctype html>
<?php
	$path1 = "../../html/usercontent/images/";
	 ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
		function updateId(id)
		{
		$("#popup_fade").addClass('active');
		$("#popup_fade").attr('style','display:block;');
		$("#gratis_popup_alert").addClass('active');
		$("#gratis_popup_alert").attr('style','display:block;');
		$("#lost_id").val(id);
		}
		
		
		function updateLost()
		{
		document.getElementById('save_indexing').submit();
		}
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
		<div class="hidden-xs">
		<?php include 'UserHeaderStang.php'; ?>\
		</div>
		
		
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs" id="dHeader" >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			 <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="kinInfo" class=" diblock padl7 padr7 brdrad3 fsz30 seggreen_47E2A1_txt"><i class="fas fa-plus " aria-hidden="true"></i></a> </div>
				 
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
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
																	
																	
																	
																	<span class="fa-stack ">
																				 <i class="far fa-circle fa-stack-2x t_67cff7_bg blue_67cff7" aria-hidden="true"></i>
																				  <i class="white_txt <?php echo $selectIcon['app_icon']; ?>" ></i>
																				</span>
																	
																	<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30"> <span><?php echo $selectIcon['app_name']; ?></span>  </div>
															</a>																	
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>

	
									
									
									
									
									<ul class="marr20 pad0">
									<li class=" dblock padr10  padl8">
											<a href="#" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Inställningar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										 
										
									</ul>
									
									
									
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										
										
										
										
										<li class=" dblock pos_rel padb10 padt0 brdclr_hgrey ">
										 
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="connectAccount" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Anhöriga</span> <span class="counter_position_a"><?php echo $requestReceivedCount['num']; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  t_67cff7_bg white_txt" style="border-radius:0%;"> <span class="valm trn">Relatives </span> 
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p t_67cff7_bg rotate45" style="border-radius:0%;"></div>
													</a>
												</li>
												 
												
												
											</ul>
											
										</li>
										
										
										
										
										
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					
					
					
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						
						
						
						
						
						
						<div class="padb20 xxs-padb0 ">
							<div class="column_m container tab-header  talc dark_grey_txt mart5">
							<div class="wrap maxwi_100 dflex xxs-dfex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								 <div class="white_bg tall">

                                    <!-- Logo -->
                                    <h1 class="fsz30 xs-fsz45 xs-talc black_txt ffamily_avenir">Noffa</h1>

                                    <div class="marb0 xs-talc ffamily_avenir"> <a href="#" class="blacka1_txt fsz16  xs-fsz20  talc edit-text jain_drop_company"> Here is your list of next of kin.</a></div>
                                    
                                </div>
								
								<div class="hidden-xs hidden-sm padrl10">
									<a href="kinInfo" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt " >
										
										<span class="valm"> Registra </span>
									</a> <a href="#"><span class="fas fa-cog fsz22 padl10 lgn_hight_29 valm"></span></a>
								</div>
							</div>
							</div>
							
							
								
							<div class="tab-content padb25 padt5 " id="tab_total"  style="display:block;">
									
								<table class="wi_100 padt20 padb5" cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz16 blue_67cff7_brd  nobrdt nobrdr nobrdl ">
											<tr><th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl  nobold   tall">
													<div class="padtb5 black_txt ffamily_avenir">Relatives  </div>
												</th>
												
												<th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl nobold hidden-xs tall">
													<div class="padtb5 black_txt"></div>
												</th>
												
												
												
										</tr></thead>
										</table>
								 
											<?php $i=0;
												
												foreach($allRelativeDetail as $category => $value) 
												{
													
													
												?> 
													<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
													
													<div class="fleft wi_30 xs-wi_60  marl15 xs-mar0 "> <span class="trn fsz14" data-trn-key="Name">Name</span> <a href="#" ><span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt"><?php if($value['uid']==0) echo $value['name']; else echo $value['uname']; ?></span></a> </div>
													<div class="fleft wi_45   marl15 xs-mar0  hidden-xs"> <span class="trn fsz14" data-trn-key="Phone number">Phone number</span> <span class=" edit-text jain2 dblock  brdclr_lgtgrey2 fsz18 black_txt"><?php echo $value['connect_phone']; ?></span> </div>
													<div class="fleft xxs-fright wi_10 padl0   marl15 fsz40  xs-marr10 xs-marl0 padb0">
													<a href="#"><span class="fas fa-arrow-alt-circle-right" aria-hidden="true"></span></a>
													</div>	
												</div>
												
												
												
												
												
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
									</div>
											
											</div>
											
											<?php } ?>
											
											
											<table class="wi_100 padt20 padb5" cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz16 blue_67cff7_brd  nobrdt nobrdr nobrdl ">
											<tr><th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl  nobold   tall">
													<div class="padtb5 black_txt ffamily_avenir">Kins  </div>
												</th>
												
												<th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl nobold hidden-xs tall">
													<div class="padtb5 black_txt"></div>
												</th>
												
												
												
										</tr></thead>
										</table>
											 
											<?php $i=0;
												
												foreach($allKinsDetail as $category => $value) 
												{
													
													
												?> 
												
													<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
													
													<div class="fleft wi_30 xs-wi_60  marl15 xs-mar0 "> <span class="trn fsz14" data-trn-key="Kin Name">Kin name</span> <a href="#" ><span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt"><?php if($value['uid']==0) echo $value['name']; else echo $value['uname']; ?></span></a> </div>
													<div class="fleft wi_45   marl15 xs-mar0  hidden-xs"> <span class="trn fsz14" data-trn-key="Phone number">Phone number</span> <span class=" edit-text jain2 dblock  brdclr_lgtgrey2 fsz18"><?php echo $value['connect_phone']; ?></span> </div>
													<div class="fleft xxs-fright wi_10 padl0   marl15 fsz40  xs-marr10 xs-marl0 padb0">
													<a href="addNOFFRelative/<?php echo $value['enc']; ?>"><span class="fas fa-arrow-alt-circle-right" aria-hidden="true"></span></a>
													</div>
													
												</div>
												
												
												
												
												
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
									</div>
											
											</div>
											<?php } ?>
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
		 
		<!-- Popup fade -->
		
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad10 brd" id="gratis_popup_alert">
		<div class="modal-content pad25 brd brdrad10">
			
				<h3 class="pos_rel marb10 pad0 padr40 bold fsz25 dark_grey_txt">
					Are you sure
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				<form action="ForloratOchUpphittat/updateLostValue" method="POST" id="save_indexing" name="save_indexing" >
				<input type="hidden" id="lost_id" name="lost_id" />
				</form>
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 " onclick="updateLost();" >Ja, det är jag</a> </div>
			
		</div>
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
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>

</html>