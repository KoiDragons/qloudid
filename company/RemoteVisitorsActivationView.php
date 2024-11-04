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
		<meta http-equiv="refresh" content="180;" />
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
		<body class="ffamily_avenir" style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
		<div class="column_m header xs-header xsip-header xsi-header bs_bb " style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 " style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
				<div class="fleft padrl0 hidden">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"  style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 	<div class="fright xs-dnone sm-dnone padt10 padb10 hidden">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel   marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  fsz30  black_txt_h"  style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-globe"></i></a> </li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3 hidden"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz30  " style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-globe"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
		 <div class="column_m pos_rel">	
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30  marb0  padb30" id="loginBank" onclick="checkFlag();">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_400p xsi-wi_360p maxwi_100   pos_rel zi5 marrla pad30  xs-pad0   brdrad5  " >
						
							
							<div class="marb50">
							<?php if($companyDetail ['profile_pic']!=null) { ?>
								<img src="<?php echo $imgs; ?>" class="imageDimension300 xs-imageDimension250 brdrad5" >
							<?php } else { ?>
							
							
								<div class="pad20 wi_100 hei_100p talc fsz40 xs-fsz20 brdrad1000 black_txt">
																	
																	
																	
																	<span class="fa-stack fsz40 minhei_100p">
																				 <i class="far fa-circle  fa-stack-2x hei_100p  white_bg white_txt" aria-hidden="true" style="border-radius: 70%;"></i>
																				  <p class="black_txt fa-stack-1x padt10 fsz50 bold" aria-hidden="true"> <?php echo substr($companyDetail['company_name'],0,1); ?></p>
																				</span>
																	
																																		
																	</div>
							
							<?php } ?>
								
							</div>
							
						 <div class="padb20 xs-padrl10">
						<div class="wrap maxwi_100 dflex brdrad3">
						<a href="../employeeInfo/<?php echo $data['cid']; ?>" class="wi_80 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla  white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdr trn ffamily_avenir brdclr_f tall padl30 uppercase">Tap to activate
						  
						</a> <a href="../employeeInfo/<?php echo $data['cid']; ?>" class="wi_20 maxwi_500p xs-maxwi_250p minhei_65p dflex  alit_c opa90_h marrla brdclr_f white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd nobrdl trn ffamily_avenir tall padl30 xs-padl20 ">  
						<span class="fright fsz20  " style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-chevron-right" aria-hidden="true"></i></span>
						</a> 
						</div>
						</div>
						 
						 
					</div><div class="clear"></div>
				</div></div>
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			 <div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb pad15 padr20 padl20" style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">

                <!-- primary menu -->
                <div class="tab-content active" id="mob-primary-menu" style="display: block;">
                    <div class="wi_100 dflex alit_s justc_sb talc fsz16">
                        <a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
                           
                            <span class="ffamily_avenir" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>">Sign out</span>
                        </a>
                        
                       
                       
                        <a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
                            
                            <span class="ffamily_avenir" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>">Language</span>
                        </a>
                    </div>
                </div>

              </div>

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