
<!doctype html>
<?php
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
		 
		if($childrenDetail ['profile_pic']!=null) { $filename="../estorecss/".$childrenDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$childrenDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);   $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 
		?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="refresh" content="180;" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="../../../../html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="../../../../html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="../../../../html/usercontent/js/jquery.translate.js"></script>
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
			var langVar='';
			
			
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
		<body class="ffamily_avenir white_bg"  >
		  <div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738"  >
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs"  >
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  white_bg"  >
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					<div class="visible-xs visible-sm fright marr0 padt15 "> <a href="#" class="diblock padl15 padr10 brdrad3 fsz20" style="color: #d9e7f0;"><?php if($childrenDetail ['phone']==null || $childrenDetail ['phone']=='' || $childrenDetail ['phone']=='-') echo ''; else echo '+'.$childrenDetail ['country_code'].' '.$childrenDetail ['phone']; ?></i></a> </div>
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		 <div class="column_m pos_rel">	
			<div class="column_m   talc lgn_hight_22 fsz16 xs-marb0 xs-mart20  marb0  padb30" id="loginBank" onclick="checkFlag();">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p xsi-wi_360p maxwi_100   pos_rel zi5 marrla pad30  xs-pad0   brdrad5  " >
						
						<div class="padb20  talc padt20">
										<div class="padrl0 ">
											<img src="../<?php echo $imgs; ?>" width="140" height="140" class="white_brd borderr">
											
										</div>
									</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 grey_txt   bold">Daycare</p>
						<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt"><?php echo $childrenDetail['company_name']; ?></h1>
							
							 
							 
						
						<div class="tab-header martb10 padb10 xs-talc blue_67cff7_brd nobrdt nobrdl nobrdr talc">
                                            <a href="#" class="dinlblck mar5 padrl10  padrl30_a brd_67cff7_a t_67cff7_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Children</a>
                                            <a href="#" class="dinlblck mar5 padrl10 padrl30_a  brd_67cff7_a t_67cff7_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Popular1">Company</a>
                                            
                                             

                                        </div>
						
						  <div class="tab_content active" id="utab_Popular" style="display: block;">
						<?php $i=0;
												
												foreach($childrenDetailAll as $category => $value) 
												{
													
													
												?> 
												
												<a href="../childNewsDetail/<?php echo $value['enc']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15  xs-padb20  brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15  xs-marr0 "> 
																	
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p "><img src="../../../<?php echo $value['image_path'];?>" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													 
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Name</span>
													<span class="trn fsz18  black_txt ffamily_avenir  "><?php echo $value['name'];?></span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right grey_txt" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
												
									  
												<?php } ?>
						  </div>
						  
						    <div class="tab_content hide" id="utab_Popular1" style="display: none;">
							
							<a href="https://www.safeqloud.com/user/index.php/DayCareRequest/childNewsDaycareDetail/<?php echo $data['parent_id']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15   " style="background-color:#ff5bad;; border-radius: 10%; width:55px"> <div class="wi_40p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36   brdrad1000   " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%; background-color: #ff5bad; color:#ffffff;"><span class="fab fa-affiliatetheme white_txt padl20 xxs-padl15 padt15 fsz30" aria-hidden="true"></span></div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Check</span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">Public info</span>  </div>
													
													
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
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			 <div class="wi_100 hidden   pos_fix zi50 bot0 left0 bs_bb pad15 padr20 padl20" style="background-color:#ffeeff">

                <!-- primary menu -->
                <div class="tab-content active" id="mob-primary-menu" style="display: block;">
                    <div class="wi_100 dflex alit_s justc_sb talc fsz16">
                        <a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
                           
                            <span class="ffamily_avenir" style="color:#e30009">Sign out</span>
                        </a>
                        
                       
                       
                        <a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
                            
                            <span class="ffamily_avenir" style="color:#e30009">Language</span>
                        </a>
                    </div>
                </div>

              </div>

			</div>
			<div class="clear"></div>
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="../../../../html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/modules.js"></script>
		<script type="text/javascript" src="../../../../html/usercontent/js/custom.js"></script>
			<script type="text/javascript" src="../../../../html/usercontent/js/visitorsIP.js"></script>
			
			
			
		</body>
	</html>										