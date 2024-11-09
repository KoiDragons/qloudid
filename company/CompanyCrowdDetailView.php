<!doctype html>


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
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />

						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
						<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
						<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
							<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
								<!-- Scripts -->
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>

								<script>

									var available_yes=0;
									function selectLocation()
									{
										$("#error_location").html('');
										if($('#location').val()=="" || $('#location').val()==null)
										{
											$("#error_location").html('please select location');
											return false;
										}
										else
										{
											document.getElementById('save_indexing_location').submit();
										}
									}
									function setDisconnect(id)
									{
									var send_data={};
									send_data.uid=id;

									$.ajax({
									type:"POST",
									url:"../checkConnection/<?php echo $data['cid']; ?>",
									data:send_data,
									dataType:"text",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									success: function(data1){

									if(data1==1)
									{
									document.getElementById("popup_fade").style.display='block';
									$("#popup_fade").addClass('active');
									document.getElementById("gratis_popup_disconnect").style.display='block';
									$("#gratis_popup_disconnect").addClass('active');
									$("#uid").val(id);
									}
									else
									{
									document.getElementById("popup_fade").style.display='block';
									$("#popup_fade").addClass('active');
									document.getElementById("gratis_popup_error").style.display='block';
									$("#gratis_popup_error").addClass('active');
									}

									}
									});
									}

									function setDisconnectSupplier(id)
									{

									document.getElementById("popup_fade").style.display='block';
									$("#popup_fade").addClass('active');
									document.getElementById("gratis_popup_disconnect_supplier").style.display='block';
									$("#gratis_popup_disconnect_supplier").addClass('active');
									$("#uids").val(id);

									}


									function closePop (){

									$('.yellow_bg').removeClass('yellow_bg');

									} 
									function showUserDetailReceived(id,link,aid,rid)
									{

									var send_data={};
									send_data.id=id;
									send_data.aid=aid;
									send_data.rid=rid;
									send_data.cid='<?php echo $data['cid']; ?>';
									var $this = $(this);
									$(".yellow_bg").removeClass('yellow_bg');
									$(link).closest('tr').addClass('yellow_bg');
									$.ajax({
									type:"POST",
									url:"../profileInfo",
									data:send_data,
									dataType:"text",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									success: function(data1){
									document.getElementById("gratis_popup_user_profile").style.display='none';
									$("#gratis_popup_user_profile").removeClass('active');
									$("#search_user_profile").html('');
									document.getElementById("gratis_popup_user_profile").style.display='block';
									$("#gratis_popup_user_profile").addClass('active');
									$("#search_user_profile").append(data1);
									}
									});



									}



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

								<!-- HEADER -->
								<div class="hidden-xs">
								<?php include 'CompanyHeaderClosed.php'; ?>
								</div>
							 
	<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs" id="headerData">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				<div class="wi_240p fleft pos_rel zi50">
								<div class="padrl10">
									
									<!-- Scroll menu -->
									<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 297px;">
										<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new" id="scroll_menu" style="width: 220px;">
											
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
																				 <i class="far fa-circle fa-stack-2x red_ff2828_bg red_ff2828_txt " aria-hidden="true"></i>
																				  <i class="white_txt fab fa-airbnb fa-stack-1x" aria-hidden="true"></i>
																				</span>
																	
																		<a href="#" class="black_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30 ffamily_avenir"> <span>Evacuate</span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
											
									
								
											<ul class="marr20 pad0">
										<li class="dblock   padl8 first last">
											<a href="#" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
												<span class="fa fa-address-card-o wi_20p dnone_pa" aria-hidden="true"></span>
												<span class="valm trn ffamily_avenir">Inställningar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
											 
										
									</ul>
										<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										
										
										
										
										<li class="dblock pos_rel padb10 padt0 brdclr_hgrey  first last">
											 
											<ul class="marr20 pad0">
													<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn ffamily_avenir" >Besökare</span> 
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  red_ff2828_bg  black_txt white_txt_h white_txt_a ffamily_avenir" style="border-radius:0%;"> <span class="valm trn">Evacuate</span> 
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
						
						
											<!-- Center content -->
										
												<div class="padb20 xxs-padb0 ">
													<div class=" container zi1 padb5">
														<div class="wrap maxwi_100 dflex xxs-dfex alit_fe justc_sb  pos_rel padb10 ">
															<div class="white_bg tall xs-talc">

																<h1 class="red_ff2828_txt  fsz30 xs-fsz45 xs-talc ffamily_avenir">Evacuate</h1>



																<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company xs-talc ffamily_avenir"> Here is a list of people in the premises</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																	<!-- Meta -->

																</a></div>
															 


														</div>
													</div>
													<div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
                                <div class="container ">
                                    <div class="">

                                        <div class="tab-header mart10 padb10  xs-talc">
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7  red_ff2828_brdclr_h red_ff2828_brdclr_a brdrad40 red_ff2828_bg_a lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Employee</a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7  red_ff2828_brdclr_h red_ff2828_brdclr_a brdrad40 red_ff2828_bg_a lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Analytics">Children </a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7  red_ff2828_brdclr_h red_ff2828_brdclr_a brdrad40 red_ff2828_bg_a lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Advertising">Parents</a>
                                            <a href="#" class="xs-padrl10 padrl30 fsz18 dark_grey_txt red_ff2828_txt_a lgn_hight_36" data-id="utab_AB_Testing"><i class="fas fa-trash-alt"></i></a>

                                        </div>

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content active" id="utab_Popular" style="display: block;">
											<div class=" container zi1 padb5 padt15">
																	<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_red_ff2828">
																		<div class="white_bg tall">

																			<div class="marb0"> <a href="#" class="blacka1_txt fsz14 edit-text jain_drop_company ffamily_avenir">Medarbetarlista</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																				<!-- Meta -->

																			</a></div>


																	</div>
																</div>
																<div class="column_m container  marb60   fsz14 black_txt">

																	<?php 
													foreach($presentEmployees as $category => $value) 
													{
														
														
													?> 
																	<div class=" white_bg mart10  brdrad3 box_shadow bg_fffbcc_a" style="">
																		<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 black_txt">
																			<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																				<!--<div class="clear hidden-xs"></div>-->

																				<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 ffamily_avenir">

																					<div class="fleft wi_30 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Fullname">Fullname</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['name']; ?></span></a> </div>



																					<div class="fleft wi_20 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Phone">Phone</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo '+'.$value['country_code'].''.$value['phone_number']; ?></span></a> </div>
																					
																				</div>





																			</div>
																			<div class="clear"></div>
																		</div>


																	</div>
																	
																	

																	<?php } ?>		

																	<div id="employeeMore">
																	</div>

																</div>




															 
															<div class="padtb20 talc">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width" onclick="add_more_rows(this);" value="1">Visa fler</a>

															</div>


															 

																

														</div>
														<script>
															function add_more_rows(link) {
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															//send_data.message=id;
															$.ajax({
															type:"POST",
															url:"../morePresentEmployees/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#employeeMore"),
															html=html1;

															$tbody
															.append($(html))
															.find('input.init')
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



														 

														 <div class="tab_content hide" id="utab_Analytics" style="display: none;">
															 

																<div class=" container zi1 padb5 padt15">
																	<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_red_ff2828">
																		<div class="white_bg tall">

																			<div class="marb0"> <a href="#" class="blacka1_txt fsz14 edit-text jain_drop_company ffamily_avenir">Medarbetarlista</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																				<!-- Meta -->

																			</a></div>


																	</div>
																</div>
																<div class="column_m container  marb60   fsz14 dark_grey_txt">

																	<?php 
													foreach($presentChildren as $category => $value) 
													{
														
														
													?> 
																	<div class=" white_bg mart10  brdrad3 box_shadow bg_fffbcc_a" style="">
																		<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 black_txt">
																			<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																				<!--<div class="clear hidden-xs"></div>-->

																				<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 ffamily_avenir">

																					<div class="fleft wi_30 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Fullname">Fullname</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['name']; ?></span></a> </div>



																					<div class="fleft wi_50 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Address">Address</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo  $value['address']; ?></span></a> </div>
																					
																				</div>





																			</div>
																			<div class="clear"></div>
																		</div>


																	</div>
																	
																	

																	<?php } ?>		

																	<div id="childrenMore">
																	</div>

																</div>




															 
															<div class="padtb20 talc">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width ffamily_avenir " onclick="add_more_rows_children(this);" value="1">Visa fler</a>

															</div>


															 

																

														</div>
														<script>
															function add_more_rows_children(link) {
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															//send_data.message=id;
															$.ajax({
															type:"POST",
															url:"../morePresentChildren/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#childrenMore"),
															html=html1;

															$tbody
															.append($(html))
															.find('input.init')
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

													    <div class="tab_content hide" id="utab_Advertising" style="display: none;">
														</div>
														    <div class="tab_content hide" id="utab_AB_Testing" style="display: none;">
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
								</div>
							 

								<div class="clear"></div>
								<div class="hei_80p hidden-xs"></div>
								
								</div>
								
							 
								</div>
								<!-- Edit news popup -->
								<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
									<div class="modal-content pad25 brd nobrdb talc">
										<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
											<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">TJÄNSTEN är en del av vårt premiuminnehåll</h3>
											<div class="marb20">
												<img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" />
											</div>
											<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
											<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
											<div class="wi_75 dflex fxwrap_w marrla marb20 tall">
												<div class="wi_50 marb10">
													<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
														<span class="valm">Hålla dig  uppdaterad inom arbetsrätt</span>
													</div>
													<!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
													<div class="wi_50 marb10">
														<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
															<span class="valm">Använda smarta webblösningar</span>
														</div>
														<div class="wi_50 marb10">
															<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
																<span class="valm">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
															</div>
															<div class="wi_50 marb10">
																<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
																	<span class="valm">Utföra bakgrundskontroller på din personal eller nästa rekryt </span>
																</div>
																<!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Men nästa gång behovet dyker upp då finns allting färdigt.</span>
				</div>-->
															</div>

															<div class="marb10">
																<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Please provide your unique code here" />
															</div>
															<div>
																<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();"/>
																<input type="hidden" id="indexing_save_unique" name="indexing_save_unique" >
																</div>
																<div class="marb10 padtb10 pos_rel">
																	<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div>
																	<span class="diblock pos_rel zi2 padrl10 white_bg">
																		eller om du redan har en prenumeration
																	</span>
																</div>
																<div class="padb0">
																	<a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a>
																</div>
															</form>
														</div>
													</div>



													<!-- Sales popup -->
													<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
														<div class="modal-content pad25 brd nobrdb talc">
															<form>
																<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
																<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
																	<div class="dtrow">
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																	</div>
																	<div class="dtrow">
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																	</div>
																	<div class="dtrow">
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																	</div>
																</div>
																<div class="marb25">
																	<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
																<div>
																	<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
																</div>
															</form>
														</div>
													</div>


													<!-- Marketing popup -->
													<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
														<div class="modal-content pad25 brd nobrdb talc">
															<form>
																<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
																<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
																	<div class="dtrow">
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																	</div>
																	<div class="dtrow">
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																	</div>
																	<div class="dtrow">
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																		<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
																	</div>
																</div>
																<div class="marb25">
																	<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
																<div>
																	<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
																</div>
															</form>
														</div>
													</div>


													<!-- Popup fade -->
													<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

												</div>
												
												
												<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey2_bg fsz14 brdrad5 " id="gratis_popup_location">
	<div class="modal-content   nobrdb talc brdrad5 ">
		<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
		<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Välj kontor</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt"> Välj det kontoret som personen är anställd hos. </span>
				</div>
				
				
			</div>
		
		<form action="../inviteEmployeeLocation/<?php echo $data['cid']; ?>" method="POST" id="save_indexing_location" name="save_indexing_location" >
		<div class="on_clmn padb10 ">
			
			<div class="on_clmn padrl20">
					
					
					
					
					<div class="pos_rel padl0">
					
					<select class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 white_bg brdrad5" name="location" id="location" >
																			
																			<?php 
																				foreach($companyLocation as $category => $row_country)
																				{
																					
																				?>			
																				<option value="<?php echo $row_country['enc']; ?>"><?php echo $row_country['visiting_address']; ?></option>
																			<?php } ?>
																		</select>
						
						
						
					</div>
					
				
				
			</div>
		</div>
		</form>
		<div id="errPhone"></div>
		<div class="on_clmn mart10 padrl20 marb10  brdb_new ">
			<input type="button" value="Submit" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="selectLocation();">
			
		</div>
		<div class="marb10">
		<a href="#" class="marb10">Avbryt</a>
		</div>
		
	</div>
</div>

												
												

												
												<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_company">
													<div class="modal-content pad25 brd">
														<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
															Add Company
															<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
														</h3>
														<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">

															<div class="marb15 "  >
																<label for="new-organization-name" class="sr-only">Company Name</label>
																<input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Name">
																</div>

																<div class="marb15 padt15"  >
																	<label for="new-organization-name" class="sr-only">Website</label>
																	<input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Website">
																	</div>

																	<div class="marb15 padt15"  >
																		<label for="new-organization-name" class="sr-only">Company Email</label>
																		<input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Email">
																		</div>

																		<div class="marb15 padt15">
																			<label for="new-organization-under" class="txt_0">Industry</label>
																			<select name="inds" id= "inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" >

																				<option value="0">--Select--</option>
																				<?php  foreach($resultIndus as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
						}
					?>
																			</select>
																		</div>

																		<div class="marb15 padt15">
																			<label for="new-organization-under" class="txt_0">Country</label>
																			<select name="cntry" id= "cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" >

																				<option value="0">--Select--</option>
																				<?php  foreach($resultContry as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
						}
					?>
																			</select>
																		</div>


																		<div class="mart30 talr">
																			<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
																			<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateAddCompany();" />
																			<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
																		</div>
																	</form>
																</div>
															</div>

															<div class="popup_modal"  id="gratis_popup_user_profile">

																<div id="search_user_profile">


																</div>


															</div>

															<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_error">
																<div class="modal-content pad25  nobrdb talc brdrad5">



																	<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
																	<span></span>
																	<div class="wi_100 dflex fxwrap_w marrla marb20 tall">


																		<div class="wi_100 marb10 talc">

																			<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
																		</div>


																	</div>

																	<div class="pad15 lgtgrey2_bg">

																		<div id="search_user">
																			<h3 class="pos_rel pad15  bold fsz20 dark_grey_txt">
																				You are not authorized to remove/disconnect owner of the company.

																			</h3>

																		</div>

																	</div>

																	<div class="mart20">
																		<input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">


																		</div>
																	</div>
																</div>

																<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect">
																	<div class="modal-content pad25  nobrdb talc brdrad5">



																		<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
																		<span></span>
																		<div class="wi_100 dflex fxwrap_w marrla marb20 tall">


																			<div class="wi_100 marb10 talc">

																				<span class="valm fsz16">Are you sure that you want to disconnect?</span>
																			</div>


																		</div>

																		<form action="../disconnectEmployee/<?php echo $data['cid']; ?>" method="POST">

																			<input type="hidden" id="uid" name="uid" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">


																				<div class="mart20">
																					<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">


																					</div>

																					<div class="mart20">
																						<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">


																						</div>
																					</form>
																				</div>
																			</div>

																			<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect_supplier">
																				<div class="modal-content pad25  nobrdb talc brdrad5">



																					<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
																					<span></span>
																					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">


																						<div class="wi_100 marb10 talc">

																							<span class="valm fsz16">Are you sure that you want to disconnect?</span>
																						</div>


																					</div>

																					<form action="../disconnectSupplier/<?php echo $data['cid']; ?>" method="POST">

																						<input type="hidden" id="uids" name="uids" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">


																							<div class="mart20">
																								<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">


																								</div>

																								<div class="mart20">
																									<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">


																									</div>
																								</form>
																							</div>
																						</div>

																						<!-- Slide fade -->
																						<div id="slide_fade"></div>

																						<!-- Menu list fade -->
																						<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
																						<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>

																						<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
																						<script>

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