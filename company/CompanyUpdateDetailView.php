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
	
	<body class="white_bg ffamily_avenir">
		
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../updateInfo/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../updateInfo/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
				<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Changes</h1>
									</div>
									<div class="mart20   xxs-talc talc padb10 brdb_new"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Overview of changes made on profile.</a></div>
					 
						 
							
							
							
							<div class="column_m container   fsz14 dark_grey_txt">
									<div class="tab-content padb25 padt5" id="tab_total" style="display:block;">
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['company_name_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Company</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['company_name_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['company_name']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['industry_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Industry</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['industry_name_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['industry_name_new']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['cid_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">CID</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['cid_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['cid']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['founded_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Founded</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['founded_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['founded']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['phone_country_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Country phone</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['phone_country_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['phone_country']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['phone_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Phone</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['phone_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['phone']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['delivery_address_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Delivery address</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['delivery_address_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['delivery_address']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['d_city_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Delivery city</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['d_city_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['d_city']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['d_country_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Delivery country</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['d_country_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['d_country']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['d_zip_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Delivery zip code</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['d_zip_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['d_zip']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['address_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Address</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['address_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['address']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['city_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">City</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['city_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['city']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['country_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Country</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['country_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['country']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['zip_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Zip code</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['zip_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['zip']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									
									
										<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['si_address_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier invoice address</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_address_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_address']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['si_city_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier invoice city</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_city_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_city']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['si_country_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier invoice country</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_country_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_country']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['si_zip_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier invoice zip code</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_zip_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['si_zip']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									
										<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['sd_address_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier delivery address</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_address_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_address']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['sd_city_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier delivery City</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_city_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_city']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['sd_country_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier delivery country</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_country_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_country']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['sd_zip_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Supplier delivery zip code</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_zip_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['sd_zip']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
										<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['vat_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">VAT</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['vat_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['vat']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['bankgiro_med_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Bankgiromed</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bankgiro_med_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bankgiro_med']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['bankgiro_utan_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Bankgiro utan</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bankgiro_utan_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bankgiro_utan']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['iban_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">IBAN</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['iban_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['iban']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
												<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['bic_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">BIC</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bic_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bic']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['bank_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">Bank</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bank_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['bank']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									<div class="column_m container  marb5   fsz14 dark_grey_txt <?php if($companyUpdateDetail['f_tax_updated']==0) echo 'hidden'; ?>">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12 hei_50p">
													
													<div class="fleft wi_30   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Field</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt">FTAX</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Old value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['f_tax_old']; ?></span>  </div>
													 
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">New value</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz16  black_txt"><?php echo $companyUpdateDetail['f_tax']; ?></span>  </div> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
										 
									
									<table class="wi_100 hidden" cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Field</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Old Value</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">New Value</div>
												</th>
												
												
											</tr>
											
										</thead>
										<tbody id="updates">
											
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['company_name_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Company Name</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['company_name_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['company_name']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['industry_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Industry</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['industry_name_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['industry_name_new']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['cid_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">CID</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['cid_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['cid']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['founded_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Founded</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['founded_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['founded']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['phone_country_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Country Phone</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['phone_country_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['phone_country']; ?></div>
													</td>
													
													
												</tr>
												
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['phone_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Phone number</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['phone_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['phone']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['delivery_address_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Delivery address</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['delivery_address_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['delivery_address']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['d_city_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Delivery city</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['d_city_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['d_city']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['d_country_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Delivery country</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['d_country_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['d_country']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['d_zip_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Delivery zipcode</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['d_zip_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['d_zip']; ?></div>
													</td>
													
													
												</tr>
												
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['address_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Address</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['address_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['address']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['city_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">City</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['city_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['city']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['country_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Country</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['country_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['country']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['zip_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Zipcode</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['zip_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['zip']; ?></div>
													</td>
													
													
												</tr>
											
											
											<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['si_address_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier Invoice address</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_address_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_address']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['si_city_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier Invoice city</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_city_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_city']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['si_country_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier Invoice country</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_country_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_country']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['si_zip_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier Invoice zipcode</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_zip_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['si_zip']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['sd_address_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier delivery address</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_address_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_address']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['sd_city_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier delivery city</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_city_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_city']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['sd_country_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier delivery country</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_country_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_country']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['sd_zip_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Supplier delivery zipcode</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_zip_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['sd_zip']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['vat_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">VAT</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['vat_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['vat']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['bankgiro_med_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Bankgiromed</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bankgiro_med_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bankgiro_med']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['bankgiro_utan_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Bankgiro utan</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bankgiro_utan_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bankgiro_utan']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['iban_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">IBAN</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['iban_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['iban']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['bic_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">BIC</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bic_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bic']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['bank_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Bank</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bank_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['bank']; ?></div>
													</td>
													
													
												</tr>
												
												<tr class="fsz16 xs-fsz16 <?php if($companyUpdateDetail['f_tax_updated']==0) echo 'hidden'; ?>">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">Ftax</a></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['f_tax_old']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $companyUpdateDetail['f_tax']; ?></div>
													</td>
													
													
												</tr>
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
		
		
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
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