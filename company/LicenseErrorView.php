<!doctype html>
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
		function changeClass(link)
				{
					
					$(".class-toggler").removeClass('active');
					
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
<body class="lgtgrey2_bg ffamily_avenir">
	<div class="column_m header xs-hei_55p bs_bb lgtgrey2_bg"  >
				<div class="wi_100 hei_65p xs-hei_55p xs-pos_fix padtb5 padrl10 lgtgrey2_bg"  >
							 
			<div class="clear"></div>
		</div>
		</div>
		<div class="clear"></div>
	<!-- /menu -->
	
	<div class="column_m   talc lgn_hight_22 fsz16 xs-marb0 xs-mart20  mart40  padb30" id="loginBank" onclick="checkFlag();">
				  
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p xsi-wi_360p maxwi_100   pos_rel zi5 marrla   xs-pad0  brdrad5 " >
							<div class="pad25   talc brdradtr10">
				<i class="fas fa-fingerprint" style="font-size: 250px; color:#ff0000;"></i>
			</div>
									<h3 class="marb0  xxs-talc fsz35 xs-fsz25 bold padb5 black_txt talc ffamily_avenir"  >Restricted </h3>
									
									<div class="mart20 marb35  xxs-talc talc "> <a href="#" class="blacka1_txt fsz20 xs-fsz20 xxs-talc edit-text jain_drop_company black_txt talc ffamily_avenir" ><span class="trn">This is a restricted page.</span>
												</a></div>

						<div class="padtb20 xxs-talc talc">
								
								<a href="https://www.safeqloud.com/company/index.php/Company/openDay/<?php echo $data['cid']; ?>"><button type="button"  class="padrl20 forword hei_55p fsz18 trn t_67cff7_bg  ffamily_avenir">Close</button></a>
								
							</div>
									
								 
								</div>
								
								</div>
							<!-- /middle-wizard -->
							
							<!-- /bottom-wizard -->
						
					 
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
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