<!doctype html>
<?php
function base64_to_jpegp($base64_string, $output_file) {
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
		 
		
		if($deliveryAddress ['passport_image']!=null) { $filename="../estorecss/".$deliveryAddress ['passport_image'].".txt"; if (file_exists($filename)) { $value_p=file_get_contents("../estorecss/".$deliveryAddress ['passport_image'].".txt"); $value_p=str_replace('"','',$value_p); $value_p = base64_to_jpegp( $value_p, '../estorecss/tmp'.$deliveryAddress['passport_image'].'.jpg' ); } else { $value_p="../html/usercontent/images/02-1User-Outline.png"; } }  else $value_p="../html/usercontent/images/02-1User-Outline.png";
	$path1 = "../../html/usercontent/images/";
	 ?>


<html>

	<head>
		<meta charset="utf-8">
		  <meta http-equiv="refresh" content="10;https://www.qloudid.com/user/index.php/CoronaHelp/listItemsRequired/<?php echo $data['eid']; ?>" />  
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
								 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr0 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../listPeople" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="fright   padtbz10   " style="background-color:#ffde00;">
						<ul class="mar0 pad0">
							<div class="  padtrl10">
								<a href="../listItemsClaimed/<?php echo $data['eid']; ?>" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir"><?php echo $itemListClaimedCount['num']; ?> selected <i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
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
									<a href="../listPeople" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			  <div class="fright   padtbz10  padtb5 " style="background-color:#ffde00;">
						<ul class="mar0 pad0">
							<div class="  padrl10">
								<a href="../listItemsClaimed/<?php echo $data['eid']; ?>" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir"><?php echo $itemListClaimedCount['num']; ?> selected <i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
				 
				<div class="clear"></div>
			</div>
		</div>		
			
			<div class="clear" id=""></div>
	

								<div class="column_m pos_rel">
								
							 
 
 <!-- CONTENT -->
									  <div class="column_m container zi5  mart40 xs-mart0" onclick="checkFlag();" id="loginBank">
                <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0  ">

								<div class="wi_240p fleft pos_rel zi50 hidden">
						<div class="padrl10">
							
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
									<div class="column_m padb10 ">
												<div class="padl10">
												 
													<div class="sidebar_prdt_bx marr20 brdb padb20 ">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="padtb20 padrl20 wi_100 hei_220p xs-hei_50p tall  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<img src="../../../<?php echo $value_p; ?>" height="100" width="100" class="brdrad5 padb0">
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="fsz16 ffamily_avenir padt10"> <span><?php echo $deliveryAddress['name']; ?></span>  </div>
																
																<div class="fsz14 ffamily_avenir padt5"> <span><?php echo $deliveryAddress['address'].' '.$deliveryAddress['port_number']; ?></span>  </div>
															</a>																
																	</div> 																</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>
									
									<ul class="marr20 pad0">
									<li class=" dblock padr10  padl8 fsz16 ">
											<a href="../moreItemDetailInfo/<?php echo $data['eid']; ?>" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   brdclr_pblue2_a   pblue2_bg_a black_txt panlyellow_bg_h  black_txt_a" >
												 
												<span class="valm trn">Ge bort en gåva</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										 
										
									</ul>
									
									<ul class="dblock marr20  padl10 fsz16">
										
										<li class="dblock padrb10">
	<a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb_blue red_ff2828_brdclr black_txt  padb10"> <span class="valm trn" style="letter-spacing: 2px;">Behovslista</span> 
	<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
										 
							<li class="dblock padrb10 padt5">
	<a href="<?php if($data['user_id']==43) echo '#'; else echo '../addDistance';?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Support</span> 
	<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>			
										 
										
										
										
										
										
									
										
										
									</ul>
									
									 
									
									 
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					


					 <div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10  xs-pad0">

                        <div class="padb20 xxs-padb0 ">
                            <!-- Charts -->
                             
							<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 bg_e6e5e5  " onclick="checkFlag();">
	
	<div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 bg_e6e5e5  brdb_new tall xs-nobrdb">
	
	<div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  padrl30">
								<div class="padb40 talc fsz45"><i class="far fa-list-alt grey_txt"></i></div>
			<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 grey_txt trn ffamily_avenir">Items</h1>
									</div>
									<div class="mart20 marb10  xxs-talc talc ffamily_avenir"> <a href="#" class="grey_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">List of items needed</a></div>
								 
									</div>
	
	</div>
	
	</div>
	<div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  " >
	
	<div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
	
	<div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
								 
			 
									 
									<div class="martb15  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir"><?php echo $deliveryAddress['name'].' | '.$deliveryAddress['address'].' '.$deliveryAddress['port_number']; ?></a></div>
									</div>
	
	</div>
	
	</div>
							 
											 <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt   mart20">
                                <div class="container ">
                                    <div class="">

                                        <div class="tab-header mart10 padb10 brdb_blue1 red_ff2828_brdclr talc visible-xs">
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd red_ff2828_bg_h red_ff2828_bg_a brdrad40 red_ff2828_brdclr_h red_ff2828_brdclr_a lgn_hight_36 fsz16  black_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Items</a>
											<a href="../listItemsClaimed/<?php echo $data['eid']; ?>" class="dinlblck mar5 padrl30 xs-padrl10 brd tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 black_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir"  >Claim</a>
                                            <a href="../listItemsDelivered/<?php echo $data['eid']; ?>" class="dinlblck mar5 padrl30 xs-padrl10 brd tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 black_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir"  >Delivered</a>
                                        </div>

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content active" id="utab_Popular" style="display: block;">
											<?php $i=0;
												
												foreach($itemList as $category => $value) 
												{
													
													
												?> 
													 
														 
													<div class=" white_bg    brdb  " style="">
										<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10   "> 
																	
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p "><img src="../../../<?php echo $value['image']; ?>" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft wi_50  xsip-wi_50   "> 
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir"><?php echo $value['total_packets'].' packets'; ?></span>
													<span class="trn fsz18  black_txt ffamily_avenir  "><?php echo $value['item_detail']; ?></span>  </div>
													
													<a href="../claimProduct/<?php echo $value['enc']; ?>/<?php echo $data['eid']; ?>"><div class="fright wi_10 padl0 padt5 marl15 fsz35  xs-marl0 xxs-marr20 padb0  ">
													 
														<span class="fas fa-plus-circle lgtgrey_txt "></span>
													</div>	</a>
													
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