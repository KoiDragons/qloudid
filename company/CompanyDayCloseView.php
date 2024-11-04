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
	$path1 = $path."html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a=$path1."default-profile-pic.jpg";  $imgs=$path1."default-profile-pic.jpg"; } }  else {  $imgs=$path1."default-profile-pic.jpg"; $value_a=$path1."default-profile-pic.jpg"; } ?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<script>
		function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
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
		<body class="white_bg" onload="startTime();">
		
		<!-- HEADER -->
	<?php include 'CompanyHeaderClosed.php'; ?>
	<div class="clear" id=""></div>
		
			
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60 bold padb10 black_txt trn" id="txt" ></h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Klicka på knappen om du är klar för dagen.</a></div>
						<?php if($checkOpenStatus==1) { if($visitorsCount['num']==0) { ?>
						<div class=" white_bg mart5  brdrad3 brd_1 bg_fffbcc_a marb10" style="">
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><img src="../../../../html/usercontent/images/random/visitor.jpg" width="40"height="40" ></div>
																	</div>
													
													<div class="fleft wi_60 xxs-wi_80 sm-wi_60 xsip-wi_60 xs-mar0 ">
													
													
													 <a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt10 jain2 dblock brdb brdclr_lgtgrey2 fsz16">Visitors.</span></a> </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														 <a href="../reportClosingDay/<?php echo $data['cid']; ?>"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
						
						 
						<?php } else { ?>
						<div class=" white_bg mart5  brdrad3 brd_1 bg_fffbcc_a marb10" style="">
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><img src="../../../../html/usercontent/images/random/visitor.jpg" width="40"height="40" ></div>
																	</div>
													
													<div class="fleft wi_60 xxs-wi_80 sm-wi_60 xsip-wi_60 xs-mar0 ">
													
													
													 <a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt10 jain2 dblock brdb brdclr_lgtgrey2 fsz16">Visitors.</span></a> </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														 <a href="../listPresentVisitors/<?php echo $data['cid']; ?>"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
					 
						<?php } } if($checkOpenStatusParkering==1) { ?>
						<div class=" white_bg mart5  brdrad3 brd_1 bg_fffbcc_a marb10" style="">
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><img src="../../../../html/usercontent/images/random/undraw_Vehicle_sale_a645.png" width="40"height="40" ></div>
																	</div>
													
													<div class="fleft wi_60 xxs-wi_80 sm-wi_60 xsip-wi_60 xs-mar0 ">
													
													
													 <a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt10 jain2 dblock brdb brdclr_lgtgrey2 fsz16">Parkering</span></a> </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														 <a href="#"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
					  
						<?php } if($checkOpenStatusDelivery==1) { ?>
						<div class=" white_bg mart5  brdrad3 brd_1 bg_fffbcc_a marb10" style="">
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><img src="../../../../html/usercontent/images/random/undraw_delivery_address_03n0.png" width="40"height="40" ></div>
																	</div>
													
													<div class="fleft wi_60 xxs-wi_80 sm-wi_60 xsip-wi_60 xs-mar0 ">
													
													
													 <a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt10 jain2 dblock brdb brdclr_lgtgrey2 fsz16">Delivery</span></a> </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														 <a href="#"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
						 
						<?php }  if($checkOpenStatusSafeqid==1) { ?>
						<div class=" white_bg mart5  brdrad3 brd_1 bg_fffbcc_a marb10" style="">
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><img src="../../../../html/usercontent/images/random/undraw_delivery_address_03n0.png" width="40"height="40" ></div>
																	</div>
													
													<div class="fleft wi_60 xxs-wi_80 sm-wi_60 xsip-wi_60 xs-mar0 ">
													
													
													 <a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt10 jain2 dblock brdb brdclr_lgtgrey2 fsz16">SafeQid</span></a> </div>
													 
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														 <a href="../reportDaycareClose/<?php echo $data['cid']; ?>"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
						 
						<?php } ?>
						
					</div><div class="clear"></div>
				</div></div>
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			
			
			<div class="clear"></div>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/visitorsIP.js"></script>
			
			
			
		</body>
	</html>										