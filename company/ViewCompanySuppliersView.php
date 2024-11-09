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
			
			
			var available_yes=0;
		</script>
		
		<script>
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
		</script>
	</head>
	
	<body class="white_bg">
	
	<!-- HEADER -->
	<?php include 'CompanyHeaderUpdated.php'; ?>
	<div class="clear"></div>
		
	<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<!-- Left sidebar -->
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
														
														
														<a href="#" class="marr5 black_txt">Min</a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz40 xs-fsz30 sm-fsz30 
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
											<a href="https://www.safeqloud.com/company/index.php/CompanyNews/employeeNewsAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Nyhetsflöde</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8">
											<a href="#" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kalender</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8">
											<a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Hantera företaget</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 hidden">
											<a href="https://www.safeqloud.com/company/index.php/Brand/employeeAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										
										
										<!-- Newsfeed -->
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Utforska</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Kontaktuppgifter</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Dokument</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												
											</ul>
											
										</li>
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Personalhandbok</h4>
											<ul class="marr20 pad0">
												
												
												
											</ul>
											
										</li>
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a hidden">
											<h4 class="padb5 uppercase ff-sans black_txt trn hidden">Employee Specific</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/MyDetails/companyAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mina uppgifter</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/EmployeeVisitors/visitorInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besökare</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/BudandLeverans/employeePackageInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Bud & Leverans</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										<li class="dblock pos_rel  padt10  brdclr_hgrey brdclr_pblue2_a hidden">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Om bolaget</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Företagsprofil</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>	
												
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/ManageEmployee/magazineAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Anställda</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Om oss</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Karriär</span>
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
						<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-padl0 padl20">
						
						
						
						<div class=" lgtgrey2_bg brdrad3 mart5" >
							
							<div class="container pad25 padb20 xs-pad10 xs-padt10 xs-padb20  brdrad1 fsz14 dark_grey_txt lgtgrey2_bg">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall lgtgrey2_bg marb20">
									
									<div class="idcard_header wi_100 xs-wi_70  xsi-wi_100 xsip-wi_100 xs-order_2 bs_bb marb10 xs-padl15 sm-padl5 hidden-xs">
										<h2 class="dnone xs-dblock padb15 uppercase bold fsz18 trn">Cloud ID Business</h2>
										<div>
											<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm hidden">
											<span class="dblock xs-dnone  fsz14 trn"><?php echo $companyDetail['country_name']; ?></span>
											<span class="valm bold xs-nobold fsz20 xs-fsz15 trn">Qloud ID Business</span>
										</div>
										<div class="dnone xs-dblock mart10 marb20">
											<img src="<?php echo $path;?>html/usercontent/images/score.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
										</div>
									</div>
									<!--<div class="clear hidden-xs"></div>-->
									<div class="wi_30 xs-order_1 xs-wi_100 xsi-wi_30 xsip-wi_30">
										<div class="wp_columns_upload wp_columns_upload_custom marb40 brd brdclr_white">
											<div class="imgwrap nobrd bgis_coni">
												<div class="cropped_image <?php if($companyDetail ['profile_pic']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" ></div>
												
											</div>
											<div class="qapscore_bord hidden-xs brdrad5" style="position: absolute; z-index: 1; top: 205px; right: -5px;">
												
												<div class="scorenew scorelevelnew">A+</div>
											</div>
										</div>
										
									</div>
									<div class="wi_70 xs-wi_100 xs-order_4 xs-padt10 fsz12 xsi-wi_70 xsip-wi_70">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Organisationsnummer</span> <span class=" edit-text jain dblock brdb_new brdclr_lgtgrey2 fsz20"><?php echo $companyDetail['cid']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Företagsnamn</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16"><?php echo $companyDetail['company_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Industri</span> <span class="edit-select dblock brdb_new brdclr_lgtgrey2 curp fsz16" data-options="Staffing &amp; Recruiting"><?php echo $companyDetail['industry']; ?></span> </div>
										
										<div class="container marrl-2 padl15 xs-pad0">
											<div class="fleft wi_50 bs_bb padrl2 padb10"> <span>Besöksadress</span> <span class=" edit-address dblock brdb_new brdclr_lgtgrey2 fsz16"><?php if($companyDetail['address']==null || $companyDetail['address']=="") echo "-"; else echo $companyDetail['address']; ?></span> </div>
											<div class="fleft wi_50 bs_bb padrl2 padb10"> <span>Post nr</span> <span class=" edit-text jain12 dblock brdb_new brdclr_lgtgrey2 wordb_ba curt fsz16"><?php if($companyDetail['zip']==null || $companyDetail['zip']=="") echo "-"; else echo $companyDetail['zip']; ?></span> </div>
											<div class="fleft wi_50 bs_bb padrl2 padb10"> <span>Stad</span> <span class=" edit-text jain11 dblock brdb_new brdclr_lgtgrey2 curt fsz16"><?php if($companyDetail['city']==null || $companyDetail['city']=="") echo "-"; else echo html_entity_decode($companyDetail['city']); ?></span> </div>
											
											<div class="fleft wi_50 bs_bb padrl2 padb10"> <span>Land</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16" data-list="countries-list" ><?php if($companyDetail['country_name']==null || $companyDetail['country_name']=="") echo "-"; else echo $companyDetail['country_name']; ?></span> </div>
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
											
											
											
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Skapad</span> <span class=" edit-datepicker jain2 dblock brdb_new brdclr_lgtgrey2 curp fsz16"><?php echo $companyDetail['founded']; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Omsättning</span> <span class=" edit-select jain4 dblock brdb_new brdclr_lgtgrey2 curp fsz16" data-options="0,< 1 tkr, 1 - 499 tkr, 500 - 999 tkr, 1000 - 9999 tkr, 10 000 - 49 999 tkr, 50 000 - 499 999 tkr, > 499 999 tkr">&lt; 1 tkr</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Storlek</span> <span class=" edit-select jain5 dblock brdb_new brdclr_lgtgrey2 curp fsz16" data-options="0,1 - 4,5 - 9,10 - 19,20 - 49,50 - 99,100 - 199,200 - 999,> 1000">5 - 9</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2 hidden"> <span>Validated Until</span> <span class=" edit-datepicker jain3 dblock brdb_new brdclr_lgtgrey2 curp fsz16">01/04/2017</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											
											<input type="hidden" id="company_id" value="1">
										</div>
									</div>
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								
								<div class="clear"></div>
							</div>
						</div>
						
						
						<div class=" mart30 xs-marrl0 sm-marrl0 ">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">Post adress</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown3,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown3" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
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
						
						<div class=" lgtgrey2_bg mart5  brdrad3" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20   fsz14 dark_grey_txt  ">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="container marrl-2  xs-marrl0 xs-padl0">
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Adress">Adress</span> <span class=" edit-address dblock brdb_new brdclr_lgtgrey2 fsz16 addrs1"><?php if($companyDetail['delivery_address']!="" || $companyDetail['delivery_address']!= null) echo $companyDetail['delivery_address']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_10 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="Post nr">Post nr</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 zip1"><?php if($companyDetail['d_zip']!="" || $companyDetail['d_zip']!= null) echo $companyDetail['d_zip']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0  "> <span class="trn" data-trn-key="Stad">Stad</span> <span class=" edit-text jain2 dblock brdb_new brdclr_lgtgrey2 fsz16 city1"><?php if($companyDetail['d_city']!="" || $companyDetail['d_city']!= null) echo $companyDetail['d_city']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25xs-wi_50 sm-wi_50  bs_bb padrl2 padl15 xs-padl0"> <span>Land</span> <span class=" edit-select cntry1 dblock brdb_new brdclr_lgtgrey2 fsz16" data-options="<?php echo $country; ?>" ><?php if($companyDetail['d_country']!="" || $companyDetail['d_country']!= null) echo $companyDetail['d_country']; else echo "Sweden"; ?></span> </div>
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
											
											
										</div>
										
									</div>
									
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								
								<div class="clear"></div>
							</div>
						</div>		
						
						<div class=" mart30 xs-marrl0 sm-marrl0 ">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">Telefonnummer</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown4,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown4" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
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
						
						<div class=" lgtgrey2_bg mart5  brdrad3" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20 xs-padl0  fsz14 dark_grey_txt  ">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="fleft wi_33 bs_bb marl15  padrl2"> <span>Land</span> <span class=" edit-select jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 c_phone"  data-post-action="add_phone_country" id="passport-country"><?php if($companyDetail['phone_country']!="" || $companyDetail['phone_country']!= null) echo $companyDetail['phone_country']; else echo "Sweden"; ?></span> </div>
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
										<span>Telefon nr</span>
										<div class="dflex alit_c pos_rel brdb_new brdclr_lgtgrey2">
											<span class="padr5" id="phone-country-flag"><img src="<?php echo $path;?>html/usercontent/images/flags/default.png" height="18" class="dblock"></span>
											<span class="padr5 uppercase fsz16" id="phone-country"></span>
											<span class=" edit-phone dblock flex_1 uppercase wordb_ba curt fsz16 phone"><?php if($companyDetail['phone']!="" || $companyDetail['phone']!= null) echo $companyDetail['phone']; else echo "-"; ?></span>
										</div>
									</div>
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									
								</div>
								
								
								
								
								<div class="clear"></div>
								
								<!-- <div class="clear hidden-xs"></div>-->
							</div>
							<div class="clear"></div>
							
						</div>
						
						
						<div class=" mart30 xs-marrl0 sm-marrl0 ">
							
							<div class="marb0">
								<h2 class="fleft mar0 padb5 fsz15">Email</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown5,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown5" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
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
						
						<div class=" lgtgrey2_bg mart5  brdrad3" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20   fsz14 dark_grey_txt  ">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 "> <span class="trn" data-trn-key="E-post">E-post</span> <span class=" edit-address dblock brdb_new brdclr_lgtgrey2 fsz16 email"><?php if($companyDetail['company_email']!="" || $companyDetail['company_email']!= null) echo $companyDetail['company_email']; else echo "-"; ?> </span></div>
										
										
										
										
										
										
										<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
										<!-- <div class="clear hidden-xs"></div>-->
									</div>
									
									<div class="clear"></div>
								</div>
								
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" mart30 xs-marrl0 sm-marrl0 ">
							
							<div class="marb0">
								<h2 class="fleft mar0 padb5 fsz15">For Suppliers </h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown6,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown6" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
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
						
						<div class=" lgtgrey2_bg mart5  brdrad3" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20   fsz14 dark_grey_txt  ">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="container marrl-2 padl15 xs-marrl0 padl0">
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Faktura adress">Faktura adress</span> <span class=" edit-address dblock brdb_new brdclr_lgtgrey2 fsz16 addrssi"><?php if($companyDetail['si_address']!="" || $companyDetail['si_address']!= null) echo $companyDetail['si_address']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_10 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="Post nr">Post nr</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 zipsi"><?php if($companyDetail['si_zip']!="" || $companyDetail['si_zip']!= null) echo $companyDetail['si_zip']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="Stad">Stad</span> <span class=" edit-text jain2 dblock brdb_new brdclr_lgtgrey2 fsz16 citysi"><?php if($companyDetail['si_city']!="" || $companyDetail['si_city']!= null) echo $companyDetail['si_city']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2 padl15 padb10 xs-padl0"> <span>Land</span> <span class=" edit-select cntrysi dblock brdb_new brdclr_lgtgrey2 fsz16"  ><?php if($companyDetail['si_country']!="" || $companyDetail['si_country']!= null) echo $companyDetail['si_country']; else echo "Sweden"; ?></span> </div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Leveransadress">Leveransadress</span> <span class=" edit-address dblock brdb_new brdclr_lgtgrey2 fsz16 addrssd"><?php if($companyDetail['sd_address']!="" || $companyDetail['sd_address']!= null) echo $companyDetail['sd_address']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_10 xs-wi_50 sm-wi_50 marl15 xs-mar0  padb10"> <span class="trn" data-trn-key="Post nr">Post nr</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 zipsd"><?php if($companyDetail['sd_zip']!="" || $companyDetail['sd_zip']!= null) echo $companyDetail['sd_zip']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0  padb10"> <span class="trn" data-trn-key="Stad">Stad</span> <span class=" edit-text jain2 dblock brdb_new brdclr_lgtgrey2 fsz16 citysd"><?php if($companyDetail['sd_city']!="" || $companyDetail['sd_city']!= null) echo $companyDetail['sd_city']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2 padl15 padb10 xs-padl0"> <span>Land</span> <span class=" edit-select cntrysd dblock brdb_new brdclr_lgtgrey2 fsz16"  ><?php if($companyDetail['sd_country']!="" || $companyDetail['sd_country']!= null) echo $companyDetail['sd_country']; else echo "Sweden"; ?></span> </div>
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
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0  "> <span class="trn" data-trn-key="Vat">VAT</span> <span class=" edit-text jain2 dblock brdb_new brdclr_lgtgrey2 fsz16 vat"><?php if($companyDetail['vat']!="" || $companyDetail['vat']!= null) echo $companyDetail['vat']; else echo "-"; ?></span> </div>
											
										</div>
										
									</div>
									
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								
								
								<div class="clear"></div>
							</div>
							
						</div>		
						
						<div class=" mart30 xs-marrl0 sm-marrl0 ">
							
							<div class="marb0">
								<h2 class="fleft mar0 padb5 fsz15">For Customers</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown7,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown7" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
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
						
						<div class=" lgtgrey2_bg mart5  brdrad3" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20   fsz14 dark_grey_txt  ">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<div class="wi_70 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Bankgiro med OCR">Bankgiro med OCR</span> <span class=" edit-text bankgiro_med dblock brdb_new brdclr_lgtgrey2 fsz20"><?php if($companyDetail['bankgiro_med']!="" || $companyDetail['bankgiro_med']!= null) echo $companyDetail['bankgiro_med']; else echo "-"; ?></span> </div>
										<div class="wi_50 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="Bankgiro utan OCR">Bankgiro utan OCR</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 bankgiro_utan"><?php if($companyDetail['bankgiro_utan']!="" || $companyDetail['bankgiro_utan']!= null) echo $companyDetail['bankgiro_utan']; else echo "-"; ?></span> </div>
										
										<div class="wi_50 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="IBAN">IBAN</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 iban"><?php if($companyDetail['iban']!="" || $companyDetail['iban']!= null) echo $companyDetail['iban']; else echo "-"; ?></span> </div>
										<div class="container marrl-2 padl15 xs-padl0 xs-marrl0">
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2 padb10"> <span class="trn" data-trn-key="BIC">BIC</span> <span class=" edit-text dblock brdb_new brdclr_lgtgrey2 uppercase curt fsz16 bic"><?php if($companyDetail['bic']!="" || $companyDetail['bic']!= null) echo $companyDetail['bic']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2 padb10"> <span class="trn" data-trn-key="Bank">Bank</span> <span class=" edit-text dblock brdb_new brdclr_lgtgrey2 uppercase curt fsz16 bank"><?php if($companyDetail['bank']!="" || $companyDetail['bank']!= null) echo $companyDetail['bank']; else echo "-"; ?></span> </div>
											<div class="fleft wi_30  xs-wi_50 sm-wi_50 bs_bb padrl2 "> <span class="trn" data-trn-key="F-skattebevis">F-skattebevis</span> <span class=" edit-select dblock brdb_new brdclr_lgtgrey2 uppercase curt fsz16 ftax" data-options="Yes,No"><?php echo $companyDetail['f_tax']; ?></span> </div>
											
										</div>
										
										
										
										
										
										<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
										<!-- <div class="clear hidden-xs"></div>-->
									</div>
									
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
		<div class="hei_80p"></div>
		
		
		<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form method="POST" >
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">TJÄNSTEN är en del av vårt premiuminnehåll</h3>
						<div class="marb20">
							<img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" />
						</div>
						<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
						<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
						<div class="wi_75 dflex fxwrap_w marrla marb20 tall">
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Hålla dig  uppdaterad inom arbetsrätt</span>
							</div>
							<!--<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Läsa nyheter och  följa trender </span>
							</div>-->
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Använda smarta webblösningar</span>
							</div>
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
							</div>
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Utföra bakgrundskontroller på din personal eller nästa rekryt </span>
							</div>
							<!--<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Men nästa gång behovet dyker upp då finns allting färdigt.</span>
							</div>-->
						</div>
						
						<div class="marb10">
							<input type="text" id="email_text" name="email_text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" />
						</div>
						<div>
							<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp"/>
							<input type="hidden" id="indexing_savee" name="indexing_savee" >
						</div>
						<div class="marb10 padtb10 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div>
							<span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span>
						</div>
						<div class="padb0">
							<a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a>
						</div>
					</form>
				</div>
			</div>
			
		
		
		<!-- Sales popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">
				
				<!-- primary menu -->
				<div class="tab-content active" id="mob-primary-menu" style="display: block;">
					<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
						<a href="https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
							<span>One time</span>
						</a>
						<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
							<span>Ongoing</span>
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
							<span>Next of kin</span>
						</a>
						<a href="https://www.safeqloud.com/user/index.php/StoreData/userAccount" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
								<span class="fa fa-file-text-o"></span>
							</div>
							<span>Your data</span>
						</a>
					</div>
				</div>
				
				<!-- add  menu -->
				<div class="tab-content padb10" id="mob-add-menu">
					<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
					<ul class="mar0 pad0 brdrad3 white_bg fsz14">
						<li class="dblock mar0 padrl15 brdb">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
								<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
								Create request
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
								<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
								You got an invitation
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb">
							<a href="https://www.safeqloud.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
								<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
								Inform relatives
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
	
	<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_company">
		<div class="modal-content pad25 brd">
			<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
				Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Company Name</label>
					<input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Company Name">
				</div>
				
				<div class="marb15 padt15"  >
					<label for="new-organization-name" class="sr-only">Website</label>
					<input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Website">
				</div>
				
				<div class="marb15 padt15"  >
					<label for="new-organization-name" class="sr-only">Company Email</label>
					<input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Company Email">
				</div>
				
				<div class="marb15 padt15">
					<label for="new-organization-under" class="txt_0">Industry</label>
					<select name="inds" id= "inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultIndus as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				<div class="marb15 padt15">
					<label for="new-organization-under" class="txt_0">Country</label>
					<select name="cntry" id= "cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultContry as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				
				<div class="mart30 talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateAddCompany();" />
					<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				</div>
			</form>
		</div>
	</div>
	
	
	
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		
		// Charts
		google.charts.load('current', { 'packages': ['corechart'] });
		
		
		// Line Chart
		google.charts.setOnLoadCallback(drawLineChartInhouse);
		function drawLineChartInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartStaffing);
		function drawLineChartStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartRecruiting);
		function drawLineChartRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
		function drawLineChartBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// Donut Chart
		// - yearly
		google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
		function drawDonutChartYearlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
		function drawDonutChartYearlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
		function drawDonutChartYearlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
		function drawDonutChartYearlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - monthly
		google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
		function drawDonutChartMonthlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
		function drawDonutChartMonthlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
		function drawDonutChartMonthlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
		function drawDonutChartMonthlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - daily
		google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
		function drawDonutChartDailyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
		function drawDonutChartDailyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
		function drawDonutChartDailyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
		function drawDonutChartDailyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		tinyMCE.init({
			selector: '.texteditor',
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
			//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
			menubar: false,
			toolbar_items_size: 'small',
			style_formats: [
			{
				title: 'Bold text',
				inline: 'b'
			},
			{
				title: 'Red text',
				inline: 'span',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Red header',
				block: 'h1',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Example 1',
				inline: 'span',
				classes: 'example1'
			},
			{
				title: 'Example 2',
				inline: 'span',
				classes: 'example2'
			},
			{
				title: 'Table styles'
			},
			{
				title: 'Table row 1',
				selector: 'tr',
				classes: 'tablerow1'
			}],
			templates: [
			{
				title: 'Test template 1',
				content: 'Test 1'
			},
			{
				title: 'Test template 2',
				content: 'Test 2'
			}]
		});
	</script>
</body>

</html>