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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>keepcss/constructor.css" />
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>keepcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101260776-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-101260776-1');
		</script>
		
		<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="0a80f426-d57f-495d-b589-3cbaa3bc1d7b" type="text/javascript" async></script>
	</head>
	
	<body class="white_bg">
		
		<?php $path1 = $path."usercontent/images/"; include 'CompanyHeaderFlagPublic.php';
			
			?>
		
		<div class="clear"></div>
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20  xsip-mart40 xsi-mart40">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="xs-wi_100 dflex justc_sb alit_c bs_bb marb0  padt2 xs-padt0 xs-lgtgrey_bg">
						<div class="wi_960p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg">
					<div class="wi_240p fleft pos_rel zi50">
								<div class="padrl10">
									
									<!-- Scroll menu -->
									<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
										<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14 xs-white_bg" id="scroll_menu">
											<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb_b padb20">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
															
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz80 xs-fsz20 brdrad1000 yellow_bg_a panlyellow_bg  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	" id="aa_1227620"> <?php if($company['grading_status']==0) echo "b"; else if($company['grading_status']==1) echo "A"; else if($company['grading_status']==2) echo "AA"; else if($company['grading_status']==3) echo "AAA"; ?> </div> 																<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padtr10 fsz15"> <span> <?php echo substr(html_entity_decode($company['company_name']),0,20); ?></span>  </div>
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
											<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										
										
										
										
										<li class=" dblock pos_rel padb10 padt0 brdclr_hgrey ">
											
											<ul class="marr20 pad0">
												
												
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Om oss</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../PublicCareerDetail/careerAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" data-trn-key="Historik">Karriärsida</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>

												<li class="dblock padrb10 hidden">
													
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" data-trn-key="Historik">Leverantörsportal</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10 hidden">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" data-trn-key="Historik">Återförsäljarportal</span>
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
						<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padl20 xs-padl0 xsi-padl0">		
				
					
							<!-- Configure Data -->
							<?php $i=0;  foreach($companyAboutus as $category => $value)  { if($i==0) { ?>
							<div class=" bs_bb  <?php if($value['is_active']==0) echo 'hidden'; ?>">
								
								
								
								
								<table class="wi_100" cellpadding="0" cellspacing="0">
									<tbody>
										<tr class="odd">
											<td class="wi_100 padtb30 valm talc lgtblue2_bg padrl10 xs-padtb10">
												<div class="padrl30 tall black_txt fsz18 xs-padrl10">
													<h2 class="tall fsz30 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20"><?php echo html_entity_decode($value['heading']); ?></h2>
													
													<?php echo html_entity_decode($value['content']); ?>
													<!--<div class="mart15">
														<a href="connect.html" class="style_base diblock pos_rel padtb10 padrl30 pgreen_bg lgn_hight_20 talc fsz20 white_txt">
														<span class="wi_22p wi_36p_sbh hei_100 dblock opa30 pos_abs top0 left0 white_bg trans_all2"></span>
														<span class="dblock">Få en personlig visning</span>
														</a>
													</div>-->
												</div>
												<div class="marrl30 wi_33 xs-wi_100 column_m bs_bb marb20 padrl0 pink_bg xs-marrl0" >
													<a href="#" data-id="vacancy"><h3 class="padtb10 padrl10 pred2_bg lgn_hight_24 bold fsz18 white_txt xs-fsz20 xs-tall">Lediga tjänster</h3></div>
											</td>
											
										</tr>
									</tbody>
								</table>
							</div>
							<?php } else { ?>
							<div class=" txt_37404a  mart20 brdrad3 <?php if($value['is_active']==0) echo 'hidden'; ?>">
								<div class="wrap maxwi_100 ">
									
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tbody>
											<tr class="odd">
												<td class="wi_100 padtb30 valm talc lgtblue2_bg padrl10 xs-padtb10">
													<div class="padrl30 tall black_txt fsz18 xs-padrl10">
														<h2 class=" tall fsz30 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20"><?php echo html_entity_decode($value['heading']); ?></h2>
														
														<?php echo html_entity_decode($value['content']); ?>
														
													</div>
													<div class="marrl30 wi_33 xs-wi_100 column_m bs_bb marb20 padrl0 pink_bg xs-marrl0" >
													<a href="#" data-id="vacancy"><h3 class="padtb10 padrl10 pred2_bg lgn_hight_24 bold fsz18 white_txt xs-fsz20 xs-tall">Lediga tjänster</h3></div>
												</td>
												
											</tr>
											
											
										</tbody>
									</table>
									
									
								</div>
							</div>
							<?php } $i++; } ?>
							
							
						
			 	<div class="clear"></div>
			</div>
			<div class="hei_80p"></div>
			
			
			
		
		
			
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
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	</body>
	
</html>
</body>

</html>	