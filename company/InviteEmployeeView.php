<!doctype html>
<html>
	<?php
		$path1 = "../../html/usercontent/images/";
	?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/animated/images/favicon.ico"/>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/modules.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/workplacestart/css/jquery.bxslider.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/css/style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/icofont.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smartappcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			
			function addActive(link){
		$(link).addClass('active');
		return false;
		}	
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
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
		</script>
	</head>
	
	<body class="white_bg">
		
		<?php include 'CompanyHeaderClosed.php'; ?>
		<div class="clear"></div>
		
		
		
		<div class="column_m pos_rel">
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
						<div class="padb20 xxs-padb0 ">
							<!-- Charts -->
							
							
							
							<div class="column_m padb30 mart40 xs-mart20  fsz14 lgn_hight_22 dark_grey_txt brdb_new">
								<div class="container ">
									<div class="">
										<h3 class="marb0  xxs-talc talc fsz35 xs-fsz25 bold marb5 black_txt trn" >Invite Employee(s)</h3>
								
								<div class="padb20 padt10 xxs-talc talc"> <a href="#" class="black_txt fsz20 xs-fsz20 xxs-talc talc edit-text jain_drop_company trn " >Please make a choice how you want to share your employee details.</a></div>

									
								
										
										
										<div class="tab_container mart5">
											
											
											<!-- Analytics -->
											<div class="tab_content " id="utab_Popular" style="display: block;">
												
													<div class="xxs-wi_100 wi_33 fleft bs_bb pad20 talc ">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="../employeeInfo/<?php echo $data['lid']; ?>" class="style_base hei_240p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../../html/usercontent/images/bg/dataentry.jpg" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padtb20">
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">Add manually...</h3>
																		<span class="dblock tall marb5 padt10 midgrey_txt fsz18  xs-fsz16">Provide all answer asked on the page to know us better.</span>
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
													
												<div class="xxs-wi_100 wi_33 fleft bs_bb pad20 talc ">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_240p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../../html/usercontent/images/bg/FileUpload.png" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padtb20">
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">By File...</h3>
																		<span class="dblock tall marb5 padt10 midgrey_txt fsz18  xs-fsz16">Instantly upload employees  when file is uploaded on the server.</span>
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												<div class="xxs-wi_100 wi_33 fleft bs_bb pad20 talc ">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_240p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<img src="../../../../html/usercontent/images/bg/header3x.png" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padtb20">
																		<h3 class="ovfl_hid tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0"> By integration...</h3>
																		<span class="dblock tall marb5 padt10 midgrey_txt fsz18 xs-fsz16">Instantly upload employees  when file is uploaded on the server.</span>
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class="clear"></div>
											</div>
											
											
											<!-- CRMs -->
											<div class="tab_content hide" id="utab_CRMs" style="display: none;">
												
												
												<div class="clear"></div>
											</div>
											
											
											
										</div>
									</div>
								</div>
								
								
							</div>
							
							
							
							<div class="clear"></div>
						</div>
					
				</div>
			</div>
						
			<div class="clear"></div>
		</div>
		<div class="wi_100 hidden  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtblue2_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="https://www.qloudid.com/user/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
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
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
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
		
		
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="marb20"> <img src="<?php echo $path;?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
					<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
					<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
					</div>
					<div class="marb25">
					<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
					<div>
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
					<div class="marb10 padtb20 pos_rel">
						<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
							eller om du redan har en prenumeration
						</span> </div>
						<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
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
		<div id="popup_fade" class="opa0 opa55_a black_bg "></div>
		
	</div>
	
	<div class="wi_600p maxwi_90 dnone pos_fix zi999 pos_cen  bs_bb fsz14" id="keep-modal">
		<form>
			<div class="keep-block keep-block-modal pos_rel brdrad2 bg_f txt_0_87 trans_bgc1 ">
				<a href="#" class="keep-pin dblock pos_abs zi5 top4p right4p pad5">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="dblock dnone_pa opa50 opa1_h trans_opa1" alt="Pin note">
					<img src="<?php echo $path; ?>html/keepcss/images/icons/pin_active.svg" width="18" height="18" class="dnone dblock_pa" alt="Unpin note">
					<div class="dblock dnone_pa opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
						<span class="dblock padrl8">Pin note</span>
					</div>
					<div class="dnone dblock_pa opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
						<span class="dblock padrl8">Unpin note</span>
					</div>
				</a>
				<div class="custom-scrollbar minhei_60p maxhei_100vh-70p ovfl_auto pos_rel">
					<div class="keep-images dflex fxwrap_w alit_c"></div>
					<div class="padt16 padr16 padl16">
						<textarea name="title" rows="1" cols="1" class="autosize keep-title wi_100-15p dblock marb16 pad0 nobrd bg_trans ff_inh bold fsz17 txt_0_87" placeholder="Title"></textarea>
					</div>
					<div class="keep-list padr16 padl16"></div>
					<div class="keep-list-add-item opa54 pos_rel marr16 marl16 marb16 padtb5 padrl25 txt_21">
						<label for="keep-list-add" class="dblock pos_abs pos_cenY left-2p curp">
							<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-plus.svg" width="18" height="18" class="dblock">
						</label>
						<input type="text" name="keep-list-add" id="keep-list-add" class="wi_100 dblock pad0 nobrd bg_trans ff_inh fsz_inh txt_21" placeholder="List item">
					</div>
					<div class="keep-completed marb16 padr16 padl16" data-before="Completed items"></div>
					<div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16"></div>
				</div>
				<div class="wi_100 dflex fxwrap_w alit_c justc_sb">
					<div class="keep-actions wi_100 maxwi_400p dflex alit_c pos_rel zi5 padb5">
						<div class="keep-action wi_12_5 pos_rel">
							<a href="#" class="keep-action-remind dblock opa50 opa1_h pad5 talc trans_opa1">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
							</a>
							<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
								<span class="dblock padrl8">Remind me</span>
							</div>
						</div>
						<div class="keep-action wi_12_5 pos_rel">
							<a href="#" class="keep-action-collaborator dblock opa50 opa1_h pad5 talc trans_opa1">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-collaborator.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Collaborator">
							</a>
							<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
								<span class="dblock padrl8">Collaborator</span>
							</div>
						</div>
						<div class="keep-action wi_12_5 pos_rel">
							<a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
							</a>
							<div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs bot100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
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
						<div class="keep-action wi_12_5 pos_rel">
							<label class="keep-add-image dblock opa50 opa1_h pos_rel pad5 talc curp trans_opa1">
								<input type="file" accept="image/*" class="sr-only">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-image.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Add image">
							</label>
							<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
								<span class="dblock padrl8">Add image</span>
							</div>
						</div>
						<div class="keep-action wi_12_5 pos_rel">
							<a href="#" class="keep-action-archive dblock opa50 opa1_h pad5 talc trans_opa1">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
							</a>
							<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
								<span class="dblock padrl8">Archive</span>
							</div>
						</div>
						<div class="keep-action wi_12_5 pos_rel">
							<a href="#" class="keep-action-more dblock opa50 opa1_h pad5 talc trans_opa1">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
							</a>
							<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
								<span class="dblock padrl8">More</span>
							</div>
						</div>
						<div class="keep-action wi_12_5 pos_rel">
							<a href="#" class="dblock opa50 opa1_h opa25_na_i pad5 talc curna curp_a trans_opa1">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-undo.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Undo">
							</a>
							<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
								<span class="dblock padrl8">Undo</span>
							</div>
						</div>
						<div class="keep-action wi_12_5 pos_rel">
							<a href="#" class="dblock opa50 opa1_h opa25_na_i pad5 talc curna curp_a trans_opa1">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-undo.svg" width="18" height="18" class="maxwi_100 hei_auto scale-11" alt="Redo">
							</a>
							<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
								<span class="dblock padrl8">Redo</span>
							</div>
						</div>
					</div>
					<div class="fxshrink_0 marr15 marla padb5">
						<button type="submit" class="marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Done</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	
	<!--Keep modal fade -->
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 loading_image brd brdrad10"  id="loading_image">
		<div class="modal-content pad25 brd brdrad10 talc">
			<img src="<?php echo $path; ?>html/usercontent/images/loading_icon.png" />
			
		</div>
	</div>
	
	
	
	
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="../../html/keepcss/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../html/keepcss/js/autosize.min.js"></script>
		
		<script type="text/javascript" src="../../html/keepcss/js/superfish.js"></script>
		<script type="text/javascript" src="../../html/keepcss/js/icheck.js"></script>
		
		<script type="text/javascript" src="../../html/keepcss/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="../../html/keepcss/modules.js"></script>
		<script type="text/javascript" src="../../html/keepcss/js/custom.js"></script>
		<script type="text/javascript" src="../../html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="../../html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/jquery.selectric.js"></script>
		<!--<script type="text/javascript" src="../../html/usercontent/modules.js"></script>-->
		<script type="text/javascript" src="<?php echo $path; ?>html/smartappcss/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/smartappcss/js/superfish.js"></script>
		
		<script type="text/javascript" src="<?php echo $path; ?>html/smartappcss/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/smartappcss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/smartappcss/js/custom.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/custom.js"></script>
</body>

</html>