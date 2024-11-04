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
		
	if($employeeDetail ['passport_image']!=null) { $filename="../estorecss/".$employeeDetail ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$employeeDetail ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; }

	$path1 = $path."html/usercontent/images/";
	?>
		<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="<?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>" />
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
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
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
			var langVar='<?php echo $verifyLanguage; ?>';
			
		function verifyInformation()
		{
		
		$("#errQardv").html('');
				 if($("#p_codev").val()=="" || $("#p_codev").val()==null)
				{
					$("#errQard").html("Please enter personal employee code!!!");
					return false;
				}
				
				else if($("#passwordv").val()=="" || $("#passwordv").val()==null)
				{
					$("#errQardv").html("Please enter password!!!");
					return false;
				}	
				else
				{
				var send_data = {};
				send_data.p_id=$("#p_codev").val();
				send_data.pswd=$("#passwordv").val();
				$.ajax({
					url: '../verifyEmployee/<?php echo $data['eid']; ?>',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
										
					if(data==1)
					{
						
						document.getElementById("savev_data").submit();
					}
					
					else
					{
					$("#errQardv").html("Please enter correct personal code and password!!!");
					return false;	
					}
				})
				.fail(function(){})
				.always(function(){});
				
				}
		}	
		
		function saveInformation()
		{
		$("#errQard").html('');
				 if($("#p_code").val()=="" || $("#p_code").val()==null)
				{
					$("#errQard").html("Please enter personal employee code!!!");
					return false;
				}
				
				else if($("#password").val()=="" || $("#password").val()==null)
				{
					$("#errQard").html("Please enter password!!!");
					return false;
				}	
				else
				{
				var send_data = {};
				send_data.p_id=$("#p_code").val();
				send_data.pswd=$("#password").val();
				$.ajax({
					url: '../checkEmployee/<?php echo $data['eid']; ?>',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
										
					if(data==1)
					{
						
						document.getElementById("saveq_data").submit();
					}
					else if(data==2)
					{
					$("#errQard").html("You have already saved this qard!!!");
					return false;	
					}
					else if(data==3)
					{
					$("#errQard").html("You need not to save your own business qard!!!");
					return false;	
					}
					else
					{
					$("#errQard").html("Please enter correct personal code and password!!!");
					return false;	
					}
				})
				.fail(function(){})
				.always(function(){});
				
				}
		}
		
		function show_popup()
		{
			if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#popup_fade").removeClass('active');
				$("#popup_fade").attr('style','display:none;');
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				
			}
			else
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			}
		}
		
		function closemob_popup()
		{
			
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			
		}
		
		function show_phone()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_phone").addClass('active');
				$("#gratis_popup_phone").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_phone").removeClass('active');
				$("#gratis_popup_phone").attr('style','display:none;');
				
			}
			}
			
			function show_save()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_saveq").addClass('active');
				$("#gratis_popup_saveq").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_saveq").removeClass('active');
				$("#gratis_popup_saveq").attr('style','display:none;');
				
			}
			}
			
			function show_savev()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_verify").addClass('active');
				$("#gratis_popup_verify").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_verify").removeClass('active');
				$("#gratis_popup_verify").attr('style','display:none;');
				
			}
			}
			
			function show_email()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_email").addClass('active');
				$("#gratis_popup_email").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_email").removeClass('active');
				$("#gratis_popup_email").attr('style','display:none;');
				
			}
			}
			
			
			function shareInformation()
			{	
				$("#errPhone").html('');
				 if($("#phoneno").val()=="" || $("#phoneno").val()==null)
				{
					$("#errPhone").html("Please enter phone number!!!");
					return false;
				}
				
				document.getElementById("share_data").submit();
			}
			
			
			function shareInformationEmail()
			{	
				$("#errEmail").html('');
				 if($("#email_info").val()=="" || $("#email_info").val()==null)
				{
					$("#errEmail").html("Please enter Email!!!");
					return false;
				}
				
				document.getElementById("share_data_email").submit();
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
			
			function generateOTP()
			{
				var send_data={};
				$.ajax({
						type:"POST",
						url:"../verifyUserDetail/<?php echo $data['eid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
								
								$("#gratis_popup_confirm").removeClass('active');
								$("#gratis_popup_confirm").attr('style','display:none;');
								$("#gratis_popup_login").addClass('active');
								$("#gratis_popup_login").attr('style','display:block;');
								$("#infor_id").val(data1);
								
							
							
						}
					});
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
					url:"../verifyOtp",
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
							window.location.href="https://www.qloudid.com/public/index.php/EmployeeList/companyAccount/<?php echo $data['eid']; ?>";
						}
					}
				});
				
			}
			
			</script>
	</head>
	
	<body class="lgtgrey2_bg  ffamily_avenir xs-white_bg">
		
	<div class="column_m header xs-hei_55p  bs_bb  lgtgrey2_bg xs-white_bg" id="headerData" >
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey2_bg xs-white_bg" >
					<div class="logo  marr15 wi_140p xs-wi_80p hidden-xs hidden-sm visible-xxs">
						<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10 ffamily_avenir"  >Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft padr10">
							<div class="flag_top_menu flefti  padb10 " style="width: 70px; padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1  padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="45" height="45" alt="email" title="email"></a></div>
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
					
					<div class="hidden-xs hidden-sm fleft padl20 padr10 ">
						<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="hidden-xs" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
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
					
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="#" class="show_popup_modal diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt" data-target="#gratis_popup_confirm">
									
									<span class="valm">St&auml;ng Sidan</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					<div class="visible-xs visible-sm fright marr0 padt5 hidden"> <a href="#" class="show_popup_modal diblock padl10 padr5 brdrad3   fsz35 " data-target="#gratis_popup_confirm" style="color: #d9e7f0;"><i class="fas fa-bars" ></i></a> </div>
					
					<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="show_popup_modal diblock padl10 padr5 brdrad3   fsz30 " style="color: #d9e7f0;" data-target="#login_qard"><i class="fas fa-sign-in-alt" ></i></a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			<div class="clear"></div>
			
		<?php if($quardPermission==1) { ?>
		<div class="column_m pos_rel " onclick="checkFlag();"  >
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart20  xs-mart0 lgtgrey2_bg xs-white_bg"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 lgtgrey2_bg xs-white_bg">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padrl10  brdrad3 lgtgrey2_bg xs-white_bg"  >
						<div class="padtb0 brdrad3 ">
						
								<div class="padb20  talc padt30">
										<div class="padrl0 ">
											<img src="<?php echo $imgs; ?>" width="160" height="160" class="white_brd borderr">
											
										</div>
									</div>

						<a href="../../CompanyOmOss/companyAccount/<?php echo $data['eid']; ?>"><p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 yellow_txt "><?php echo substr(html_entity_decode($employeeDetail['company_name']),0,25); ?></p></a>
<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color']; ?>"><?php echo $employeeDetail['first_name']." ".$employeeDetail['last_name']; ?></h1>
						
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb20 xs-padb5 xxs-marb60 grey_new_txt" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color']; ?>"><?php echo $employeeDetail['title']; ?></p>
						 
						
							
						
						<p class="lgn_hight_16 padt0 talc fsz20   padb10 marb20 xs-padb5 xxs-marb60 grey_new_txt hidden" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color']; ?>"><?php echo date('m/y',strtotime($employeeDetail['created_on']))."      ".$employeeDetail['v_id']; ?></p>

						 
						<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb20 xs-padb0">
						<div class="wi_25-12p marl10">
						<a href="javascript:void(0);" class="fsz30 <?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-'))echo ''; else echo 'show_popup_modal'; ?>" data-target="#gratis_popup_contact"   >
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i>
																				  <i class="<?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-')) echo 'red_txt fas fa-times'; else echo 'white_txt fas fa-phone'; ?>    fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz15  padt5" style="color: <?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-')) echo 'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color']; } ?>">Phone</p>
						</div>
						 
						
						 
						
						 

						
						 
							<div class="wi_25-12p marl10">
						<a href="<?php if($employeeDetail['mobile']==null || $employeeDetail['mobile']=='') echo'#'; else echo 'sms:+'.$employeeDetail['mobile_country_code'].''.$employeeDetail['mobile']; ?>" class="fsz30"   style="color: <?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-')) echo 'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>">
						<span class="fa-stack-info">
																				   <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i>
																				  <i class="black_txt <?php if($employeeDetail['mobile']==null || $employeeDetail['mobile']=='') echo 'red_txt fas fa-times'; else echo 'fas fa-sms white_txt'; ?> fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz15  padt5 " style="color: <?php if($employeeDetail['mobile']==null || $employeeDetail['mobile']=='') echo'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color']; } ?>">SMS</p>
						</div>
						 
						 
						
						<div class="wi_25-12p marl10"><a href="<?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo'#'; else echo 'mailto:'.$employeeDetail['work_email']; ?>" class="fsz30  " style="color: <?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>"> <span class="fa-stack-info ">
																				  <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i>
																				  <i class=" <?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo 'fas fa-times red_txt'; else echo 'far fa-envelope-open white_txt'; ?> fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz15  padt5 " style="color: <?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color']; } ?>">Email</p>
						</div>  

						
						<div class="wi_25-12p marl10"><a href="https://maps.google.com/?q=<?php echo  $employeeDetail['location']; ?>" class="fsz30  " style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color']; ?>"> <span class="fa-stack-info ">
																				  <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i></i>
																				  <span class="white_txt fas fa-map-marker-alt fa-stack-1x fab1 pad0" aria-hidden="true"></span>
																				</span></a>
						<p class="fsz15  padt5 " style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo '#'.$employeeDetail['f_color'];  ?>">Map</p>
						</div> 
						
						</div>
	
							
						
						<div class="wi_500p maxwi_100 dflex xs-fxwrap_w talc padt30  hidden">
						<div class="wi_25 xs-wi_75p marl10"><a href="javascript:void(0);" class="fsz40 <?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-'))echo ''; else echo 'show_popup_modal'; ?> " data-target="#gratis_popup_contact" style="color: <?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-')) echo 'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>"> <span><i class="<?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-')) echo 'fas fa-window-close'; else echo 'fas fa-phone-square';?> " aria-hidden="true"></i> </span></a>
						<p class="fsz13  padt5" style="color: <?php if(($employeeDetail['phone']=="" || $employeeDetail['phone']==null) && ($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) && ($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-')) echo 'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>">Phone</p>
						</div>
						 
						<span class="padrl5 xs-padrl0 "></span>
						<div class="wi_25 xs-wi_75p "><a href="<?php if($employeeDetail['mobile']==null || $employeeDetail['mobile']=='') echo'#'; else echo 'sms:+'.$employeeDetail['mobile_country_code'].''.$employeeDetail['mobile']; ?>" class="fsz40 " style="color: <?php if($employeeDetail['mobile']==null || $employeeDetail['mobile']=='') echo'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>"> <span><i class="<?php if($employeeDetail['mobile']==null || $employeeDetail['mobile']=='') echo 'fas fa-window-close'; else echo 'fas fa-sms'; ?>" aria-hidden="true"></i> </span></a>
						<p class="fsz13  padt5" style="color: <?php if($employeeDetail['mobile']==null || $employeeDetail['mobile']=='') echo'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>">SMS</p>
						</div> 
						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p "><a href="<?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo'#'; else echo 'mailto:'.$employeeDetail['work_email']; ?>" class="fsz40 " style="color: <?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>"><span><i class="<?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo 'fas fa-window-close'; else echo 'far fa-envelope'; ?>" aria-hidden="true"></i></span></a>
						<p class="fsz13  padt5" style="color: <?php if($employeeDetail['work_email']==null || $employeeDetail['work_email']=='') echo'red'; else { if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; } ?>">Email</p>
						</div>

						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p"><a href="https://maps.google.com/?q=<?php echo  $employeeDetail['location']; ?>" class="fsz40 " style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>"><span><i class="fas fa-map-marker-alt " aria-hidden="true"></i></span>
						<p class="fsz13  padt5" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>">Map</p>
						
						</a>
						
						</div>
						</div>
						
						</div>
						
						
						
					</div>
					
					
					
				</div>
						
			</div>
		
			
		</div>
		<div class="column_m container zi5  white_bg hidden">
				<div class="wrap maxwi_100 padrl15 md-padrl0 xs-marb40 lg-padrl0 ">
					
					<div class="padb10 ">
					
					
					
					<div class="wi_500p maxwi_100  zi5 marrla  white_bg brdrad3">
						<div class="padtb0 brdrad3 ">
						
							
						
								
						<p class="lgn_hight_30 pad0 talc fsz30 padt20   xs-marb5 black_txt hidden"><i class="far fa-building"></i></p>		
						<p class="lgn_hight_35 talc fsz25  black_txt padt20 padb0 "><a href="../../CompanyOmOss/companyAccount/<?php echo $data['eid']; ?>"><span class="bold"><?php echo $employeeDetail['company_name']; ?></span></a></p>
						<p class="lgn_hight_30 pad0 talc fsz25 padb0   xs-marb5 black_txt hidden"><a href="javascript:void(0);"> <?php echo substr($employeeDetail['location'],0,25)."..."; ?></a></p>	
							
							<div class="talc padt5  padb20 hidden">
							<a href="javascript:void(0);" class="fsz30 hidden"> <span><i class="fas fa-phone-square black_txt"></i> </span></a><a href="javascript:void(0);" class="black_txt  fsz25"><?php if($employeeDetail['phone_number']=="" || $employeeDetail['phone_number']==null) echo "Not Available"; else echo "+".$employeeDetail['company_country_code']." ".$employeeDetail['phone_number']; ?></a></div>
						</div>
					</div>
					
				</div>
					
			</div><div class="clear"></div>
			
			
		</div>
		
		<div class="column_m container zi5 mart0 xs-mart40 lgtgrey2_bg xs-white_bg">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
			<div class="wi_100 pos_fix zi50 bot0 left0 bs_bb padrl15 ">
				
				<!-- primary menu -->
				<div class="tab-content fright active padr10 padb20" id="mob-primary-menu" style="display: block;">
					<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12 white_txt">
						<a href="#" class="show_popup_modal  padtb5 dark_grey_txt dblue_txt_h hidden" data-target="#gratis_popup_phone">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fas fa-share-alt white_txt"></span></div>
							<span class="white_txt">Share!</span>
						</a>
						
						<div class="tab-header ">
							<a href="#" class="white_txt checkMob" data-target="#gratis_popup_mob" onclick="show_popup();">
								<div class="box_shadow wi_100p xs-wi_60p xxs-wi_60p hei_100p xxs-hei_60p pos_rel mart-30 xxs-mart-20 blue_bg brdrad100 talc lgn_hight_40 fsz32">
									<i class="fas fa-share-alt padt35 xs-padt15 padr5 fsz30"></i>
								</div>
								
							</a>
						</div>
						<a href="#" class="padtb5 dark_grey_txt dblue_txt_h hidden">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image white_txt"></span></div>
							<span class="white_txt">Save</span>
						</a>
					</div>
				</div>
				
				<!-- add  menu -->
				<div class="tab-content padb0 brd white_bg" id="mob-add-menu">
				<div class="talc">
					<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyAccount/<?php echo $data['eid']; ?>" width="100" height="100" class="martb15 pad0 talc  bold fsz16" />
					</div>
					<ul class="mar0 padrl50 brdrad3 white_bg fsz14 ">
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16" data-target="#gratis_popup_phone">
								<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
								Share
							</a>
						</li>
						
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16"  >
								<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
								 Call me
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16">
								<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
								Email me
							</a>
						</li>
						<li class="dblock mar0 padb10 padrl15">
							<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16">
								<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
								Text me (SMS)
							</a>
						</li>
						
						<li class="dblock mar0 padb10 padrl15">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16" data-target="#gratis_popup_saveq">
								<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
								Save
							</a>
						</li>
					</ul>
					<div class="tab-header fright padb20 mart40 padr10">
					<a href="#" class="white_txt " data-id="mob-primary-menu">
								<div class="box_shadow wi_100p xs-wi_60p xxs-wi_60p hei_100p xxs-hei_60p pos_rel mart-30 xxs-mart-20  red_bg brdrad100 talc lgn_hight_40 fsz32">
									<i class="fas fa-times padt30 xs-padt15 xs-padr5 fsz30"></i>
								</div>
							</a>
						
					</div>
				</div>
			</div>
		
		<div class="hei_20p"></div>
		
			
			<!-- Popup fade -->
				
				</div>
				</div>
			<div class="popup_modal wi_300p maxwi_90 pos_fix pos_btop xs-pos_btop xsi-pos_btop zi50 bs_bb  fsz14 brdrad3 popup_shadow white_bg" id="gratis_popup_mob" style=" box-shadow: 0 2px 10px 0 rgba(105, 112, 113, 0.5);">
			
		<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="pad25  brdradtr10">
				<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyAccount/<?php echo $data['eid']; ?>" class="maxwi_100 hei_150p">
			</div>
			<ul class="mar0 padrl40  brdrad3  fsz14 ">
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class=" wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16" onclick="show_phone();">
								<span class="fa fa-calendar-o wi_20p marr10 talc fsz18 "></span>
								<span class="trn">Share via SMS</span>
							</a>
						</li>
				
	
					
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class=" wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16" onclick="show_email();">
								<span class="fa fa-image wi_20p marr10 talc fsz18 "></span>
								<span class="trn">Share via Email</span>
							</a>
						</li>
						
						
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class=" wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16" data-target="#gratis_popup_saveq" onclick="show_save();">
								<span class="far fa-save wi_20p marr10 talc fsz18 "></span>
								<span class="trn">Save to Flipbook</span>
							</a>
						</li>
						
						<li class="dblock mar0 padb10 padrl15 brdb_new">
							<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16" data-target="#gratis_popup_verify" <?php if($quardPermission==1) { echo 'onclick="show_savev();"';  } ?>>
								<span class="fas fa-bars wi_20p marr10 talc fsz18 "></span>
								<span class="trn">Flipbook directory</span>
							</a>
						</li>
						<li class="dblock mar0 padrl15 ">
							<a href="#" class=" wi_100 minhei_50p dflex alit_c dark_grey_txt fsz16" >
								<span class="fas fa-user-friends wi_20p marr10 talc fsz18 "></span>
								<span class="trn">Flip-Book Colleagues</span>
							</a>
						</li> 
					</ul>
				<div class="padtb10">
			<a href="#" class="talc trn" onclick="show_popup();">Cancel</a>
			</div>
			
	</div>
	
	</div>
	
		
		<div class="popup_modal wi_300p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5" id="gratis_popup_contact">
	<div class="modal-content pad25 brdrad10">
		<div id="searched"><div class="padb0 ">
			<h2 class="talc marb5 pad0 bold fsz24 black_txt">Ring mig</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 talc ">
			
			<span class="valm fsz16">Här kan jag nås...</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad0 padb25 white_bg brdrad3">
			<div class="padtb0 brdrad3 white_bg">
			
			<div class="mart0" id="search_data">
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart0 padt10  padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Phone:</a>
				</div>
				<a href="tel: <?php if($employeeDetail['phone']=="" || $employeeDetail['phone']==null) echo "Not Available"; else echo "+".$employeeDetail['employee_country_code']." ".$employeeDetail['phone']; ?>"><span class="fxshrink_0 padl20"><?php if($employeeDetail['phone']=="" || $employeeDetail['phone']==null) echo "Not Available"; else echo "+".$employeeDetail['employee_country_code']." ".$employeeDetail['phone']; ?></span></a>
				</li>
						
				</ul>
				</div>
				</div>   
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Mobile:</a>
				</div>
				<a href="tel: <?php if($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) echo "Not Available"; else echo "+".$employeeDetail['mobile_country_code']." ".$employeeDetail['mobile']; ?>"><span class="fxshrink_0 padl20"><?php if($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) echo "Not Available"; else echo "+".$employeeDetail['mobile_country_code']." ".$employeeDetail['mobile']; ?></span></a>
				</li>
				</ul>
				</div>
				</div>   
			
			<div class="result-item padb10  lgtgrey2_bg">
				
				<div class="sources-content  dnone  " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				
				<li class="dflex mart10 padt10 padb5 padrl10">
				<div class="wi_30 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Office:</a>
				</div>
				<a href="tel: <?php if($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null || $employeeDetail['cphone']=='-') echo "Not Available"; else echo "+".$employeeDetail['company_country_code']." ".$employeeDetail['cphone']; ?>"><span class="fxshrink_0 padl20"><?php if($employeeDetail['cphone']=="" || $employeeDetail['cphone']==null) echo "Not Available"; else echo "+".$employeeDetail['company_country_code']." ".$employeeDetail['cphone']; ?></span></a>
				</li>
				
				</ul>
				</div>
				</div>   
			
			
			</div>
			
			</div>
			
			
			</div>
			
			
			
			
			</div>
		
	</div>
</div>
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_btop xs-pos_btop xsi-pos_btop zi50 bs_bb  fsz14 brdrad3 popup_shadow white_bg" id="gratis_popup_phone" style=" box-shadow: 0 2px 10px 0 rgba(105, 112, 113, 0.5);">
		<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="pad25  brdradtr10">
				<a href="javascript:void(0);" class="fsz100 blue_txt" > <span><i class="fas fa-sms" aria-hidden="true"></i> </span></a>
			</div>
			<h2 class="marb0 padrl20  bold fsz20 dark_grey_txt  tall trn">Select country and enter the recipient's mobile number without the first zero and without the country code.</h2>
		
		<form action="../shareEmployeeInformation/<?php echo $data['eid']; ?>" method="POST" id="share_data" name="share_data" >
		<div class="on_clmn padb10 ">
				<div class="on_clmn padrl20">
				
					
					
					
					<div class="pos_rel padl0">
					
					<select class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 brdb_new brdrad5" name="country_id" id="country_id" >
																			
																			<?php 
																				foreach($result_country as $category => $row_country)
																				{
																					
																				?>			
																				<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																			<?php } ?>
																		</select>
						
						
						
					</div>
					
				
			</div>
		</div>
			<div class="on_clmn padrl20">
				
					
					
					<div class="pos_rel padr0 ">
						
						
						<input type="number" id="phoneno" name="phoneno" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 trn" placeholder="Enter mobile number">
					</div>
				
			</div>
		
		</form>	
		<div class="on_clmn padtb20 padrl20">
				<a href="#" class="padt15 trn wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick="shareInformation();">Send</a>
				
			</div>
			<div class="padtb10">
			<a href="#" class="talc trn" onclick="show_phone();">Cancel</a>
			</div>
	</div>
	
	</div>
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_btop xs-pos_btop xsi-pos_btop zi50 bs_bb  fsz14 brdrad3 popup_shadow white_bg" id="gratis_popup_email" style=" box-shadow: 0 2px 10px 0 rgba(105, 112, 113, 0.5);">
		<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="pad25 marb50  brdradtr10">
				<a href="javascript:void(0);" class="fsz100 blue_txt" > <span><i class="far fa-envelope" aria-hidden="true"></i> </span></a>
			</div>
			<h2 class="marb0 padrl20  bold fsz20 dark_grey_txt trn tall">Fill in the recipients email address and click send</h2>
		
		<form action="../shareEmployeeInformationEmail/<?php echo $data['eid']; ?>" method="POST" id="share_data_email" name="share_data_email" >
			<div class="on_clmn padrl20">
				
					
					
					<div class="pos_rel padr0">
						
						
						<input type="text" id="email_info" name="email_info"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Fyll i e-postadress " >
					</div>
				
			</div>
		
		</form>	
		<div class="on_clmn padtb20 padrl20">
				<a href="#"  class="padt15 trn wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick="shareInformationEmail();">Send</a>
				
			</div>
			<div class="padtb10">
			<a href="#" class="talc trn" onclick="show_email();">Cancel</a>
			</div>
	</div>
	
	</div>
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_btop xs-pos_btop xsi-pos_btop zi50 bs_bb  fsz14 brdrad3 popup_shadow white_bg" id="gratis_popup_saveq" style=" box-shadow: 0 2px 10px 0 rgba(105, 112, 113, 0.5);">
		<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="pad25  brdradtr10">
				<a href="javascript:void(0);" class="fsz100 blue_txt" > <span><i class="fas fa-cloud-download-alt" aria-hidden="true"></i> </span></a>
			</div>
			<h2 class="marb0 padrl20  bold fsz20 dark_grey_txt  tall">Logga in för att spara detta FlipQard till din Flipbook</h2>
		
		<form action="../saveQardInformation/<?php echo $data['eid']; ?>" method="POST" id="saveq_data" name="saveq_data" >
		<div class="on_clmn padb10 ">
				<div class="on_clmn padrl20">
				
				
					
					
					<div class="pos_rel padl0">
					
					<input type="text" id="p_code" name="p_code" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter personal code" >
						
						
						
					</div>
					
				
			</div>
		</div>
			<div class="on_clmn padrl20">
				
					
					
					<div class="pos_rel padr0">
						
						
						<input type="password" id="password" name="password" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter password" >
					</div>
				
			</div>
		
		</form>	
		<div class="on_clmn padtb20 padrl20">
				<input type="button" value="Logga in" class=" wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick="saveInformation();">
				
			</div>
			<div class="padtb10">
			<a href="#" class="talc trn" onclick="show_save();">Cancel</a>
			</div>
	</div>
	
	</div>
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5" id="login_qard">
	<div class="modal-content pad25 brdrad10">
		<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 ">
						
							<div class="padb10  talc padt20">
										<div class="padrl0 ">
											<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&amp;data=https://www.qloudid.com/company/index.php/EmployeeLogin/expressLogin/<?php echo $data['eid']; ?>" class="white_brd wi_50 hei_auto xs-wi_100">
											
										</div>
									</div>

						
						</div>
			
			</div>
			
			
			
	</div>
</div>
	
<div class="popup_modal wi_300p maxwi_90 pos_fix pos_btop xs-pos_btop xsi-pos_btop zi50 bs_bb  fsz14 brdrad3 popup_shadow white_bg" id="gratis_popup_confirm" style=" box-shadow: 0 2px 10px 0 rgba(105, 112, 113, 0.5);">
		<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="pad25  brdradtr10">
				<a href="javascript:void(0);" class="fsz100 blue_txt" > <span><i class="fas fa-bars" aria-hidden="true"></i> </span></a>
			</div>
			<h2 class="marb0 padrl20  bold fsz20 dark_grey_txt  tall">Öppna din Flipbook-kollegor med sms-verifiering</h2>
		
			<div class="on_clmn padtb20 padrl20">
				<input type="button" value="Skicka kod" class=" wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick="generateOTP();">
				
			</div>
			<div class="padtb10">
			<a href="#" class="talc close_popup_modal trn">Cancel</a>
			</div>
	</div>
	
	</div>	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
				<div class="modal-content pad25 brdrad5 ">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt talc trn">Log in using SMS code</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16 trn">To access your colleagues FlipQard, you need to verify your identity by filling in the SMS code you just received to the number your account is registered.</span>
						</div>
						
						
					</div>
					
					<form method="POST" action="approveOtp" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
						
						
						<div class="padb0">
							
							<div class="pos_rel ">
								
								<input type="text" name="otp" id="otp" placeholder="Enter SMS code" max="9999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 trn">
								
							</div>
						</div>
						<div class="red_bg" id="error_msg_opt">
							
							
						</div>
						
						
						
						
						
					</form>
					<div class="mart20 talc marb10">
						<a href="#"  class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp padt15 trn" onclick="checkOtp();">Sign and log in</a>
						<input type="hidden" id="infor_id" name="infor_id" />
						
					</div>
					<div> Saknar du konto? Skaffa FlipQard nu!</div>
					
				</div>
			</div>
			
	
	
<div class="popup_modal wi_300p maxwi_90 pos_fix pos_btop xs-pos_btop xsi-pos_btop zi50 bs_bb  fsz14 brdrad3 popup_shadow white_bg" id="gratis_popup_verify" style=" box-shadow: 0 2px 10px 0 rgba(105, 112, 113, 0.5);">
		<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="pad25  brdradtr10">
				<a href="javascript:void(0);" class="fsz100 blue_txt" > <span><i class="fas fa-bars" aria-hidden="true"></i> </span></a>
			</div>
			<h2 class="marb0 padrl20  bold fsz20 dark_grey_txt  tall">List Saved Qard</h2>
		
			<form action="../listQuardInformation/<?php echo $data['eid']; ?>" method="POST" id="savev_data" name="savev_data" >
		<div class="on_clmn padb10 ">
				<div class="on_clmn padrl20">
				
					
					
					
					<div class="pos_rel padl0">
					
					<input type="text" id="p_codev" name="p_codev" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter personal code" >
						
						
						
					</div>
					
				
			</div>
		</div>
			<div class="on_clmn padrl20">
				
					
					
					<div class="pos_rel padr0">
						
						
						<input type="password" id="passwordv" name="passwordv" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Fyll i lösenord" >
					</div>
				
			</div>
		
		</form>	
		<div class="on_clmn padtb20 padrl20">
				<input type="button" value="Logga in" class=" wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick="verifyInformation();">
				
			</div>
			<div class="padtb10">
			<a href="#" class="talc " onclick="show_savev();">Avbryt</a>
			</div>
	</div>
	
	</div>
	
	
		



</div>
		<?php } else { ?>
			<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			
			
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
						
						<div class="talc fsz75 red_txt"> <span class="fas fa-minus-circle"></span></div>
						<div class="padb10 ">
							<h1 class="padb5 talc fsz65 xs-fsz25 bold ">Sorry !</h1>
							<p class="pad0 xs-padb10 talc fsz25 xs-fsz16 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 xs-brdb_b">This employee business qard is not generarted/ has been deleted by company admin</p>
						</div>
						
					
						
					
					</div><div class="clear"></div>
				</div>
			</div>
			</div>
		<?php } ?>
		<div id="popup_fade" class="opa0 opa55_a black_bg" onclick="closemob_popup();"></div>
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/flipqard.js"></script>
		
	</body>
	
</html>