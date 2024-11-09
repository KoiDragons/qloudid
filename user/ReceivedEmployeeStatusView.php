<!doctype html>

<?php
	
	$path1 = $path."html/usercontent/images/";
	 ?>
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
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<script>
	function submitForm()
	{
		$('error_msg').html('');
		if($('#ind').val()=="")
		{
			$('error_msg').html('Please select a option!!!');
			return false;
		}
		else
		{
			document.getElementById('save_indexing').submit()
		}
	}
	
	function changeStatus(link,id)
		{
		 
		$('.black_brd').removeClass('black_brd');
		$(link).addClass('black_brd');
		$("#butn").removeClass('hidden');
		$('#ind').val(id);
		$('.green_txt').addClass('grey_txt');
		$('.red_txt').addClass('grey_txt');
		$('.green_txt').removeClass('green_txt');
		$('.red_txt').removeClass('red_txt');
		$("#"+id).removeClass('grey_txt');
		
		if(id=='bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09')
		{
		$("#"+id).addClass('red_txt');	
		}
		else
		{
		$("#"+id).addClass('green_txt');		
		}
		}
			
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
		<body class="white_bg">
			<!-- HEADER -->
<div class="column_m header xs-header xsip-header xsi-header bs_bb lineargrey_bg"  >
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lineargrey_bg"  >
								<div class="logo marr15 wi_60p">
				<a href="https://www.safeqloud.com"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">QiD</h3> </a>
			</div>
			<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 padt5 xxxs-padt20 xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
								<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" ><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" ><i class="fas fa-globe" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="sv" onclick="changeLanguage(1);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="sv" onclick="changeLanguage(1);">  Svenska</a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="en" onclick="changeLanguage(0);"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="en" onclick="changeLanguage(0);">  Engelska </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
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
			
				<div class="fright xs-dnone visible-si padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible-si fright pos_rel brdl "> <a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Skip" data-sw="Skip">Skip</a> </li>
						<li class="dblock hidden-xs visible-si fright pos_rel brdl "> <a href="https://www.safeqloud.com/user/index.php/StoreData/userAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Detaljvy" data-sw="Detaljvy">Detaljvy</a> </li>
					</ul>
				</div>
				<!--sf-js-enabled sf-arrows hidden-xs-->
				<div class="top_menu frighti padt15 padb20 hidden">
					<ul class="menulist sf-menu  fsz14 ">
						
						
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz24 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						</li>
						
					</ul>
				</div>
				<div class="visible-xs hidden-si fright marr0 padr0 xs-padt5"> <a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Skip</a> </div>
				<div class="clear"></div>
			</div>
		</div>
	
	<div class="clear" id=""></div>
			
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60 bold padb10 black_txt trn">Work</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Do you currently work?</a></div>
						<div class=" wi_50 xxs-wi_50 fleft bs_bb padrb20 talc  " >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_210p xxs-hei_140p dblock bs_bb pad25  brdclr_seggreen_h brdrad5   lgtgrey_bg    trans_all2 " onclick="changeStatus(this,'T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09');">
																<div class="pad40 xs-pad10">
																	<div class="wi_100 hei_90p dflex bs_bb">
																		<span class="fas fa-check grey_txt fsz80 xs-fsz60" id="T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" aria-hidden="true"></span>
																	</div>
																	
																	 
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_50 xxs-wi_50 fleft bs_bb padrb20 talc  " >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_210p xxs-hei_140p dblock bs_bb pad25  brdclr_seggreen_h brdrad5   lgtgrey_bg    trans_all2 " onclick="changeStatus(this,'bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09');">
																<div class="pad40 padl60 xs-pad10">
																	<div class="wi_100 hei_90p dflex bs_bb padl10">
																		<span class="fas fa-times   grey_txt fsz80 xs-fsz60" id="bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09" aria-hidden="true"></span>
																	</div>
																	
																 
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
						<form action="updateIsEmployeeStatus" method="POST" name="save_indexing" id="save_indexing">
						 <input type="hidden" name="ind" id="ind" />
						</form>
						<div class="padt5 mart20 xxs-talc talc hidden" id="butn" >
								
								<button type="button" name="forward" class="forward hei_55p fsz18 trn" onclick="submitForm();">Next</button>
								 
							</div>
						
						
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
			
			
			
			
		</body>
	</html>										