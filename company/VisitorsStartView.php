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
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a='../../'.$path."default-profile-pic.jpg";  $imgs='../../'.$path1."default-profile-pic.jpg"; } }  else {  $imgs='../../'.$path1."default-profile-pic.jpg"; $value_a=$path1."default-profile-pic.jpg"; } ?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>usercontent/constructor.css" />
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
		<script>
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
		</head>
		<?php $path1 = $path."html/usercontent/images/"; ?>
<body  style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
	
	<div class="column_m header xs-header xsip-header xsi-header bs_bb" style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10" style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
				<div class="logo padt10 wi_50p xs-wi_50p"><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="visible-xs visible-sm fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
			<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
			<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_black brdrad5 marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  black_txt_h" data-en="About" data-sw="About" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>">About</a> </li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz14 " style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>">Your data</a> </div>
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
			
			<div class="column_m container zi5  mart40 xs-mart30" onclick="checkFlag();" style="display:<?php if($verifyIP==0) echo 'block'; else echo 'none';  ?>">
			
			
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
					
					<!-- Center content -->
					<div class="wi_400p xsi-wi_360p   pos_rel zi5 marrla pad10  xs-pad0  ">
						
						<div class="talc fsz75 red_txt"> <span class="fas fa-minus-circle"></span></div>
							<div class="padb10 ">
									<h4 class="bold fsz50 padb10 talc xs-fsz40 black_txt xs-talc">Sorry !</h4>
									<h3 class="fsz25 xs-fsz20 padb10 padt10 xs-padt0 brdb_new talc black_txt lgn_hight_30 xs-talc" >This is a restricted page to added IP number.</h3>
								</div>
						
						
											
					</div><div class="clear"></div>
				</div>
			</div>
			
			
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30  marb0  padb30" id="loginBank" onclick="checkFlag();" style="display:<?php if($verifyIP==1) echo 'block'; else echo 'none'; ?> ">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content bodycolor  class="browngrey_bg" -->
					<div class="wi_400p xsi-wi_360p   maxwi_100 pos_rel zi5 marrla pad30  xs-pad0   brdrad5" >
						
							<div class="marb50 padt30">
							<?php if($companyDetail ['profile_pic']!=null) { ?>
								<img src="<?php echo $imgs; ?>" class="maxwi_100 hei_auto  brdrad5" height="150" width="150" >
							<?php } else { ?>
							
							
								<div class="pad20 wi_100 hei_100p talc fsz40 xs-fsz20 brdrad1000 black_txt">
																	
																	
																	
																	<span class="fa-stack fsz40 minhei_100p">
																				 <i class="far fa-circle fa-stack-2x  hei_100p white_bg white_txt" aria-hidden="true" style="border-radius: 70%;"></i>
																				  <p class="black_txt fa-stack-1x padt10 fsz50 bold" aria-hidden="true"> <?php echo substr($companyDetail['company_name'],0,1); ?></p>
																				</span>
																	
																																		
																	</div>
							
							<?php } ?>
							</div>
							<div class="marb30 padt10 xsi-marb30">
									<h1 class="padb5 talc fsz40 xs-fsz40 xsi-fsz45 bold " style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#000"; else echo $corporateColor['f_color']; ?>">Demo konto</h1>
									<p class=" padt20 xs-padt10 xsi-padb20 xs-padb20 talc fsz20 xs-fsz20  xsi-fsz23 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#000"; else echo $corporateColor['f_color']; ?>">Välj en profil för demonstration...</p>
								</div>
						
						<div class="padb10 xs-padrl10"> <a href="../visitorsIP/<?php echo $data['cid']; ?>" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16  trans_all2 xs-marrl0 brd" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#000"; else echo $corporateColor['f_color']; ?>">For Visitors </a> </div>
						
						<div class="padb10 xs-padrl10"> <a href="../../EmployeeLogin/sacnqrLogin/<?php echo $data['cid']; ?>" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16  trans_all2 xs-marrl0 brd" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#000"; else echo $corporateColor['f_color']; ?>">For Employees </a> </div>
						
						
						<?php if($data['comp_id']!=0) { ?>
						<p class="padt20 xs-padt10 xs-padb20 talc fsz18 xs-fsz16 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 " style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#000"; else echo $corporateColor['f_color']; ?>">This front desk is managed by <?php echo $data['comp_name']; ?></p>
						<?php } ?>
					</div><div class="clear"></div>
				</div></div>
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30 mart30 marb0 white_bg hidden-xs hidden">
			<div class=" dflex justc_sb alit_c padtb10 padrl40 brdt lgn_hight_34 fsz14 txt_787e89 fleft <?php if($verifyIP==0) echo "hidden"; ?>" >
				<div>
			
				<img src="<?php echo $path; ?>html/usercontent/images/map-pointer.svg" width="23" height="33" class="marr10 valm">
						<span class="val">
		            		<b>Qloud ID | </b><span class="hidden-xs"> Zum Quellenpark 33, Bad Soden </span>
		        		</span>
						
						
					</div>
					
				</div>
		</div>
			
			<div class="clear"></div>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
			
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
			
		
			
		</body>
	</html>										