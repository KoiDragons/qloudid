﻿<!doctype html>
<html>
	<?php $path1 = $path."html/usercontent/images/"; 
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
	
	
if($requestDetail ['passport_image']!=null) { $filename="../estorecss/".$requestDetail ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$requestDetail ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qloudid</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
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
	</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<div class="column_m header xs-header  bs_bb white_bg">
				<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10  white_bg">
					
					<div class="logo  marr15 wi_140p xs-wi_80p">
						<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					
						<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 " style="width: 50px; padding : 5px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
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
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
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
					
						<div class="hidden-xs hidden-sm fleft padl20 padr10 brdl">
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
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
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
		
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="LoginAccount" class="diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm">Stäng sida</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					<div class="visible-xs visible-sm fright marr10 padr10 "> <a href="#" class="diblock padrl20 brdrad3  lgn_hight_29 fsz14 black_txt">Stäng sida</a> </div>
					<div class="clear"></div>
					
				</div>
			</div><div class="clear" id=""></div>
	
		
			<!-- CONTENT -->
			<div class="column_m xs-padb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30 mart40 marb0 padt40 xs-padt0" onclick="checkFlag()();">
				<div class="padrl10 xs-padrl25">
					<div class="wrap maxwi_100   xs-nobrdb xs-padt0 xs-padb0 mart0 xs-mart0">
					
						<div class="dflex xs-fxwrap_w alit_c">
							
							
							<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall  brdrad5 talc padl50 xs-padl0">
								
								
								<div class="padb0 xxs-pad0 ">
									<div class="marb30 visible-xs visible-sm talc">
								<img src="<?php echo $imgs; ?>" class="maxwi_100 hei_auto brd brdrad5" height="125" width="125" >
							</div>
									
									<h4 class="bold fsz50 padb10 tall xs-fsz40 xs-talc">Hej, <?php echo $requestKeenDetail['keen_first_name']; ?>!</h4>
									<h3 class="fsz25 xs-fsz20 padb10 padt10 xs-padt0 brdb_new tall  lgn_hight_30 xs-talc"><?php echo $requestDetail['first_name']." ".$requestDetail['last_name']; ?> vill meddela dig om att du står som hennes närmaste anhörig att bli meddelad vid olycka eller fara. </h3>
									
									<p class="padt10 xs-padb10 tall fsz18 xs-fsz16 padb0 lgn_hight_30  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Hon vill också att be dig om att få bli din närmaste anhörig. </p>
									<p class="padt10 xs-padb10 tall fsz18 xs-fsz16 padb0 lgn_hight_30  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Logga in och acceptera eller skapa ett konto.</p>
									
									
									
									
								</div>
									<div class="mart20 tall">
						<a href="https://www.qloudid.com/user/index.php/LoginAccount"><input type="button" value="Logga in eller skapa ett konto" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" ></a>
						
					</div>
								
							</div>
							<div class="wi_50 xs-wi_100 fxshrink_0 order_1 xs-order_2 marb20  xs-marr0 talc  xs-padr0 hidden-xs">
								<img src="https://www.qloudid.com/html/omworkplace/images/random/undraw_gradma_wanr.png" class="wi_450p xs-wi_347p">
							</div>
							
						</div>
					
					<!-- Center content -->
				
					
					
					<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			
			
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb  brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd no talc">
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
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb  brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd no talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb  brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd no talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr  brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
			
		
		<p>
			
		</p>
		
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script>
			tinyMCE.init(
			{
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
		
		<script type="text/javascript">
			$("a.add_pro_sum").click(function()
			{
				$(".pro_sum_form").toggle();
			});
			$("a.add_exp_sum").click(function()
			{
				$(".exp_sum_form").toggle();
			});
			$("a.add_edu_sum").click(function()
			{
				$(".edu_sum_form").toggle();
			});
			$("a.add_lang_sum").click(function()
			{
				$(".edu_lang_form").toggle();
			});
			$("a.add_lice_sum").click(function()
			{
				$(".lice_sum_form").toggle();
			});
			
			function valsummary()
			{
				document.getElementById("summery").submit();
			}
			
			function checkexperiance()
			{
				var company = document.getElementById("com_name");
				var title = document.getElementById("com_title");
				var startmonth = document.getElementById("com_start_month");
				var startyear = document.getElementById("com_start_year");
				var endmonth = document.getElementById("com_end_month");
				var endyear = document.getElementById("com_end_year");
				var current_company = document.getElementById("com_current");
				if (company.value == "")
				{
					$(company).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (title.value == "")
				{
					$(title).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (startmonth.value == "0")
				{
					$(startmonth).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (startyear.value == "0")
				{
					$(startyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (current_company.checked == false)
				{
					if (endmonth.value == "0")
					{
						$(endmonth).css(
						{
							'background-color': '#FF9494'
						});
						return false;
					}
					if (endyear.value == "0")
					{
						$(endyear).css(
						{
							'background-color': '#FF9494'
						});
						return false;
					}
					if (endyear.value < startyear.value)
					{
						alert("End value should be greater than start value !!");
						$(endyear).css(
						{
							'background-color': '#FF9494'
						});
						return false;
					}
				}
				document.getElementById("experiance").submit();
			}
			
			function selectbox(startyear, syear)
			{
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function selectcountry(startyear, syear)
			{
				//alert(startyear.options[1].value );
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function selectschool(startyear, syear)
			{
				//alert(startyear.options[1].value );
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function selectclass(startyear, syear)
			{
				//alert(startyear.options[1].value );
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function showedu(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(data[1]); return false;
				selectcountry(document.getElementById("country_id"), data[1]);
				document.getElementById("cv_school").value=data[2];
				selectbox(document.getElementById("degree_type"), data[3]);
				selectbox(document.getElementById("duration"), data[4]);
				selectbox(document.getElementById("cv_school_start"), data[5]);
				selectbox(document.getElementById("cv_school_end"), data[6]);
				document.getElementById("cv_degree").value= data[7];
				document.getElementById("cv_edu").value = data[0];
				$("#mylink1").attr("href", "removeEdu/" + scrt_var);
			}
			
			function showlang(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(data[1]); return false;
				selectbox(document.getElementById("lang_id"), data[1]);
				selectbox(document.getElementById("level_id"), data[2]);
				document.getElementById("cv_lang").value = data[0];
				$("#mylang").attr("href", "removeLanguage/" + scrt_var);
			}
			
			function showlice(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(data[1]); return false;
				selectbox(document.getElementById("lice_id"), data[1]);
				document.getElementById("cv_lice").value = data[0];
				$("#mylice").attr("href", "removeLicence/" + scrt_var);
			}
			
			function editexp(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(document.getElementById("mylink").value);
				document.getElementById("com_name").value = data[1];
				document.getElementById("com_title").value = data[2];
				document.getElementById("com_loc").value = data[3];
				document.getElementById("comp_experiance").value = data[0];
				document.getElementById("r_email").value = data[8];
				selectbox(document.getElementById("com_start_month"), data[4]);
				selectbox(document.getElementById("com_start_year"), data[5]);
				selectbox(document.getElementById("com_end_month"), data[6]);
				selectbox(document.getElementById("com_end_year"), data[7]);
				if (data[9] == '1')
				{
					com_current = document.getElementById("com_current").parentNode;
					$(com_current).addClass("checked");
					document.getElementById("com_current").checked = true;
				}
				desc = document.getElementById("exp" + data[0]).value;
				editor = tinymce.get('com_desc');
				editor.setContent(desc);
				$("#mylink").attr("href", "removeExp/" + scrt_var);
			}
			
			function checkedu()
			{
				var country = document.getElementById("country_id");
				var school = document.getElementById("cv_school");
				var startyear = document.getElementById("cv_school_start");
				var endyear = document.getElementById("cv_school_end");
				var cv_degree = document.getElementById("cv_degree");
				var duration = document.getElementById("duration");
				if (country.value == "0")
				{
					$(country).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (school.value == "0")
				{
					$(school).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				/*if (duration.value == "0")
					{
					$(duration).css(
					{
					'background-color': '#FF9494'
					});
					return false;
				}*/
				if (startyear.value == "0")
				{
					$(startyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (endyear.value == "0")
				{
					$(endyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (endyear.value < startyear.value)
				{
					alert("End value should be greater than start value !!");
					$(endyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (cv_degree.value == "0")
				{
					$(cv_degree).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				document.getElementById("cveducation").submit();
			}
			
			function checklang()
			{
				var country = document.getElementById("lang_id");
				var duration = document.getElementById("level_id");
				if (country.value == "0")
				{
					$(country).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (duration.value == "0")
				{
					$(duration).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				document.getElementById("langu").submit();
			}
			
			function checklice()
			{
				var country = document.getElementById("lice_id");
				if (country.value == "0")
				{
					$(country).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				document.getElementById("lice").submit();
			}
		</script>
		
	</body>
	
</html>