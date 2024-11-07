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
		$path1 = $path."html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>
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
	</script>
</head>
	
	<body class="lgtgrey_bg">
		
	<div class="column_m header xs-hei_55p  bs_bb lgtgrey_bg" id="headerData" >
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey_bg">
					<div class="logo  marr15 wi_140p xs-wi_80p hidden-xs hidden-sm visible-xxs">
						<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft padrl10">
							<div class="flag_top_menu flefti  padb10 " style="width: 70px; padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1  padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw1.png" width="45" height="31" alt="email" title="email" onclick="togglePopup();" class="brdrad5"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="45" height="45" alt="email" title="email" class="lang_selector" data-value="sv" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="45" height="45" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/germanf.png" width="45" height="45" alt="email" title="email"class="lang_selector" data-value="de" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="45" height="45" alt="email" title="email"></a></div>
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
					
					<div class="hidden-xs hidden-sm fleft padl20 padr10 ">
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
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/germanf.png" width="28" height="28" alt="email" title="email"data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German </a> </div>
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
					
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="../../PublicEmployeeInfo/companyAccount/<?php echo $data['eid']; ?>" class="  diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm">St&auml;ng Sidan</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					<div class="visible-xs visible-sm fright marr0 padt15 "> <a href="../../PublicEmployeeInfo/companyAccount/<?php echo $data['eid']; ?>" class="diblock padl10 padr5 brdrad3   fsz18 black_txt" data-target="#gratis_popup_verify" >Gå tillbaka</a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart0" >
				<div class="wrap maxwi_100 padrl15 xs-padrl0 md-padrl0 lg-padrl0">
					
					<!-- Left sidebar -->
					<div class="wi_240p fleft pos_rel zi50 hidden">
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
									

								
								
									<ul class="marr20 pad0">
									<li class=" dblock padb10 padl8">
											<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Nyhetsflöde</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
									<!-- Newsfeed -->
										<li class="dblock pos_rel padb10 brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Utforska</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Om oss</span>
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
					<div class="wi_500p maxwi_100 xsi-wi_400p pos_rel zi5 marrla padrl10  brdrad3">		
				
					
					
					<div class="column_m container wi_480p xs-wi_100">
					<div class="wi_480p xsi-xsi-wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padrl0  brdrad0 lgtgrey_bg" >
						<div class="padtb0 brdrad3 ">
						
							<div class="padb10  talc padt20" >
										<div class="padrl0 ">
											<img src="<?php echo $imgs; ?>" width="140" height="140" class=" brd">
											
										</div>
									</div>

						<h1 class="lgn_hight_50 padt20 padb10 talc fsz35 bold black_txt" ><?php echo $companyDetail['company_name']; ?></h1>
						<p class="fsz18 talc black_txt padb5" ><?php if($companyDetail['industry']!="" || $companyDetail['industry']!=null)echo $companyDetail['industry'].' Company'; else echo 'Not stated company' ?></p>
						<p class="fsz18 talc padb30 black_txt underline" >Öppet till kl 20</p>
							
						
						<div class="wi_480p xsi-wi_400p maxwi_100 dflex xs-fxwrap_w talc padt40  padrl20  lgtgrey_bg" >
						<div class="wi_25 xs-wi_75p marl10"><a href="javascript:void(0);" class="fsz40 <?php if(($companyDetail['phone']=="" || $companyDetail['phone']==null || $companyDetail['phone']=="-") && ($companyDetail['support_phone']=="" || $companyDetail['support_phone']==null || $companyDetail['support_phone']=="-") && ($companyDetail['sales_phone']=="" || $companyDetail['sales_phone']==null || $companyDetail['sales_phone']=='-') && ($companyDetail['invoice_phone']=="" || $companyDetail['invoice_phone']==null  || $companyDetail['invoice_phone']=='-')) echo 'red_txt'; else echo 'dlgtgrey_txt'; ?>  <?php if(($companyDetail['phone']=="" || $companyDetail['phone']==null || $companyDetail['phone']=="-") && ($companyDetail['support_phone']=="" || $companyDetail['support_phone']==null || $companyDetail['support_phone']=="-") && ($companyDetail['sales_phone']=="" || $companyDetail['sales_phone']==null || $companyDetail['sales_phone']=='-') && ($companyDetail['invoice_phone']=="" || $companyDetail['invoice_phone']==null  || $companyDetail['invoice_phone']=='-')) echo ''; else echo 'show_popup_modal'; ?>" data-target="#company_phone_popup"> <span><i class="<?php if(($companyDetail['phone']=="" || $companyDetail['phone']==null || $companyDetail['phone']=="-") && ($companyDetail['support_phone']=="" || $companyDetail['support_phone']==null || $companyDetail['support_phone']=="-") && ($companyDetail['sales_phone']=="" || $companyDetail['sales_phone']==null || $companyDetail['sales_phone']=='-') && ($companyDetail['invoice_phone']=="" || $companyDetail['invoice_phone']==null  || $companyDetail['invoice_phone']=='-')) echo 'fas fa-window-close'; else echo 'fas fa-phone-square '; ?>" aria-hidden="true"></i> </span></a>
	
						<p class="fsz13 <?php if(($companyDetail['phone']=="" || $companyDetail['phone']==null || $companyDetail['phone']=="-") && ($companyDetail['support_phone']=="" || $companyDetail['support_phone']==null || $companyDetail['support_phone']=="-") && ($companyDetail['sales_phone']=="" || $companyDetail['sales_phone']==null || $companyDetail['sales_phone']=='-') && ($companyDetail['invoice_phone']=="" || $companyDetail['invoice_phone']==null  || $companyDetail['invoice_phone']=='-')) echo 'red_txt'; else echo 'black_txt'; ?>  padt5" >Phone</p>
						
						</div>
						 
						
						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p"><a href="#" class="fsz40  <?php if(($companyDetail['support_email']=="" || $companyDetail['support_email']==null || $companyDetail['support_email']=="-") && ($companyDetail['sales_email']=="" || $companyDetail['sales_email']==null || $companyDetail['sales_email']=='-') && ($companyDetail['invoice_email']=="" || $companyDetail['invoice_email']==null  || $companyDetail['invoice_email']=='-')) echo 'red_txt'; else echo 'show_popup_modal dlgtgrey_txt'; ?> "  data-target="#company_email_popup"><span><i class="<?php if(($companyDetail['support_email']=="" || $companyDetail['support_email']==null || $companyDetail['support_email']=="-") && ($companyDetail['sales_email']=="" || $companyDetail['sales_email']==null || $companyDetail['sales_email']=='-') && ($companyDetail['invoice_email']=="" || $companyDetail['invoice_email']==null  || $companyDetail['invoice_email']=='-')) echo 'fas fa-window-close'; else echo 'far fa-envelope'; ?>  " aria-hidden="true"></i></span></a>
						<p class="fsz13 <?php if(($companyDetail['support_email']=="" || $companyDetail['support_email']==null || $companyDetail['support_email']=="-") && ($companyDetail['sales_email']=="" || $companyDetail['sales_email']==null || $companyDetail['sales_email']=='-') && ($companyDetail['invoice_email']=="" || $companyDetail['invoice_email']==null  || $companyDetail['invoice_email']=='-')) echo 'red_txt'; else echo 'black_txt'; ?>  padt5" >Email</p>
						</div>	
						<span class="padrl5 xs-padrl0"></span><div class="wi_25 xs-wi_75p"><a href=" <?php if($companyDetail['website']==null || $companyDetail['website']=='') echo '#'; else echo 'https://'.$companyDetail['website'];  ?>" class="fsz40  <?php if($companyDetail['website']==null || $companyDetail['website']=='') echo 'red_txt'; else echo 'dlgtgrey_txt'; ?>"> <span><i class="<?php if($companyDetail['website']==null || $companyDetail['website']=='') echo 'fas fa-window-close'; else echo 'fas fa-globe'; ?>" aria-hidden="true"></i> </span></a>
						<p class="fsz13 <?php if($companyDetail['website']==null || $companyDetail['website']=='') echo 'red_txt'; else echo 'black_txt'; ?> padt5" >Website</p>
						</div>
						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p"><a href="https://maps.google.com/?q=<?php echo  $companyDetail['address']; ?>" class="fsz40 dlgtgrey_txt"><span><i class="fas fa-map-marker-alt " aria-hidden="true"></i></span></a>
						<p class="fsz13 black_txt padt5" >Map</p>
						</div>
					
						
						
						</div>
						
							<div class="wi_480p xsi-wi_400p maxwi_100 dflex xs-fxwrap_w talc padtb20  padrl20  lgtgrey_bg" >	
						<div class="wi_25 xs-wi_75p marl10"><a href="<?php if($companyDetail['fb']=='-' || $companyDetail['fb']==null) echo '#'; else echo $companyDetail['fb']; ?>" class="fsz40 dlgtgrey_txt " > <span><i class="fab fa-facebook-square pad0 fsz40" aria-hidden="true"></i> </span></a>
	
						<p class="fsz13 black_txt padt5" >Facebook</p>
						
						</div>
						 
						
						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p"><a href="<?php if($companyDetail['twitter']=='-' || $companyDetail['twitter']==null) echo '#'; else echo $companyDetail['twitter']; ?>" class="fsz40 dlgtgrey_txt"><span><i class="fab fa-twitter-square pad0 fsz40" aria-hidden="true"></i></span></a>
						<p class="fsz13 black_txt padt5" >Twitter</p>
						</div>	
						<span class="padrl5 xs-padrl0"></span><div class="wi_25 xs-wi_75p"><a href="<?php if($companyDetail['insta']=='-' || $companyDetail['insta']==null) echo '#'; else echo $companyDetail['insta']; ?>" class="fsz40 dlgtgrey_txt"> <span><i class="fab fa-instagram pad0 fsz40" aria-hidden="true"></i> </span></a>
						<p class="fsz13 black_txt padt5" >Instagram</p>
						</div>
						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p"><a href="<?php if($companyDetail['blog']=='-' || $companyDetail['blog']==null) echo '#'; else echo $companyDetail['blog']; ?>" class="fsz40 dlgtgrey_txt"><span><i class="fab fa-linkedin-in pad0 fsz40" aria-hidden="true"></i></span></a>
						<p class="fsz13 black_txt padt5" >Linkedin</p>
						</div>

						</div>
						
						
						
					</div>
					
					<div class="column_m  mart20 xs-mart0">
								
								<div class="column_m pos_rel  padtb0   xs-padrl0 brdrad5 box_shadow" style="background-color: <?php if($companyDetail['bg_color']=="" || $companyDetail['bg_color']==null) echo "#f5f5f5"; else echo $companyDetail['bg_color']; ?>">
									<div class="pos_rel bgir_norep bgip_r">
										<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
											<div class="wrap maxwi_100">
												
											</div>
										</div>
										<div class="wrap maxwi_100 minhei_85vh dflex alit_c pos_rel zi2 padtb20 padrl20">
											<div>
												
												<div class="dflex xs-dblock fxwrap_w padb0 xs-padt0 xs-padb0">
													
													<div class="wi_100 xs-wi_100 padtb0  padr20 txt_708198">
														<h2 class="bold marb10 pad0 tall xs-talc fntwei_300 fsz55 sm-fsz32 md-fsz36 lg-fsz40  xs-fsz30" style="color: <?php if($companyDetail['f_color']=="" || $companyDetail['f_color']==null) echo "#000000"; else echo $companyDetail['f_color']; ?>">Gå till... <span class="padl20"><i class="fas fa-box-open"  aria-hidden="true"></i></span>
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
													<h2 class="tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20 trn">What we do...</h2>
													
													<?php echo html_entity_decode($companyAboutus[0]); ?>

 
													
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
														<h2 class=" tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt padb10 xs-padb20 trn">Mission</h2>
														
														




<?php echo html_entity_decode($companyAboutus[1]); ?>

														
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
														<h2 class="padb10 tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt xs-padb20 trn">Vision</h2>
														<?php echo html_entity_decode($companyAboutus[2]); ?>
																												
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
														<h2 class="padb10 tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt xs-padb20 trn">CSR</h2>
													<?php echo html_entity_decode($companyAboutus[3]); ?>	
																												
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
														<h2 class="padb10 tall fsz50 xs-fsz25 lgn_hight_s1 bold black_txt xs-padb20 trn">Announcement</h2>
														
														<?php echo html_entity_decode($companyAboutus[4]); ?> 
														
													</div>
													</td>
												
											</tr>
										</tbody>
									</table>
									
									
								</div>
							</div>
							
							
							</div>
							
							</div>
							
							
							
							
							
							<div class="clear"></div>
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
		
		<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="company_phone_popupold">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Phone</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16 black_txt">If you like to make a call click on the number.. </span>
				</div>
				<div class="wi_100 marb0 talc fsz16">
				<a href="tel: <?php if($companyDetail['phone']=="" || $companyDetail['phone']==null) echo "Not Available"; else echo "+".$companyDetail['country_code']." ".$companyDetail['phone']; ?>"><span class="fxshrink_0 "><?php if($companyDetail['phone']=="" || $companyDetail['phone']==null) echo "Not Available"; else echo "+".$companyDetail['country_code']." ".$companyDetail['phone']; ?></span></a>
				</div>
			</div>
			<div class="on_clmn padt20">
				<input type="button" value="Stäng" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp">
				
			</div>
	</div>
	
	</div>
		
		<div class="popup_modal wi_300p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5" id="company_phone_popup">
	<div class="modal-content pad25 brdrad10">
		<div id="searched"><div class="padb0 ">
			<h2 class="talc marb5 pad0 bold fsz24 black_txt">Ring mig</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 talc ">
			
			<span class="valm fsz16">Här kan jag nås...</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad0 padb25 white_bg brdrad3">
			<div class="padtb0 brdrad3 white_bg">
			
			<div class="mart0" id="search_data">
			   
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Support:</a>
				</div>
				<a href="tel: <?php if($companyDetail['support_phone']=="" || $companyDetail['support_phone']==null || $companyDetail['support_phone']=="-") echo "Not Available"; else echo "+".$companyDetail['support_country']." ".$companyDetail['support_phone']; ?>"><span class="fxshrink_0 padl20"><?php if($companyDetail['support_phone']=="" || $companyDetail['support_phone']==null) echo "Not Available"; else echo "+".$companyDetail['support_country']." ".$companyDetail['support_phone']; ?></span></a>
				</li>
				</ul>
				</div>
				</div>   
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Sales:</a>
				</div>
				<a href="tel: <?php if($companyDetail['sales_phone']=="" || $companyDetail['sales_phone']==null || $companyDetail['sales_phone']=='-') echo "Not Available"; else echo "+".$companyDetail['sales_country']." ".$companyDetail['sales_phone']; ?>"><span class="fxshrink_0 padl20"><?php if($companyDetail['sales_phone']=="" || $companyDetail['sales_phone']==null) echo "Not Available"; else echo "+".$companyDetail['sales_country']." ".$companyDetail['sales_phone']; ?></span></a>
				</li>
				</ul>
				</div>
				</div>  
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Finance:</a>
				</div>
				<a href="tel: <?php if($companyDetail['invoice_phone']=="" || $companyDetail['invoice_phone']==null  || $companyDetail['invoice_phone']=='-') echo "Not Available"; else echo "+".$companyDetail['invoice_country']." ".$companyDetail['invoice_phone']; ?>"><span class="fxshrink_0 padl20"><?php if($companyDetail['invoice_phone']=="" || $companyDetail['invoice_phone']==null) echo "Not Available"; else echo "+".$companyDetail['invoice_country']." ".$companyDetail['invoice_phone']; ?></span></a>
				</li>
				</ul>
				</div>
				</div>
			
			</div>
			
			</div>
			
			
			</div>
			
			
			
			
			</div>
		
	</div>
</div>
		
				<div class="popup_modal wi_300p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5" id="company_email_popup">
	<div class="modal-content pad25 brdrad10">
		<div id="searched"><div class="padb0 ">
			<h2 class="talc marb5 pad0 bold fsz24 black_txt">Ring mig</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 talc ">
			
			<span class="valm fsz16">Här kan jag nås...</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad0 padb25 white_bg brdrad3">
			<div class="padtb0 brdrad3 white_bg">
			
			<div class="mart0" id="search_data">
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart0 padt10  padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Office:</a>
				</div>
				<a href="mailto: <?php if($companyDetail['company_email']=="" || $companyDetail['company_email']==null || $companyDetail['company_email']=="-") echo "Not Available"; else echo $companyDetail['company_email']; ?>"><span class="fxshrink_0 padl20"><?php if($companyDetail['company_email']=="" || $companyDetail['company_email']==null) echo "Not Available"; else echo $companyDetail['company_email']; ?></span></a>
				</li>
						
				</ul>
				</div>
				</div>   
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Support:</a>
				</div>
				<a href="mailto: <?php if($companyDetail['support_email']=="" || $companyDetail['support_email']==null || $companyDetail['support_email']=="-") echo "Not Available"; else echo $companyDetail['support_email']; ?>"><span class="fxshrink_0 padl20"><?php if($companyDetail['support_email']=="" || $companyDetail['support_email']==null) echo "Not Available"; else echo $companyDetail['support_email']; ?></span></a>
				</li>
				</ul>
				</div>
				</div>   
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Sales:</a>
				</div>
				<a href="mailto: <?php if($companyDetail['sales_email']=="" || $companyDetail['sales_email']==null || $companyDetail['sales_email']=="-") echo "Not Available"; else echo $companyDetail['sales_email']; ?>"><span class="fxshrink_0 padl20"><?php if($companyDetail['sales_email']=="" || $companyDetail['sales_email']==null) echo "Not Available"; else echo $companyDetail['sales_email']; ?></span></a>
				</li>
				</ul>
				</div>
				</div>    
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Finance:</a>
				</div>
				<a href="mailto: <?php if($companyDetail['invoice_email']=="" || $companyDetail['invoice_email']==null || $companyDetail['invoice_email']=="-") echo "Not Available"; else echo $companyDetail['invoice_email']; ?>"><span class="fxshrink_0 padl20"><?php if($companyDetail['invoice_email']=="" || $companyDetail['invoice_email']==null) echo "Not Available"; else echo $companyDetail['invoice_email']; ?></span></a>
				</li>
				</ul>
				</div>
				</div>   
			
			</div>
			
			</div>
			
			
			</div>
			
			
			
			
			</div>
		
	</div>
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
			<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/visitorsIP.js"></script>
	</body>
	
</html>