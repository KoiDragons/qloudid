﻿<!doctype html>
<html>
		<?php
			$path1 = $path."html/usercontent/images/";
		function base64_to_jpeg1($base64_string, $output_file) {
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
		//print_r($row_summary); die;
		if($hotelConnectionDetail ['profile_pic']!=null) { $filename="../estorecss/".$hotelConnectionDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$hotelConnectionDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg1( $value_a, '../estorecss/tmp.jpg' );  $imgs='../'.$imgs; } else { $value_a="../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../html/usercontent/images/default-profile-pic.jpg"; }

	$path1 = $path."html/usercontent/images/";
	?>
		<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides1 {display: none}
.mySlides2 {display: none}
.mySlides3 {display: none}
.mySlides4 {display: none}
.mySlides5 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>
		
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://static.tacdn.com/assets/jb_4W2.0aupAnHp.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/VANuRt.v25UokW1.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/V08PS7.DGtuK2it.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/iuYvTO.ak7AHBCF.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/DjNvou.8SI4OlSd.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/xegF5W.5qPDC-Mz.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/OMqGt0.XjA873nO.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/eFikmI.efbE_xZa.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/hA1RHn.GBdJvWoM.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/5-GvUO/bvYoFF.vw6Ng-SQ.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/PCLJ0D/-EYc4Q.qH433NkK.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/Igs38q.g6vxt_Jk.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/oymymh.f5YrglsL.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/w9qBuv.-MZ5Pg5l.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/tT-W98.7SU_mBmx.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/-xj2Ol.mGhjk9e6.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/LYUOY4.u1dC3DIa.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/4CrHtN.nYIX9kQ7.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/dX3eZQ.2LagUll6.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/LRxwgK.WTrm1--1.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/PZaU1O.-UIQ69gx.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/mlRREX.Ul4URfEl.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/Q7TAd7.M5vBqXow.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/Kv5xL1.3JTL7IX3.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/eDFcUX.wiNK-iyU.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/Xi-2HZ.rZrOJOaW.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/z2XL6d.L-vhFQV4.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/KwOV1Z.ZeBCvFvg.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/AoLEtg.wKobggDf.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/egvnuD.WKY4RwWp.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/pCKTMp.I2YDt2Kk.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/rRp3WS.tWvUwCar.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/VTuTe2.6dNhIbY-.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/EMX0si.ZRzNn3ey.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/XTiWvD.xo34gJDS.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/1pCAFN.boS-p7S3.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/fG1DJ-.jsoVd0Ym.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/HZtvHO.UlLfScDG.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/vF730k.X5N_3vL0.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/PiTJFd.9enxR1Hu.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/6nM-E7.z8Rt4bWf.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/LFeTN6.Lwhp-PKw.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/fAPg3f.XAjL05p-.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/L5WCNE.s2WNfKdU.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/x9N_Dh.feNvrGXG.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/wId9j-.pA3WXnmG.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/9lPTHX.9lAnqHTl.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/QRwZD2.qVnGQTC3.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/meOI_T.rtVlIDZm.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/MNKFIS.Ky9qD4UJ.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/oiya90.QQN1shAr.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/yfS4GB.Z4adROYh.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/Z7U8sN.dnXF56nS.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/G9idyf.B-cZnVh6.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/XS7t-Q.ObJvAzQH.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/zPgUM0.fhW0DzWZ.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/qfSfGN.U1KJLk3S.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/atsB3X.wcXoBnAs.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/tV1cF7.jWViW7NC.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/eSDIZ_.5ARJQHwC.css" crossorigin="">
<link rel="stylesheet" href="<?php echo $path;?>html/usercontent/h_gtfy.L_bxtoiv.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/miRpRf.L-0p46jz.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/hlPWhn.z-TCtO70.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/j1vWi4.hb38YhlL.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/wwtmHV.vfUaRREg.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/8rGRxX.YIexJIbf.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/NGIiZD.RgDXQ5Y7.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/u6QS-O.bA4Oo9m-.css" crossorigin="">
<link rel="stylesheet" href="https://static.tacdn.com/assets/3Cc9iV.QythbCez.css" crossorigin="">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		
	<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};

		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
			 </head>
	
	<body class="white_bg ffamily_avenir">
		
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="emergencyListing" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			 
		<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">
					<li class="hidden-xs padr10 first">
						<a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow"><span class="black_txt pred_txt_h ffamily_avenir">Consents</span></a>
					</li>
				 	<li class="hidden-xs padr10"><a href="https://www.qloudid.com/user/index.php/NewPersonal/userAccount" class="black_txt lgn_hight_s1 fsz18"><span class="black_txt fas fa-user" aria-hidden="true"></span></a>
          <ul style="display: none;">
            <li class="hidden-xs first last">
              <div class="top_arrow"></div>
            </li>
         
          </ul>
        </li>
       			
					<li class="last">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-qrcode black_txt" aria-hidden="true"></span></a>
					 	</li>
				</ul>
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
									<a href="emergencyListing" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="top_menu talc    wi_60i " style="padding-top:5px;">
				<ul class="menulist sf-menu  fsz25  bold wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir"><?php echo substr($hotelConnectionDetail['hotel_name'],0,14); ?></span></a>
					</li>
				 	 
       			 	</ul>
			</div>   
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		 
		<div class="column_m pos_rel ">
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40  xs-mart0 white_bg">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xxs-padrl0" style="width:1300px;">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					 
						
		<div class="padb0 xxs-padb0 hidden">		
							
									<h1 class="marb0  xxs-tall tall fsz50 xxs-fsz35 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  ><span class="red_ff2828_txt">Welcome to </span> <?php echo $hotelConnectionDetail['hotel_name']; ?></h1>
									</div>	
<div class="_1anKb-nl hidden-xs padb20"><div data-test-target="main_h1" class="LZSItUvx"><h1 class="HLvj7Lh5 jObdbvmD fsz75 nobold xs-fsz25 talc brdb ffamily_avenir black_txt"><span>  <span class="{geoClass}"><?php echo $hotelConnectionDetail['hotel_name']; ?></span></span></h1></div></div>																	

<div class="ovfl_hid mart10 padrl10 txt_37404a hidden">
					<div class="wrap maxwi_100 padt10 padb60 brdb" style="width:1300px;">
						 
						<div class="dflex alit_s marrl-15 talc slick-initialized slick-slider" id="section-3-slick" data-slick-settings="dots:false,arrows:true,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-sm-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1" data-slick-xxs-settings="dots:false,arrows:false,infinite:true,centerMode:true,variableWidth: true,slidesToShow:1,slidesToScroll:1"><button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: none;">Previous</button>
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
						<div aria-live="polite" class="slick-list draggable" style="padding: 0px 50px;"><div class="slick-track" role="listbox" style="opacity: 1; width: 105000px; transform: translate3d(-1865px, 0px, 0px);"><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned" tabindex="-1" role="option" aria-describedby="slick-slide019" style="" data-slick-index="-2" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-18.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Funny Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned" tabindex="-1" role="option" aria-describedby="slick-slide020" style="" data-slick-index="-1" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Political Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide00" style="" data-slick-index="0" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-31.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Marketing Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide01" style="" data-slick-index="1" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-11.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Customer Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide02" style="" data-slick-index="2" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-39.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Post-Event Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide03" style="" data-slick-index="3" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-30.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Market Research Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide04" style="" data-slick-index="4" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-16.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Facebook Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide05" style="" data-slick-index="5" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-10.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Customer Development Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide06" style="" data-slick-index="6" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-05.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Branding Questionnaires</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide07" style="" data-slick-index="7" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Patient Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-current slick-active slick-center" tabindex="-1" role="option" aria-describedby="slick-slide08" style="" data-slick-index="8" aria-hidden="false">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="0">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-13.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Demographic Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide09" style="" data-slick-index="9" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-15.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Employee Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide010" style="" data-slick-index="10" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-32.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Net Promoter Score Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide011" style="" data-slick-index="11" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-36.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Online Questionnaire Maker</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide012" style="" data-slick-index="12" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Political Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide013" style="" data-slick-index="13" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-04.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Brand Awareness Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide014" style="" data-slick-index="14" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-07.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Candidate Experience Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide015" style="" data-slick-index="15" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Straw Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide016" style="" data-slick-index="16" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-46.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Online Poll Maker</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide017" style="" data-slick-index="17" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-47.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Student Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide018" style="" data-slick-index="18" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-42.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Social Media Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide019" style="" data-slick-index="19" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-18.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Funny Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide" tabindex="-1" role="option" aria-describedby="slick-slide020" style="" data-slick-index="20" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-38.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Political Polls</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned" tabindex="-1" role="option" aria-describedby="slick-slide00" style="" data-slick-index="21" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-31.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Marketing Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div><div class="wi_220pi dflex fxdir_col alit_s padrl15 slick-slide slick-cloned" tabindex="-1" role="option" aria-describedby="slick-slide01" style="" data-slick-index="22" aria-hidden="true">
								<a href="#" class="wi_100 minhei_220p dflex fxdir_col alit_c justc_fs pos_rel zi2 padt30 padrl10 brd brdwi_2 brdclr_dde7eb brdrad4 white_bg talc trf_y2p_h trf_y4p_a trans_trf2" tabindex="-1">
									<img src="<?php echo $path;?>html/usercontent/images/icons/Icons_Carousel-11.svg" width="49" height="49" class="dblock mart25 marrla marb20" title="" alt="">
									<h4 class="pad0 nobold fsz16 txt_60666f">Customer Satisfaction Surveys</h4>
								</a>
								<div class="wi_170p hei_16p brdrad4 mart-10 marrla bg_dde7eb"></div>
							</div></div></div><button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: none;">Next</button></div>
					</div>
					<style>
						#section-3-slick .slick-prev, 
						#section-3-slick .slick-next{
							width: 100px;
							height: 100%;
							z-index: 2;
						}
						#section-3-slick .slick-prev{
							background: -webkit-gradient(linear, left top, right top, from(#fff), to(rgba(255,255,255,0)));
    						background: linear-gradient(to right, #fff, #fff, rgba(255,255,255,0));
						}
						#section-3-slick .slick-next{
							background: -webkit-gradient(linear, right top, left top, from(#fff), to(rgba(255,255,255,0)));
    						background: linear-gradient(to left, #fff, #fff, rgba(255,255,255,0));
						}
						#section-3-slick .slick-prev:before, 
						#section-3-slick .slick-next:before{
							opacity: 1;
							font-size: 48px;
							color: #941900;
						}
					</style>
				</div>									

 <div class="_1brQmsfe hidden" data-test-target="nav-links"><div class="_1anKb-nl"><div class="_1ZteHrEy"><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge _1_nbwDp3 xs-mar0"><a class="_1yB-kafB" href="#" title="Resetips"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Resetips</span><span class="KFRgbk1H"><span class="Kwh4j9lN _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge _1_nbwDp3"><a class="_1yB-kafB" href="#" title="Hotell"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Hotell</span><span class="KFRgbk1H"><span class="_2Ken6hIA _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge _1_nbwDp3"><a class="_1yB-kafB" href="#" title="Semesterbostäder"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Semesterbostäder</span><span class="KFRgbk1H"><span class="_3eCz_FQs _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge _1_nbwDp3"><a class="_1yB-kafB" href="#" title="Saker att göra"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Saker att göra</span><span class="KFRgbk1H"><span class="_1nX8jnDZ _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge _1_nbwDp3"><a class="_1yB-kafB" href="#" title="Restauranger"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Restauranger</span><span class="KFRgbk1H"><span class="_3uuD4M1H _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge _1_nbwDp3"><a class="_1yB-kafB" href="#" title="Flygresor"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Flygresor</span><span class="KFRgbk1H"><span class="_1IxxIFGB _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge"><a class="_1yB-kafB" href="/Cruises" title="Kryssningar"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Kryssningar</span><span class="KFRgbk1H"><span class="qJYg-CgG _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls"><a class="_1yB-kafB" href="#" title="Hyrbilar"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Hyrbilar</span><span class="KFRgbk1H"><span class="_1nNWGPN4 _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls"><a class="_1yB-kafB" href="#" title="Semesterpaket"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Semesterpaket</span><span class="KFRgbk1H"><span class="_1qMno9Vb _2HBN-k68 _3LkX-HIr"></span></span></span></a></div><div class="_2R--RBNa _39kFrNls _2PEEtTWK _3_rLKjCx _3wprI9Ge _1_nbwDp3"><div class="_2woHfpeY"><button class="_1yB-kafB" title="Mer" type="button"><span class="_28xP7Srb"><span class="_1Qo7YQ01">Mer</span><span class="KFRgbk1H"><span class="_35pfga6W _2HBN-k68 _3LkX-HIr"></span></span></span></button></div></div></div></div></div>	
<div class="pos_rel mart0">
<div class="_1anKb-nl padrl10 xxs-padrl0">
<div class="mar0 pos_rel">
<div class="_3BTBTVOM" data-test-target="hero-gallery">
<div class="_2tXernB8">
<button class="_1iw-atL9" aria-label="Visa alla bilder">
<div class="ZVAUHZqh" style="background-image: url(&quot;https://www.qloudid.com/html/usercontent/images/bg/hotel4.jpg&quot;); background-size: cover; height: 100%; width: 100%;">
</div>
</button>
</div>
<div class="_2zxhF-Tt">
<div class="OI7TZU7N">
<button class="_1iw-atL9" aria-label="Visa alla bilder">
<div class="ZVAUHZqh" style="background-image: url(&quot;https://www.qloudid.com/html/usercontent/images/bg/hotel5.jpg&quot;); background-size: cover; height: 100%; width: 100%;">
</div>
</button>
</div>
<div class="_2busJ7MM">
<button class="_1iw-atL9" aria-label="Visa alla bilder">
<div class="ZVAUHZqh" style="background-image: url(&quot;https://www.qloudid.com/html/usercontent/images/bg/hotel6.jpg&quot;); background-size: cover; height: 100%; width: 100%;">
</div>
</button>
</div>
</div>
</div>
<button class="gBp_51h8"><span class="_2abS2MqM"><span class="_1XDNLtFs _2HBN-k68 _3LkX-HIr"></span></span>Visa alla bilder</button></div></div></div>

<div class="_1anKb-nl mart40 padrl10">
<div class="_2fwljDfL _4k6PXJvU"><div class="_24eSqyGI" data-test-target="geo-description"><div><div class="_2xBKA6Ka"><div class="HLvj7Lh5 _2-dmJ6kF">Ljusets stad glimrar på alla sätt</div></div><div class="HLvj7Lh5 _3HScvxZ7"><div class="_3y4w8kK3 _1Eip5_6m">Ingen annan stad på jorden är lika romantisk som Paris. Staden lockar med sin magnifika konst, arkitektur, kultur och mat, men det finns också en annan sida som väntar på att utforskas: De pittoreska kullerstensgränderna, de söta konditorierna runt hörnet och de mysiga små bistroerna som lockar med ett glas Beaujolais. Redo att upptäcka ditt eget Paris?</div></div></div></div><div class="_1OcjLO8L -d0roeAA"><div class="jLMjK2-9 _5H6Ki15F _7ypdSaPp"><div class="_2J1VzU11"><div class="_2ftMalEe">Börja planera inför Paris</div><div class="_1wTRESvl"><div class="_3ciEbaVk">Skapa en resa för att spara och organisera alla dina reseidéer och se dem på en karta</div></div><div class="_3laoFWAf"><button class="_1JOGv2rJ _2oWqCEVy _3yBiBka1 _3fiJJkxX" type="button"><div class="_2NygRSyd">Skapa en resa</div></button></div></div><div class="_2Vjmfhq9"><img src="https://static.tacdn.com/img2/brand/trips/image_trips_card_medium.png" alt="" class="_1SJDQppT"></div><div></div></div></div></div></div>
		<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 hidden ">
		
	<div class="padrl10   ">
	<div class="  wi_100 padrl10   xs-padt0 ">
	<div class=" maxwi_100    xs-nobrdb xs-padt0 xs-padb0">
		<div class="dflex xs-fxwrap_w alit_c padb40 xs-padb10 ">
				<div class="xs-wi_100 wi_50 flex_1 order_1 xs-order_1 xs-tall tall">
					<img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1b/33/ca/c8/caption.jpg?w=800&amp;h=500&amp;s=1&amp;cx=2893&amp;cy=2540&amp;chk=v1_3f03b07d6776236b4686" class="maxwi_100 hei_auto padtb25 xs-padtb10">
	</div>
		<div class="xs-wi_100 wi_50 flex_1 order_2 xs-order_2 xs-tall tall">
					<img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1b/4b/58/8c/caption.jpg?w=500&h=300&s=1&cx=2441&cy=1123&chk=v1_140b80ad3746180d2cb8" class="maxwi_100 hei_auto  xs-padtb10" >
					
					 
					 
	</div>									</div>
										
										 
										
										</div>
									</div>
								</div>
		</div>
 					

<div class="_1HQROFP" data-test-target="feed">
   <div class="_1anKb-nl">
      <h2 class="sfviYlff"><span class="kXE6Dm96"><span class="HLvj7Lh5 _2-dmJ6kF">Resetips</span></span></h2>
   </div>
   <div class="_1anKb-nl">
      <div class="Hj5wr7qM">
         <div class="_3605FDyD">
            <div class="_1Sl4VGXw"></div>
            <a class="_10LLqyiF" href="#">Visa alla</a>
         </div>
         <div class="_3ssW018g">
            <ul class="_1cnXYm27">
               <li class="_1_wO6L0R">
                  <a class="_3S6pHEQs gZ95jyA4 _38K76hiv" href="#">
                     <div class="_2Mo62ViM">
                        <img class="_2RAieYCG" src="https://static.tacdn.com/img2/brand/feed/fact_sheet_best_time_to_visit.svg" alt="">
                        <div class="_96tc6_7J">Bästa tiden att besöka</div>
                     </div>
                  </a>
               </li>
               <li class="_1_wO6L0R">
                  <a class="_3S6pHEQs gZ95jyA4 _38K76hiv" href="#">
                     <div class="_2Mo62ViM">
                        <img class="_2RAieYCG" src="https://static.tacdn.com/img2/brand/feed/fact_sheet_getting_around.svg" alt="">
                        <div class="_96tc6_7J">Så här tar du dig runt</div>
                     </div>
                  </a>
               </li>
               <li class="_1_wO6L0R">
                  <a class="_3S6pHEQs gZ95jyA4 _38K76hiv" href="#">
                     <div class="_2Mo62ViM">
                        <img class="_2RAieYCG" src="https://static.tacdn.com/img2/brand/feed/fact_sheet_local_customs.svg" alt="">
                        <div class="_96tc6_7J">Lokala seder</div>
                     </div>
                  </a>
               </li>
               <li class="_1_wO6L0R">
                  <a class="_3S6pHEQs gZ95jyA4 _38K76hiv" href="#">
                     <div class="_2Mo62ViM">
                        <img class="_2RAieYCG" src="https://static.tacdn.com/img2/brand/feed/fact_sheet_tips.svg" alt="">
                        <div class="_96tc6_7J">Tips från proffsen</div>
                     </div>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl">
      <h2 class="sfviYlff"><span class="kXE6Dm96"><span class="HLvj7Lh5 _2-dmJ6kF">Explore <?php echo $hotelConnectionDetail['hotel_name']; ?></span></span></h2>
   </div>
   <div class="_1anKb-nl">
      <div class="_2_LiTKhk">
         <div class="WPbAbZxq">
            <div class="_1v3jh4G8">
               <h3 class="HLvj7Lh5 _3hVaBz-q">Eat & Drink</h3>
            </div>
            <div class="_29jwtiy-">
               <div class="HLvj7Lh5 pUrhFFvK">Platser att se, sätt att vandra på och unika upplevelser som utmärker Paris.</div>
            </div>
         </div>
         <div class="_2JGsjxnm">
            <div class="Ffh78ncj _1JCEdqUg _3auwW4vL _3XQY3qGv">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v mySlides fade">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://static.thatsup.co/content/img/article/15/jul/b%C3%A4sta-restaurangerna-i-city.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Restaurant</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">139&nbsp;972 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Utsiktsdäck och utsiktstorn, Intressanta platser och landmärken</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v mySlides fade">
                           <div>
                              <div class="_1lp0l90B">
                                 <a href="#" class="_3S6pHEQs">
                                    <div class="_32zpZsYn">
                                       <div class="gZ95jyA4 _3w8eCCad">
                                          <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                             <div class="twZ4uihZ"></div>
                                             <div class="_1tZwxF4- _3Wt7gged">
                                                <div class="ZVAUHZqh" style="background-image: url(&quot;../../../html/usercontent/images/bg/cofee.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="_1fB4MOGz">
                                       <div class="HLvj7Lh5 _2fO1NBt7">
                                          <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Coffee</div>
                                       </div>
                                    </div>
                                    <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">100&nbsp;645 omdömen</span></div>
                                    <div class="_2kChyRqv">
                                       <div class="HLvj7Lh5 _2s3pPhGm">Arkitektoniska byggnader, Konstmuseer</div>
                                    </div>
                                 </a>
                                 <div class="_2y5m9Qm7"></div>
                                 <div class="_3N9bz1ra">
                                    <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                       <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                       <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v mySlides fade">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://static.thatsup.co/content/img/place/m/e/melt-bar-restaurang-1.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Bar</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">45&nbsp;007 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Arkitektoniska byggnader, Historiska platser</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                          </ul>
                  </div>
               </div>
               <div class="_1KB7D5C1 _3n93WwqC" style="display:block;">
                  <div class="jOxjYW1k"><span class="fhoh290_"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Föregående"  onclick="plusSlides(-2);"><span class="E0di58-K _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
               <div class="_1KB7D5C1 _2bfEA-AB" style="display:block;">
                  <div class="jOxjYW1k"><span class="fhoh290_"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Nästa" onclick="plusSlides(2);"><span class="UmD9_PK8 _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl">
      <div class="_2_LiTKhk">
         <div class="WPbAbZxq">
            <div class="_1v3jh4G8">
               <h3 class="HLvj7Lh5 _3hVaBz-q">Feel Good</h3>
            </div>
            <div class="_29jwtiy-">
               <div class="HLvj7Lh5 pUrhFFvK">En blandning av charmigt, ikoniskt och modernt.</div>
            </div>
         </div>
         <div class="_2JGsjxnm">
            <div class="Ffh78ncj _1JCEdqUg _3auwW4vL _3XQY3qGv">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://files.baaam.se/uploads/fly-images/593331/spa-sverige-1280x667-c.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Spa</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">2&nbsp;066 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div>
                              <div class="_1lp0l90B">
                                 <a href="#" class="_3S6pHEQs">
                                    <div class="_32zpZsYn">
                                       <div class="gZ95jyA4 _3w8eCCad">
                                          <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                             <div class="twZ4uihZ"></div>
                                             <div class="_1tZwxF4- _3Wt7gged">
                                                <div class="ZVAUHZqh" style="background-image: url(&quot;https://www.tylosand.se/Gym_FotoPamela.se.jpg.jpg?cms_fileid=435349f388dda03bf7eee12e4d58c2c9&w=952&h=952&t=0&l=157&b=1903&r=2060&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="_1fB4MOGz">
                                       <div class="HLvj7Lh5 _2fO1NBt7">
                                          <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Fitness</div>
                                       </div>
                                    </div>
                                    <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">464 omdömen</span></div>
                                 </a>
                                 <div class="_2y5m9Qm7"></div>
                                 <div class="_3N9bz1ra">
                                    <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                       <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                       <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://static.thatsup.co/content/img/place/p/m/pm-stockholm-9.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Beauty</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">3&nbsp;055 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Hôtel de Crillon, A Rosewood Hotel</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">464 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Le Meurice</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;344 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Hotel des Grands Boulevards</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">210 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">The Hoxton, Paris</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">879 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Hôtel Henriette</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;107 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Hidden Hotel</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;492 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Hotel Signature St Germain des Pres</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;628 omdömen</span></div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="_1KB7D5C1 _3n93WwqC">
                  <div class="jOxjYW1k"><span class="fhoh290_ _1QK5bZ71 _1RnyYBrx"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Föregående" disabled=""><span class="E0di58-K _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
               <div class="_1KB7D5C1 _2bfEA-AB">
                  <div class="jOxjYW1k"><span class="fhoh290_"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Nästa"><span class="UmD9_PK8 _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl hidden">
      <div class="_2_LiTKhk">
         <div class="WPbAbZxq">
            <div class="_1v3jh4G8">
               <h3 class="HLvj7Lh5 _3hVaBz-q">Ät</h3>
            </div>
            <div class="_29jwtiy-">
               <div class="HLvj7Lh5 pUrhFFvK">De bästa bistroerna, barerna och allt annat i Paris.</div>
            </div>
         </div>
         <div class="_2JGsjxnm">
            <div class="Ffh78ncj _1JCEdqUg _3auwW4vL _3XQY3qGv">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-s/03/2b/5a/36/verjus.jpg?w=300&amp;h=-1&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Verjus</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">571 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Finare middag" title="Finare middag">$$$$</span> • <!-- -->Franskt, Europeiskt, Modernt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div>
                              <div class="_1lp0l90B">
                                 <a href="#" class="_3S6pHEQs">
                                    <div class="_32zpZsYn">
                                       <div class="gZ95jyA4 _3w8eCCad">
                                          <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                             <div class="twZ4uihZ"></div>
                                             <div class="_1tZwxF4- _3Wt7gged">
                                                <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/daodao/photo-s/0b/41/3a/72/caption.jpg?w=400&amp;h=200&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="_1fB4MOGz">
                                       <div class="HLvj7Lh5 _2fO1NBt7">
                                          <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Le 114 Faubourg</div>
                                       </div>
                                    </div>
                                    <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;738 omdömen</span></div>
                                    <div class="_2kChyRqv">
                                       <div class="HLvj7Lh5 _2s3pPhGm">
                                          <span aria-label="Finare middag" title="Finare middag">$$$$</span> • <!-- -->Franskt, Europeiskt
                                       </div>
                                    </div>
                                 </a>
                                 <div class="_2y5m9Qm7"></div>
                                 <div class="_3N9bz1ra">
                                    <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                       <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                       <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                    </button>
                                 </div>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/68/8b/57/frenchie.jpg?w=300&amp;h=-1&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Frenchie</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;291 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Finare middag" title="Finare middag">$$$$</span> • <!-- -->Franskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">La Table de Colette</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">176 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Finare middag" title="Finare middag">$$$$</span> • <!-- -->Franskt, Europeiskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">ASPIC</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">964 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Finare middag" title="Finare middag">$$$$</span> • <!-- -->Franskt, Europeiskt, Modernt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Crêperie Gigi</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">223 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span> • <!-- -->Franskt, Europeiskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Juveniles Wine Bar</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">395 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span> • <!-- -->Franskt, Europeiskt, Vinbar
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Le Barav</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">289 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span> • <!-- -->Franskt, Bar, Vinbar, Pub
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Pedzouille</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">454 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span> • <!-- -->Franskt, Europeiskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _2pegydha _1z7GhJXI _18B0pXv7">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Le Rigmarole</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">28 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Finare middag" title="Finare middag">$$$$</span> • <!-- -->Franskt, Japanskt, Internationellt, Grill, Europeiskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="_1KB7D5C1 _3n93WwqC">
                  <div class="jOxjYW1k"><span class="fhoh290_ _1QK5bZ71 _1RnyYBrx"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Föregående" disabled=""><span class="E0di58-K _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
               <div class="_1KB7D5C1 _2bfEA-AB">
                  <div class="jOxjYW1k"><span class="fhoh290_"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Nästa"><span class="UmD9_PK8 _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl">
      <h2 class="sfviYlff"><span class="kXE6Dm96"><span class="HLvj7Lh5 _2-dmJ6kF">Hyr ett rum för ditt nästa äventyr</span></span></h2>
   </div>
   <div class="_1anKb-nl">
      <div class="Hj5wr7qM">
         <div class="_3605FDyD">
            <div class="_1Sl4VGXw">
               <h3 class="HLvj7Lh5 _1p9ZqHC8">Populära bostäder i Paris</h3>
            </div>
            <a class="_10LLqyiF" href="#">Visa alla</a>
         </div>
         <div class="_3ssW018g">
            <div class="Ffh78ncj _2g-v5ZyD _3auwW4vL _3XQY3qGv">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 b3Fhq878 Ar_ysMGY OoXaTcXD">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://media-cdn.tripadvisor.com/media/vr-splice-j/02/78/67/93.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Beautiful Latin Quarter 1 Bedroom (197)</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">3 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       Plats för <!-- -->2<!-- --> • <!-- -->1<!-- --> sovrum<!-- --> • <!-- -->2<!-- --> badrum
                                    </div>
                                 </div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2rwmzlPX">
                                       från <!-- -->15&nbsp;972&nbsp;INR<!-- -->/natt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 b3Fhq878 Ar_ysMGY OoXaTcXD">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://media-cdn.tripadvisor.com/media/vr-splice-j/01/b4/8a/2e.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Gite gd luxe 1h30 Paris piscine intérieure sauna, fêtes acceptées cf conditions.</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">19 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       Plats för <!-- -->27<!-- --> • <!-- -->3<!-- --> sovrum<!-- --> • <!-- -->7<!-- --> badrum
                                    </div>
                                 </div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2rwmzlPX">
                                       från <!-- -->89&nbsp;691&nbsp;INR<!-- -->/natt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 b3Fhq878 Ar_ysMGY OoXaTcXD">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://media-cdn.tripadvisor.com/media/vr-splice-j/05/6a/11/8b.jpg&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Le Jardin Du Marais</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">37 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       Plats för <!-- -->4<!-- --> • <!-- -->1<!-- --> sovrum<!-- --> • <!-- -->1<!-- --> badrum
                                    </div>
                                 </div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2rwmzlPX">
                                       från <!-- -->12&nbsp;374&nbsp;INR<!-- -->/natt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 b3Fhq878 Ar_ysMGY OoXaTcXD">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">River Seine / Eiffel / Rue Cler:  Just Perfect!</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="5,0 av 5 bubblor" title="5,0 av 5 bubblor"><span class="_1jcHBWVU _2vB__cbb uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">37 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       Plats för <!-- -->4<!-- --> • <!-- -->1<!-- --> sovrum<!-- --> • <!-- -->1<!-- --> badrum
                                    </div>
                                 </div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2rwmzlPX">
                                       från <!-- -->19&nbsp;834&nbsp;INR<!-- -->/natt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 b3Fhq878 Ar_ysMGY OoXaTcXD">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4-">
                                             <div class="ZVAUHZqh" style="background-image:none;background-size:cover;height:100%;width:100%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Studio Piscine à Paris Montmartre Tout Confort</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">15 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       Plats för <!-- -->3<!-- --> • <!-- -->1<!-- --> badrum
                                    </div>
                                 </div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2rwmzlPX">
                                       från <!-- -->6&nbsp;494&nbsp;INR<!-- -->/natt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="_1KB7D5C1 _3n93WwqC">
                  <div class="jOxjYW1k"><span class="fhoh290_ _1QK5bZ71 _1RnyYBrx"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Föregående" disabled=""><span class="E0di58-K _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
               <div class="_1KB7D5C1 _2bfEA-AB">
                  <div class="jOxjYW1k"><span class="fhoh290_"><button class="_3ghuVozE _2xHyLFC5 Q0-NuII9" type="button" aria-label="Nästa"><span class="UmD9_PK8 _2HBN-k68 _3LkX-HIr" style="font-size: 20px;"></span></button></span></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl">
      <h2 class="sfviYlff"><span class="kXE6Dm96"><span class="HLvj7Lh5 _2-dmJ6kF">Paris är perfekt för</span></span></h2>
   </div>
   <div class="_1anKb-nl">
      <div class="Hj5wr7qM">
         <div class="_3605FDyD">
            <div class="_1Sl4VGXw">
               <h3 class="HLvj7Lh5 _1p9ZqHC8">Matsalar, butiker och marknadsgator för matälskare</h3>
            </div>
         </div>
         <div class="_3ssW018g">
            <div class="Ffh78ncj _3tnVPeq- _2pwgCIcL YZTwdaqe">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/05/5b/35/3b/rue-montorgueil.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Rue Montorgueil</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">713 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Intressanta platser och landmärken</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/74/e8/5a/photo0jpg.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Marche d'Aligre</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">381 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Loppmarknader och torghandel, Bondemarknader</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/14/aa/2d/55/marche-des-enfants-rouges.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Marche des Enfants Rouges</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,0 av 5 bubblor" title="4,0 av 5 bubblor"><span class="_1jcHBWVU _1-HtLqs3 uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;011 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Loppmarknader och torghandel, Bondemarknader</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/07/35/44/5b/grande-epicerie-du-bon.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">La Grande Epicerie de Paris Rive Gauche</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">882 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Special- och souverniraffärer, Bondemarknader</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0d/c9/ba/ce/rue-cler.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Rue Cler</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">716 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Loppmarknader och torghandel, Intressanta platser och landmärken</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl">
      <div class="Hj5wr7qM">
         <div class="_3605FDyD">
            <div class="_1Sl4VGXw">
               <h3 class="HLvj7Lh5 _1p9ZqHC8">Perfekta pâtisseries i Paris</h3>
            </div>
         </div>
         <div class="_3ssW018g">
            <div class="Ffh78ncj _4BQlimE4 _3-OVWReS _3yyMYJN6">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/07/a4/b1/46/boulangerie-poilane.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Boulangerie Poilane</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,0 av 5 bubblor" title="4,0 av 5 bubblor"><span class="_1jcHBWVU _1-HtLqs3 uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">153 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Special- och souverniraffärer, Mat- och dryckesbutiker</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/19/1e/13/dd/photo3jpg.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Du Pain et des Idées</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">906 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Billiga hak" title="Billiga hak">$</span> • <!-- -->Franskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0d/c1/79/93/la-patisserie-cyril-lignac.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">La Patisserie Cyril Lignac - Chaillot</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,0 av 5 bubblor" title="4,0 av 5 bubblor"><span class="_1jcHBWVU _1-HtLqs3 uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">242 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span> • <!-- -->Franskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/19/14/d6/22/img-20190220-130903-largejpg.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Angelina</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,0 av 5 bubblor" title="4,0 av 5 bubblor"><span class="_1jcHBWVU _1-HtLqs3 uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">10&nbsp;652 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span> • <!-- -->Franskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl">
      <div class="Hj5wr7qM">
         <div class="_3605FDyD">
            <div class="_1Sl4VGXw">
               <h3 class="HLvj7Lh5 _1p9ZqHC8">Fantastiska grönområden</h3>
            </div>
         </div>
         <div class="_3ssW018g">
            <div class="Ffh78ncj _3tnVPeq- _2pwgCIcL YZTwdaqe">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/06/08/d8/a8/jardin-des-tuileries.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Jardin des Tuileries</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">7&nbsp;506 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Trädgårdar</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/18/d3/d1/82/le-pont.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Parc des Buttes Chaumont</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">2&nbsp;055 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Parker</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/47/ec/ab/photo1jpg.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Place des Vosges</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">5&nbsp;660 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Intressanta platser och landmärken</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/07/e0/3d/85/parc-monceau.jpg?w=300&amp;h=400&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Parc Monceau</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">1&nbsp;014 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Parker</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1L7NRkJ8 _2B7gcmgA _3VTWun2I">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/16/69/68/a8/coulee-verte-rene-dumont.jpg?w=300&amp;h=-1&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Coulée Verte René-Dumont</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">889 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Trädgårdar, Parker</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="_1anKb-nl">
      <div class="Hj5wr7qM">
         <div class="_3605FDyD">
            <div class="_1Sl4VGXw">
               <h3 class="HLvj7Lh5 _1p9ZqHC8">Cocktail-hak för drinkar efter mörkrets inbrott</h3>
            </div>
         </div>
         <div class="_3ssW018g">
            <div class="Ffh78ncj _4BQlimE4 _3-OVWReS _3yyMYJN6">
               <div class="jEkyRwmV">
                  <div class="_18nJZLOU">
                     <ul class="_2aDyanzw">
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/19/bc/c8/8c/photo6jpg.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Little Red Door</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">367 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm"><span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span></div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/13/94/7d/ca/live-music.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Lulu White</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">80 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Barer och klubbar, Jazzbarer</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/9a/46/b3/bar-hemingway.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Hemingway Bar</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,5 av 5 bubblor" title="4,5 av 5 bubblor"><span class="_1jcHBWVU _1RZqMyqR uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">266 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">Barer och klubbar</div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                        <li class="_19hUB53v">
                           <div class="_1lp0l90B">
                              <a href="#" class="_3S6pHEQs">
                                 <div class="_32zpZsYn">
                                    <div class="gZ95jyA4 _3w8eCCad">
                                       <div class="eS-OaSz0 _1QwGlg01 _36iOgjbS _2sfzUWS1">
                                          <div class="twZ4uihZ"></div>
                                          <div class="_1tZwxF4- _3Wt7gged">
                                             <div class="ZVAUHZqh" style="background-image: url(&quot;https://dynamic-media-cdn.tripadvisor.com/media/photo-o/11/06/78/88/allison-webber.jpg?w=300&amp;h=300&amp;s=1&quot;); background-size: cover; height: 100%; width: 100%;"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="_1fB4MOGz">
                                    <div class="HLvj7Lh5 _2fO1NBt7">
                                       <div class="_1BdZ1sPm gZ95jyA4 _38K76hiv">Candelaria</div>
                                    </div>
                                 </div>
                                 <div class="_1oenorP5"><span aria-label="4,0 av 5 bubblor" title="4,0 av 5 bubblor"><span class="_1jcHBWVU _1-HtLqs3 uq1qMUbD" style="font-size:14px"></span></span><span class="_28oqjHA2">531 omdömen</span></div>
                                 <div class="_2kChyRqv">
                                    <div class="HLvj7Lh5 _2s3pPhGm">
                                       <span aria-label="Mellanklass" title="Mellanklass">$$–$$$</span> • <!-- -->Mexikanskt, Latinamerikanskt, Centralamerikanskt
                                    </div>
                                 </div>
                              </a>
                              <div class="_3N9bz1ra">
                                 <button class="_344IuErD" type="button" aria-label="Spara i en resa" title="Spara i en resa">
                                    <div class="_38i6M4uN"><span class="_1AuqFf68 _2HBN-k68 _3LkX-HIr"></span></div>
                                    <div class="rnZTlWkG"><span class="UCXgI3AN _2HBN-k68 _3LkX-HIr"></span></div>
                                 </button>
                              </div>
                           </div>
                           <div data-carousel-waypoint="true"></div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
</div>
 


					<div class="clear"></div>
	 		 
						</div>
						
						
						
					</div>
					
					
					
				</div>
						
			</div>
		
			
	 
		 
		<div id="popup_fade" class="opa0 opa55_a black_bg" onclick="closemob_popup();"></div>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
		<script>
var slideIndex = 0;
var startIndex=3;
showSlidesStart(startIndex);
 
function plusSlides(n) {
  showSlides(slideIndex += n);
}
function showSlidesStart(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
   
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < n; i++) {
      slides[i].style.display = "block";  
  }
   for (i = n; i <= slides.length; i++) {
     slides[i].style.display = "none";  
  } 
    
   
} 
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
      
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slideIndex; i++) {
     slides[i].style.display = "none";  
  }
  var newSlide=slideIndex+3;
  if(newSlide>slides.length)
  {
	  newSlide=slides.length;
  }
   for (i = slideIndex; i < newSlide; i++) {
     slides[i].style.display = "block";  
  } 
 // slides[slideIndex-1].style.display = "block";  
  
}
</script>
		
	
	</body>
	
</html>