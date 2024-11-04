
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnew.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		 
	
	<script type="text/javascript">
      function getFee(id)
	 {
		
		 $("#error_msg_form").html('');
		 if(id==1)
		 {
			 $('#scrl').removeClass('red_bg_fb2d2d');
			 $('#valy').removeClass('red_bg_ff919159');
			 $('#scrl').addClass('green_bg_64c5af');
			 $('#valy').addClass('green_bg_91e9d57a');
			 $('#fee').removeAttr('readonly');
		 }
		 else  
		 {
			 $('#scrl').addClass('red_bg_fb2d2d');
			 $('#valy').addClass('red_bg_ff919159');
			 $('#scrl').removeClass('green_bg_64c5af');
			 $('#valy').removeClass('green_bg_91e9d57a');
			 $('#fee').attr('readonly','readonly');
			 $('#fee').val(0);
		 }
	 }

	function sendInformation()
			{
				$("#error_msg_form").html('');
				if($('#pay_fee').val()==0)
				{
				$("#error_msg_form").html('please select if you want to pay or not');
				return false;				
				}
				document.getElementById('save_indexing').submit();	 
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
	
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" >
			<div class="column_m header xs-header xsip-header xsi-header bs_bb lineargrey_bg"  >
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lineargrey_bg"  >
								<div class="logo marr15 wi_60p">
				<a href="https://www.qloudid.com"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">QiD</h3> </a>
			</div>
				<div class="visible-xs visible-sm fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_black brdrad5 marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz14 black_txt">Your data</a> </div>
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
	<!-- /menu -->
	
	<div class="column_m pos_rel">
			<!-- CONTENT -->
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart0 xs-pad0">
					<div class="marb50">
						 
								<img src="../../../../html/usercontent/images/random/visitor.jpg" class="maxwi_100 brdrad5 xs-image_dimensions_200 image_dimension_250"  >
							 
								
							</div>
								<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz60 xxs-fsz45  padb10 black_txt trn">Stängning</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Bekräfta att dessa besökare är utloggade innan de stängs</a></div>
								 								
									<form action="#" method="POST" name="save_indexing" id="save_indexing"  accept-charset="ISO-8859-1">
									 <?php foreach($visitorsList as $category => $value) { ?>
									<div class="on_clmn  mart10 marb15 padb10">
									<div class="thr_clmn  wi_50 padr20">
											 
										<div class="pos_rel tall">
									
										<input type="text"   value="<?php  echo $value['full_name']; ?> " class="wi_100 rbrdr pad10  brdb tall  minhei_50p fsz18 black_txt" readonly>
									</div>
									</div>
								<div class="thr_clmn  wi_20 padr0 nobrd brdb minhei_50p" id="scrl">
											<div class="pos_rel">
											<select class="input1 minhei_50p fsz18 black_txt nobrd  trans_bg nobold dropdown-bg" style="text-align-last:center; " name="pay_fee" id="pay_fee" >
											 <option value="1" class="lgtgrey2_bg black_txt">Yes</option>
											<option value="2"  class="lgtgrey2_bg black_txt" selected>No</option>
											                  
											</select>
										</div>
									</div>
									<div class="thr_clmn  wi_30 nobrd " id="valy">
											 
										<div class="pos_rel">
									
										<a href="#" ><input type="button" value="Lägg till" class="forword minhei_55p"  ></a>
									</div>
									</div>
									</div>
									 <?php } ?>
									<div id="error_msg_form" class="red_txt fsz20"> </div>
									 </form>
									 
									<div class="talc marb40 "> <a href="#" ><input type="button" value="Lägg till" class="forword minhei_55p"  ></a>
										
									
									</div>
								</div>
								
							</div>
							
							
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
	<!-- /.modal -->
	 
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
		
	<!-- COMMON SCRIPTS -->
	<script src="<?php echo $path;?>html/kincss/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $path;?>html/kincss/js/common_scripts.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/velocity.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/functions.js"></script>

	<!-- Wizard script -->
	<script src="<?php echo $path;?>html/kincss/js/survey_func.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
</body>
</html>