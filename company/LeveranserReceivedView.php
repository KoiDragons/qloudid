<!doctype html>
<?php
	$path1 = "../../html/usercontent/images/";
	 ?>

<html>
	
	<head>
		<meta charset="utf-8">
	<meta name="theme-color" content="<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f5f5f5"; else echo $corporateColor['bg_color']; ?>" />
 
	 
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
		
			function removeActive()
			{
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function raActive()
			{
				
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rbActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown2").removeClass('active');
			}
			
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg">
		
		<div class="hidden-xs">
		<?php include 'CompanyDayCareHeader.php'; ?>
		
		 
		</div>
			<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="connectAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
		<div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					<div class="wi_240p fleft pos_rel zi50 ffamily_avenir">
								<div class="padrl10">
									
									<!-- Scroll menu -->
									<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
										<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new"  >
											
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
																				  <i class="white_txt <?php echo $selectIcon['app_icon']; ?>" ></i>
																				</span>
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30"> <span>Leverans</span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
											
									
								
											<ul class="marr20 pad0">
										<li class=" dblock padb10  padl8">
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
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  red_ff2828_bg white_txt white_txt_h white_txt_a" style="border-radius:0%;"> <span class="valm trn" >Dina brev och paket</span> 
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p red_ff2828_bg rotate45" style="border-radius:0%;"></div>
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
							
							<div class="wrap maxwi_100 dflex alit_fe justc_sb  pos_rel padb10 ">
                                <div class="white_bg tall">

                                    <!-- Logo -->
                                    <h1 class="red_ff2828_txt fsz30 xs-fsz45 xs-talc ffamily_avenir">Brev & Paket</h1>

                                    <div class="marb0 xs-talc"> <a href="#" class="blacka1_txt fsz16  xs-fsz20  talc edit-text jain_drop_company ffamily_avenir">Här kan du hantera inkommande brev och meddelandet till en anställd. </a></div>
                                    <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
                                        <!-- Meta -->

                                    </a>
                                </div>
									 
								

                            </div>
						
							 
							</div>
						
						  <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
                                <div class="container ">
                                    

                                        <div class="tab-header mart10 padb10 brdb_new xs-talc">
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Att hämta ut  </a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Analytics">Hämtad</a>
                                           
                                             

                                        </div>

                               
						
						 
							 
							
							 
							  <div class="tab_container mart10">
							
							 
							
							 
									 <div class="tab_content active" id="utab_Popular" style="display: block;">
									
							 
										<div class="padb20 xxs-padb0 ">
							
							
								<?php $i=0;
													
													foreach($receivedPacket as $category => $value) 
													{
														
														
													?> 
								<div class=" white_bg marb20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3  fsz12 ffamily_avenir">
													<div class="fleft wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40  marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn ffamily_avenir" data-trn-key="Name">Name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo html_entity_decode($value['name']); ?></span> </div>
													<div class="fleft wi_50    marl15 xs-mar0 padb10 xs-padb0 visible-xs"> <span class="trn ffamily_avenir" ><?php echo substr(html_entity_decode($value['item_number']),0,10); ?></span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo html_entity_decode($value['name']); ?></span> </div>
													<div class="fleft talc wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn" data-trn-key="Item number">Item number</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo substr(html_entity_decode($value['item_number']),0,10); ?></span> </div>
													<div class="fright talr wi_25 xxs-wi_33 sm-wi_50 xsip-wi_50 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0"> <span class="trn" data-trn-key="Received">Received</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo $value['date_today']; ?></span> </div>
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div>
									
																	
								
													<?php } ?>
																	
																<div id="allReceived">
																</div>
								
							
														<div class="clear"></div>
													</div>
											<div class="padt20 talc">	
											<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width" value="1" onclick="add_more_my(this);">Visa fler</a>
										
									</div>
									<script>
									function add_more_my(link) {
										//var $tbody = $("#rejected");
										//alert($tbody.html); return false;
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"../moreReceivedPacket/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#allReceived"),
												html=html1;
												//alert(data1); 
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
								
									
								</div>
								
								
								
							<div class="tab_content hide" id="utab_Analytics" style="display: none;">
									
									
								<div class="padb20 xxs-padb0 ">
							
							
								<?php $i=0;
													
													foreach($deliveredPacket as $category => $value) 
													{
														
														
													?> 
									<div class=" white_bg marb20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3  fsz12 ffamily_avenir">
													<div class="fleft wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40  marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn ffamily_avenir" data-trn-key="Name">Name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo html_entity_decode($value['name']); ?></span> </div>
													<div class="fleft wi_50    marl15 xs-mar0 padb10 xs-padb0 visible-xs"> <span class="trn ffamily_avenir" ><?php echo substr(html_entity_decode($value['item_number']),0,10); ?></span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo html_entity_decode($value['name']); ?></span> </div>
													<div class="fleft talc wi_30 xxs-wi_33 sm-wi_40 xsip-wi_40 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0 hidden-xs"> <span class="trn" data-trn-key="Item number">Item number</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo substr(html_entity_decode($value['item_number']),0,10); ?></span> </div>
													<div class="fright talr wi_25 xxs-wi_33 sm-wi_50 xsip-wi_50 ffamily_avenir marl15 xs-mar0 padb10 xs-padb0"> <span class="trn" data-trn-key="Received">Received</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 ffamily_avenir"><?php echo $value['date_today']; ?></span> </div>
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div>
									
									
																	
								
													<?php } ?>
																	
																<div id="allDelivered">
																</div>
								
							
														<div class="clear"></div>
													</div>
											<div class="padt20 talc">	
											<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width" value="1" onclick="add_more_my_del(this);">Visa fler</a>
										
									</div>
									<script>
									function add_more_my_del(link) {
										//var $tbody = $("#rejected");
										//alert($tbody.html); return false;
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"../moreDeliveredPacket/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#allDelivered"),
												html=html1;
												//alert(data1); 
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
								
									
								
									
								</div>
								
							</div>
							
							<div class="clear"></div>
						</div>
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		 
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
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