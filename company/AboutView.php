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

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
	<title>Qmatchup</title>
	<!-- Styles -->
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
function submitFormCom()
{
	
	$("#save_indexingcs").submit();
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
<?php $path1 = $path."html/usercontent/images/"; ?>
<body class="white_bg ">
	
	<!-- HEADER -->
	<div class="column_m header xs-header bs_bb lgtgrey2_bg">
		<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey2_bg">
			
		<div class="logo  wi_220p xxs-wi_auto">
				<a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Huvudkontor</h3> </a>
			</div>
			<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 padt5 xxxs-padt20 xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="../../../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="../../../../html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
			<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="sv" onclick="changeLanguage(1);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="sv" onclick="changeLanguage(1);">  Svenska</a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="en" onclick="changeLanguage(0);"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="en" onclick="changeLanguage(0);">  Engelska </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
                  </li>
                </ol>
									
								</div>
							</li>
						</ul>
					</li>
					
        
       
					
					
				</ul>
			</div>
			</div>
			
		<div class="fright xs-dnone visible_si padt10">
					<ul class="mar0 pad0">
					<li class="dblock hidden-xs visible_si fleft pos_rel  "> <a href="https://www.safeqloud.com/user/index.php/VerifyRequest/verifyRequestAccount/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Connect</a> </li>
						<li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
					</ul>
				</div>
			<!--sf-js-enabled sf-arrows hidden-xs-->
			<div class="top_menu frighti padt15 padb20 hidden">
				<ul class="menulist sf-menu  fsz14 ">
					
					
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz24 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						</li>
						
				</ul>
			</div>
			<div class="visible-xs visible-xxs fright marr0 xs-padt5 "> <a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="clear"></div>
	
	<div class="column_m pos_rel" onclick="checkFlag();">

		<!-- CONTENT -->
		<div class="column_m container zi5 mart40 xs-mart20">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<!-- Left sidebar -->
				<!-- Left sidebar -->
				<div class="wi_240p fleft pos_rel zi50">
					<div class="padrl10">
						
						<!-- Scroll menu -->
						<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
							<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 padt5 white_bg fsz14 brdr_new" id="scroll_menu">
								<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb_b padb20">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
															
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz80 xs-fsz20 brdrad1000 yellow_bg_a panlyellow_bg  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	" id="aa_1227620"><?php if($companyDetail['grading_status']==0) echo "b"; else if($companyDetail['grading_status']==1) echo "A"; else if($companyDetail['grading_status']==2) echo "AA"; else if($companyDetail['grading_status']==3) echo "AAA"; ?></div> 																<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padtr10 fsz15"> <span>What does this mean?</span>  </div>
															</a></div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>
							
								<ul class="marr20 pad0">
												
												<li class=" dblock  padl8">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
														<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
														<span class="valm trn">Verifiera</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
													</a>
												</li>
												
											</ul>
								<ul class="marr20 pad0">
									<li class="dblock padrb10 padl8">
										<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
											<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
											<span class="valm trn">Företagsuppgifter</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
										</a>
									</li>
									<li class="dblock padrb10 padl8">
												<a href="../../OmOss/storedInfo/<?php echo $data['cid']; ?>" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a black_txt white_txt_h white_txt_a"> <span class="valm trn">Om oss</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											
												<li class="dblock padrb10 padl8">
												<a href="../../LedigaJobb/storedInfo/<?php echo $data['cid']; ?>" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a black_txt white_txt_h white_txt_a"> <span class="valm trn">Karriär</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
											
											<li class="dblock padrb10 padl8 hidden">
												<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Aterförsäljare</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
											<li class="dblock padrb10 padl8 hidden">
												<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Leverantörer</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
								</ul>
										
							
								
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
				<!-- Center content -->
				
						<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-padl0 padl20">
						
						<div class="wrap maxwi_100 dflex alit_fe justc_sb  pos_rel padb10 brdb_new">
							<div class="white_bg tall">
								
								
								
								
								<!-- Logo -->
								<h1 class="fsz25 bold">Företagsuppgifter</h1>
								<!-- Logo -->
								<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Nedan är de uppgifter som bolaget vill dela med sig med alla. </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
									<!-- Meta -->
									
								</a></div>
								<?php if($empSummary==1) { ?>
									<div class="hidden-xs hidden-sm padrl10">
								<a href="https://www.qmatchup.com/beta/user/index.php/CheckLogin/checkCredentialsLogin?url=/beta/company/index.php/EmployeeNewsfeed/newsAccount/&logindetail=<?php echo $empSummaryDetail; ?>" class="diblock padrl20 brd brdrad3 panlyellow_bg  ws_now lgn_hight_29 fsz14 black_txt">
									
									<span class="valm">Go to Workplace</span>
								</a> <a href="../../CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>"><span class="fas fa-cog fsz22 padl10 lgn_hight_29 valm" aria-hidden="true"></span></a>
							</div>
								<?php }  ?>
							
						</div>
						
						<div class=" lgtgrey2_bg brdrad3 mart5" >
							
							<div class="container pad25 padb20 xs-pad10 xs-padt10 xs-padb20  brdrad1 fsz14 dark_grey_txt lgtgrey2_bg">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall lgtgrey2_bg marb20">
									
									<div class="idcard_header wi_100 xs-wi_70 xsi-wi_100 xsip-wi_100 xs-order_2 bs_bb marb10 xs-padl15 sm-padl5 hidden-xs">
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
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10 xsip-wi_50  xsi-wi_50 "> <span>Organisationsnummer</span> <span class=" edit-text jain dblock brdb_new brdclr_lgtgrey2 fsz20"><?php echo $companyDetail['cid']; ?></span> </div>
										<div class="wi_50 xs-wi_100 xsip-wi_50  xsi-wi_50 sm-wi_100 marl15 xs-mar0 padb10"> <span>Företagsnamn</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16"><?php echo $companyDetail['company_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 xsip-wi_50  xsi-wi_50 marl15 xs-mar0 padb10"> <span>Industri</span> <span class="edit-select dblock brdb_new brdclr_lgtgrey2 curp fsz16" data-options="Staffing &amp; Recruiting"><?php echo $companyDetail['industry']; ?></span> </div>
										
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
			
				
				
				
				<div class="width_720 col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg xs-white_bg sm-white_bg hide" >							
				<div class="width_485 col-xs-12 col-sm-12 fleft fsz14" >
					
					<!-- Middle 
					<div class="dflex alit_s marb15">
					<input type="search" name="search" class="hei_50p flex_1 padrl15 brd brdrad0 brdradtl3 bg_fe white_bg_f fsz15" placeholder="company.com" value="volvo.com">
					<button type="submit" class="hei_50p padrl30 brd nobrdl brdrad0 brdradrb3 white_bg fsz14 bold curp">Search</button>
				   </div>-->
				   		
					<div class="width_485 col-xs-12 col-sm-12 fleft fsz14">
						<div class="container brd brdrad2 white_bg fsz14 dark_grey_txt">
								
								<form id="post_comment">
									<input type="hidden" name="poster_name" value="Kowaken Ghirmai">
									<input type="hidden" name="poster_position" value="CEO at Giko">
									<input type="hidden" name="poster_avatar" value="images/article/avatar2.jpg">
								
									<div class="padtb15 brdb">
										<div class="padrl25">
											<img src="../../../../estorecss/3_0.33849800 1455201752kowaken-ghirmai.jpg" width="48" height="48" class="marr10 brdrad40 valm">
											<span class="valm">Start discussion</span>
										</div>
									</div>
									<div class="padtb15 brdb hide" id="post_comment_top">
										<div class="padrl25">
											<a href="#" class="active valm dark_grey_txt lnkdblue_txt_a" onclick="return false;">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon marr5 valm"><g class="large-icon" style="fill: currentColor"><g><path d="M21.7,5l-2.7-2.7C18.8,2.1,18.5,2,18.3,2s-0.5,0.1-0.7,0.3L5,14.8L3,21l6.2-2L21.7,6.4c0.2-0.2,0.3-0.5,0.3-0.7C22,5.5,21.9,5.2,21.7,5zM7.8,17.8l-1.6-1.6L18.3,4.1l1.6,1.6L7.8,17.8z"></path></g></g></svg>
												<span class="valm">Post discussion</span>
											</a>
											<span class="hei_24p dinlblck marrl15 brdr valm"></span>
											<a href="#" class="valm dark_grey_txt lnkdblue_txt_a" onclick="return false;">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon marr5 valm"><g class="large-icon" style="fill: currentColor"><g><path d="M20,7h-3l0-2c0-1.1-0.9-2-2-2H9C7.9,3,7,3.9,7,5l0,2H4C2.9,7,2,7.9,2,9v9c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V9C22,7.9,21.1,7,20,7zM9,5h6l0,2H9V5zM20,18H4V9h16V18z"></path></g></g></svg>
												<span class="valm">Share job vacancy</span>
											</a>
										</div>
										
									</div>
									<div class="padtb20">
										<div class="padrl25">
											<input type="text" name="post_title" placeholder="Enter a conversation title" class="wi_100 nobrd font_helvetica fsz14" required="required">
										</div>
									</div>
									<div class="padtb20 brdt hide" id="post_comment_mid">
										<div class="padrl25">
											<textarea name="post_content" rows="3" placeholder="Add some details or use @ to mention" class="wi_100 nobrd font_helvetica fsz14" style="resize:none;"></textarea>
										</div>
									</div>
									<div class="hide" id="comments_img">
										<div class="maxwi_50 dinlblck pos_rel padl25">
											<button href="#" class="remove_image wi_32p hei_32p dblock pos_abs zi10 top-10p right-10p bxsh_dgrey bxsh_dgrey2_h pad0 padt3 nobrd brdrad40 white_bg valm talc curp">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M20,5.2l-6.8,6.8l6.7,6.7l-1.2,1.2L12,13.2L5.3,20l-1.2-1.2l6.7-6.7L4,5.2L5.2,4L12,10.8L18.8,4L20,5.2z"></path></g></g></svg>
											</button>
										</div>
									</div>
									
									<div class="padb15 hide" id="post_comment_bot">
										<div class="padrl25">
										
											<div class="opa55 opa1_h fleft pos_rel pad10 black_txt curp">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="dblock"><g class="large-icon" style="fill: currentColor"><g><path d="M15,9.5C15,8.7,15.7,8,16.5,8S18,8.7,18,9.5S17.3,11,16.5,11S15,10.3,15,9.5zM22,6v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6c0-1.1,0.9-2,2-2h16C21.1,4,22,4.9,22,6zM20,17.8l-4-3.1l-1.3,1C14.4,15.9,14,16,13.7,16c-0.5,0-1-0.2-1.4-0.6L8.5,10.8L4,15.7V18h16V17.8zM20,6H4v7.1l3.3-3.6C7.6,9.2,8,9,8.5,9c0.5,0,0.9,0.2,1.2,0.6l3.9,4.7l1.4-1C15.3,13.1,15.7,13,16,13c0.4,0,0.7,0.1,1,0.3L20,15.6V6z"></path></g></g></svg>
												<input type="file" name="comments_img" class="upload-image wi_100 hei_100 opa0 pos_abs zi10 top0 left0 curp">
											</div>
											
											<div class="fright">
												<button tyle="submit" class="dblue_btn">Post</button>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
								
								</form>
							</div>
					
					 
					<div id="discussions_5">
								
								<div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../estorecss/3_0.33849800 1455201752kowaken-ghirmai.jpg" width="48" height="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">David Jonsson</h2>
														<h3 class="poster_position opa55 pad0 fsz14">CFO at Qmatchup</h3>
													</div>
												</a>
											</div>
											
											<div class="fright padt5">
												<button type="button" class="wi_32p hei_32p dinlblck marr10 pad0 nobrd brdrad40 white_bg bg_000_01_h valm talc curp">
													<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M6,10v4H2v-4H6zM10,10v4h4v-4H10zM18,10v4h4v-4H18z"></path></g></g></svg>
												</button>
												<span>2h</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">avskedade knivskadad rektor under operation</a></h4>
											<p class="post_content pad0">Rektor blev knivskuren av en elev på skolan när han ingrep i
ett bråk. Han fördes m...</p>
																						<a href="#" class="dblock mart15 dark_grey_txt lnkdblue_txt_h">
												<table class="wi_100 brd" cellpadding="0" cellspacing="0">
													<tbody><tr>
														<td class="pad0 brdr valm">
															<img src="../../../../estorecss/tmp0.jpg" class="valb wi_100">
														</td>
														<!--<td class="wi_100 bs_bb padtb5 valm">
															<div class="padrl15">
																<h4 class="padb5 fsz16">Work-Life Balance Exists But Unfortunately, It Is Practically A Myth</h4>
																<p class="opa55 mar0 pad0">There is no such thing as Work-Life Balance exists.</p>
															</div>
														</td>-->
													</tr>
												</tbody></table>
											</a>
										</div>
									</div>
									
									<div class="padtb15">
										<div class="padrl25">
											<a href="#" class="action-like marr10 bold lnkdblue_txt">Like</a>
											<a href="#" class="action-comment marr10 bold lnkdblue_txt">Comment</a>
											<span class="marl5 padr10 brdl">&nbsp;</span>
											<a href="#" class="likes_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span>
												<span class="amount valm">1</span>
											</a>
											<a href="#" class="comments_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="small-icon" style="fill-opacity: 1"><g><path d="M13,5v5.4l-2,1.3V10H3V5H13M14,3H2C1.4,3,1,3.4,1,4v7c0,0.6,0.4,1,1,1h7v3l5.3-3.3C14.7,11.4,15,10.9,15,10.4V4C15,3.4,14.6,3,14,3L14,3z"></path></g></g></svg></span>
												<span class="amount valm">2</span>
											</a>
										</div>
									</div>
									
									<div class="padb5 lgtgrey2_bg">
										<div class="padrl25">
											<form class="post_comment">
												
												
												<div class="padt10">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Jonna Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="comment" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Reply to this conversation" required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_name" value="Kowaken Ghirmai">
																<input type="hidden" name="reply_avatar" value="../../../../html/usercontent/images/article/avatar2.jpg">
																<button type="submit" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp">Post</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											</form>
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
							</div>
						
					 
					<div id="discussions_4">
								
								<div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../estorecss/3_0.33849800 1455201752kowaken-ghirmai.jpg" width="48" height="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">David Jonsson</h2>
														<h3 class="poster_position opa55 pad0 fsz14">CFO at Qmatchup</h3>
													</div>
												</a>
											</div>
											
											<div class="fright padt5">
												<button type="button" class="wi_32p hei_32p dinlblck marr10 pad0 nobrd brdrad40 white_bg bg_000_01_h valm talc curp">
													<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M6,10v4H2v-4H6zM10,10v4h4v-4H10zM18,10v4h4v-4H18z"></path></g></g></svg>
												</button>
												<span>2h</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">hade lönsamhetsproblem och sänkte butikspersonalens löner - godkänns av AD</a></h4>
											<p class="post_content pad0">Coop Forum Marieberg erbjöd arbetstagare fortsatt anställning men med lägre lön...</p>
																						<a href="#" class="dblock mart15 dark_grey_txt lnkdblue_txt_h">
												<table class="wi_100 brd" cellpadding="0" cellspacing="0">
													<tbody><tr>
														<td class="pad0 brdr valm">
															<img src="../../../../estorecss/tmp1.jpg" class="valb wi_100">
														</td>
														<!--<td class="wi_100 bs_bb padtb5 valm">
															<div class="padrl15">
																<h4 class="padb5 fsz16">Work-Life Balance Exists But Unfortunately, It Is Practically A Myth</h4>
																<p class="opa55 mar0 pad0">There is no such thing as Work-Life Balance exists.</p>
															</div>
														</td>-->
													</tr>
												</tbody></table>
											</a>
										</div>
									</div>
									
									<div class="padtb15">
										<div class="padrl25">
											<a href="#" class="action-like marr10 bold lnkdblue_txt">Like</a>
											<a href="#" class="action-comment marr10 bold lnkdblue_txt">Comment</a>
											<span class="marl5 padr10 brdl">&nbsp;</span>
											<a href="#" class="likes_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span>
												<span class="amount valm">1</span>
											</a>
											<a href="#" class="comments_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="small-icon" style="fill-opacity: 1"><g><path d="M13,5v5.4l-2,1.3V10H3V5H13M14,3H2C1.4,3,1,3.4,1,4v7c0,0.6,0.4,1,1,1h7v3l5.3-3.3C14.7,11.4,15,10.9,15,10.4V4C15,3.4,14.6,3,14,3L14,3z"></path></g></g></svg></span>
												<span class="amount valm">2</span>
											</a>
										</div>
									</div>
									
									<div class="padb5 lgtgrey2_bg">
										<div class="padrl25">
											<form class="post_comment">
												
												
												<div class="padt10">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Jonna Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="comment" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Reply to this conversation" required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_name" value="Kowaken Ghirmai">
																<input type="hidden" name="reply_avatar" value="../../../../html/usercontent/images/article/avatar2.jpg">
																<button type="submit" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp">Post</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											</form>
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
							</div>
						
					 
					<div id="discussions_3">
								
								<div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../estorecss/3_0.33849800 1455201752kowaken-ghirmai.jpg" width="48" height="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">David Jonsson</h2>
														<h3 class="poster_position opa55 pad0 fsz14">CFO at Qmatchup</h3>
													</div>
												</a>
											</div>
											
											<div class="fright padt5">
												<button type="button" class="wi_32p hei_32p dinlblck marr10 pad0 nobrd brdrad40 white_bg bg_000_01_h valm talc curp">
													<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M6,10v4H2v-4H6zM10,10v4h4v-4H10zM18,10v4h4v-4H18z"></path></g></g></svg>
												</button>
												<span>2h</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">pilot som blev förflyttad blev fråntagen pensionsförmåner</a></h4>
											<p class="post_content pad0">Tolkning av kollektivavtal angående samordning av pensionsförmåner för vissa piloter...</p>
																						<a href="#" class="dblock mart15 dark_grey_txt lnkdblue_txt_h">
												<table class="wi_100 brd" cellpadding="0" cellspacing="0">
													<tbody><tr>
														<td class="pad0 brdr valm">
															<img src="../../../../estorecss/tmp2.jpg" class="valb wi_100">
														</td>
														<!--<td class="wi_100 bs_bb padtb5 valm">
															<div class="padrl15">
																<h4 class="padb5 fsz16">Work-Life Balance Exists But Unfortunately, It Is Practically A Myth</h4>
																<p class="opa55 mar0 pad0">There is no such thing as Work-Life Balance exists.</p>
															</div>
														</td>-->
													</tr>
												</tbody></table>
											</a>
										</div>
									</div>
									
									<div class="padtb15">
										<div class="padrl25">
											<a href="#" class="action-like marr10 bold lnkdblue_txt">Like</a>
											<a href="#" class="action-comment marr10 bold lnkdblue_txt">Comment</a>
											<span class="marl5 padr10 brdl">&nbsp;</span>
											<a href="#" class="likes_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span>
												<span class="amount valm">1</span>
											</a>
											<a href="#" class="comments_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="small-icon" style="fill-opacity: 1"><g><path d="M13,5v5.4l-2,1.3V10H3V5H13M14,3H2C1.4,3,1,3.4,1,4v7c0,0.6,0.4,1,1,1h7v3l5.3-3.3C14.7,11.4,15,10.9,15,10.4V4C15,3.4,14.6,3,14,3L14,3z"></path></g></g></svg></span>
												<span class="amount valm">2</span>
											</a>
										</div>
									</div>
									
									<div class="padb5 lgtgrey2_bg">
										<div class="padrl25">
											<form class="post_comment">
												
												
												<div class="padt10">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Jonna Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="comment" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Reply to this conversation" required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_name" value="Kowaken Ghirmai">
																<input type="hidden" name="reply_avatar" value="../../../../html/usercontent/images/article/avatar2.jpg">
																<button type="submit" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp">Post</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											</form>
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
							</div>
						
					 
					<div id="discussions_2">
								
								<div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../estorecss/3_0.33849800 1455201752kowaken-ghirmai.jpg" width="48" height="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">David Jonsson</h2>
														<h3 class="poster_position opa55 pad0 fsz14">CFO at Qmatchup</h3>
													</div>
												</a>
											</div>
											
											<div class="fright padt5">
												<button type="button" class="wi_32p hei_32p dinlblck marr10 pad0 nobrd brdrad40 white_bg bg_000_01_h valm talc curp">
													<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M6,10v4H2v-4H6zM10,10v4h4v-4H10zM18,10v4h4v-4H18z"></path></g></g></svg>
												</button>
												<span>2h</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">är skyldig att utreda anmälningar om sexuella trakasserier</a></h4>
											<p class="post_content pad0">Om en arbetsgivare får kännedom om att en arbetstagare anser sig ha blivit utsatt för...</p>
																						<a href="#" class="dblock mart15 dark_grey_txt lnkdblue_txt_h">
												<table class="wi_100 brd" cellpadding="0" cellspacing="0">
													<tbody><tr>
														<td class="pad0 brdr valm">
															<img src="../../../../estorecss/tmp3.jpg" class="valb wi_100">
														</td>
														<!--<td class="wi_100 bs_bb padtb5 valm">
															<div class="padrl15">
																<h4 class="padb5 fsz16">Work-Life Balance Exists But Unfortunately, It Is Practically A Myth</h4>
																<p class="opa55 mar0 pad0">There is no such thing as Work-Life Balance exists.</p>
															</div>
														</td>-->
													</tr>
												</tbody></table>
											</a>
										</div>
									</div>
									
									<div class="padtb15">
										<div class="padrl25">
											<a href="#" class="action-like marr10 bold lnkdblue_txt">Like</a>
											<a href="#" class="action-comment marr10 bold lnkdblue_txt">Comment</a>
											<span class="marl5 padr10 brdl">&nbsp;</span>
											<a href="#" class="likes_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span>
												<span class="amount valm">1</span>
											</a>
											<a href="#" class="comments_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="small-icon" style="fill-opacity: 1"><g><path d="M13,5v5.4l-2,1.3V10H3V5H13M14,3H2C1.4,3,1,3.4,1,4v7c0,0.6,0.4,1,1,1h7v3l5.3-3.3C14.7,11.4,15,10.9,15,10.4V4C15,3.4,14.6,3,14,3L14,3z"></path></g></g></svg></span>
												<span class="amount valm">2</span>
											</a>
										</div>
									</div>
									
									<div class="padb5 lgtgrey2_bg">
										<div class="padrl25">
											<form class="post_comment">
												
												
												<div class="padt10">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Jonna Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="comment" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Reply to this conversation" required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_name" value="Kowaken Ghirmai">
																<input type="hidden" name="reply_avatar" value="../../../../html/usercontent/images/article/avatar2.jpg">
																<button type="submit" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp">Post</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											</form>
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
							</div>
						
					 
					<div id="discussions_1">
								
								<div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../estorecss/3_0.33849800 1455201752kowaken-ghirmai.jpg" width="48" height="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">David Jonsson</h2>
														<h3 class="poster_position opa55 pad0 fsz14">CFO at Qmatchup</h3>
													</div>
												</a>
											</div>
											
											<div class="fright padt5">
												<button type="button" class="wi_32p hei_32p dinlblck marr10 pad0 nobrd brdrad40 white_bg bg_000_01_h valm talc curp">
													<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M6,10v4H2v-4H6zM10,10v4h4v-4H10zM18,10v4h4v-4H18z"></path></g></g></svg>
												</button>
												<span>2h</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">tvingas böta 50 000 kr för brott mot medbestämmandelagen</a></h4>
											<p class="post_content pad0">Arbetsdomstolen förpliktar Brandkåren Attunda att till Brandmännens
Riksförbund bet...</p>
																						<a href="#" class="dblock mart15 dark_grey_txt lnkdblue_txt_h">
												<table class="wi_100 brd" cellpadding="0" cellspacing="0">
													<tbody><tr>
														<td class="pad0 brdr valm">
															<img src="../../../../estorecss/tmp4.jpg" class="valb wi_100">
														</td>
														<!--<td class="wi_100 bs_bb padtb5 valm">
															<div class="padrl15">
																<h4 class="padb5 fsz16">Work-Life Balance Exists But Unfortunately, It Is Practically A Myth</h4>
																<p class="opa55 mar0 pad0">There is no such thing as Work-Life Balance exists.</p>
															</div>
														</td>-->
													</tr>
												</tbody></table>
											</a>
										</div>
									</div>
									
									<div class="padtb15">
										<div class="padrl25">
											<a href="#" class="action-like marr10 bold lnkdblue_txt">Like</a>
											<a href="#" class="action-comment marr10 bold lnkdblue_txt">Comment</a>
											<span class="marl5 padr10 brdl">&nbsp;</span>
											<a href="#" class="likes_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span>
												<span class="amount valm">1</span>
											</a>
											<a href="#" class="comments_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="small-icon" style="fill-opacity: 1"><g><path d="M13,5v5.4l-2,1.3V10H3V5H13M14,3H2C1.4,3,1,3.4,1,4v7c0,0.6,0.4,1,1,1h7v3l5.3-3.3C14.7,11.4,15,10.9,15,10.4V4C15,3.4,14.6,3,14,3L14,3z"></path></g></g></svg></span>
												<span class="amount valm">2</span>
											</a>
										</div>
									</div>
									
									<div class="padb5 lgtgrey2_bg">
										<div class="padrl25">
											<form class="post_comment">
												
												
												<div class="padt10">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Jonna Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="comment" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Reply to this conversation" required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_name" value="Kowaken Ghirmai">
																<input type="hidden" name="reply_avatar" value="../../../../html/usercontent/images/article/avatar2.jpg">
																<button type="submit" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp">Post</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											</form>
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
							</div>
						
											
						
						
						
						
						
						<!-- 1 article, image on the left -->
						</div>
					
					<!-- Marquee -->
					<div class="wi_100 visible-xs visible-sm fleft bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3 white_bg">
						<h3 class="padb20 uppercase bold fsz16">Lediga jobb</h3>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="../../html/usercontent/images/fb.png" width="80" title="Facebook" alt="Facebook"> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="../../html/usercontent/images/volvo.png" width="80" title="Volvo" alt="Volvo"> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="../../html/usercontent/images/spot.png" width="80" title="Spotify" alt="Spotify"> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="marb15 padt15 talc fsz16"> <a href="#">View more</a> </div>
					</div>
					
				<div class="clear"></div>
			</div>
					
		<div class="wi_230p col-xs-12 col-sm-12 fright pos_rel zi5">
						<?php if($empSummary==1) { ?>
						<div class="column_m padb15">
							<div class="padrl10 white_bg">
								<div class="sidebar_prdt_bx">
									<div class="padb10">
										
										
									
									<div class="hidden-xs hidden-sm">
							<a href="https://www.qmatchup.com/beta/user/index.php/CheckLogin/checkCredentialsLogin?url=/beta/company/index.php/ContentDetail/magazineAccount/&logindetail=<?php echo $empSummaryDetail; ?>
" class="dblock padrl20 brdrad3 red_bg_ff0000 ws_now talc lgn_hight_40 fsz14 white_txt">
								<img src="../../../../html/usercontent/images/icons/gift.png" width="20" height="20" class="marr5 valm">
								<span class="valm">Go to workplace</span>
							</a>
						</div> 
									
						</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div>
					<?php  } else { ?>
					<div class="column_m padb15">
							<div class="padrl10 white_bg">
								<div class="sidebar_prdt_bx">
									<div class="padb10">
										
										
									
									<div class="hidden-xs hidden-sm">
							<a href="../../VerifyRequest/updateRequestAccount/<?php echo $data['cid']; ?>" class="dblock padrl20 brdrad3 zohoorange_bg ws_now talc lgn_hight_29 fsz14 white_txt">
								
								<span class="valm">Connect</span>
							</a>
						</div> 
									
						</div>
								<div class="clear"></div>
							</div>
						</div>
						
					</div>
					<?php } ?>
						
						<div class="column_m padb15">
							<div class="padrl10 white_bg">
								<div class="sidebar_prdt_bx">
									<div class="pad10 brd brdrad3">
										<!--<div class="prdt_pic padl20 martb10"><img src="../../html/usercontent/images/smile.png" width="190" height="120" alt="Hilton" title="Hilton"> </div>-->
										<h3 class="prdt_name padb5 fsz20"> Ta del av förmåner från din arbetsgivare - Gratis!</h3>
										
										<div class="padtb0">
											
										<div class="padtb10 clear">
											<div class="line"></div>
										</div>
										<p class="fsz14">Detta erbjudande är inte förknippat med några syngliga eller dolda kostnader. Dock är det begränsat och därmed ber vi dig registrera dig omgående.</p>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
									<div class="hidden-xs hidden-sm">
									
							<a href="#" class="dblock padrl20 brdrad3 zohoorange_bg ws_now talc lgn_hight_29 fsz14 white_txt">
								
								<span class="valm">Erbjudande</span>
							</a>
									
						</div> </div>
								<div class="clear"></div>
							</div>
						</div>
						
						
						
					
						
						
									
									<div class="column_m padb15">
							<div class="padt20 white_bg">
								<div class="pad10">
									<h2 class="fsz16">Undrar du något?</h2>
									<p>Vi hjälper dig mer än gärna med att svara på dina frågor eller funderingar. Hör av dig till oss på telefon eller via mejl.</p>
									<ul class="small_icon_list_30">
										<li>
											<div class="icon_bx phone_ico"></div>
											<div class="icon_bx_content">
												<h2 class="lgtblue_txt padb5 fsz18">010 -15 10 125</h2>
												<div> support@qmatchup.com</div>
											</div>
										</li>
									</ul>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			<div class="clear"></div>
			</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
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
	
	
	
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
	
	
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
</body>

</html>
</body>

</html>