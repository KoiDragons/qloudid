﻿<!doctype html>
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
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<?php include 'CompanyHeaderOffices.php'; ?>
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
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
									<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb_b padb20">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
															
																	 <div class="pad20 wi_95 hei_180p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	" id="aa_1227620">
																	
																	
																	
																	<img src="<?php echo $path; ?>html/usercontent/images/53f9d89d9e.svg"  height="170">
																				
																				
																				</div> 																<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padr10 padt20 fsz18 bold"> <span><?php echo substr($companyDetail['company_name'],0,20); ?></span>  </div>
																<div class="padtr10 fsz15"> <span><?php echo $locationDetail['visiting_address']; ?></span>  </div>
															</a></div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>
									<ul class="marr20 pad0">
										<li class=" dblock padb10 padl8 hidden">
											<a href="../../ConsentPlatformBusiness/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Samtyckesplattform</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
									
										<li class=" dblock  padl8 ">
											<a href="https://www.qloudid.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.qloudid.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Prisförslag</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 hidden">
											<a href="https://www.qloudid.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Inköpsrabatt </span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										<li class="dblock pos_rel padb10 brdclr_hgrey hidden">
											
											<ul class="marr20 pad0">
												
												
												
												
												<li class="dblock padrb10">
													<a href="../../CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Meddelande</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										
										
									
										<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Om Kontoret</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="../locationAccount/<?php echo $data['lid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdl brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Kontaktuppgifter</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Kontorschef</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="../../MeetingRoom/roomSpaceDetail/<?php echo $data['lid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mötesrum</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../WhitelistIP/ipSetting/<?php echo $data['lid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn"> IP</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../CompanyWifi/wifiSetting/<?php echo $data['lid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Wifi</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../CompanyDepartment/departmentInfo/<?php echo $data['lid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn"> Avdelningar</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
											</ul>
											
										</li>
										
											<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Gå till...</h4>
											<ul class="marr20 pad0">
											
												
												<li class="dblock padrb10">
													<a href="../../CompanyTenant/officeAccount/<?php echo $data['lid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Min hyresvärd</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mina anställda (lista)</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg rotate45"></div>
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
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class="white_bg tall">
									
									
									
									
									
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Employee portal  </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
								
								
							</div>
							</div>
							
							
								
							<div class="tab-content padb25 padt5 " id="tab_total"  style="display:block;">
									
									
									
									<table class="wi_100 " cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz14 lgtgrey2_bg" >
											<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Employees  </div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt"></div>
												</th>
												
												
												
										</thead>
										</table>
											<?php $i=0;
												
												foreach($employeeInformation as $category => $value) 
												{
													
													
												?> 
												
												<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Name">Name</span> <a href="#" ><span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['name']; ?></span></a> </div>
													<div class="fleft wi_45 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Email">Email</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['email']; ?></span> </div>
													<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0">
														<a href="#" ><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>	
												</div>
												
												
												
												
												
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
									</div>
											<?php } ?>
									

										<div id="totalEmployees">
											
										</div>
									<div class="padt20 talc">
										<a href="#" class="load_more_results  marrl5" value="1" id="temp" onclick="show_more_data(this,this.value);">Visa fler</a>
										
									</div>	
											
												<script>
							function show_more_data(link,id) {
				
				var html;
				var id_val1=parseInt($(link).attr('value'));
				var id_val=parseInt($(link).attr('value'))+1;
				
				$(link).val(id_val);
				$("#temp").attr('value',id_val);
				
				var send_data={};
				
				send_data.id=id_val1;
				$.ajax({
					type:"POST",
					url:"../moreEmployeeInformation/<?php echo $data['lid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						html=data1;
						
						$("#totalEmployees")
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
					<a href="https://www.qloudid.com/user/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Ongoing</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtblue2_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="https://www.qloudid.com/user/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Store it</span>
					</a>
					<a href="https://www.qloudid.com/user/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
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
						<a href="https://www.qloudid.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
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