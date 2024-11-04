<!doctype html>

 
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
		<body class="white_bg xs-white_bg ffamily_avenir" >
			
									 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      <div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear" id=""></div>
	
	
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30  mart40 marb0  padb30" id="loginBank" onclick="checkFlag();">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					 
					<!-- Center content -->
					<div class="wi_500p xsi-wi_360p maxwi_100   pos_rel zi5 marrla pad30  xs-pad0   brdrad5  " >
						
					<div class="padb0 xxs-padb0 ">		
							<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Invite</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please select a method how you want to invite employees</a></div>

						 
						 
						
						   
						    <div class="tab_content active" id="utab_Popular1" style="display: block;">
							
							<a href="https://www.qloudid.com/company/index.php/InviteEmployee/employeeInfo/<?php echo $data['lid']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_50p marr15   lgtgrey2_bg" style=" border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 lgtgrey2_bg black_txt  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> M </div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Manually </span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">Add employee manually</span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right grey_txt" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
							
								<a href="../addFile/<?php echo $data['cid']; ?>">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_50p marr15   lgtgrey2_bg" style=" border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 lgtgrey2_bg black_txt  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> F </div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">File upload </span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">Upload a file and invite</span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right grey_txt" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
								<a href="https://www.qloudid.com/public/index.php/PublicDocumentationSoftware">
												
												<div class=" white_bg marb10  brdb  " style="">
										<div class="container padrl10 padb15 padt15   brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
												<div class="fleft wi_50p marr15   lgtgrey2_bg" style=" border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 lgtgrey2_bg black_txt  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> A </div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_60 sm-wi_50 xsip-wi_50   "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Api</span>
													<span class="trn fsz18  black_txt ffamily_avenir  ">Connect with api and invite</span>  </div>
													
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right grey_txt" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> </a>
															
							</div>
							
							
							  <div class="tab_content active" id="utab_Popular" style="display: block;">
							
							 		
							</div>
						 
					</div><div class="clear"></div>
				</div></div>
					<!-- Center content -->
					 <div class="clear"></div>
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