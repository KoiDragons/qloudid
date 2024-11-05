<!doctype html>
<html>
		<?php
			$path1 = $path."html/usercontent/images/";
	?>
		<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="<?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/hyprfonts.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/global.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/overlaystyle.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/erroroverlay.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/style.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/checkmark.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/spin.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/countdown.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/login-view.css?v=bb7a5fc2">
    <link rel="stylesheet" type="text/css" href="https://demo.hypr.com/bank/static/css/vendors.css?v=bb7a5fc2">
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
		var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=30;
			var send_data1={};
		
			function checkLogin()
			{
				 
				a = setInterval(ajaxSend, timeInterval);
				
				 
			}
			
		function ajaxSend()
			{ 
			send_data1.loginType=1;
				$.ajax({
					type:"POST",
					url:"../checkConnection/<?php echo $data['certi_id']; ?>",
					data:send_data1,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data2){
						if(data2!=1)
						{
							timeout++;
							 
							if(timeout>tout)
							{
								
							window.location.href='https://www.qloudid.com/user/index.php/NewPersonal/timeOut/<?php echo $data['certi_id']; ?>';	 
							} 
							 
						}
						 else
						 {
							window.location.href='https://www.qloudid.com/user/index.php/NewPersonal/thanksConnect'; 
						 }
						
					}
				});
				
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
			</script>
	</head>
	
	<body class="white_bg ffamily_avenir" onload="checkLogin();">
		
		
			<!-- HEADER -->
	<div class="column_m header   bs_bb   hidden-xs hidden-xsi" >
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg" style="height:65px;" >
            <div class="fleft padrl0 bg_babdbc padtbz10" style="height:65px;">
               <div class="flag_top_menu flefti  padb10 wi_80p  " style="padding: 10px 0px 0px 0px;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../certificateList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			 
            <div class="clear"></div>
         </div>
      </div>	
			
			
		 	
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs visible-xsi">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm visible-xsi fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p padt10">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../certificateList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm visible-xsi fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="#" class="lgn_hight_s1 fsz25"><span class="fas fa-bars" aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
</div>
			  
            <div class="clear"></div>
         </div>
      </div>	
	 	  
	<div class="clear"></div>
		
		<div class="column_m pos_rel " onclick="checkFlag();"  >
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart20  xs-mart0"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padt80 xs-padt30 padrl10  brdrad3"  >
					
					
					<div class="outer-blocks--wide"><div class="inner-block--wide">
					<div class="reg_title_BOwx7NvVYEcR3Cmu0U7C6 fsz65 xxs-fsz65 lgn_hight_65 ">Pair</div>
					<p class="reg_subtitle_T1z0aAMjijyI-hUSE_P2Z fsz25  xs-fsz20 xxs-talc talc">Proceed by pairing your personal Qloud ID account to your phone</p>
					<div><div class="reg_qrArea_Qnsd0dy-1A-_lW-CNJ0D0"><img alt="Pin: 5 7 6 2 3 4" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo $certificateDetail['certificate_key']; ?>" style="height: 244px; width: 244px;"><div class="reg_instructions_2JgJY6hp_bIPwUfaCfZvyD hidden-xs"><div class="inner-rect--row"><div class="inner-rect--inner-number">1</div><div class="inner-rect--inner-text">Scan this QR code with the Qloud ID to pair your smartphone</div></div><div class="inner-rect--row"><div class="inner-rect--inner-number">2</div><div class="inner-rect--inner-text">Enroll the required authenticators in the app</div></div></div></div><div class="reg_countdownArea_2lOoO90LpNa8LcED1t4UcV"><div class="centered-hr-container"><hr></div></div></div><div><div class="modal-text--detailed"><div class="reg_donthave_2UsEQ4o4cWHeRrZHhA6H6X">Don't have the Qloud ID app?</div><div>You can download it for either iPhone or Android Mobile Devices</div></div><div class="reg_logosArea_1PcihymkqtTC7LNDWA8uwF"><img alt="HYPR" src="https://demo.hypr.com/bank/static/images/hypr-colorful-logo.png?c32c3866a826fb6c48a1710d52ef2cce" class="reg_hyprLogo_Cl8OuPzPOAkgXy63UdnKA"><div class="reg_storeLogos_1RyLvaXCMiwwmTErBHpSBy"><a target="_blank" rel="noopener noreferrer" href="#"><img alt="Apple Store" src="https://demo.hypr.com/bank/static/images/app-store-button.png?b7e63bfc6c75b4e7d5b66d4f12d8bae1" style="width: 129px;"></a><a target="_blank" rel="noopener noreferrer" href="#"><img alt="Google Play" src="https://demo.hypr.com/bank/static/images/google-play-button.png?28f85a94d66ba700a506fe2de5c79a85" style="width: 132px;"></a></div></div></div></div></div>
					
					
						<div class="padtb0 brdrad3 hidden">
						
							<div class="padb10  talc padt20" >
										<div class="padrl0 ">
											<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo $certificateDetail['certificate_key']; ?>"  class="white_brd wi_50 hei_auto xs-wi_100">
											
										</div>
									</div>

						
						</div>
						
						</div>
						
						
						
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