<!doctype html>
<?php

	$path1 = $path."html/usercontent/images/";
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
			function checkOtp()
			{
				$("#error_msg_opt").html('');
				if($("#otp").val()=="")
				{
					$("#error_msg_opt").html('Fyll i lösenordet');
					return false;
					
				}
				
				var send_data={};
				
				send_data.otp=$("#otp").val();
				send_data.infor_id=$("#infor_id").val();
				
				$.ajax({
					type:"POST",
					url:"verifyOtp",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==0)
						{
							$("#error_msg_opt").html('Fyll i rätt lösenord');
						}
						else 
						{
							document.getElementById("save_indexing_otp").submit();
						}
					}
				});
				
			}
			
			function confirmUser(id)
			{
				
				$("#error_msg_form").html('');
				
					$.ajax({
						type:"POST",
						url:"informUser",
						
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
								$("#popup_fade").addClass('active');
								$("#popup_fade").attr('style','display:block;');
								$("#gratis_popup_login").addClass('active');
								$("#gratis_popup_login").attr('style','display:block;');
								$("#infor_id").val(data1);
								$("#depend_id").val(id);
						
							
						}
					});
				
			}
			
			
									var currentLang = 'sv';
								</script>
							</head>

							<body class="white_bg ffamily_avenir">

							 
	
 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/Dependents/dependentInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/user/index.php/Dependents/dependentInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>

								<div class="column_m pos_rel">

									<!-- SUB-HEADER -->




									<!-- CONTENT -->
								  <div class="column_m container zi5  mart40 xs-mart0" onclick="checkFlag();">
                <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">

                    <!-- Left sidebar -->
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
																				 <i class="far fa-circle fa-stack-2x circle_bg_apps3 t_67cff7_bg  blue_67cff7 " aria-hidden="true"></i>
																				  <i class="black_txt black_txt far fa-comment-dots fa-stack-1x" ></i>
																				</span>
																	
																	<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30  ffamily_avenir"> <span>Guardians</span>  </div>
															</a>																	
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>

												  <ul class="marr20 pad0">
                              <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="../addGuardianInfo/<?php echo $data['did']; ?>" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   brdclr_pblue2_a   pblue2_bg_a black_txt panlyellow_bg_h  black_txt_a" >
                                    <span class="valm trn">Add guardian</span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
                                 </a>
                              </li>
                           </ul>
                           <ul class="dblock marr20  padl10 fsz16">
                              <li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb_blue  tb_67cff7_bg black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Förskolor</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
							  <li class="dblock padrb10 padt5">
                                 <a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Support</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>


														 




														 

																	</ul>

																 
														</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>

  <div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10  xs-pad0">

                        <div class="padb20 xxs-padb0 ">
                            <!-- Charts -->
							
							<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 t_67cff7_bg  " onclick="checkFlag();">
	
	<div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 t_67cff7_bg  brdb_new tall xs-nobrdb">
	
	<div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  padrl30">
								<div class="padb40 talc fsz45"><i class="far fa-list-alt white_txt" aria-hidden="true"></i></div>
			<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 white_txt trn ffamily_avenir">Guardians</h1>
									</div>
									<div class="mart20 marb10  xxs-talc talc ffamily_avenir"> <a href="#" class="white_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">List of guardians</a></div>
								 
									</div>
	
	</div>
	
	</div>
	<div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  ">
	
	<div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
	
	<div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
								 
			 
									 
									<div class="martb15  xxs-talc talc ffamily_avenir"> <a href="../addGuardianInfo/<?php echo $data['did']; ?>" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Add more guardians</a></div>
									</div>
	
	</div>
	
	</div>
                             
							 
							 <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt mart20">
                                <div class="container ">
                                    <div class="">

                                        <div class="tab-header mart10 padb10 brdb_blue1 talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_received">Requests</a>
											<a href="#" class="dinlblck mar5 padrl30_a padrl10   tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir" data-id="utab_Popular">Connected</a>
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir" data-id="utab_Analytics">Sent</a>
                                            

                                        </div>

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content hide" id="utab_Popular" style="display: none;">
											<?php $i=0;
												
												foreach($guardianDetailApproved as $category => $value) 
												{
													
													
												?> 
												 <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
                                                        <div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
                                                            <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

                                                                <!--<div class="clear hidden-xs"></div>-->

                                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
                                                                    <div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p   hei_50p "><img src="<?php echo $value['image']; ?>" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>

                                                                    <div class="fleft wi_70 xxs-wi_75   xs-mar0 "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt"><?php if($value['guardian_ssn']==null || $value['guardian_ssn']=='') echo 'Not added'; else echo $value['guardian_ssn']; ?></span>
                                                                        <a href="#" class="show_popup_modal black_txt"><span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 "><?php echo html_entity_decode($value['name']); ?></span></a> </div>

                                                                    <div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7" aria-hidden="true"></span> 
													</div>
                                                                    

                                                                </div>

                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>
												</div>
															 
															<?php } ?>
																
                                                <div class="clear"></div>
                                            </div>

                                            <!-- Advertising -->
                                            <div class="tab_content hide" id="utab_Analytics" style="display: none;">
                                               
											<?php $i=0;
												
												foreach($guardianDetailAdded as $category => $value) 
												{
													
													
												?> 
												
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['guardian_email'],0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14  bold  black_txt">Guardian</span>
																	
																	  <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 "><?php echo substr($value['guardian_email'],0,15); ?></span>  
																	</div>
																	
																		  
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
												
											 
												 	
															<?php } ?>
                                            </div>

 <div class="tab_content active" id="utab_received" style="display: block;">
                                               
											<?php $i=0;
												
												foreach($guardianRequestReceived as $category => $value) 
												{
													
													
												?> 
												
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 hidden-xs"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['guardian_email'],0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14  bold  black_txt"><?php echo $value['guardian_ssn']; ?></span>
																	
																	  <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 "><?php echo substr($value['name'],0,15); ?></span>  
																	</div>
																	
																		  
																			<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xxs-marr20 padb0">
																				<a href="../rejectReceivedRequest/<?php echo $value['enc']; ?>" ><span class="far fa-times-circle  red_txt"></span></a>
																			</div>
																			 
													
													<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="../approveReceivedRequest/<?php echo $value['enc']; ?>"><span class="fas fa-check-circle green_txt"></span></a>
													</div>		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
												
												
												
												
											 		
												
															
															<?php } ?>
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
									 	 

									<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
								</div>
								</div> 

								<!-- Popup fade -->

								 

<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
			<div class="modal-content pad25 brdrad5 ">
				
				<h2 class="marb10 pad0 bold fsz24 black_txt talc">Slå in koden</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb0 talc">
						
						<span class="valm fsz16">Låt oss fastställa din identitet. Vi skickade precis ett textmeddelande med en ny kod till telefonnummer och e-post  </span>
					</div>
					
					
				</div>
				
				<form method="POST" action="approveDependent" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
					
					
					<div class="padb0">
						
						<div class="pos_rel ">
							
							<input type="text" name="otp" id="otp" placeholder="Fyll i lösenordet" max="9999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
							
						</div>
					</div>
					<div class="red_bg" id="error_msg_opt">
						
						
					</div>
					
					
					<input type="hidden" id="depend_id" name="depend_id" />
					
					
				</form>
				<div class="mart20 talc marb10">
					<input type="button" value="Signera och kom igång" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkOtp();">
					<input type="hidden" id="infor_id" name="infor_id" />
				
				</div>
				<div> Inte fått något sms? Försök igen.</div>
				
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