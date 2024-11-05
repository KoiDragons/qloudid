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
								 
								 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/NewsfeedDetail" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
								<div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/user/index.php/NewsfeedDetail" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			 
				<div class="clear"></div>
			</div>
		</div>
			
								<div class="clear" id=""></div>


								<div class="column_m pos_rel">

									<!-- SUB-HEADER -->




									<!-- CONTENT -->
									<div class="column_m container zi5  mart40 xs-mart0" onclick="checkFlag();">
										<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">

											<div class="wi_240p fleft pos_rel zi50 hidden">
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
																				 <i class="far fa-circle fa-stack-2x t_67cff7_bg blue_67cff7 brdrad50 " aria-hidden="true"></i>
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
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb_blue tb_67cff7_bg  black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Förskolor</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
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
											<div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10 padt0 mart0 xs-pad0">






												<div class="padb20 xxs-padb0 ">
												 
												
							<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 t_67cff7_bg  " onclick="checkFlag();">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 t_67cff7_bg  brdb_new tall xs-nobrdb">
                           <div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  padrl30">
                              <div class="padb40 talc fsz45"><i class="fas fa-list white_txt" aria-hidden="true"></i></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 white_txt trn ffamily_avenir">Consent</h1>
                              </div>
                              <div class="mart20 marb10  xxs-talc talc ffamily_avenir"> <a href="#" class="white_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir"> Daycare is requesting to connect and fetch your details,</a></div>
                           </div>
                        </div>
                     </div>					
							<div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Your active list</a></div>
                           </div>
                        </div>
                     </div>					
												 
													 <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt mart20">
                                <div class="container ">
                                    

                                        <div class="tab-header mart10 padb10 xs-talc brdb_blue1 talc">
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 blue_67cff7_brd_a t_67cff7_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Analytics">Skickade </a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 blue_67cff7_brd_a t_67cff7_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Popular">Anslutna</a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 blue_67cff7_brd_a t_67cff7_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Advertising">Avböjda</a>
                                             

                                        </div>

												 <div class="tab_container mart10">

														<!-- Summary -->

													 <div class="tab_content hide" id="utab_Popular" style="display: none;">
														 	 
															<?php $i=0;
												
												foreach($requestApprovedDetail as $category => $value) 
												{
													
													
												?> 
												
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40     xs-wi_100 marl15   xs-padb0 "> <a href="DayCareRequest/childNewsDaycareDetail/<?php echo $value['enc']; ?>"><span class="trn ffamily_avenir fsz14 black_txt" data-trn-key="<?php echo $value['company_name']; ?>"><?php echo $value['company_name']; ?></span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 ffamily_avenir black_txt"><?php echo $value['name']; ?></span></a> </div>
																			
																			<div class="fright wi_10 padl0 xs-wi_30 sm-wi_100 marl15 fsz40  xs-marl0 xxs-marr20 padb0 hidden-xs">
														<a href="DayCareRequest/childNewsDaycareDetail/<?php echo $value['enc']; ?>"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>	
																			

																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
												
												</div>
												
															 
			
															 
															<?php } ?>
															<div id="ApprovedRequest">
															</div>
															
															<div class="clear" id=""></div>
															<div class="padtb20 talc">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width  ffamily_avenir" value="1" onclick="add_more_my_approved(this);">Visa fler</a>

															</div>
															<script>
																function add_more_my_approved(link) {

																var id_val=parseInt($(link).attr('value'))+1;
																var html1="";
																var send_data={};
																send_data.id=parseInt($(link).attr('value'));
																$(link).attr('value',id_val);

																$.ajax({
																type:"POST",
																url:"DayCareRequest/moreApprovedRequestDetail",
																data:send_data,
																dataType:"text",
																contentType: "application/x-www-form-urlencoded;charset=utf-8",
																success: function(data1){
																html1=data1;
																var $tbody = $("#ApprovedRequest"),
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

													 
													 
														<div class="tab_content active" id="utab_Analytics" style="display: block;">




															<?php $i=0;
												
												foreach($requestReceivedDetail as $category => $value) 
												{
													
													
												?> 
													<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15  xxs-marl15 "> <span class="trn fsz14 ffamily_avenir black_txt" data-trn-key="<?php echo $value['company_name']; ?>"><?php echo $value['company_name']; ?></span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt"><?php echo $value['name']; ?></span> </div>
																			 
															
													
													<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xxs-marr20 padb0">
																				<a href="DayCareRequest/rejectRequest/<?php echo $value['enc']; ?>" ><span class="far fa-times-circle  red_txt"></span></a>
																			</div>
																			 <?php if($data['ssn']=="" || $data['ssn']==null || $data['ssn']=="-") { ?> 
																			<div class="fleft wi_10 xs-wi_20 padl0  marl15 fsz40  xs-marl0 xxs-marr20 padb0  ">
														<a href="StoreData/addUserSSN"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>	
													<?php } else { ?>
													
													<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="DayCareRequest/approveRequest/<?php echo $value['enc']; ?>"><span class="fas fa-check-circle green_txt"></span></a>
													</div>	
													
													<?php } ?>

																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
														 
														
															 <?php } ?>
															<div id="ReceivedRequest">
															</div>
															
															<div class="clear"></div>


															<div class="padt20 talc">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width ffamily_avenir " value="1" onclick="add_more_my(this);">Visa fler</a>

															</div>
															<script>
																function add_more_my(link) {
																var id_val=parseInt($(link).attr('value'))+1;
																var html1="";
																var send_data={};
																send_data.id=parseInt($(link).attr('value'));
																$(link).attr('value',id_val);
																$.ajax({
																type:"POST",
																url:"DayCareRequest/moreRequestReceivedDetail",
																data:send_data,
																dataType:"text",
																contentType: "application/x-www-form-urlencoded;charset=utf-8",
																success: function(data1){
																html1=data1;
																var $tbody = $("#ReceivedRequest"),
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


														</div>


														<div class="tab_content hide" id="utab_Advertising" style="display: none;">

 
															<?php $i=0;
												
												foreach($requestRejectedDetail as $category => $value) 
												{
													
													
												?> 

															<div class="column_m container  marb5   fsz14 dark_grey_txt">
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 xs-wi_100 marl15 xxs-marl15 black_txt"> <span class="trn fsz14 ffamily_avenir" data-trn-key="<?php echo $value['company_name']; ?>"><?php echo $value['company_name']; ?></span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 blue_67cff7"><?php echo $value['name']; ?></span> </div>
																			 
																			 
																		 

																		</div>
											
											 
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
														 
														
															<?php } ?>
															<div id="RejectedRequest">
															</div>	
															
															<div class="clear"></div>

															<div class="padt20 talc">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width  ffamily_avenir" value="1" onclick="add_more_my_rejected(this);">Visa fler</a>

															</div>
															<script>
																function add_more_my_rejected(link) {

																var id_val=parseInt($(link).attr('value'))+1;
																var html1="";
																var send_data={};
																send_data.id=parseInt($(link).attr('value'));
																$(link).attr('value',id_val);

																$.ajax({
																type:"POST",
																url:"DayCareRequest/moreRejectedRequestDetail",
																data:send_data,
																dataType:"text",
																contentType: "application/x-www-form-urlencoded;charset=utf-8",
																success: function(data1){
																html1=data1;
																var $tbody = $("#RejectedRequest"),
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

									<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
								</div>
								</div>
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