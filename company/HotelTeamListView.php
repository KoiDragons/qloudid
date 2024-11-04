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
		function changeTeam(id)
		{
		window.location.href="http://www.qloudid.com/company/index.php/HotelStay/teamListing/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/"+id;	
			
		}
		
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
			
		<div class="column_m header   bs_bb   hidden-xs hidden-xsi">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p  " style="padding: 10px 0px 0px 0px;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			<div class="fright   padtbz10   "  >
						<ul class="mar0 pad0">
							<div class="  padtrl10">
								<a href="../../../teamDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir">Add<i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
								</a>
							</div>
							
							
							
						</ul>
					</div> 
			  
            <div class="clear"></div>
         </div>
      </div>	
			
			
		 	
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs visible-xsi">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm visible-xsi fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p padt10">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm visible-xsi fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="#" class="lgn_hight_s1 fsz25"><span class="fas fa-bars" aria-hidden="true"></span></a>
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
																<div class="padt20 fsz30"> <span>Hotel</span>  </div>
															</a>																	
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>
											<ul class="marr20 pad0 hidden">
												<li class=" dblock padl8">
													<a href="../../../teamDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
														<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
														<span class="valm trn">Add Team</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
													</a>
												</li>
												 
											</ul>
								<ul class="dblock marr20 padt250 padl10 fsz18">
											 
												
								<?php 	foreach($teamList as $category => $value) 
												{
												if($value['id']==$data['t_id'])	
												{
													
												?> 		 		
								<li class="dblock padrb10">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space" ><?php echo $value['team_name']; ?></span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
												<?php } else { ?>
												
												<li class="dblock padrb10   <?php if(($value['id']-1)==$data['t_id']) echo 'padt5'; ?>">
						<a href="<?php echo $value['enc']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  ><?php echo $value['team_name']; ?></span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
													
												<?php }	} ?>
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_500p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xsi-padrl20 xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Teams</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc brdb_black xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >A list of all teams at this hotel</a></div>
						 
	
	 
					 	 <div class="tab-header martb10 padb10 xs-talc  brdb2_ffde00 nobrdt nobrdl nobrdr talc visible-xs visible-xsi">
                                            
                                              <a href="../../../teamDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="dinlblck mar5 padrl30     bg_ffde00_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h black_txt_a white_txt_ah active ffamily_avenir">Add team</a>
                                             

                                        </div>
						<div class="on_clmn visible-xs visible-xsi">
										 
											<div class="pos_rel">
													<select name="team_name" id="team_name" class="lgtgrey2_bg default_view nobrd wi_100 mart5 padl10 hei_50p fsz18 llgrey_txt dropdown-bg" onchange="changeTeam(this.value);">
													<?php 	foreach($teamList as $category => $value) 
												{
												
													
												?>
				<option value="<?php echo $value['enc']; ?>" <?php if($value['id']==$data['t_id']){ echo 'selected'; } ?>><?php echo $value['team_name']; ?></option>
												<?php } ?>
												</select>
											</div>
											
											
											 
										</div>			 
					 
									 
						 
								<?php 	foreach($teamEmployeesList as $category => $value) 
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
																	border-radius: 10%;"><?php echo substr($value['name'],0,1); ?> </div>
																	</div>
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">Employee name </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt "><?php echo $value['name']; ?></span>  </div>
													 
													 
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
										 
												

													
								 
												<?php } ?>
									 								
									<div class="clear"></div>
		
									  
										 
										 
										 
								 
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
			
		 
		 
		
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