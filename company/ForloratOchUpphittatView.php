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
		<?php include 'CompanyHeaderClosed.php'; ?>
		</div>
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
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
									<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
										<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new" id="scroll_menu">
											
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
																				  <i class="white_txt <?php echo $selectIcon['app_icon']; ?>" ></i>
																				</span>
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz25 ffamily_avenir"> <span>iLost Plus</span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
											
									
								
											<ul class="marr20 pad0">
										<li class=" dblock   padl8">
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
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  red_ff2828_bg black_txt white_txt_h white_txt_a" style="border-radius:0%;"> <span class="valm trn" >Förlorat & Upphittat</span> 
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
                                    <h1 class="red_ff2828_txt fsz30 xs-fsz45 xs-talc">iLost Plus</h1>

                                    <div class="marb0 xs-talc"> <a href="#" class="blacka1_txt fsz16  xs-fsz20  talc edit-text jain_drop_company">Här kan du hantera upphittade eller försvunna saker.</a></div>
                                    <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
                                        <!-- Meta -->

                                    </a>
                                </div>
								<div class="hidden-xs hidden-sm padrl10">
									<a href="../../LostandFound/itemInfo/<?php echo $data['cid']; ?>" class=" diblock padrl20 brd brdrad3 lgtgrey2_bg ws_now lgn_hight_29 fsz14 black_txt ">
										
										<span class="valm">Registrera </span>
									</a> <a href="#"><span class="fas fa-cog fsz22 padl10 lgn_hight_29 valm"></span></a><a href="https://www.safeqloud.com/public/index.php/PublicLostFound"><span class="fas fa-sign-in-alt fsz22 padl10 lgn_hight_29 valm"></span></a>
								</div>

                            </div>
						
							 
							</div>
							 <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
                                <div class="container ">
                                    

                                        <div class="tab-header mart10 padb10 brdb_new xs-talc">
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active" data-id="utab_Popular">Registrerade</a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Analytics">Borttappade</a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Advertising">Upphittad</a>
                                             

                                        </div>

                               
						
						 
							 
							
							 
							  <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content active" id="utab_Popular" style="display: block;">
							 
							
							 
									
									<table class="wi_100 " cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz14 lgtgrey2_bg brdb_new" >
											<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Kategori </div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Serie nr</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Datum</div>
												</th>
												<th class="pad5 brdb_new nobold   tall xs-talr xs-marr10" >
													<div class="padtb5 black_txt">Anmäl</div>
												</th>
										</thead>
										<tbody id="lostandFound">
											<?php $i=0;
												
												foreach($lostandFoundDetail as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16 brdb_new">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#"><?php if($value['item_number']==1) echo 'Cell phone'; else if($value['item_number']==2) echo 'Key'; else if($value['item_number']==3) echo 'Laptop'; ?></a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['serial_number']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm xs-talr xs-marr10">
														<a href="../updateFound/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>" ><div class="padtb5 ">Förlorad</div></a>
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									<div class="padt20 talc">
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" value="1" onclick="add_more_my(this);">Visa fler</a>
										
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
											url:"../moreLostandFoundDetail/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#lostandFound"),
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
									
									
									
									<table class="wi_100 " cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz14 lgtgrey2_bg" >
											<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Kategori </div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Serie nr</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Datum</div>
												</th>
												<th class="pad5 brdb_new nobold   tall xs-talr xs-marr10" >
													<div class="padtb5 black_txt">Hittat</div>
												</th>
										</thead>
										<tbody id="forlorad">
											<?php $i=0;
												
												foreach($forloradDetail as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#"><?php if($value['item_number']==1) echo 'Cell phone'; else if($value['item_number']==2) echo 'Key'; else if($value['item_number']==3) echo 'Laptop'; ?></a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['serial_number']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm  xs-talr xs-marr10">
														<a href="../checkStatus/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>" ><div class="padtb5 ">Hittat</div></a>
													</td>
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									<div class="padt20 talc">
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" value="1" onclick="add_more_my_forlorad(this);">Visa fler</a>
										
									</div>
									<script>
									function add_more_my_forlorad(link) {
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
											url:"../moreForloradDetail/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#forlorad"),
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
								
							<div class="tab_content hide" id="utab_Advertising" style="display: none;">
									
									
									
									<table class="wi_100 padb20" cellpadding="0" cellspacing="0" >
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Kategori </div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Serie nr</div>
												</th>
												
												<th class="pad5 brdb_new nobold   tall xs-talr xs-marr10" >
													<div class="padtb5 black_txt">Datum</div>
												</th>
												
											</tr>
											
										</thead>
										<tbody id="regularVisitor">
											
										</tbody>
										
									</table>
									
									
								
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
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtblue2_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>One time</span>
					</a>
					<a href="https://www.safeqloud.com/company/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Ongoing</span>
					</a>
					<div class="tab-header">
						<a href="../../LostandFound/itemInfo/<?php echo $data['cid']; ?>" class="dark_grey_txt dblue_txt_h">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtblue2_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Store it</span>
					</a>
					<a href="https://www.safeqloud.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span class="fa fa-file-text-o"></span>
						</div>
						<span>Your brand</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Create request
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							You got an invitation
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="https://www.safeqloud.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Inform relatives
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
							Photo
						</a>
					</li>
					<li class="dblock mar0 padrl15">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
							Audio Note
						</a>
					</li>
				</ul>
				<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
					<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
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
				
				<form action="../updateLostValue/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" >
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