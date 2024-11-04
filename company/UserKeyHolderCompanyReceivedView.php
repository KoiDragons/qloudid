<!doctype html>
<?php
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
	$path1 = "../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

<html>
	
	 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
	  </head>
	
	<body class="white_bg ffamily_avenir">
		
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
				<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Requests</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" > These are request received from user to manage their property</a></div>
					 
					 
                        <div class="padb20 xxs-padb0 ">
                            

                            <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
                                <div class="container ">
                                    <div class="">

                                        <div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                            
											
											   <a href="#" class="dinlblck mar5 padrl30     bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir">Received</a>
                                               <a href="../approvedAccount/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" >Approved</a>
											     <a href="../rejectedAccount/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" >Rejected</a>
                                        </div>

                                        <div class="tab_container mart10">
					 
							 
							 
							 
							 <div class="tab_content active" id="utab_Popular" style="display: block;">
									
									
									
									 
										
											<?php $i=0;
												
												foreach($requestDetail as $category => $value) 
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
																	border-radius: 10%;"> <?php echo substr($value['address'],0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_40 xs-wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt"><?php echo $value['address'].' '.$value['city'].' '.$value['zipcode']; ?></span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 "><?php echo $value['key_service']; ?></span>  
																	</div>
																	
																	<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="../approveRequest/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>"><span class="fas fa-check-circle green_txt" aria-hidden="true"></span></a>
													</div>
																			<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="../rejectRequest/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>"><span class="fas fa-times-circle red_txt" aria-hidden="true"></span></a>
													</div> 
																		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
										<?php } ?>
										<div id='allRequest'>
										</div>
										
								 <div class="clear"></div>
									 
								</div>
								
							 	<script>
									function add_more_all(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"../moreRequestDetail/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#allRequest"),
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
							
							<div class="clear"></div>
						</div>
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="clear"></div>
		</div>
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	</div>
	 
		<div class="hei_80p hidden-xs"></div>
		
	 
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
</body>

</html>