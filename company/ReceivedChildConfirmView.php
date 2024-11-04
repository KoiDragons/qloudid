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
		
	if($selectPerson ['relative_photo']!=null) { $filename="../estorecss/".$selectPerson ['relative_photo'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$selectPerson ['relative_photo'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$selectPerson['relative_photo'].'.jpg' ); } else { $value_a="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../html/usercontent/images/default-profile-pic.jpg";

	$path1 = $path."html/usercontent/images/";
	?>
		<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="<?php if($companyDetail['bg_color']=="" || $companyDetail['bg_color']==null) echo "#f5f5f5"; else echo $companyDetail['bg_color']; ?>" />
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
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
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
	
	<body class="lgtgrey2_bg  ">
		
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../attendenceDetail/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../attendenceDetail/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					 
                <div class="clear"></div>

            </div>
        </div>
		<div class="clear" id=""></div>
		
		
		<div class="column_m container zi5 mart20  xs-mart0 lgtgrey2_bg xs-white_bg">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  brdrad3 lgtgrey2_bg xs-white_bg padb30">
						<div class="padtb0 brdrad3 ">
						
							<div class="padb20  talc padt20">
										<div class="padrl0 ">
											<img src="<?php echo '../../../../'.$value_a; ?>" width="160" height="160" class="white_brd borderr">
											
										</div>
									</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 yellow_txt bold">Uncle</p>
<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt"><?php echo $selectPerson['name']; ?></h1>
						
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb0 xs-padb5 grey_new_txt">9856 3212 3321 6564</p>
						 
						
							
						
						<p class="lgn_hight_16 padt0 talc fsz20   padb10 marb20 xs-padb5 xxs-marb30 grey_new_txt"><?php echo date('m/y',strtotime($selectPerson['dropped_at']))."      123"; ?></p>


 
						
					</div>
					
					 <div class="tab_content active" id="utab_Popular1" style="display: block;">
							 	<a href="../../approveRequest/<?php echo $data['rid']; ?>/<?php echo $data['cid']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15   green_bg" style="border-radius: 10%; width:55px"> <div class="wi_40p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36   brdrad1000 green_bg green_txt  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> <span class="far fa-check-square white_txt padl15 xs-padl5 padt0 fsz30" aria-hidden="true"></span> </div>
																	</div>
													 
													<div class="fleft wi_50 xxs-wi_75 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Confirm </span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">Yes, Drop off is done</span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right blue_67cff7" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
									
									<a href="../../rejectRequest/<?php echo $data['rid']; ?>/<?php echo $data['cid']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15   red_ff2828_bg" style="background-color:#47E2A1;; border-radius: 10%; width:55px"> <div class="wi_40p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36   brdrad1000 red_ff2828_bg red_ff2828_txt  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> <span class="fas fa-ban white_txt padl15 xs-padl5 padt0 fsz30" aria-hidden="true"></span> </div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_75 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Reject </span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">No, Drop off is not finalized </span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right blue_67cff7" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
									
							</div>
							
					
					
				</div>
						
			</div>
		
			
		</div>
			
		</div>
	 

	 
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