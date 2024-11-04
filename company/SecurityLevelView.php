<!doctype html>
<html>
	<?php
		$path1 = "../../html/usercontent/images/";
		
	if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; ?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_verify.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			var keepGlobal=0;
			var send_data = {};
			send_data.general=0;
			send_data.post=0;
			send_data.byphone=0;
		
			function addActive()
			{
				$("#more").addClass('active');
			}
			function show_rename()
			{
				$("#more-rename-modal").addClass('active');
				$("#more-rename-modal").attr("style", "display:block");
			}
			function show_restore()
			{
				$("#more-restore-modal").addClass('active');
				$("#more-restore-modal").attr("style", "display:block");
			}
			function show_delete()
			{
				$("#more-delete-modal").addClass('active');
				$("#more-delete-modal").attr("style", "display:block");
			}
			
			function show_suspend()
			{
				$("#more-suspend-modal").addClass('active');
				$("#more-suspend-modal").attr("style", "display:block");
			}
			var dict = {
				"Home": {
					sv: "Início"
				},
				"Download plugin": {
					sv: "Descarregar plugin",
					en: "Download plugin"
				}
			}
			var translator = $('body').translate({lang: "en", t: dict});
			translator.lang("sv");
			var translation = translator.get("Home");
			
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
			
			function submit_value()
			{
				document.getElementById("save_indexing").submit();
			}
		</script>
	</head>
	
	<body class="white_bg" >
		
		<!-- HEADER -->
		<?php include 'CompanyHeaderUpdated.php'; ?><div class="clear" id=""></div>
		
		
		
		<!-- CONTENT -->
		<div class="column_m container zi5 mart40 xs-mart20" onclick="checkFlag();">
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
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt">Business</a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz40 xs-fsz30 sm-fsz30 
														bold"><?php echo substr(html_entity_decode($companyDetail['company_name']),0,6); ?></a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span>  </div>
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
										
										
										
										<li class=" dblock padb10 padl8 ">
											<a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>	
										
										
											<li class=" dblock   padl8 ">
											<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Säkerhetsskydd</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg  rotate45"></div>
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
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Om huvudkontoret</h4>
											<ul class="marr20 pad0">
											
												
												<li class="dblock padrb10">
													<a href="../../CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Företagsuppgifter</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Kontor</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
													
												<li class="dblock padrb10">
													<a href="../../MeetingRoom/roomSpaceDetail/<?php echo $headQuarterID; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mötesrum</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../WhitelistIP/ipSetting/<?php echo $headQuarterID; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">IP</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="../../CompanyWifi/wifiSetting/<?php echo $headQuarterID; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Wifi</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../CompanyDepartment/departmentInfo/<?php echo $headQuarterID; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn"> Avdelning</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										 <li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Gå till...</h4>
											<ul class="marr20 pad0">
											
												
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Min hyresvärd</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												
											</ul>
											
										</li>
										
										<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Hantera mina...</h4>
											<ul class="marr20 pad0">
											<li class="dblock padrb10">
													<a href="../../ManagePermissions/manageAdmin/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Administratörer</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>	
											<?php 
											if($countryInfo>0)
											{
												foreach($getMandatoryApps as $category => $value) 
													{
													?>	
												
												<li class="dblock padrb10">
													<a href="../../RelationshipManager/productPage/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn"><?php echo $value['app_name']; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
											<?php } } ?>
												
												
											</ul>
											
											</li> 
										
										<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Partnerportal</h4>
											<ul class="marr20 pad0">
												
												
													
													<li class="dblock padrb10">
													<a href="../../CompanyPartner/partnerInfo/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Partner</span>
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
					
					
					
				<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						<!-- About us -->
					<div class="zi1 padb5">
						<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
							<div class="white_bg tall">
								
								
								
								
								<!-- Logo -->
								<h1 class="fsz30 xz-fsz25 tall bold">Säkerhetsnivån för ditt konto</h1>
								<!-- Logo -->
								<div class="marb0"> <a href="#" class="blacka1_txt tall fsz18 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Vi har fyra nivåer av säkerhet för ett Qloud ID konto. De första 3 nivåerna kan du hantera med enkelhet med din dator och smartphone. Medans den fjärde alternativet kräver att du vänder dig till din arbetsgivare. Samtliga nivåer är kostnadsfria.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
									<!-- Meta -->
									
								</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
							</a>
							
							
						</div>
					</div>	
						
						
					
						<div class="column_m container tab-header mart30  talc dark_grey_txt ">
						<ul class="tab-header tab-header-custom tab-header-custom9 xs-dnone lgtgrey2_bg">
						<li >
						<a href="#" class="dblock brdradt5 " data-id="tab_total0">
									<span class="count black_txt" ></span>
									<span class="black_txt trn fsz16" > </span>
								</a>
							</li>
						
							<li class=" <?php if($companyDetail['grading_status']==0) echo 'active'; else echo ''; ?>">
								<a href="#" class="dblock brdradt5  <?php if($companyDetail['grading_status']==0) echo 'active'; else echo ''; ?>" data-id="tab_total">
									<span class="count black_txt"><?php echo $companyDetail['completed_requests']; ?>%</span>
									<span class="black_txt trn fsz16" >B </span>
								</a>
							</li>
							<li class=" <?php if($companyDetail['grading_status']==1) echo 'active'; else echo ''; ?>">
								<a href="#" class="dblock brdradt5 <?php if($companyDetail['grading_status']==1) echo 'active'; else echo ''; ?>" data-id="tab_total2">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16" >A </span>
								</a>
							</li>
							<li class=" <?php if($companyDetail['grading_status']==2) echo 'active'; else echo ''; ?>">
								<a href="#" class="dblock brdradt5 <?php if($companyDetail['grading_status']==2) echo 'active'; else echo ''; ?>" data-id="tab_total1">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16" >AA </span>
								</a>
							</li>
							
							
							<li class=" <?php if($companyDetail['grading_status']==3) echo 'active'; else echo ''; ?>">
								<a href="#" class="dblock brdradt5 <?php if($companyDetail['grading_status']==3) echo 'active'; else echo ''; ?>" data-id="tab_total3">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16" >AAA </span>
								</a>
							</li>
							
							<div class="clear"></div>
						</ul>
						
						<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb xs-fsz30 panlpanlyellow_bg xs-wi_100">
						<option value="tab_total0" class="xs-fsz20">Description</option>
						<option value="tab_total" class="xs-fsz20">B</option>
						<option value="tab_total1" class="xs-fsz20">A</option>
						<option value="tab_total2" class="xs-fsz20">AA</option>
						<option value="tab_total3" class="xs-fsz20">AAA</option>
						</select>
						<div class="clear"></div>
					</div>
					
					<div class="column_m container   fsz14 dark_grey_txt">
						<div class="tab-content padt5 " id="tab_total0" style="display:none;">
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_40 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Description</div></a>
										</th>
										
										<th class="wi_15 pad5 brdb_new nobold  talc  <?php if($companyDetail['grading_status']==0) echo 'panlyellow_bg'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn" >Rating B</div>
										</th>
										<th class="wi_15 pad5 brdb_new nobold  talc <?php if($companyDetail['grading_status']==1) echo 'panlyellow_bg'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn">Rating A</div>
										</th>
										<th class="wi_15 pad5 brdb_new nobold  talc  <?php if($companyDetail['grading_status']==2) echo 'panlyellow_bg'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn">Rating AA</div>
										</th>
										<th class="wi_15 pad5 brdb_new nobold  talc <?php if($companyDetail['grading_status']==3) echo 'panlyellow_bg'; else echo ''; ?>">
											<div class="padtb5 black_txt trn">Rating AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Email & Lösenord</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Mobil nummer</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Namn & Efternamn</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Person nummer</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Legitimation</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 tall cn">
											<div class="padtb5 " ></div>
										</td>
										<?php if($companyDetail['grading_status']==0) {  ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==0) echo 'panlyellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } if($companyDetail['grading_status']==0) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',1); ?>/<?php echo $data['cid']; ?>">Select</a></div>
										</td>
										<?php } else if($companyDetail['grading_status']==1) { ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==1) echo 'panlyellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } if($companyDetail['grading_status']==1) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',2); ?>/<?php echo $data['cid']; ?>">Select</a></div>
										</td>
										<?php } else if($companyDetail['grading_status']==2) { ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==2) echo 'panlyellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } if($companyDetail['grading_status']==2) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',3); ?>/<?php echo $data['cid']; ?>">Select</a></div>
										</td>
										<?php } else if($companyDetail['grading_status']==3) { ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==3) echo 'panlyellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } ?>
										
									</tr>
									
									</tbody>
								
							</table>
							
						</div>
					
						<!-- Summary -->
						
					</div>
					
					
					
					
					
					
					
					
					
				</div>
				
				
				
				
				
				
				<!-- Center content -->
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 hidden">
					
					<div class="padb10 ">
						<h1 class="padb5 talc fsz50">Security</h1>
						<p class="pad0 talc fsz18 padb20 brdb wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10">Manage security settings for your business</p>
					</div>
					
					
					
					<div class="clear"></div>
					
					
				</div>
				
				<div class="wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  hidden ">
					<!-- About us -->
					<div class="marrl10 lgtblue2_bg brdrad3 xs-marrl0 white_bg" >
						
						<div class="container pad25 padb20 xs-pad10 xs-padt10 xs-padb20  brdrad1 fsz14 dark_grey_txt lgtgrey2_bg">
							<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall lgtgrey2_bg">
								<div class="wi_100 pos_abs xs-pos_sta top0 right0">
									<div class="dflex alit_c justc_fe marb10 ">
										<div class="pos_rel">
											
										</div>
										<div class="pos_rel">
											<a href="#" class="show_popup_modal dblock opa50 opa1_h pad10 trans_opa2" data-target="#reset-pass-modal">
												<img src="<?php echo $path;?>html/usercontent/images/icons/reset-password-24.svg">
											</a>
											<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
												<span class="dblock padrl8">Reset password</span>
											</div>
										</div>
										<div class="pos_rel">
											<a href="#" class="class-toggler dblock opa50 opa1_h pad10 trans_opa2" onclick="addActive();" data-classes="active">
												<img src="<?php echo $path;?>html/usercontent/images/icons/more.svg">
											</a>
											<div class="wi_120p dnone dblocki_a pos_abs zi40 top100 right-20p bxsh_02100_105112113_05 brd bg_f" id="more">
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Rename</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-rename-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Restore data</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-restore-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Suspend</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-suspend-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Delete</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-delete-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl15 sm-padl5">
									<h2 class="dnone xs-dblock padb15 uppercase bold fsz18 trn">Cloud ID Business</h2>
									<div>
										<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm">
										<span class="valm bold xs-nobold fsz24 xs-fsz15 trn">Business</span>
										<span class="dblock xs-dnone bold fsz14 trn">Passport</span>
									</div>
									<div class="dnone xs-dblock mart10 marb20">
										<img src="<?php echo $path;?>html/usercontent/images/score.png" width="40" class="marr5 valm">
										<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
									</div>
								</div>
								<!--<div class="clear hidden-xs"></div>-->
								<div class="wi_30 xs-order_1">
										<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
											<div class="imgwrap nobrd bgis_coni">
												<div class="cropped_image <?php if($companyDetail ['profile_pic']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" ></div>
												
											</div>
										</div>
										
									</div>
								<div class="wi_70 xs-wi_100 xs-order_4 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Company identification number</span> <span class=" edit-text jain dblock brdb brdclr_lgtgrey2 fsz20"><?php echo $companyDetail['cid']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Company name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $companyDetail['company_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Industry</span> <span class="edit-select dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="Staffing &amp; Recruiting"><?php echo $companyDetail['industry']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Visiting address</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $companyDetail['address']; ?></span> </div>
										<div class="container marrl-2 padl15 xs-pad0">
											<div class="fleft wi_33 bs_bb padrl2"> <span>City</span> <span class=" edit-text jain11 dblock brdb brdclr_lgtgrey2 curt fsz16"><?php echo $companyDetail['city']; ?></span> </div>
											<div class="fleft wi_33 bs_bb padrl2"> <span>Zip</span> <span class=" edit-text jain12 dblock brdb brdclr_lgtgrey2 wordb_ba curt fsz16"><?php echo $companyDetail['zip']; ?></span> </div>
											<div class="fleft wi_33 bs_bb padrl2"> <span>Country</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16" data-list="countries-list" ><?php echo $companyDetail['country']; ?></span> </div>
											<datalist id="countries-list">
												<option value="Abkhazia"></option>
												<option value="Afghanistan"></option>
												<option value="Albania"></option>
												<option value="Algeria"></option>
												<option value="American Samoa"></option>
												<option value="Andorra"></option>
												<option value="Angola"></option>
												<option value="Anguilla"></option>
												<option value="Antigua and Barbuda"></option>
												<option value="Argentina"></option>
												<option value="Armenia"></option>
												<option value="Aruba"></option>
												<option value="Ascension"></option>
												<option value="Australia"></option>
												<option value="Australian External Territories"></option>
												<option value="Austria"></option>
												<option value="Azerbaijan"></option>
												<option value="Bahamas"></option>
												<option value="Bahrain"></option>
												<option value="Bangladesh"></option>
												<option value="Barbados"></option>
												<option value="Barbuda"></option>
												<option value="Belarus"></option>
												<option value="Belgium"></option>
												<option value="Belize"></option>
												<option value="Benin"></option>
												<option value="Bermuda"></option>
												<option value="Bhutan"></option>
												<option value="Bolivia"></option>
												<option value="Bosnia and Herzegovina"></option>
												<option value="Botswana"></option>
												<option value="Brazil"></option>
												<option value="British Indian Ocean Territory"></option>
												<option value="British Virgin Islands"></option>
												<option value="Brunei"></option>
												<option value="Bulgaria"></option>
												<option value="Burkina Faso"></option>
												<option value="Burundi"></option>
												<option value="Cambodia"></option>
												<option value="Cameroon"></option>
												<option value="Canada"></option>
												<option value="Cape Verde"></option>
												<option value="Cayman Islands"></option>
												<option value="Central African Republic"></option>
												<option value="Chad"></option>
												<option value="Chile"></option>
												<option value="China"></option>
												<option value="Christmas Island"></option>
												<option value="Cocos-Keeling Islands"></option>
												<option value="Colombia"></option>
												<option value="Comoros"></option>
												<option value="Congo"></option>
												<option value="Congo, Dem. Rep. of (Zaire)"></option>
												<option value="Cook Islands"></option>
												<option value="Costa Rica"></option>
												<option value="Croatia"></option>
												<option value="Cuba"></option>
												<option value="Curacao"></option>
												<option value="Cyprus"></option>
												<option value="Czech Republic"></option>
												<option value="Denmark"></option>
												<option value="Diego Garcia"></option>
												<option value="Djibouti"></option>
												<option value="Dominica"></option>
												<option value="Dominican Republic"></option>
												<option value="East Timor"></option>
												<option value="Easter Island"></option>
												<option value="Ecuador"></option>
												<option value="Egypt"></option>
												<option value="El Salvador"></option>
												<option value="Equatorial Guinea"></option>
												<option value="Eritrea"></option>
												<option value="Estonia"></option>
												<option value="Ethiopia"></option>
												<option value="Falkland Islands"></option>
												<option value="Faroe Islands"></option>
												<option value="Fiji"></option>
												<option value="Finland"></option>
												<option value="France"></option>
												<option value="French Antilles"></option>
												<option value="French Guiana"></option>
												<option value="French Polynesia"></option>
												<option value="Gabon"></option>
												<option value="Gambia"></option>
												<option value="Georgia"></option>
												<option value="Germany"></option>
												<option value="Ghana"></option>
												<option value="Gibraltar"></option>
												<option value="Greece"></option>
												<option value="Greenland"></option>
												<option value="Grenada"></option>
												<option value="Guadeloupe"></option>
												<option value="Guam"></option>
												<option value="Guatemala"></option>
												<option value="Guinea"></option>
												<option value="Guinea-Bissau"></option>
												<option value="Guyana"></option>
												<option value="Haiti"></option>
												<option value="Honduras"></option>
												<option value="Hong Kong SAR China"></option>
												<option value="Hungary"></option>
												<option value="Iceland"></option>
												<option value="India"></option>
												<option value="Indonesia"></option>
												<option value="Iran"></option>
												<option value="Iraq"></option>
												<option value="Ireland"></option>
												<option value="Israel"></option>
												<option value="Italy"></option>
												<option value="Ivory Coast"></option>
												<option value="Jamaica"></option>
												<option value="Japan"></option>
												<option value="Jordan"></option>
												<option value="Kazakhstan"></option>
												<option value="Kenya"></option>
												<option value="Kiribati"></option>
												<option value="Kuwait"></option>
												<option value="Kyrgyzstan"></option>
												<option value="Laos"></option>
												<option value="Latvia"></option>
												<option value="Lebanon"></option>
												<option value="Lesotho"></option>
												<option value="Liberia"></option>
												<option value="Libya"></option>
												<option value="Liechtenstein"></option>
												<option value="Lithuania"></option>
												<option value="Luxembourg"></option>
												<option value="Macau SAR China"></option>
												<option value="Macedonia"></option>
												<option value="Madagascar"></option>
												<option value="Malawi"></option>
												<option value="Malaysia"></option>
												<option value="Maldives"></option>
												<option value="Mali"></option>
												<option value="Malta"></option>
												<option value="Marshall Islands"></option>
												<option value="Martinique"></option>
												<option value="Mauritania"></option>
												<option value="Mauritius"></option>
												<option value="Mayotte"></option>
												<option value="Mexico"></option>
												<option value="Micronesia"></option>
												<option value="Midway Island"></option>
												<option value="Moldova"></option>
												<option value="Monaco"></option>
												<option value="Mongolia"></option>
												<option value="Montenegro"></option>
												<option value="Montserrat"></option>
												<option value="Morocco"></option>
												<option value="Myanmar"></option>
												<option value="Namibia"></option>
												<option value="Nauru"></option>
												<option value="Nepal"></option>
												<option value="Netherlands"></option>
												<option value="Netherlands Antilles"></option>
												<option value="Nevis"></option>
												<option value="New Caledonia"></option>
												<option value="New Zealand"></option>
												<option value="Nicaragua"></option>
												<option value="Niger"></option>
												<option value="Nigeria"></option>
												<option value="Niue"></option>
												<option value="Norfolk Island"></option>
												<option value="North Korea"></option>
												<option value="Northern Mariana Islands"></option>
												<option value="Norway"></option>
												<option value="Oman"></option>
												<option value="Pakistan"></option>
												<option value="Palau"></option>
												<option value="Palestinian Territory"></option>
												<option value="Panama"></option>
												<option value="Papua New Guinea"></option>
												<option value="Paraguay"></option>
												<option value="Peru"></option>
												<option value="Philippines"></option>
												<option value="Poland"></option>
												<option value="Portugal"></option>
												<option value="Puerto Rico"></option>
												<option value="Qatar"></option>
												<option value="Reunion"></option>
												<option value="Romania"></option>
												<option value="Russia"></option>
												<option value="Rwanda"></option>
												<option value="Samoa"></option>
												<option value="San Marino"></option>
												<option value="Saudi Arabia"></option>
												<option value="Senegal"></option>
												<option value="Serbia"></option>
												<option value="Seychelles"></option>
												<option value="Sierra Leone"></option>
												<option value="Singapore"></option>
												<option value="Slovakia"></option>
												<option value="Slovenia"></option>
												<option value="Solomon Islands"></option>
												<option value="South Africa"></option>
												<option value="South Georgia and the South Sandwich Islands"></option>
												<option value="South Korea"></option>
												<option value="Spain"></option>
												<option value="Sri Lanka"></option>
												<option value="Sudan"></option>
												<option value="Suriname"></option>
												<option value="Swaziland"></option>
												<option value="Sweden"></option>
												<option value="Switzerland"></option>
												<option value="Syria"></option>
												<option value="Taiwan"></option>
												<option value="Tajikistan"></option>
												<option value="Tanzania"></option>
												<option value="Thailand"></option>
												<option value="Timor Leste"></option>
												<option value="Togo"></option>
												<option value="Tokelau"></option>
												<option value="Tonga"></option>
												<option value="Trinidad and Tobago"></option>
												<option value="Tunisia"></option>
												<option value="Turkey"></option>
												<option value="Turkmenistan"></option>
												<option value="Turks and Caicos Islands"></option>
												<option value="Tuvalu"></option>
												<option value="U.S. Virgin Islands"></option>
												<option value="Uganda"></option>
												<option value="Ukraine"></option>
												<option value="United Arab Emirates"></option>
												<option value="United Kingdom"></option>
												<option value="United States"></option>
												<option value="Uruguay"></option>
												<option value="Uzbekistan"></option>
												<option value="Vanuatu"></option>
												<option value="Venezuela"></option>
												<option value="Vietnam"></option>
												<option value="Wake Island"></option>
												<option value="Wallis and Futuna"></option>
												<option value="Yemen"></option>
												<option value="Zambia"></option>
												<option value="Zanzibar"></option>
												<option value="Zimbabwe"></option>
											</datalist>
											
											<div class="clear marb5"></div>
											
											<div class="fleft wi_50 bs_bb padrl2">
												<span>Phone</span>
												<div class="dflex alit_c pos_rel brdb brdclr_lgtgrey2">
													<span class="padr5" id="phone-country-flag"><img src="<?php echo $path;?>html/usercontent/images/flags/default.png" height="18" class="dblock"></span>
													<span class="padr5 uppercase fsz16" ></span>
													<span class=" edit-phone dblock flex_1 uppercase wordb_ba curt fsz16"><?php echo $companyDetail['phone']; ?></span>
												</div>
											</div>
											
											<div class="fleft wi_50 bs_bb padrl2 brdb brdclr_lgtgrey2"> <span>Website</span> <span class="edit-text dblock curt fsz16">gmail.com</span> </div>
											<div class="clear marb10"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Founded</span> <span class=" edit-datepicker jain2 dblock brdb brdclr_lgtgrey2 curp fsz16"><?php echo $companyDetail['founded']; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Annual Turnover</span> <span class=" edit-select jain4 dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="0,< 1 tkr, 1 - 499 tkr, 500 - 999 tkr, 1000 - 9999 tkr, 10 000 - 49 999 tkr, 50 000 - 499 999 tkr, > 499 999 tkr">&lt; 1 tkr</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Employee Size</span> <span class=" edit-select jain5 dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="0,1 - 4,5 - 9,10 - 19,20 - 49,50 - 99,100 - 199,200 - 999,> 1000">5 - 9</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Validated Until</span> <span class=" edit-datepicker jain3 dblock brdb brdclr_lgtgrey2 curp fsz16">01/04/2017</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											
											<input type="hidden" id="company_id" value="1">
										</div>
									</div>
								
								<div class="qapscore_bord hidden-xs" style="position: absolute; z-index: 1; top: 74px; right: 40px;">
									
									<div class="scorenew scorelevelnew"><?php if($companyDetail['grading_status']==0) { echo "B"; } else if($companyDetail['grading_status']==1) { echo "A"; } else if($companyDetail['grading_status']==2) { echo "AA"; } else if($companyDetail['grading_status']==3) { echo "AAA"; } ?></div>
								</div>
								
								<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
								<!-- <div class="clear hidden-xs"></div>-->
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class=" xs-marrl0 sm-marrl0  mart30">
						
						<div class="marb10 brdb">
							<h2 class="fleft mar0 padb5 fsz18 ">Current security level</h2>
							
							<div class="clear"></div>
						</div>
					</div>
					<div class="flex_1 ">
						<div class=" xs-pad0">
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list column_m padb20">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										
										<tbody id="search_results_target">
											<tr>
												
												<td class="pad5 yellowb_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt"><?php if($companyDetail['grading_status']==0) { echo "B"; } else if($companyDetail['grading_status']==1) { echo "A"; } else if($companyDetail['grading_status']==2) { echo "AA"; } else if($companyDetail['grading_status']==3) { echo "AAA"; } ?></a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz14"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"> <a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Categoty</a> </div>
													</div>
												</td>
											</tr>
											<tr>
												<td class="padt5 padb10">
													<div class=""></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											
											
											
										</tbody>
									</table>
								</div>
								
							</form>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class=" xs-marrl0 sm-marrl0  mart10">
						
						<div class="marb10 brdb">
							<h2 class="fleft mar0 padb5">Upgrade your security</h2>
							<div class="fright pos_rel padb5 fsz13">
								<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade" data-classes="active">
									<span>Why</span>
									<span class="fa fa-angle-down"></span>
								</a>
								<div id="profile-dropdown1" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
									<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
										<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
											<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
										</div>
										<span class="fxshrink_0 marl15">Step 4/5</span>
									</div>
									<div class="padtb30 padrl15 talc">
										<div class="marb10">
											<span class="fa fa-envelope-open-o fsz40"></span>
										</div>
										<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
										<div class="mart10">
											Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
										</div>
										<div class="mart20">
											<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
										</div>
										<div class="mart20">
											Then verify that it's set up by <a href="#">sending a test email</a>.
										</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="flex_1 ">
						<div class="  xs-pad0">
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list column_m padb20">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										
										<tbody id="search_results_target">
											<?php if($companyDetail['grading_status']==0) {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">A</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',1); ?>/<?php echo $data['cid']; ?>" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } else {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">B</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											<?php if($companyDetail['grading_status']<=1) {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AA</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',2); ?>/<?php echo $data['cid']; ?>" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } else {  ?>
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">A</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											<?php if($companyDetail['grading_status']<=2) {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AAA</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',3); ?>/<?php echo $data['cid']; ?>" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } else {  ?>
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AA</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											
											
										</tbody>
									</table>
								</div>
								
							</form>
							<div class="clear"></div>
						</div>
					</div>
					
					
	
					
				</div>
				
				
				
				
				
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="hei_80p"></div>
</div>
<div class="popup_modal wi_600p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb bxsh_0350_0_2 brdrad1 white_bg fsz14 txt_0_87" id="collaborators-modal">
	<div class="modal-header padtrl15">
		<h3 class="pos_rel mar0 pad0 padb15 brdb lgn_hight_19 bold fsz18 dark_grey_txt">
			Collaborators
		</h3>
	</div>
	<div class="modal-content pad15">
		<div id="collaborators-container">
			<div class="collaborator-row dflex alit_c pos_rel">
				<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">K</div>
				<div class="flex_1 padr40 padl15 fsz13">
					<div>
						<strong>Kowaken Ghirmai</strong>
						<i>(owner)</i>
					</div>
					<div class="txt_0_54">kowaken.ghirmai@qmatchup.com</div>
				</div>
			</div>
		</div>
		<form id="collaborators-form">
			<div class="dflex alit_c pos_rel mart10">
				<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c brd brdclr_7f brdrad50 uppercase fsz20 txt_f">
					<img src="<?php echo $path;?>html/usercontent/images/icons/add-person.svg" width="18" height="24" class="dblock opa50" alt="Collaborator">
				</div>
				<div class="flex_1 padr40 padl15 fsz13">
					<input type="text" name="name" id="collaborators-lookup" class="wi_100 dblock nobrd ui-autocomplete-input" placeholder="Person or email to share with" autocomplete="off">
					<div class="dnone dblock_pa pos_abs pos_cenY right0">
						<button type="submit" class="dblock opa50 opa1_h mar0 pad3 nobrd bg_trans curp trans_opa2">
							<img src="<?php echo $path;?>html/usercontent/images/icons/check.svg" width="18" height="18" class="dblock">
						</button>
						<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
							<span class="dblock padrl8">Add collaborator</span>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer mart5 padtb10 padrl15 bg_ed talr">
		<button type="button" class="close_popup_modal marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Cancel</button>
		<button type="submit" class="marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Save</button>
	</div>
</div>


<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

<div id="keep-selected" class="wi_100 hei_64p dflex xs-dnone sm-dnone alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
	<div class="dflex fxwrap_w alit_c padtb10">
		<div class="pos_rel marr15">
			<a href="#" class="keep-selected-clear dflex alit_c justc_c talc">
				<img src="<?php echo $path; ?>/html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
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


<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist2-fade" data-target="#menulist2-dropdown,#menulist2-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="organization-move-fade" data-target="#organization-move,#organization-move-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="add-userto-group-fade" data-target="#add-userto-group,#add-userto-group-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="more-fade" data-target="#more,#more-fade" data-classes="active" data-toggle-type="separate"></a>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
</body>

</html>