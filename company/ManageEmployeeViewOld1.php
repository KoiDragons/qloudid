<!doctype html>
<?php

	$path1 = "../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		
		
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<?php include '../user/CompanyHeaderUpdated.php'; ?>
		
		<div class="column_m pos_rel"  onclick="checkFlag();">
			
			<div class=" column_m container zi5  mart40 xs-mart0">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="xs-wi_100 dflex justc_sb alit_c bs_bb marb0  padt2  xs-lgtgrey_bg">
						<div class="wi_960p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg xs-lgtgrey_bg sm-lgtgrey_bg">
							
							<!-- Left sidebar -->
							<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" >
								<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt">Min</a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz35 xs-fsz30 sm-fsz30 
														bold">Arbetsplats</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php echo substr(html_entity_decode($companyDetail['company_name']),0,20); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									
								<div class="column_m padb10 hidden">
									 <div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
												<!-- Logo -->
												<?php if($companyDetail['profile_pic']!=null || $companyDetail['profile_pic']!="") { ?><div class="pad20 wi_100  xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20  yellow_bg_a lgtgrey2_bg white_txt" style="height:180px;"><img src="<?php echo $imgs;  ?>" width="90px;" height="90px;" class="brdb_w"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 2%; "> </div><?php } else { ?>
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20  yellow_bg_a lgtgrey2_bg black_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
																	" ><?php echo substr(html_entity_decode($companyDetail['company_name']),0,1); ?></div> <?php } ?>
													<a href="#" class="black_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span><?php echo substr(html_entity_decode($companyDetail['company_name']),0,20); ?></span>  </div>
													</a>
													</div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
								
								
									<ul class="marr20 pad0">
									
										<li class=" dblock padb10 padl8">
													<a href="../../CompanyNews/employeeNewsAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a">

													<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
													<span class="valm trn">Nyhetsflöde</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg rotate45"></div>
													</a>
												</li>
										
										
										<li class=" dblock  padl8 <?php if($checkPermission==0) echo 'hidden'; else echo 'padb10'; ?>">
											<a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Hantera företaget</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Personalhandbok</h4>
											<ul class="marr20 pad0">
											<li class="dblock padrb10">
													<a href="../../CompanyHandbook/handbookAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Handbok</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../CompanyFaq/faqInfo/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">FAQ</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													<li class="dblock padrb10">
													<a href="../../AskHR/hrAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Fråga HR</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>												
												
												
											</ul>
											
										</li>
										
										
										
										<!-- Newsfeed -->
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Utforska</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="../../CompanyOmOss/companyAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Om oss</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Anställda</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="../../CompanyKarriar/companyAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Karriär</span>
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
							<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padl20 xs-padl0">
								
								
								
								
								
								
								
								<div class="padb20 xxs-padb0 ">
									
									<div class="wrap maxwi_100 dflex alit_fe justc_sb pos_rel padb10 brdb_new">
										<div class="white_bg tall">
											
											
											
											
											<!-- Logo -->
											<h1 class="fsz25 bold">Adressbok över anställda</h1>
											<!-- Logo -->
											<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här kan du kontaktuppgifter tillanställda och chefer. </a></div>
											<!-- Meta -->
											
										</div>
										<div class="hidden-xs hidden-sm padrl10">
											<a href="#" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt">
												
												<span class="valm">Hantera</span>
											</a>
										</div>	
										
									</div>
									<div class="container  white_bg fsz14 dark_grey_txt ">
										
										<!-- Summary -->
										
										<div class="tab-content padb25 padt5 active xs-padt0" id="tab_total" style="display: block;">
											<form>
												<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
													<thead class="fsz14">
														<tr class="lgtgrey2_bg hei_40p">
															<th class=" padr5 grey_txt nobold hidden-xs">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<!--<th class="wi_6p pad0 "></th>-->
															<th class="padl10 padr10  grey_txt nobold hidden-xs tall">Image</th>
															<th class="wi_300 pad10  grey_txt nobold tall" >Name</th>
															
															
															<th class="wi_130p padtb5   hidden-xs"></th>
														</tr>
														
													</thead>
													<tbody id="total_data">
														<?php 
															
															foreach($activeEmployeeDetail as $category => $value) 
															
															{  	
															?>
															<tr class="style_base bg_fffbcc_a ">
																<td class="brdb_new padr5 padb10 hidden-xs" >
																	<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
																</td>
																
																<td class="pad10 brdb_new hidden-xs">
																	<?php if($value['passport_image']!=null || $value['passport_image']!="") { ?><div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" id="<?php echo 'aa_'.$value['id']; ?>"><img src="<?php echo $value['image_path'];  ?>" width="40px;" height="40px;"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div><?php } else { ?> <div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" id="<?php echo 'aa_'.$value['id']; ?>"> <?php echo substr($value['last_name'],0,1);  ?> </div> <?php  } ?>
																</td>
																<td class="pad10 brdb_new">
																	<div class="wi_100">
																		<div class="dflex alit_c">
																			<h3 class="mar0 pad0 fsz16 xs-fsz16">
																				<a href="#" class=" dark_grey_txt txt_0070e0_sbh" data-id="<?php echo 'a_'.$value['id']; ?>" id="<?php echo 'a_'.$value['id']; ?>"><?php echo $value['name']; ?></a>
																			</h3>
																			<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																		</div>
																		
																		<div class="mart2 hidden-xs">
																			Employee
																			<span class="padrl5">·</span>
																			Connected
																		</div>
																	</div>
																</td>
																
																
																
																
																<td class="pad5 brdb_new   hidden-xs">
																	<div class="dflex fxshrink_0">
																		<a href="#" class="wi_70p hei_32p dflex alit_c justc_c vis_hid vis_vis_sbh vis_vis_sba brd brdrad5 bg_f dark_grey_txt">Share</a>
																		<a href="#" class="wi_36p hei_32p dflex alit_c justc_c marl10 brd brdrad5 bg_f dark_grey_txt"><span class="fa fa-ellipsis-h"></span></a>
																	</div>
																</td>
															</tr>
														<?php }	 ?>
													</tbody>
													
												</table>
												<div class="padt20 talc hidden-xs">
													<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows(this);" value="1">View More</a>
													
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
															url:"../moreApprovedEmployees/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
																html1=data1;
																var $tbody = $("#total_data"),
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
												
												
												
											</form>
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
			</div>
		</div>
		<div class="clear"></div>
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>Senaste</span>
					</a>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Filer</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Foton</span>
					</a>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span>...</span>
						</div>
						<span>More</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Activity
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							Deal
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Note
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
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
		<div class="hei_80p"></div>
		
		
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 brdrad10 " id="gratis_popup_unique" >
		<div class="modal-content pad25 brd nobrdb talc brdrad10">
			
			
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Premiuminnehåll</h3>
			<div class="marb20">
				<img src="../../../../usercontent/images/gratis.png" class="maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
				</div>
				
				
			</div>
			
			
			<div class="marb10">
				<input type="button" value="Add Employee" class="get-company-info wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" >
				
				
			</div>
			<?php if($company['fortnox_auth_code']==null || $company['fortnox_auth_code']=="") {  ?>
				<div >
					<input type="button" value="Import" class="show_popup_modal wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" data-target="#gratis_popup">
				</div>
				<?php } else if($company['fortnox_access_token']==null || $company['fortnox_access_token']=="") { ?>
				<div >
					<input type="button" value="Import" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" data-target="#gratis_popup">
				</div>
				<?php } else { ?>
				
				<div >
					<a href="../updateFortnoxEmployee/<?php echo $data['cid']; ?>">	<input type="button" value="Import" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" data-target="#gratis_popup"></a>
				</div>
			<?php } ?>
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_file">
		<div class="modal-content pad25 brd">
			<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
				Add CSV File
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			<form method="POST" action="../updateFile/<?php echo $data['cid']; ?>" id="email_file_save" name="email_file_save"  enctype="multipart/form-data">
				
				<div class="marb15 " >
					<label for="new-organization-name" class="sr-only">Import from file</label>
					<input type="file" id="email_file" name="email_file" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="upload CSV">
				</div>
				<div class="red_txt" id="errCsv"> </div>
				
				<div class="mart30 talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validForm();" />
					<input type="hidden" name="indexing_save_file" id="indexing_save_file" />
				</div>
			</form>
		</div>
	</div>
	
	<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup">
		<div class="modal-content pad25 brd">
			<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
				Add Authorization Code
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			<form method="POST" action="../updateAuthCode/<?php echo $data['cid']; ?>" id="save_indexing_AuthCode" name="save_indexing_AuthCode"  accept-charset="ISO-8859-1">
				
				<div class="marb15 " >
					<label for="new-organization-name" class="sr-only">Authorization Code</label>
					<input type="text" id="a_code" name="a_code" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Code">
				</div>
				<!--<div class="marb15">
					<label for="new-organization-description" class="sr-only">Description (optional)</label>
					<textarea row="3" name="name" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Description (optional)"></textarea>
				</div>-->
				
				
				<div class="mart30 talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="submit_form();" />
					<input type="hidden" name="indexing_save" id="indexing_save" />
				</div>
			</form>
		</div>
	</div>
	<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 user_phone_searched brd brdrad5"  id="user_phone_searched">
		<div class="modal-content pad25 brd brdrad10">
			<div id="userSearched">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					Phone number already present in the database. Please use another.	
					
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
			</div>
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 user_phone_searched brd brdrad5 <?php if(isset($data['skipped'])) echo 'active'; ?>"  id="record_update" style="display:<?php if(isset($data['skipped'])) echo 'block'; else echo 'none'; ?>">
		<div class="modal-content pad25 brd brdrad10">
			<div id="userSearched">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<?php if(isset($data['skipped'])) { echo 'Total record skipped: '.$data['skipped'].'</br> Total record processed: '.$data['processed']; } ?>	
					
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
			</div>
			
		</div>
	</div>
	
	
	
	<div id="keep-selected" class="wi_100 hei_64p dflex xs-dnone sm-dnone alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
		<div class="dflex fxwrap_w alit_c padtb10">
			<div class="pos_rel marr15">
				<a href="#" class="keep-selected-clear dflex alit_c justc_c talc">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
				</a>
				<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
					<span class="dblock padrl8">Clear selection</span>
				</div>
			</div>
			<div class="marr15 fsz20 txt_0_54">
				<span id="keep-selected-count"></span> updated
			</div>
		</div>
		<div class="keep-actions wi_100 maxwi_250p dflex alit_c padtb10">
			<div class="keep-action wi_20 pos_rel">
				<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1" onclick="submit_value();">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Pin">
				</a>
				<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
					<span class="dblock padrl8">Pin</span>
				</div>
			</div>
			<div class="keep-action wi_20 pos_rel">
				<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
				</a>
				<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
					<span class="dblock padrl8">Remind me</span>
				</div>
			</div>
			<div class="keep-action wi_20 pos_rel">
				<a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
				</a>
				<div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs zi2 top100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_e0 brdclr_80_h brdclr_80_a brdrad50 bg_f trans_all2 active" data-color="#fff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ff8a80 brdclr_80_h brdrad50 bg_ff8a80 trans_all2" data-color="#ff8a80"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffd180 brdclr_80_h brdrad50 bg_ffd180 trans_all2" data-color="#ffd180"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffff8d brdclr_80_h brdrad50 bg_ffff8d trans_all2" data-color="#ffff8d"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ccff90 brdclr_80_h brdrad50 bg_ccff90 trans_all2" data-color="#ccff90"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_a7ffeb brdclr_80_h brdrad50 bg_a7ffeb trans_all2" data-color="#a7ffeb"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_80d8ff brdclr_80_h brdrad50 bg_80d8ff trans_all2" data-color="#80d8ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_82b1ff brdclr_80_h brdrad50 bg_82b1ff trans_all2" data-color="#82b1ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_b388ff brdclr_80_h brdrad50 bg_b388ff trans_all2" data-color="#b388ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_f8bbd0 brdclr_80_h brdrad50 bg_f8bbd0 trans_all2" data-color="#f8bbd0"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_d7ccc8 brdclr_80_h brdrad50 bg_d7ccc8 trans_all2" data-color="#d7ccc8"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
					<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_cfd8dc brdclr_80_h brdrad50 bg_cfd8dc trans_all2" data-color="#cfd8dc"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				</div>
				<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
					<span class="dblock padrl8">Change color</span>
				</div>
			</div>
			<div class="keep-action wi_20 pos_rel">
				<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
				</a>
				<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
					<span class="dblock padrl8">Archive</span>
				</div>
			</div>
			<div class="keep-action wi_20 pos_rel">
				<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
				</a>
				<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
					<span class="dblock padrl8">More</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="crm-popup profile-popup wi_720p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top50p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16">
		<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
		<div class="popup-content"></div>
	</div>
	
	<div class="crm-popup request-popup wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
		<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
		<div class="popup-content"></div>
	</div>
	
	<div class="crm-popup fortnox-popup wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
		<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
		<div class="popup-content"></div>
	</div>
	
	<!-- Company info popup -->
	<div class="crm-popup company-popup wi_600p maxwi_96 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p xs-right8 right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold">Close</a>
		<form action="../addNewEmployee/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
			<div class="popup-content padb15"></div>
		</form>
	</div>
	
	<div class="crm-popup company-popup-edit wi_600p maxwi_96 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p xs-right8 right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold" onclick="removeBackground();">Close</a>
		<form action="../updateEmployee/<?php echo $data['cid']; ?>" method="POST" id="save_indexinged" name="save_indexinged" accept-charset="ISO-8859-1">
			<div class="popup-content padb15"></div>
		</form>
	</div>
	
	<div class="crm-popup company-popup-pos wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold">Close</a>
		<form action="../addNewPosition/<?php echo $data['cid']; ?>" method="POST" id="save_indexingp" name="save_indexingp" accept-charset="ISO-8859-1">
			<div class="popup-content padb15"></div>
		</form>
	</div>
	
	<!-- User info popup -->
	<div class="crm-popup employee-popup wi_720p maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi100 top70p right0 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right5p orange_btn brdrad3 bold">Close</a>
		<div class="popup-content padb15"></div>
	</div>
	
	<!-- Reps info popup -->
	<div class="crm-popup reps-popup wi_720p maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi100 top70p right0 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right5p orange_btn brdrad3 bold">Close</a>
		<div class="popup-content padb15"></div>
	</div>
	
	<script>
		// A list of countries to use in country select countrols
		var countries_list = "<?php echo $countryList; ?>";
		
		var location_list = "<?php echo $locationList; ?>";
		var job_list = "<?php echo $jobList; ?>";
		var relationship='<option value="In-relationship">In-relationship</option><option value="Single">Single</option><option value="Married">Married</option><option value="Divorced">Divorced</option>';
		$(document).ready(function () {
			var $window = $(window),
			$body = $(document.body),
			$fortnox_popup = $('.fortnox-popup'),
			$fortnox_popup_content = $fortnox_popup.find('.popup-content'),
			$request_popup = $('.request-popup'),
			$request_popup_content = $request_popup.find('.popup-content'),
			$company_popup = $('.company-popup'),
			$company_popup_content = $company_popup.find('.popup-content'),
			$company_popup_edit = $('.company-popup-edit'),
			$company_popup_content_edit = $company_popup_edit.find('.popup-content'),
			$company_popup_pos = $('.company-popup-pos'),
			$company_popup_content_pos = $company_popup_pos.find('.popup-content'),
			$employee_popup = $('.employee-popup'),
			$employee_popup_content = $employee_popup.find('.popup-content');
			$popups = $('.crm-popup'),
			$profile_popup = $popups.filter('.profile-popup'),
			$profile_popup_content = $profile_popup.find('.popup-content');
			// Show / close popups
			var show_crm_popup = function ($popup) {
				clearTimeout($popup.data('tm'));
				$popup.css('display', 'block');
				requestAnimationFrame(function () {
					$popup.addClass('active');
				});
			}
			var close_crm_popup = function ($popup) {
				if ($popup.is(':visible')) {
					$popup
					.removeClass('active')
					.data('tm', setTimeout(function () {
						$popup.css('display', 'none');
					}, 200));
					
					if ($popup.data('keep') == true) {
						$popup.data('keep', false);
						show_crm_popup($popup.data('$pop'));
					}
				}
			}
			
			// Populate popup with company info
			var populate_company = function(data, $container){
				var html = '<h2 class="marb10 padrl20 padtb10 fsz18 black_txt yellow_bg">' + data.label + '</h2>';
				if(data.tabs){
					for(var tb = 0, tbL = data.tabs.length; tb < tbL; tb++){
						var tab = data.tabs[tb];
						html += '<div class="padrbl20 xs-padrl10">';
						html += '<div class="marrl5 padb10 brdb fsz13">';
						html += '<a href="#' + tab.id + '" class="expander-toggler black_txt' + ((tab.state && tab.state === 'active') ? ' target_shown' : '')  + '"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up"></span> ' + tab.label + '</a>';
						if(tab.postfix){
							html += tab.postfix;
						}
						html += '</div>';
						html += '<div id="' + tab.id + '" class="' + ((tab.state && tab.state === 'active') ? '' : 'dnone ')  + '"><div class="mart10 wi_100 dflex fxwrap_w">';
						
						if(tab.fields){
							for(var f = 0, fL = tab.fields.length; f < fL; f++){
								var field = tab.fields[f];
								
								html += '<div class="' + field.classes + ' bs_bb padrl5 padb15">';
								
								if(field.type === 'line'){
									html += '</div>';
								}
								else{
									html += '<label class="dblock marb5 fsz11">' + field.label + '</label><div class="wi_100 dflex alit_c">';
									
									if(field.prefix){
										html += field.prefix;
									}
									
									if(field.type === 'select'){
										
										if(field.name ==='job_family')
										{
											
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_family1(this.value);">';
										}
										else if(field.name ==='job_function') 
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_function1(this.value);">';
										}
										if(field.name ==='job_familyp')
										{
											
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_family2(this.value);">';
										}
										else if(field.name ==='job_functionp') 
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_function2(this.value);">';
										}
										else if(field.name ==='permision') 
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="empPermission(this.value);">';
										}
										else
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13">';
										}
										
										var field_val = field.value;
										
										if(field.options){
											if(typeof field.options === 'string'){
												try{
													var options = eval(field.options);
													if(field_val){
														html += options.replace('value="' + field_val + '"', 'value="' + field_val + '" selected');
														//alert('value="' + field_val + '"', 'value="' + field_val + '" selected');
													}
													else{
														html += options;
													}
													
												}
												catch(e){}
											}
											else if(typeof field.options === 'object'){
												for(var o = 0, oL = field.options.length; o < oL; o++){
													var option = field.options[o];
													html += '<option value="' + option.value + '"' + (field_val == option.value ? ' selected' : '')  + '>' + option.label + '</option>';
												}
											}
										}
										
										html += '</select>';
									}
									else if(field.type === 'textarea'){
										html += '<textarea name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" class="wi_100  bs_bb pad5 brd fsz13">' + (field.value ? field.value : '') + '</textarea>';
									}
									else{
										if(field.name=='rprice')
										{
											html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class=" wi_100 hei_30p bs_bb pad5 brd fsz13" min="0"/>';
										}
										else
										{
											html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class=" wi_100 hei_30p bs_bb pad5 brd fsz13"  '+ field.readonly +' />';
										}
									}
									
									if(field.postfix){
										html += field.postfix;
									}
									
									html += '</div></div>';
								}
							}
						}
						
						if(tab.thead || tab.tbody){
							html += '<div class="wi_100 padl5"><table width="100%" border="0" cellpadding="0" cellspacing="0">';
							
							if(tab.thead){
								html += '<thead class="fsz11 lgtgrey2_bg"><tr>';
								for(var t = 0, tL = tab.thead.length; t < tL; t++){
									html += '<th align="left" class="' + (tab.thead[t].class ? tab.thead[t].class : '') + '"><div class="padtb10">' + tab.thead[t].text + '</div></th>';
								}
								html += '</tr></thead>';
							}
							if(tab.tbody){
								html += '<tbody class="fsz13"><tr>';
								for(var t = 0, tL = tab.tbody.length; t < tL; t++){
									var trs = tab.tbody[t];
									html += '<tr>';
									for(var d = 0, dL = trs.length; d < dL; d++){
										html += '<td class="brdb"><div class="padtb10">' + trs[d] + '</div></td>';
									}
									html += '</tr>';
								}
								html += '</tr></tbody>';
							}
							
							html += '</table></div>';
						}
						
						html += '</div></div></div>';
					}
				}
				
				if(data.buttons){
					html += '<div class="container padrl20 tall">';
					for(var b = 0, bL = data.buttons.length; b < bL; b++){
						html += data.buttons[b];
					}
					html += '</div>';
				}
				//alert(html);
				$container
				.removeClass('active')
				.html(html);
			}
			
			$body.on('click', '.get-position-info1', function () {
				var $this = $(this);
				
				
				$company_popup_content_pos.addClass('active');
				
				$.ajax({
					url: '../editActivePosition',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_pos);
					}
					
					// Error
					else{
						$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_pos.removeClass('active');
				});
				
				if (!$company_popup_pos.hasClass('active')) {
					show_crm_popup($company_popup_pos);
				}
				return false;
			});
			
			
			
			$body.on('click', '.get-position-info', function () {
				var $this = $(this);
				
				
				$company_popup_content_pos.addClass('active');
				
				$.ajax({
					url: '../addPosition',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_pos);
					}
					
					// Error
					else{
						$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_pos.removeClass('active');
				});
				
				if (!$company_popup_pos.hasClass('active')) {
					show_crm_popup($company_popup_pos);
				}
				return false;
			});
			
			$body.on('click', '.get-active-position-info', function () {
				var $this = $(this);
				
				
				$company_popup_content_pos.addClass('active');
				
				$.ajax({
					url: '../addActivePosition',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_pos);
					}
					
					// Error
					else{
						$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_pos.removeClass('active');
				});
				
				if (!$company_popup_pos.hasClass('active')) {
					show_crm_popup($company_popup_pos);
				}
				return false;
			});
			
			$body.on('click', '.get-company-info', function () {
				var $this = $(this);
				
				$("#gratis_popup_unique").removeClass('active');
				$("#gratis_popup_unique").attr('style',"display:none");
				$("#popup_fade").removeClass('active');
				$("#popup_fade").attr('style',"display:none");
				$company_popup_content.addClass('active');
				
				$.ajax({
					url: '../addEmployee',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content);
					}
					
					// Error
					else{
						$company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content.removeClass('active');
				});
				
				if (!$company_popup.hasClass('active')) {
					show_crm_popup($company_popup);
				}
				return false;
			});
			
			$body.on('click', '.get-company-info1', function () {
				var $this = $(this);
				$(".bg_fffbcc_a").removeClass('active');
				
				$(".yellow_bg_a").removeClass('active');
				$(".bg_ebf4fd_a").removeClass('active');
				var c_id=$(this).closest('td').find('a').attr('data-id');
				$(this).closest('tr').addClass('active');
				$company_popup_content_edit.addClass('active');
				$("#a"+c_id).addClass('active');
				$.ajax({
					url: '../editEmployee',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
						'employee_id' : c_id,
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_edit);
					}
					
					// Error
					else{
						$company_popup_content_edit.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_edit.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_edit.removeClass('active');
				});
				
				if (!$company_popup_edit.hasClass('active')) {
					show_crm_popup($company_popup_edit);
				}
				return false;
			});
			
			$body.on('click', '.get-request-info', function () {
				var $this = $(this);
				var c_id=$(this).closest('td').find('a').attr('data-id');
				
				$request_popup_content.addClass('active');
				
				$.ajax({
					url: '../requestUpdate',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
						'employee_id' : c_id,
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $request_popup_content);
					}
					
					// Error
					else{
						$request_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$request_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$request_popup_content.removeClass('active');
				});
				
				if (!$request_popup.hasClass('active')) {
					show_crm_popup($request_popup);
				}
				return false;
			});
			
			$body.on('click', '.get-fortnox-info', function () {
				var $this = $(this);
				var c_id=$(this).closest('td').find('a').attr('data-id');
				
				$fortnox_popup_content.addClass('active');
				
				$.ajax({
					url: '../fortnoxUpdate',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
						'employee_id' : c_id,
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $fortnox_popup_content);
					}
					
					// Error
					else{
						$fortnox_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$fortnox_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$fortnox_popup_content.removeClass('active');
				});
				
				if (!$fortnox_popup.hasClass('active')) {
					show_crm_popup($fortnox_popup);
				}
				return false;
			});
			
			// Populate popup with company info
			var populate_profile = function(data, $container){
				var html = '<div><h2 class="xxs-dnone mar0 padrl20 padtb10 lgn_hight_20 fsz18 white_txt frmlblue_bg">' + data.user.name + '</h2>';
				html += '<div class="padb80 xxs-pad0 xxs-padb80">';
				
				// Top info
				html += '<div class="xxs-mar0 pad20 xxs-pad0 bxsh_016_577376_035 xxs-bxsh_none bg_f"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035">';
				html += '<div class="hei_125p dnone xxs-dblock padt20 bg_31932c">';
				html += '<div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="popup-close wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a>';
				html += '<div class="minwi_0 flex_1 talc">';
				if(data.job.description){
					html += '<div class="ovfl_hid ws_now txtovfl_el fsz18">' + data.job.description + '</div>';
				}
				if(data.job.match){
					html += '<div class="fsz16">' + data.job.match + '</div>';
				}
				html += '</div>';
				html += '<div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div>';
				if(data.job.best_match){
					html += '<div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>' + data.job.best_match + '</div>';
				}
				html += '</div>';
				
				if(data.user.avatar){
					html += '<div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50 padr15 xxs-pad0 xxs-marb5"><img src="' + data.user.avatar + '" width="100" height="100" class="dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brdrad100" title="' + data.user.name + '" alt="' + data.user.name + '"></div>';
				}
				
				html += '<div class="flex_1 xxs-dflex xxs-fxdir_col xxs-padrl20 xxs-talc">';
				html += '<div class="dflex xxs-dblock xxs-order_1 alit_fs justc_sb padb10 xxs-pad0"><h3 class="mar0 marb10 xxs-mar0 pad0 bold fsz22">' + data.user.name + '</h3>';
				if(data.user.rate){
					html += '<div class="xxs-dnone marb10 fsz22">' + data.user.rate.amount + ' /' + data.user.rate.period + '</div>';
				}
				html += '</div>';
				
				if(data.user.description){
					html += '<div class="xxs-order_3 marb10 xxs-marb5 lgn_hight_24 xxs-bold fsz15 xxs-fsz26">' + data.user.description + '</div>';
				}
				if(data.user.rising_talent){
					html += '<div class="dnone xxs-dblock xxs-order_4 marb15 uppercase txt_14bff5"><span class="fa fa-star"></span> ' + data.user.rising_talent + '</div>';
				}
				if(data.user.rate){
					html += '<div class="dnone xxs-dblock xxs-order_5 txt_8e"><span class="bold fsz26 txt_37a000">' +data.user.rate.amount + '</span> /' + data.user.rate.period + '</div>';
				}
				if(data.user.location || data.user.time){
					html += '<div class="xxs-order_2 marb10 xxs-marb15 xxs-fsz18 xxs-txt_8e">';
					html += '<span class="fa fa-map-marker xxs-dnone"></span> <span class="xxs-dnone">' + data.user.location + ' - ' + data.user.time.full + '</span>';
					html += '<span class="dnone xxs-dblock">' + data.user.location + ', ' + data.user.time.short + '</span>';
					html += '</div>';
				}
				
				if(data.user.skills){
					html += '<div class="xxs-dnone marl-5 fsz12">';
					var inline_skills = data.user.skills.inline,
					inline_more_skills = data.user.skills.inlne_more;
					if(inline_skills){
						for(var s = 0, sL = inline_skills.length; s < sL; s++){
							html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_skills[s] + '</span>';
						}	
					}
					if(inline_more_skills){
						for(var s = 0, sL = inline_more_skills.length; s < sL; s++){
							html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_more_skills[s] + '</span>';
						}
						html += '<a href="#" class="class-toggler diblock dnone_pa marbl10 bold fsz13 txt_37a000" data-target="parent" data-classes="active">See more</a>';
					}
					html += '</div>';
				}
				
				if(data.user.jobs || data.user.hours){
					html += '<div class="dnone xxs-dblock xxs-order_6 mart20 padtb15 brdt txt_8e">';
					if(data.user.jobs){
						html += '<span class="marrl5"><span class="bold txt_0">' + data.user.jobs + '</span> jobs</span>';
					}
					if(data.user.hours){
						html += '<span class="marrl5"><span class="bold txt_0">' + data.user.hours + '</span> hours</span>';
					}
					html += '</div>';
				}
				
				html += '</div></div>';
				
				if(data.sections){
					var overview;
					
					for(var s = 0, sL = data.sections.length; s < sL; s++){
						var section = data.sections[s];
						if(section.tag === 'overview'){
							overview = section;
							break;
						}
					}
					
					if(overview){
						html += '<div class="xxs-dnone mart10 padt20 brdt"><h3 class="mar0 marb20 pad0 bold fsz22">' + overview.label + '</h3>';
						if(overview.content){
							if(overview.content.html){
								html += overview.content.html;
							}
							if(overview.content.more){
								html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
							}
						}
						html += '</div>';
					}
				}
				
				html += '</div>';
				
				
				// Sections
				if(data.sections){
					for(var s = 0, sL = data.sections.length; s < sL; s++){
						var section = data.sections[s];
						html += '<div class="mart20 xxs-mart15 xxs-marrl10 bxsh_016_577376_035 bg_f' + (section.class ? ' ' + section.class : '') + '">';
						html += '<h3 class="mar0 pad20 xxs-padt10 xxs-padb15 brdb xxs-nobrd xxs-talc bold xxs-fntwei_n fsz22 xxs-txt_8e">' + section.label + '</h3>';
						
						// - section content
						if(section.content){
							html += '<div class="pad20 xxs-pad15 xxs-padt0">';
							
							if(section.content.html){
								html += section.content.html;
							}
							
							if(section.content.more){
								html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
							}
							
							var inline_content = section.content.inline;
							if(inline_content){
								for(var i = 0, iL = inline_content.length; i < iL; i++){
									html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content[i] + '</span>';
								}
							}
							
							var inline_content_more = section.content.inline_more;
							if(inline_content_more){
								for(var i = 0, iL = inline_content_more.length; i < iL; i++){
									html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content_more[i] + '</span>';
								}
								html += '<a href="#" class="class-toggler wi_100 dblock dnone_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See more</a><a href="#" class="class-toggler wi_100 dnone dblock_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See less</a>';
							}
							html += '</div>';
						}
						
						
						//  - timeline
						if(section.timeline){
							html += '<div class="padt20 xxs-padt0 xxs-padrl15 padb5"><div class="career_timeline xs-mar0 xs-padrl20 xs-nobrd xxs-fsz16"><span class="trend_start xs-dnone"></span>';
							for(var t = 0, tL = section.timeline.length; t < tL; t++){
								var timeline = section.timeline[t];
								html += '<div class="career_year_exp pos_rel marb15 padb15 xs-brdb">';
								
								if(timeline.year){
									html += '<span class="year_trend xs-pos_stai xs-marb5"><span>' + timeline.year + '</span></span>';
								}
								if(timeline.title){
									html += '<div class="padb5 fsz18 xxs-fsz17 txt_0">' + timeline.title + '</div>';
								}
								if(timeline.short_description){
									html += '<p>' + timeline.short_description + '</p>';
								}
								if(timeline.description){
									html += '<div>' + timeline.description + '</div>';
								}
								
								html += '</div>';
							}
							html += '</div></div>';
						}
						html += '</div>';
					}
				}
				
				html += '</div><div class="wi_720p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot0 right0 bs_bb pad10 bg_f"><div class="dflex talc bold"><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Message</a></div><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Hire</a></div></div></div></div>';
				$container
				.removeClass('active')
				.html(html);
			}
			
			
			
			// Show company popup and call population function
			/*$body.on('click', '.get-company-info', function () {
				var $this = $(this);
				if ($window.width() > 991) {
				close_crm_popup($employee_popup);
				$company_popup_content.addClass('active');
				
				$.ajax({
				url: '../../profileInfo',
				type: 'POST',
				dataType: 'json',
				data: {
				'id': $this.data('id'),
				},
				})
				.done(function(data){
				
				// Success
				if(data.status == 'ok'){
				populate_company(data.message, $company_popup_content);
				}
				
				// Error
				else{
				$company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
				}
				})
				.fail(function(){
				$company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
				$company_popup_content.removeClass('active');
				});
				
				if (!$company_popup.hasClass('active')) {
				show_crm_popup($company_popup);
				}
				return false;
				}
				});
			*/
			// Show new company popup
			// Show employee popup and call population function
			$body.on('click', '.get-employee-info', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');
					
					$.ajax({
						url: 'employee_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}
						
						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});
					
					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});
			
			// Show new employee popup
			$body.on('click', '#new-employee-btn a', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');
					
					$.ajax({
						url: 'new_employee_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}
						
						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});
					
					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});
			
			// Show new person popup
			$body.on('click', '#new-person-btn a', function () {
				var $this = $(this);
				console.log($this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');
					
					$.ajax({
						url: 'new_person_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}
						
						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});
					
					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});
			
			// Show new company person popup
			$body.on('click', '.get-new-employee', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');
					
					$.ajax({
						url: 'new_company_person_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}
						
						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});
					
					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});
			
			// Close popup
			$body.on('click', '.crm-popup .popup-close', function () {
				close_crm_popup($(this).closest('.crm-popup'));
				return false;
			});
			
			
			
			
			// Count selected
			$body.on('ifChecked ifUnchecked', 'input[type=checkbox].toggle-visited', function(event){
				var $this = $(this),
				$form = $this.closest('form'),
				$count_target = $form.data('$count_target'),
				$inputs = $form.find('input[type=checkbox].toggle-visited:checked');
				//alert($inputs.length);
				if(!$count_target){
					//alert($count_target);
					$count_target = $($form.data('count-target'));
					$form.data('$count_target', $count_target);
				}
				if($count_target[0]){
					alert($count_target.html($inputs.length));
					$count_target.html($inputs.length);
				}
			});
			
		});
	</script>
	
	
	
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/keep.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>

</html>
<?php
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 0)
		{
			// showing alert message if article already exists
			echo '<script>alert("Invalid file !!!")</script>';
		}
		else if($_GET['error'] == 2)
		{
			
			echo '<script>alert("File error !!!")</script>';
		}
		
	}
	?>		