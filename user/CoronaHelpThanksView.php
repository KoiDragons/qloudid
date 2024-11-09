
<!DOCTYPE html>
<html lang="en">
 
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
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
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart20   mart40  padb30" id="loginBank" onclick="checkFlag();">
				  
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p xsi-wi_360p maxwi_100   pos_rel zi5 marrla   xs-pad0  brdrad5 " >
								<div class="pad25 talc brdradtr10">
				<img src="../../../html/usercontent/images/394180.png" class="maxwi_100 hei_250p" />
			</div>
			
									<h3 class="marb0  xxs-talc fsz35 xs-fsz25 bold padb5 black_txt talc ffamily_avenir"  >Success!! </h3>
									
									<div class="mart20 marb35  xxs-talc talc "> <a href="#" class="blacka1_txt fsz20 xs-fsz20 xxs-talc edit-text jain_drop_company black_txt talc ffamily_avenir" ><span class="trn">You have registered your self on Corona Help Aid. Please click below to visit the Corona Aid.</span>
												</a></div>

						<div class="padt5 xxs-talc talc">
								
								<a href="http://www.safeqloud.com/user/index.php/CoronaHelp"><button type="button"  class="forword minhei_55p red_ff2828_bg white_txt fsz18 trn ffamily_avenir">Continue</button></a>
								
							</div>
									
								 
								</div>
								
								</div>
							 
					 
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>
	
	
		 
	 
	 
	 
	 
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
		 
</body>
</html>