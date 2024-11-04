
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="theme-color" content="<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f5f5f5"; else echo $corporateColor['bg_color']; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Connect Kin.">
    <meta name="author" content="Ansonika">
    <title>Qmatchup</title>

    <!-- Favicons
    <link rel="shortcut icon" href="<?php echo $path;?>html/kincss/img/favicon.ico" type="image/x-icon">-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?php echo $path;?>html/kincss/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $path;?>html/kincss/css/menu.css" rel="stylesheet">
    <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
	<link href="<?php echo $path;?>html/kincss/css/vendors.css" rel="stylesheet">
	
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo $path;?>html/kincss/css/custom.css" rel="stylesheet">
	
		
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
			
	<script src="<?php echo $path;?>html/kincss/js/modernizr.js"></script>
	
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
			
			function checkOtp()
			{
				$("#error_msg_opt").html('');
				if($("#otp").val()=="")
				{
					$("#error_msg_opt").html('Fyll i lösenordet');
					return false;
					
				}
				
				var send_data={};
				
				send_data.otp=$("#otp").val();
				send_data.infor_id=$("#infor_id").val();
				
				$.ajax({
					type:"POST",
					url:"../verifyOtp/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==0)
						{
							$("#error_msg_opt").html('Fyll i rätt lösenord');
						}
						else 
						{
							
							window.location.href="http://www.qloudid.com/company/index.php/EmployeeLogin/welcome/"+data1;
						}
					}
				});
				
			}
			
		</script>
			
			
</head>

<body class="white_bg">
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
	
	<nav>
		<ul class="cd-primary-nav">
			<li><a href="#" class="animated_link">Home</a></li>
			<li><a href="#" class="animated_link">Quote Version</a></li>
			<li><a href="#" class="animated_link">Review Version</a></li>
			<li><a href="#" class="animated_link">Registration Version</a></li>
			<li><a href="#" class="animated_link">About Us</a></li>
			<li><a href="#" class="animated_link">Contact Us</a></li>
		</ul>
	</nav>
	<!-- /menu -->
	
	<div class="container-fluid full-height">
		<div class="row row-height">
		<div class="column_m container zi5  mart40 xs-mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 mart40 xs-pad0">
					
						<div class="padb20 xxs-padb0 ">
							
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class=" talc">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Slå in koden</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz20 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Låt oss fastställa din identitet. Vi har precis skickat ett text meddelande med en ny kod till telefon numret som slutar på *****<span id="lastPh"><?php echo substr($getPhone,-4); ?></span></a></div></div>
										
								
							</div>
						
							<div class="container   fsz14 dark_grey_txt padt30">
								
								
								<form action="" method="POST" name="collaborators-form" id="collaborators-form">
							<!-- Leave for security protection, read docs for details -->
							<div class="hei_160p">
								<div class="step">
								
									
									
									<div class="form-group">
										<input type="text" name="otp" id="otp"  placeholder="Fyll i lösenordet" class="fsz18 brdb_new brdrad3 wi_100 nobrdr nobrdt nobrdl transbg required hei_55p  talc dark_grey_txt" >
									</div>
									
									
										
								
									<!-- /row -->
									<div class="form-group terms hidden">
										<label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a>
											<input type="checkbox" name="terms" value="Yes" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
									
								
								</div>
							<input type="hidden" id="infor_id" name="infor_id" value="<?php echo $verifyPhone; ?>" />
						</form>
						<div class="red_bg" id="error_msg_opt">
							
							
						</div>
						
							<div class="clear"></div>
						</div>
						
						
									
									<div class="wi_100  talc  padb20  padt10">
										<a href="javascript:void(0);" class="wi_360p maxwi_100 minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 lgtgrey_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2 change_button "  onclick="checkOtp();">Signera</a>
										
									</div>
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
			<!-- /content-left -->

		
		</div>
		<!-- /row-->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>
	<!-- /container-fluid -->

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /menu button -->
	
	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
				
	<!-- COMMON SCRIPTS -->
	<script src="<?php echo $path;?>html/kincss/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $path;?>html/kincss/js/common_scripts.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/velocity.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/functions.js"></script>

	<!-- Wizard script -->
	<script src="<?php echo $path;?>html/kincss/js/survey_func.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
</body>
</html>