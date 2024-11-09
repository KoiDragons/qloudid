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
		
		if($childrenDetail ['child_image_path']!=null) { $filename="../estorecss/".$childrenDetail ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$childrenDetail ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$childrenDetail['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
		
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
		function openPopup()
         {
         if($("#openPop").hasClass('active'))
         {
         $("#openPop").removeClass('active')
         $("#openPop").attr('style','display:none');
         }
         else
         {
         $("#openPop").addClass('active')
         $("#openPop").attr('style','display:block');
         }
         }
		 
			function checkFlag()
	{
		if($("#openPop").hasClass('active'))
         {
         $("#openPop").removeClass('active')
         $("#openPop").attr('style','display:none');
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
				<!-- HEADER -->
							  <div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738"  >
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/DayCareRequest/daycareWelcome/<?php echo $data['parent_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/user/index.php/DayCareRequest/daycareWelcome/<?php echo $data['parent_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 <div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25" onclick="openPopup();"><span class="fas fa-list " aria-hidden="true"></span></a>
						<ul id="openPop" style="display:none" class="">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									<div class="fsz16 trn">Inloggad som</div>
									<ol class="mart10">
									<li class="first">
                    <div class=" mart10"></div>
                  </li>
									<li class="first"><a href="../childNewsDetail/<?php echo $data['parent_id']; ?>" class="fsz16i" ><span class="fas fa-gift padr15" aria-hidden="true"> </span>Newsfeed</a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				  
										
                  <li><a href="../childAttendenceHistory/<?php echo $data['parent_id']; ?>" class="fsz16i" ><span class="fas fa-list-ol padr15" aria-hidden="true"> </span> Presence</a></li>
				   <li>
                    <div class="line martb10"></div>
                  </li>
                  <li><a href="javascript:void(0);" class="fsz16i" ><span class="fas fa-drafting-compass padr15" aria-hidden="true"> </span> Pick & drop list</a></li>
				  
				   <li class="last">
                    <div class="line martb10"></div>
                  </li>
                    </ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			 
			 
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 439px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" style="width: 220px; top: 0px;">
								
								<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20 marb10">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_220p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<img src="../../../<?php echo $value_a; ?>" height="145" width="145" class="brdrad5 padb0">
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="fsz25 ffamily_avenir tall"> <span><?php echo $childrenDetail['first_name']; ?></span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
										
									
									
									
									 
									
									<ul class="dblock mar0 padl10 fsz16">
										
										
										<!-- Company -->
										
										
										
										
										<li class="dblock pos_rel padb10 padt0 brdclr_hgrey  first last">
											 
											<ul class="marr20 pad0">
											  <li class="dblock padrb10  ">
                                 <a href="../childNewsDetail/<?php echo $data['parent_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Newsfeed</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
												<li class="dblock padrb10 ">
                                 <a href="../childAttendenceHistory/<?php echo $data['parent_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Presence</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
							  
							  	 
							  
												<li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb tb_67cff7_bg brd_width_2 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Pick & drop list</span> 
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
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						
						
						
						
						
						
						<div class="padb20 xxs-padb0 ">
						<div class="wrap maxwi_100 dflex xxs-dfex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
														<div class="white_bg tall xs-talc">




															<!-- Logo -->
															<h1 class="black_txt fsz30 xs-fsz45 xs-talc ffamily_avenir">Parents</h1>
															<!-- Logo -->
															<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz20  edit-text jain_drop_company ffamily_avenir">List of people approved to drop and pick up the child.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->

															</a></div>
															<div class="hidden-xs hidden-sm padrl10">
									<a href="../../ConnectKin/kinInfo" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt " >
										
										<span class="valm">Add parents</span>
									</a>
								</div>


													</div>
							 
								
							<div class="tab-content padb25 padt5 " id="tab_total"  style="display:block;">
									
									
									
									<table class="wi_100 padt20 padb5" cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz16 blue_67cff7_brd  nobrdt nobrdr nobrdl " >
											<th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl  nobold   tall" >
													<div class="padtb5 black_txt fsz16">Parents  </div>
												</th>
												
												<th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl nobold hidden-xs tall" >
													<div class="padtb5 black_txt"></div>
												</th>
												
												
												
										</thead>
										</table>
											<?php $i=0;
												
												foreach($parentsDetail as $category => $value) 
												{
													
													
												?> 
													<div class="column_m container   marb5  fsz14 dark_grey_txt">
								
												
											
											
											<div class=" white_bg   brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padtb15  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
											<div class="fleft wi_50p   marr15"> 
																	
																	<div class="wi_50p xs-wi_100 hei_50p  "><img src="../../../<?php echo $value['image_path']; ?>" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
																			<div class="fleft wi_50 xs-wi_75"> <span class="trn fsz14 ffamily_avenir" data-trn-key="Drop off & Pick up">Drop off & Pick up</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt"><?php echo $value['name']; ?></span> </div>
																			 
																			 
																			 

																		</div>
											
											 
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
														 
												 
											<?php } ?>
									
									
											<?php $i=0;
												
												foreach($relativesDetail as $category => $value) 
												{
													
													
												?> 
												
													<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class=" white_bg  brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padtb15 brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
											<div class="fleft wi_50p   marr15"> 
																	
																	<div class="wi_50p xs-wi_100 hei_50p  "><img src="../../../<?php echo $value['image_path']; ?>" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
																			<div class="fleft wi_50 xs-wi_75 "> <span class="trn fsz14 ffamily_avenir" data-trn-key="<?php if($value['permission_type']==1) echo 'Drop in'; else if($value['permission_type']==2) echo 'Pick up'; else if($value['permission_type']==3) echo 'Drop off & Pick up'; ?>"> <?php if($value['permission_type']==1) echo 'Drop in'; else if($value['permission_type']==2) echo 'Pick up'; else if($value['permission_type']==3) echo 'Drop off & Pick up'; ?></span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt"><?php echo $value['name']; ?></span> </div>
																			 
																			 
																			 

																		</div>
											
											 
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
														 
											<?php } ?>
											
											
											<div class="clear"></div>
											<table class="mart30 wi_100 padb5" cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz16 blue_67cff7_brd  nobrdt nobrdr nobrdl" >
											<th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl nobold   tall" >
													<div class="padtb5 black_txt">Not parents </div>
												</th>
												
												<th class="pad5 blue_67cff7_brd  nobrdt nobrdr nobrdl nobold hidden-xs tall " >
													<div class="padtb5 diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt fright">Add non parents</div>
												</th>
												
												
												
										</thead>
										</table>
											<?php $i=0;
												
												foreach($kinsDetail as $category => $value) 
												{
													
													
												?> 
													<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class=" white_bg  brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_50   marl15 xxs-marl15 "> <span class="trn fsz14 ffamily_avenir" data-trn-key="Kin name"> Kin name</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 black_txt"><?php if($value['name']=="" || $value['name']==" " || $value['name']=null) echo 'No name'; else echo $value['name']; ?></span> </div>
																			 
																			 	<?php if($value['ssn']=="" || $value['ssn']==null || $value['ssn']==0)
													{ ?>
													<div class="fright wi_10 padl0   marl15 fsz40  xs-marl0 xxs-marr20 padb0">
													<a href="../addRelativePermission/<?php echo $data['parent_id']; ?>/<?php echo $value['enc']; ?>/<?php echo $value['relative_user_id']; ?>"><span class="fas fa-arrow-alt-circle-right" aria-hidden="true"></span></a>
													</div>
													<?php } else { ?>
													<div class="fright wi_10 padl0  marl15 fsz40  xs-marl0 xxs-marr20 padb0">
													<a href="../addKinasRelative/<?php echo $data['parent_id']; ?>/<?php echo $value['enc']; ?>/<?php echo $value['relative_user_id']; ?>"><span class="fas fa-arrow-alt-circle-right" aria-hidden="true"></span></a>
													</div>
													<?php } ?>
																			 

																		</div>
											
											 
												
												
												
												
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