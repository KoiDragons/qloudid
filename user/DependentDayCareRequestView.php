<!doctype html>
<?php
$path1 = $path."html/usercontent/images/";
		function base64_to_jpeg($base64_string, $output_file) {
			// open the output file for writing
			$ifp = fopen( $output_file, 'wb' ); 
			
			// split the string on commas
			// $data[ 0 ] == "data:image/png;base64"
			// $data[ 1 ] == <actual base64 string>
			$data = explode( ',', $base64_string );
			//print_r($data); die;
			// we could add validation here with ensuring count( $data ) > 1
			fwrite( $ifp, base64_decode( $data[1] ) );
			
			// clean up the file resource
			fclose( $ifp ); 
			
			return $output_file; 
		}
		 
		if($dependentInfo ['image_path']!=null) { $filename="../estorecss/".$dependentInfo ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$dependentInfo ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; }
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
                        <a href="https://www.qloudid.com/user/index.php/Dependents/dependentInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.qloudid.com/user/index.php/Dependents/dependentInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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




			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart20 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Consent</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" > <?php echo $dependentInfo['name']; ?>'s consent page</a></div>

												 
                                      
                                       <div class="tab-header martb10 padb10 xs-talc brd_fcaf17 nobrdt nobrdl nobrdr talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10     t_fcaf17_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Requests</a>
                                            <a href="#" class="dinlblck mar5 padrl10  nobrd t_fcaf17_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" >Active</a>
                                             <a href="#" class="dinlblck mar5 padrl30  nobrd t_fcaf17_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir  " >Sent</a>
                                              <a href="#" class="padrl30_a padrl10 fsz18 midgrey_txt lgn_hight_36 "  ><i class="fas fa-trash-alt"></i></a>
                                            
                                             

                                        </div>

												 

														<!-- Summary -->

													 <div class="tab_content hide" id="utab_Analytics" style="display: none;">
														 	 
															<?php $i=0;
												
												foreach($daycareRequestApproved as $category => $value) 
												{
													
													
												?> 
												
											<a href="../../DayCareRequest/daycareWelcome/<?php echo $value['enc']; ?>">	<div class=" white_bg mart10  brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40  xs-wi_100   sm-wi_100 marl15   xs-padb0 "> <span class="trn ffamily_avenir fsz14" data-trn-key="Day care">Day care</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 ffamily_avenir black_txt"><?php echo $value['company_name']; ?></span> </div>
																			
																			<div class="fright wi_10 padl0 xs-wi_30 sm-wi_100 marl15 fsz40  xs-marl0 xxs-marr20 padb0 hidden-xs">
														<span class="fas fa-arrow-alt-circle-right c_fcaf17"></span>
													</div>	
																			

																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
												</a>
												
												
															 
			
															 
															<?php } ?>
															 
														</div>

													 
													 
														<div class="tab_content active" id="utab_Popular" style="display: block;">




															<?php $i=0;
												
												foreach($daycareRequestReceived as $category => $value) 
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
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_50 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Daycare</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25)."..."; ?></span>  
																	</div>
																	
																	<div class="fright wi_10 padl0    marl15 fsz40    padb0 hidden-xs">
																				<a href="../rejectRequestDaycare/<?php echo $value['enc']; ?>/<?php echo $data['did']; ?>" ><span class="far fa-times-circle  red_txt"></span></a>
																			</div>
																			
																			 <div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 hidden-xs">
														<a href="../approveRequestDaycare/<?php echo $value['enc']; ?>/<?php echo $data['did']; ?>"><span class="fas fa-check-circle green_txt"></span></a>
													</div>
																	
													  
														
															 <?php } ?>
															 

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