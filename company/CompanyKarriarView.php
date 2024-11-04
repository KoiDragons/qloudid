<!doctype html>
<html>
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
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
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
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			
			var currentLang = 'sv';
			
			function selectCode(id)
			{
				if(id==1)
				{
					document.getElementById("codeSelect").style.display='block';
				}
				else
				{
					document.getElementById("codeSelect").style.display='none';
				}
			}
			
			function searchUser()
			{
				
				if($("#reque").val()==1)
				{
					
					if($("#code_id").val()=="")
				{
					$("#errorMsg").html('Personal number can not be blank');
					return false;
				}
				if(isNaN($("#code_id").val())) 
				{
					$("#errorMsg").html('Personal number must be a numeric value');
					return false;
				}
				if($("#code_id").val().length < 12 || $("#code_id").val().length > 12) 
				{
					$("#errorMsg").html('Personal number must be 12 digit numeric value');
					return false;
				}
						var send_data={};
						send_data.pnumber=$("#code_id").val();
						
						$.ajax({
							type:"POST",
							url:"../searchUserDetail/<?php echo $data['cid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>";
								}
								
							}
						});
					
					
				}
				
				else
					{
					alert("Please select code!!!");
					return false;
				}
				
					
			}
			

			
		</script>
	</head>
	
	<body class="white_bg">
		
		<?php include 'CompanyNewsHeaderUpdated.php'; ?>
		<div class="clear" id=""></div>
		
		
		
		<div class="column_m pos_rel">
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
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
											<a href="../../CompanyNews/employeeNewsAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Nyhetsflöde</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock <?php if($checkPermission==1) echo 'padb10'; ?> padl8 hidden">
											<a href="#" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kalender</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 <?php if($checkPermission==0) echo 'hidden'; ?>">
											<a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Hantera företaget</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 hidden">
											<a href="https://www.qloudid.com/company/index.php/Brand/employeeAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
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
													<a href="../../ManageEmployee/magazineAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Anställda</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Karriär</span>
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
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padl20 xs-padl0 xsi-padl0">		
					<div class="right_container xs-wi_100">
					<div class="column_m container wi_480p xs-wi_100">
							<!-- Configure Data -->
							<div class="column_m  ">
								
								<div class="column_m pos_rel  padtb0 panlyellow_bg  xs-padrl0 brdrad5 box_shadow">
									<div class="pos_rel bgir_norep bgip_r">
										<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
											<div class="wrap maxwi_100">
												
											</div>
										</div>
										<div class="wrap maxwi_100 minhei_85vh dflex alit_c pos_rel zi2 padtb20 padrl20">
											<div>
												
												<div class="dflex xs-dblock fxwrap_w padb0 xs-padt0 xs-padb0">
													
													<div class="wi_100 xs-wi_100 padtb0  padr20 txt_708198">
														<h2 class="bold marb10 pad0 tall xs-talc fntwei_300 fsz55 sm-fsz32 md-fsz36 lg-fsz40 black_txt xs-fsz30">Om Qmatchup...<div class="wi_50p maxwi_100 hei_4p mart5 xs-marrla black_bg"></div>
														</h2>
														
													</div></div>
											</div>
										</div>
										
									</div>
									
									
									
								</div>
								
								<div class="clear"></div>
							</div>
							<!-- Configure Data -->
							<div class="column_m padt20 ">
							<div class=" bs_bb  ">
								
								
								
								
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tbody>
										<tr class="odd">
											<td class="wi_100 padtb30 valm talc white_bg box_shadow brdrad5 padrl10 xs-padtb10">
												<div class="padrl30 tall black_txt fsz18 xs-padrl10">
													<h2 class="tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20">Who we are</h2>
													
													<?php echo html_entity_decode($companyLedigaJobb[0]); ?>

 
													
												</div>
												</td>
											
										</tr>
									</tbody>
								</table>
							</div>
							
							
							
							
							
							<div class=" txt_37404a  mart20 brdrad3 ">
								<div class="wrap maxwi_100 ">
									
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tbody>
											<tr class="odd">
												<td class="wi_100 padtb30 valm talc white_bg box_shadow brdrad5 padrl10 xs-padtb10">
													<div class="padrl30 tall black_txt fsz18 xs-padrl10">
														<h2 class=" tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20">Mission</h2>
														
														




													<?php echo html_entity_decode($companyLedigaJobb[1]); ?>

														
													</div>
													</td>
												
											</tr>
											
											
										</tbody>
									</table>
									
									
								</div>
							</div>
							
							<div class=" txt_37404a  mart20 brdrad3 ">
								<div class="wrap maxwi_100 ">
									
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tbody>
											<tr class="odd">
												<td class="wi_100 padtb30 valm talc white_bg box_shadow brdrad5 padrl10 xs-padtb10">
													<div class="padrl30 tall black_txt fsz18 xs-padrl10">
														<h2 class="padb10 tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt xs-padb20">Vision</h2>
														<?php echo html_entity_decode($companyLedigaJobb[2]); ?>
																												
													</div>
													</td>
												
											</tr>
											
											
										</tbody>
									</table>
									
									
								</div>
							</div>
							
							<div class=" txt_37404a  mart20 brdrad3 ">
								<div class="wrap maxwi_100 ">
									
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tbody>
											<tr class="odd">
												<td class="wi_100 padtb30 valm talc white_bg box_shadow brdrad5 padrl10 xs-padtb10">
													<div class="padrl30 tall black_txt fsz18 xs-padrl10">
														<h2 class="padb10 tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt xs-padb20">CSR</h2>
													<?php echo html_entity_decode($companyLedigaJobb[3]); ?>	
																												
													</div>
												</td>
												
											</tr>
											
											
										</tbody>
									</table>
									
									
								</div>
							</div>
							
							
							
							
							<div class=" txt_37404a  mart20 brdrad3 hidden">
								<div class="wrap maxwi_100 ">
									
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tbody>
											
											<tr class="odd">
												<td class="wi_100 padtb30 valm talc white_bg box_shadow brdrad5 padrl10 xs-padtb10">
													<div class="padrl30 tall black_txt fsz18 xs-padrl10">
														<h2 class="padb10 tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt xs-padb20">Announcement</h2>
														
														<?php echo html_entity_decode($companyLedigaJobb[4]); ?> 
														
													</div>
													</td>
												
											</tr>
										</tbody>
									</table>
									
									
								</div>
							</div>
							
							
							</div>
							</div>
							<div class="column_m wi_240p bs_bb padl20 talc hidden-xs">
							<div class="padtb30 brd white_bg talc">
								<div class="marb10 lnkdblue_txt fsz32">1,568</div>
								<div class="marb5 fsz14">Your connections</div>
								<div class="fsz14">
									<a href="#">See all</a>
								</div>
								<div class="padt20">
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/1.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/2.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/3.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/4.jpg" width="36" class="marl-15 brdrad40"></a>
								</div>
							</div>
							
							<div class="mart15 padtb15 brd white_bg talc">
								<form class="padrl10">
									<div class="marb10 fsz14">Add personal contacts</div>
									<input type="text" value="kowaken.ghirmai@qmatchup.com" class="wi_100 hei_32p bs_bb marb10 padrl10 brd brdrad3">
									<button type="submit" class="wi_100 hei_32p marb10 nobrd brdrad3 fsz14 blue_bg white_txt">Continue</button>
								</form>
							</div>
							
						</div>
						
						
							
							
							
							
							<div class="clear"></div>
							</div>
							
							</div>
						
						</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			
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
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_code">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div class="marb20">
					<img src="../../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb10 pad0 bold fsz24 black_txt">Känn dig trygg...</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb0 talc">
						
						<span class="valm fsz16">Använd Qloud ID Verify till att  be din motpart, privatperson som företag att legitimera sig innan ett möte eller affär.</span>
					</div>
					
					
				</div>
				
				<div class="mart0 pad15 lgtgrey2_bg">
					
					<div class="pos_rel ">
						
						<select name="reque" id= "reque" class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt" onchange="selectCode(this.value);">
							
							<option value="0">--Välj en metod--</option>
							<option value="1">Via personnummer</option>
							
							
							
						</select>
					</div>
				</div>
				<div id="codeSelect" style="display:none">
					<div class="padrbl15 lgtgrey2_bg">
						
						<div class="pos_rel ">
							
							
							<input type="text" id="code_id" name="code_id" class="white_bg  wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Mottagarens personnummer">
						</div>
					</div>
				</div>
				
				<div id="errorMsg" class="red_txt"> </div>
				
				
				<div class="mart20">
					<input type="button" value="Skicka förfrågan" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
					
				</div>
				
				
				
			</div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_user">
			<div class="modal-content pad25 brd brdrad10">
				<div id="search_user">
					<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
						No result found
						<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
					</h3>
					
					
					
					
					
					
				</div>
				
			</div>
		</div>
		
		
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/autosize.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	</body>
	
</html>