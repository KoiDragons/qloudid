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
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="<?php echo $path1;?>default-profile-pic.jpg";  $imgs="<?php echo $path1;?>default-profile-pic.jpg"; } }  else {  $imgs="<?php echo $path1;?>default-profile-pic.jpg"; $value_a="<?php echo $path1;?>default-profile-pic.jpg"; } ?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="theme-color" content="#cae5ff" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon-16x16.png">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<script>
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
			translator.lang("en");
			var translation = translator.get("Home");
			var currentLang = 'en';
			var langVar='<?php echo $verifyLanguage; ?>';
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
		function closePop()
		{
		document.getElementById("popup_fade").style.display='none';
						$("#popup_fade").removeClass('active');
						document.getElementById("person_informed").style.display='none';
						$(".person_informed").removeClass('active');
		}
			
		</script>
		<?php $path1 = $path."html/usercontent/images/"; ?>
		</head>
		<body class="white_bg xs-white_bg ffamily_avenir" >
			<div class="column_m header xs-hei_55p bs_bb hidden-xs white_bg xs-white_bg" >
				<div class="wi_100 hei_65p xs-hei_55p xs-pos_fix padtb0 padrl0 white_bg xs-white_bg"  >
				   
				<div class="clear"></div>
			</div>
		</div>
		
	 
	<div class="clear"></div>
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30  marb0  padb30" id="loginBank" onclick="checkFlag();">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					 
					<!-- Center content -->
					<div class="wi_500p xsi-wi_360p maxwi_100   pos_rel zi5 marrla pad30  xs-pad0   brdrad5  " >
						
					<div class="marb50 padt30 xs-padt0 brdrad50 ">
							 
								
								
								<div class="padrl0 ">
											<img src="../../../../html/usercontent/images/Kid7.png" class="imageDimension200 xs-imageDimension brdrad5">
											
										</div>
										
										
							 
								
							</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 grey_txt   bold">Welcome</p>
						<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt"><?php echo $companyDetail['company_name']; ?></h1>
							
							 
							 
						
						<div class="tab-header martb10 padb10 xs-talc blue_67cff7_brd nobrdt nobrdl nobrdr talc">
                                            
                                            <a href="#" class="dinlblck mar5 padrl10 padrl30_a  brd_67cff7_a t_67cff7_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active" data-id="utab_Popular1">Security</a>
                                            
                                             

                                        </div>
						
						   
						    <div class="tab_content active" id="utab_Popular1" style="display: block;">
							
							<a href="../../DropoffChild/verifyIdentity/<?php echo $data['cid']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_50p marr15   red_ff2828_bg" style="background-color:#47E2A1;; border-radius: 10%;  "> <div class="wi_50p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 red_ff2828_bg white_txt  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> D </div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Check in</span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">Drop off my child </span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right grey_txt" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
							
								<a href="../../PickupChild/verifyIdentity/<?php echo $data['cid']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_50p xxs-wi_20 sm-wi_10 xsip-wi_10 marr15   red_ff2828_bg" style="background-color:#47E2A1;; border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 red_ff2828_bg white_txt  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> P </div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Check out </span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">Pick up my child</span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right grey_txt" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
														
							</div>
							
							
							 
						 
					</div><div class="clear"></div>
				</div></div>
					<!-- Center content -->
					 <div class="clear"></div>
				</div> 
				 
			
	
			
			 
			
			
			<div class="clear"></div>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
			<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
			
			<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/dropoff.js"></script>
			
			
			
		</body>
	</html>										