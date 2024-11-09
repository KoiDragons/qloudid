<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylewrap.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
		<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
		<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
		<!--<a href="" onclick="Calendly.showPopupWidget('https://calendly.com/robert-ghirmai-safeqloud/90min');return false;">Schedule time with me</a>-->
		
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
			var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=40;
			var send_data1={};
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
			
			function checkBankid()
			{
				//Clear previous message, if any
				$("#errorMsg").html('');
				$("#cinMsg").html('');
				
				if($("#ssecurity1").val()=="" || $("#ssecurity1").val()==null)
				{
					$("#errorMsg").html('Social security number can not be blank');
					return false;
					
				}
				
				
				
				var send_ssn={};
				send_ssn.ssecurity1=$("#ssecurity1").val();
				
				$.ajax({
					type:"POST",
					url:"InformRelatives/checkUserAvailability",
					data:send_ssn,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==0)
						{
							$("#errorMsg").html('This person does not exist in our system');
							return false;
						}
						else 
						{
							send_data1.user_id=data1;
							
						}
					}
				});
				
				if($("#autocomplete1").val()=="" || $("#autocomplete1").val()==null)
				{
					$("#errorMsg").html('Address can not be blank');
					return false;
					
				}
				
				if($("#info_msg").val()=="" || $("#info_msg").val()==null)
				{
					$("#errorMsg").html('Message can not be blank');
					return false;
					
				}
				
				if($("#prnumber").val()=="")
				{
					$("#errorMsg").html('Personal number can not be blank');
					return false;
				}
				if(isNaN($("#prnumber").val())) 
				{
					$("#errorMsg").html('Personal number must be a numeric value');
					return false;
				}
				if($("#prnumber").val().length < 12 || $("#prnumber").val().length > 12) 
				{
					$("#errorMsg").html('Personal number must be 12 digit numeric value');
					return false;
				}
				// after clicking the submit button, hide all form fields
				$("#ssecurity1").hide();
				$("#prnumber").hide();
				$("#country_in_popup").hide();
				$("#autocomplete1").hide();
				$("#info_msg").hide();
				$("#prnumber").hide();
				$("#submit_button_in_popup").hide();
				
				var send_data={};
				send_data.prnumber=$("#prnumber").val();
				$.ajax({
					type:"POST",
					url:"BankidCheck/initiate",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1)
						{
							send_data1.orderRef=data1;
							a = setInterval(ajaxSend, timeInterval);
						}
						else 
						{
							$("#errorMsg").html('error request');
						}
					}
				});
				
			}
			
			function ajaxSend()
			{ 
				$.ajax({
					type:"POST",
					url:"BankidCheck/checkOrderReference",
					data:send_data1,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data2){
						if(data2!='complete')
						{
							timeout++;
							if(data2==1)
							{
								clearInterval(a);
								$("#errorMsg").html("Det BankID du försöker använda är för gammalt eller spärrat. Använd ett annat BankID eller hämta ett nytt hos din internetbank.");
							}
							else if(data2==2)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten. Försök igen.");
							}
							else if(data2==3)
							{
								clearInterval(a);
								$("#errorMsg").html("BankID-appen verkar inte finnas i din dator eller telefon. Installera den och hämta ett BankID hos din internetbank. Installera appen från din appbutik eller https://install.bankid.com.");
							}
							else if(data2==4)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten.");
							}
							else if(timeout>tout)
							{
								clearInterval(a);
								$("#errorMsg").html('Internt tekniskt fel. Försök igen.');
							} 
							else 
							{
								$("#errorMsg").html(data2);
							}
						}
						else 
						{
							send_data1.adrs1=$("#autocomplete1").val();
							send_data1.info_msg=$("#info_msg").val();
							$.ajax({
								type:"POST",
								url:"InformRelatives/informRelativesPerson",
								data:send_data1,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									
									if(data1==0)
									{
										$("#errorMsg").html('Some error occured please try again later');
										clearInterval(a);
									}
									else 
									{
										$("#errorMsg").html('');
										$("#cinMsg").html("Kins have been informed");
										clearInterval(a);
									}
								}
							});
							
							
							
						}
						
					}
				});
				
			}
			
			
			
			var placeSearch, autocomplete;
			var componentForm = {
				street_number: 'short_name',
				route: 'long_name',
				locality: 'long_name',
				administrative_area_level_1: 'short_name',
				country: 'long_name',
				postal_code: 'short_name'
			};
			
			function initAutocomplete() {
				// Create the autocomplete object, restricting the search to geographical
				// location types.
				
				autocomplete = new google.maps.places.Autocomplete(
				/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
					{types: ['geocode']});
					
					autocomplete1= new google.maps.places.Autocomplete(
					/** @type {!HTMLInputElement} */(document.getElementById('autocomplete1')),
						{types: ['geocode']});
						
						// When the user selects an address from the dropdown, populate the address
						// fields in the form.
						autocomplete.addListener('place_changed', fillInAddress);
						autocomplete1.addListener('place_changed', fillInAddress1);
						
					}
					
					function fillInAddress1() {
						// Get the place details from the autocomplete object.
						var place = autocomplete1.getPlace();
						
						for (var component in componentForm) {
							document.getElementById(component).value = '';
							document.getElementById(component).disabled = false;
						}
						
						// Get each component of the address from the place details
						// and fill the corresponding field on the form.
						for (var i = 0; i < place.address_components.length; i++) {
							var addressType = place.address_components[i].types[0];
							if (componentForm[addressType]) {
								var val = place.address_components[i][componentForm[addressType]];
								document.getElementById(addressType).value = val;
							}
						}
					}
					
					
					
					function fillInAddress() {
						// Get the place details from the autocomplete object.
						var place = autocomplete.getPlace();
						
						for (var component in componentForm) {
							document.getElementById(component).value = '';
							document.getElementById(component).disabled = false;
						}
						
						// Get each component of the address from the place details
						// and fill the corresponding field on the form.
						for (var i = 0; i < place.address_components.length; i++) {
							var addressType = place.address_components[i].types[0];
							if (componentForm[addressType]) {
								var val = place.address_components[i][componentForm[addressType]];
								document.getElementById(addressType).value = val;
							}
						}
					}
					
					// Bias the autocomplete object to the user's geographical location,
					// as supplied by the browser's 'navigator.geolocation' object.
					function geolocate() {
						if (navigator.geolocation) {
							navigator.geolocation.getCurrentPosition(function(position) {
								var geolocation = {
									lat: position.coords.latitude,
									lng: position.coords.longitude
								};
								var circle = new google.maps.Circle({
									center: geolocation,
									radius: position.coords.accuracy
								});
								autocomplete.setBounds(circle.getBounds());
							});
						}
					}
					
					
					
					function makeActive()
					{
						$("#gratis_popup_user_profile").addClass('active');
						$("#gratis_popup_user_profile").attr("style","display:block");
						
					}
					
					function makeInactive()
					{
						$("#gratis_popup_user_profile").removeClass('active');
						$("#gratis_popup_user_profile").attr("style","display:none");
						$("#popup_fade").removeClass('active');
						$("#popup_fade").attr("style","display:none");
						
					}
					
					window.dataLayer = window.dataLayer || [];
					function gtag(){dataLayer.push(arguments);}
					gtag('js', new Date());
					
					gtag('config', 'UA-126618362-1');
					function changeHeader()
					{
						
						window.location.href="https://www.safeqloud.com/user/index.php/InformRelativesEng";
						
					}
					function changeClass(link)
					{
						
						$(".class-toggler").removeClass('active');
						
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
							url:"InformRelatives/verifyOtp",
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
									window.location.href ="https://www.safeqloud.com/user/index.php/InformRelatives";
								}
							}
						});
						
					}
					
					
					
					
					
					function checkData()
					{
						if($("#ssn").val()==1)
						{
							if($("#ssecurity").val()=="")
							{
								alert("Fyll i ditt person nr.!!");
								return false;
							}
						}
						else if($("#ssn").val()==2)
						{
							if($("#uphno").val()=="")
							{
								alert("Fyll i ditt mobil nr.!!");
								return false;
							}
						}
						if($('#info').val().trim().length == 0)
						{
							alert("Skriv en kort beskrivning!!");
							return false;
						}
						
						var send_data={};
						
						send_data.idtype=$("#ssn").val();
						send_data.cntry=$("#cntry").val();
						if($("#ssn").val()==1)
						{
							send_data.ssecurity=$("#ssecurity").val();
						}
						else if($("#ssn").val()==2)
						{
							send_data.uphno=$("#uphno").val();
						}
						send_data.info=$("#info").val();
						send_data.adrs=$("#autocomplete").val();
						send_data.travel_info=$("#travel_info").val();
						send_data.street_number=$("#street_number").val();
						send_data.route=$("#route").val();
						send_data.locality=$("#locality").val();
						send_data.administrative_area_level_1=$("#administrative_area_level_1").val();
						send_data.postal_code=$("#postal_code").val();
						send_data.country=$("#country").val();
						$.ajax({
							type:"POST",
							url:"InformRelatives/createPopup",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								document.getElementById("popup_fade").style.display='block';
								$("#popup_fade").addClass('active');
								document.getElementById("gratis_popup_connect").style.display='block';
								$(".gratis_popup_connect").addClass('active');
								$("#connect_id").html('');
								$("#connect_id").append(data1);
								
							}
						});
						
					}
					function submit_info()
					{
						$("#error_msg_phone").html('');
						if($("#pno").val()=="")
						{
							alert("Fyll i ditt mobil nr.!!");
							return false;
						}
						else if(isNaN($("#pno").val())) {
							
							alert("Bara siffror tack!!");
							return false;
						}
						
						else
						{
							var send_data={};
							send_data.sender_count=$("#sender_count").val();
							send_data.info_relat=$("#info_relat").val();
							send_data.pno=$("#pno").val();
							$.ajax({
								type:"POST",
								url:"InformRelatives/sendOtp",
								data:send_data,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									if(data1==0)
									{
										$("#error_msg_phone").html('Felaktig mobil nr.');
									}
									else
									{
										document.getElementById("gratis_popup_connect").style.display='none';
										$(".gratis_popup_connect").removeClass('active');
										document.getElementById("gratis_popup_login").style.display='block';
										$(".gratis_popup_login").addClass('active');
										$("#infor_id").val(send_data.info_relat);
									}
								}
							});
							
							
						}
					}
					
					function displayField(id)
					{
						if(id==1)
						{
							$("#uphn").attr("style",'display:none;');
							$("#ussn").attr("style",'display:block;');
						}
						else if(id==2)
						{
							$("#uphn").attr("style",'display:block;');
							$("#ussn").attr("style",'display:none;');
						}
					}
					
					
					function initMap(){
						var google_map = document.getElementById('gmap');
						if (google_map){
							var map_zoom = parseInt(google_map.getAttribute('data-zoom')),
							map_lat = parseFloat(google_map.getAttribute('data-lat')),
							map_lng = parseFloat(google_map.getAttribute('data-lng')),
							title = google_map.getAttribute('data-title');
							
							map_zoom = map_zoom ? map_zoom : 12;
							map_lat = map_lat ? map_lat : -12.043333;
							map_lng = map_lng ? map_lng : -77.028333;
							
							var myLatLng = {
								lat: map_lat,
								lng: map_lng
							};
							
							var map = new google.maps.Map(google_map, {
								zoom: map_zoom,
								center: myLatLng
							});
							
							
							if (title) {
								var marker = new google.maps.Marker({
									position: myLatLng,
									map: map,
									title: title
								});
								
								var infowindow = new google.maps.InfoWindow({
									content: title,
									maxWidth: 230,
									
								});
								
								google.maps.event.addListener(marker, 'click', function() {
									infowindow.open(map, marker);
								});
							}
							
						}
					}
				</script>
				
				<div class="sharethis-inline-share-buttons"></div>
				<script async src="//platform-api.sharethis.com/js/sharethis.js#property=5c04f17ff30c5a001138cc7d&product="inline-share-buttons"></script>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
				async defer></script>
				
			</head>
			
			<?php $path1 = $path."html/usercontent/images/"; ?>
			
			<body class="white_bg">
				
				<div class="column_m header xs-header  bs_bb white_bg">
			<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10  white_bg">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 wi_140p">
					<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
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
													<div class="user_pic padt5"><a href="javascript:checkFlag();" data-value="sv" ><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:checkFlag();" class="fsz14 black_txt" data-value="sv" >  Svenska</a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:changeHeader();" data-value="en"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:changeHeader();" class="fsz14 black_txt" data-value="en" >  Engelska </a> </div>
												</li>
												
											</ol>
											
										</div>
									</li>
								</ul>
							</li>
							
							
							
							
							
						</ul>
					</div>
				</div>
				
				<div class="top_menu_qloud fright padt20 padb0 hidden-xs" style="width:580px;">
						<ul class="menulist sf-menu fsz16 black_txt">
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/user/index.php/safeqloudPersonal" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Privat" data-sw="Privat">Privat</a> </li>
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/user/index.php/CorporateServices" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Företag" data-sw="Företag">Företag</a> </li>
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue ">
								<a href="#" class="translate brdb_b_pink hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 pink_txt ">Partners</a>
								<ul >
									<li class="first">
										<div class="top_arrow"></div>
									</li>
									<li class="last">
										<div class="emailupdate_menu padtb15">
										<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
											<ol>
											
												<li class="fsz14 valm padb10 ">
													
													<div class="padl20 padtb10 brdb_new"> <a href="https://www.safeqloud.com/user/index.php/PublicNews" class="fsz16 black_txt"  >  Våra partners</a> </div>
												</li>
												<li>
													
													<div class="padl20 padtb10 valm"> <a href="https://www.safeqloud.com/user/index.php/InformRelatives" class="fsz16 black_txt" data-value="en" >  Kalender </a> </div>
												</li>
												</ol>
											
											<div class="clear"></div>
										</div>
									</li>
								</ul>
							</li>
							
								<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue hidden"> <a href="https://www.safeqloud.com/user/index.php/InformRelatives" id="usermenu_singin" class="translate hei_30pi dblock padrl10 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="sos" data-sw="sos">NOTIFY <span class="fa fa-heart red_txt"></span> F&F </a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_lgrey2 lgtgrey2_bg brdrad5 marl20 "> <a href="https://www.safeqloud.com/public/index.php/PublicAboutUs/companyAccount/M0xvUmVVa1BXQUpmc1FpQ3lydWJXZz09" id="usermenu_singin" class="translate hei_30pi dblock padrl10   lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 last"> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl10 blue_bg_h  lgn_hight_30 black_txt  white_txt_h  brdl" data-en="Logga in" data-sw="Logga in">Logga in</a> </li>
							
							</ul>
					</div>
				
				
			
				
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3 "> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
		
				
				<div class="clear"></div>
					<div class="dflex xs-dblock justc_fe pos_rel padtb60 xs-pad0" onclick="checkFlag();">
				<div class="wi_100 hei_100 pos_abs xs-pos_sta zi1 top0 left0 bgir_norep bgip_c bgis_cov" style="background-image: url(../../html/usercontent/images/bg/calendar-featured1.jpg);">
					<img src="../../html/usercontent/images/bg/calendar-featured1.jpg" class="wi_100 hei_auto hide xs-dblock">
				</div>
				<div class="wi_50 xs-wi_100 pos_rel zi5 white_txt">
					<div class="hei_30p dflex alit_c marl10 blue_bg italic fsz16">
						<img src="../../html/usercontent/images/bg/abIconPlus.svg" width="77" height="30" class="wi_auto hei_100 marl-10 marr10">
						<div class="padtb3">
							Verifiera motpart med ditt Qloud ID 
						</div>
					</div>
					<div class="pos_rel padrbl30 xs-padrl20 xs-darkgrey_txt">
						<div class="wi_100 hei_100 xs-dnone opa60 pos_abs zi1 top0 left0 blue_bg"></div>
						<div class="maxwi_500p pos_rel zi5">
							<h2 class="mar0 padtb15 bold fsz40 xs-fsz22 white_txt xs-darkgrey_txt">VÄLKOMMEN TILL VÅRT KALENDARIUM!</h2>
							<div class="mar0 marb20 pad0 lipos_in bold fsz20 xs-fsz15">
								
									<span >I vårt kalendarium hittar du alla våra öppna evenemang samt introduktions- och utbildningsmöten för våra partner och kunder. Du kan själv boka in dig på en ledig tid som passar ditt schema. </span>
								
								<li class="marb10 pad0 hidden">
									<span class="marl-15">Du når över 7,5 miljoner identiteter på 1 minut</span>
								</li>
								<li class="marb10 pad0 hidden">
									<span class="marl-15"> Ta det säkra före det osäkra! </span>
								</li>
								
							</div>
							<a href="#" class="minhei_50p dflex justc_c alit_c opa90_h marb10 brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Pröva Verify ID kostnadsfritt</a>
							<div class="marb10 talc fsz15">
								Det är gratis - på riktigt
							</div>
						</div>
					</div>
				</div>
			</div>	
			
					
				<div class="column_m marb10  talc lgn_hight_22 fsz16 xs-marb0 " onclick="checkFlag();">
					
					<div class="padrl10 white_bg xs-padrl0">
						<div class="wrap maxwi_100     xs-padb0 mart40 xs-mart0 brdb_new">
						
							<div class="dflex xs-fxwrap_w alit_c">
								
								<div class="wi_30 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												<h3 class="bold">Introduktionsmöte Partner </h3>
												<!--<p><strong class="uppercase">TIPS:</strong> En tumregel är att inte ansöka om lån som överstiger 90% av din årsinkomst.</p>-->
											</div>
										</li>
										
										
										
									</ul>
									
									
								</div>
								<div class="wi_40 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										
										<li class="dblock xs-marb0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>En initial dialog via telefon för er som har frågor och funderingar om något utav våra partnerprogram. Gäller för Teknisk partner, Branschpartner och Återförsäljare. – Kostnadsfritt    </p>
												
												
											</div>
										</li>
									</ul>
								</div>
								<div class="wi_30 xs-wi_100 fxshrink_0 order_3 xs-order_3 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall">
										
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba  padb0 ">
												<div class="mart0 talc">
													<input type="button" value="Register" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="Calendly.showPopupWidget('https://calendly.com/robert-ghirmai-safeqloud/60min');return false;">
													
												</div>
												
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="column_m marb10  talc lgn_hight_22 fsz16 xs-marb0 " onclick="checkFlag();">
					
					<div class="padrl10 white_bg xs-padrl0">
						<div class="wrap maxwi_100    xs-padb0 martb20 xs-mart0 xs-marb0 brdb_new">
							<div class="dflex xs-fxwrap_w alit_c">
								
								<div class="wi_30 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 pad20 xs-padrl25 and xs-padtb10  ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												<h3 class="bold">Utbildning Partner  </h3>
												
											</div>
										</li>
										
									</ul>
									
									
								</div>
								<div class="wi_40 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										
										
										<li class="dblock xs-marb0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Kostnadsfri utbildning för nya partners. Vi går igenom Qloud ID och vårt partnersystem. Här lär ni er hur systemet fungerar och hur ni ska hantera det. Gäller alla partnerprogram. </p>
												
												
											</div>
										</li>
										
										
									</ul>
								</div>
								<div class="wi_30 xs-wi_100 fxshrink_0 order_3 xs-order_3 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall">
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba  padb0 ">
												<div class="mart0 talc">
													<input type="button" value="Register" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="Calendly.showPopupWidget('https://calendly.com/robert-ghirmai-safeqloud/90min');return false;">
													
												</div>
												
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="column_m marb10  talc lgn_hight_22 fsz16 xs-marb0 " onclick="checkFlag();">
					
					<div class="padrl10 white_bg xs-padrl0">
						<div class="wrap maxwi_100     xs-padb0 martb20 xs-mart0 xs-marb0">
							<div class="dflex xs-fxwrap_w alit_c">
								
								<div class="wi_30 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5  pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												
												<h3 class="bold">Uppföljningsmöte Partner </h3>
												
											</div>
										</li>
										
									</ul>
									
									
								</div>
								<div class="wi_40 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										<li class="dblock xs-marb0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Uppföljningsmöte med befintliga partnerföretag vid behov där frågor besvaras, nyheter och förändringar informeras. </p>
												
												
												
												
											</div>
										</li>
										
									</ul>
								</div>
								<div class="wi_30 xs-wi_100 fxshrink_0 order_3 xs-order_3 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall">
										
										
										
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba  padb0 ">
												<div class="mart0 talc">
													<input type="button" value="Register" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="Calendly.showPopupWidget('https://calendly.com/robert-ghirmai-safeqloud/15min');return false;">
													
												</div>
												
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="column_m marb10  talc lgn_hight_22 fsz16 xs-marb0 " onclick="checkFlag();">
					
					<div class="padrl10 white_bg xs-padrl0">
						<div class="wrap maxwi_100     xs-padb0 martb20 xs-mart0 xs-marb0">
							<div class="dflex xs-fxwrap_w alit_c">
								
								<div class="wi_30 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5  pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												
												<h3 class="bold">Introduktionsmöte Kund </h3>
												
											</div>
										</li>
										
									</ul>
									
									
								</div>
								<div class="wi_40 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										<li class="dblock xs-marb0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Under detta kostnadsfria onlinemöte hjälper vi dig att hitta de produkter och produktpaket som passar er verksamhet. Vi besvarar dina frågor och funderingar om alla våra produkter. </p>
												
												
												
												
											</div>
										</li>
										
									</ul>
								</div>
								<div class="wi_30 xs-wi_100 fxshrink_0 order_3 xs-order_3 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall">
										
										
										
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba  padb0 ">
												<div class="mart0 talc">
													<input type="button" value="Register" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp"  onclick="Calendly.showPopupWidget('https://calendly.com/robert-ghirmai-safeqloud/introduktionsmote-kund');return false;">
													
												</div>
												
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="column_m marb10  talc lgn_hight_22 fsz16 xs-marb0 " onclick="checkFlag();">
					
					<div class="padrl10 white_bg xs-padrl0">
						<div class="wrap maxwi_100     xs-padb0 martb20 xs-mart0 xs-marb0">
							<div class="dflex xs-fxwrap_w alit_c">
								
								<div class="wi_30 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5  pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												
												<h3 class="bold">Utbildning kund  </h3>
												
											</div>
										</li>
										
									</ul>
									
									
								</div>
								<div class="wi_40 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall xs-mart0">
										
										<li class="dblock xs-marb0 marb10 pad0">
											
											<div class=" dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>En kostnadsfri online-utbildning där vi hjälper dig att komma igång med våra produkter och tjänster. Vi ger tips och besvarar dina frågor för att förenkla uppstarten för dig och dina anställda. </p>
												
												
												
												
											</div>
										</li>
										
									</ul>
								</div>
								<div class="wi_30 xs-wi_100 fxshrink_0 order_3 xs-order_3 martb20  xs-marr0 talc   xs-mart0 xs-marb0 pad20 xs-padrl25 and xs-padtb10 ">
									
									
									<ul class="mart10 pad0 tall">
										
										
										
										
										
										<li class="dblock mar0 marb10 pad0">
											
											<div class=" dblock_siba  padb0 ">
												<div class="mart0 talc">
													<input type="button" value="Register" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="Calendly.showPopupWidget('https://calendly.com/robert-ghirmai-safeqloud/introduktionsmote');return false;">
													
												</div>
												
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<!-- LOGIN FORM -->
				<div class="column_m marb0 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 mart40 hidden" onclick="checkFlag();">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
						<div class="wi_960p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0 ">
							<div class="container  white_bg fsz14 dark_grey_txt ">
								<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
									
									<tbody id="total_data">
										
										<tr class="style_base bg_fffbcc_a ">
											
											
											<td class="pad10 brdb_new hidden-xs">
												<div class="wi_100">
													<div class="dflex alit_c">
														<h3 class="mar0 pad0 fsz16 xs-fsz16 bold">
															Utbildning kund
														</h3>
														
													</div>
													
													
												</div>
											</td>
											<td class="pad10 brdb_new">
												<div class="wi_100">
													<div class="dflex alit_c">
														<h3 class="mar0 pad0 fsz16 xs-fsz16">
															En kostnadsfri online-utbildning där vi hjälper dig att komma igång med våra produkter och tjänster. Vi ger tips och besvarar dina frågor för att förenkla uppstarten för dig och dina anställda. 
														</h3>
														
													</div>
													
													
												</div>
											</td>
											
											
											
											
											<td class="pad5 brdb_new  ">
												<div class="dflex fxshrink_0">
													<a href="#" class="wi_70p hei_32p dflex alit_c justc_c  brd brdrad5 bg_f dark_grey_txt">Register</a>
													
												</div>
											</td>
										</tr>
										
										<tr class="style_base bg_fffbcc_a ">
											
											
											<td class="pad10 brdb_new hidden-xs">
												<div class="wi_100">
													<div class="dflex alit_c">
														<h3 class="mar0 pad0 fsz16 xs-fsz16 bold">
															Q + A SESSION
														</h3>
														
													</div>
													
													
												</div>
											</td>
											<td class="pad10 brdb_new">
												<div class="wi_100">
													<div class="dflex alit_c">
														<h3 class="mar0 pad0 fsz16 xs-fsz16">
															Join our team for a 30-minute Q + A session where we will answer your questions and you can learn more about best practices!
														</h3>
														
													</div>
													
													
												</div>
											</td>
											
											
											
											
											<td class="pad5 brdb_new  ">
												<div class="dflex fxshrink_0">
													<a href="#" class="wi_70p hei_32p dflex alit_c justc_c  brd brdrad5 bg_f dark_grey_txt">Register</a>
													
												</div>
											</td>
										</tr>
										
										<tr class="style_base bg_fffbcc_a ">
											
											
											<td class="pad10 brdb_new hidden-xs">
												<div class="wi_100">
													<div class="dflex alit_c">
														<h3 class="mar0 pad0 fsz16 xs-fsz16 bold">
															GUEST WEBINAR
														</h3>
														
													</div>
													
													
												</div>
											</td>
											<td class="pad10 brdb_new">
												<div class="wi_100">
													<div class="dflex alit_c">
														<h3 class="mar0 pad0 fsz16 xs-fsz16">
															Join us on Friday, August 24th at 4pm EST for this guest webinar with Nicole from Scout on how she set her team up for success with a quickly growing company and increasing customer needs.
														</h3>
														
													</div>
													
													
												</div>
											</td>
											
											
											
											
											<td class="pad5 brdb_new  ">
												<div class="dflex fxshrink_0">
													<a href="#" class="wi_70p hei_32p dflex alit_c justc_c  brd brdrad5 bg_f dark_grey_txt" onclick="Calendly.showPopupWidget('https://calendly.com/mojo-customer-success-1/webinar');return false;">Register</a>
													
												</div>
											</td>
										</tr>
										
									</tbody>
									
								</table>
								
							</div>
						</div>
					</div>
				</div>
				<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 hidden" onclick="checkFlag();">
					
					<div class="padrl10 white_bg xs-padrl15">
						<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart40 xs-mart0">
							<div class="dflex xs-fxwrap_w alit_c">
								<div class="brdb_b  visible-xs visible-sm">
									<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">NOTIFY <span class="fa fa-heart red_txt"></span> Family & Friends</h4>
									<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
								</div>
								<div class="wi_40 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 lgtgrey2_bg ">
									
									
									<form action="#" method="POST" id="loginform">
										<div class="marb20 padtrl20">
											
											
											<div class="on_clmn padtb0">
												
												<div class="on_clmn ">
													<div class="thr_clmn wi_50">
														
														<div class="pos_rel">
															<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
															
															
															<select id="ssn" name="ssn" class="default_view txtind25  wi_100 mart5 pad10  rbrdr hei_50p  black_txt white_bg" onchange="displayField(this.value);">
																<option value="1" selected="" class=" ">Person nr.</option>
																<!--<option value="Passport number" class="lgtgrey2_bg ">Passport number</option>-->
																<option value="2" class="lgtgrey2_bg ">Mobil</option>
																
															</select>
														</div>
													</div>
													<div class="thr_clmn padl10 wi_50">
														
														<div class="pos_rel">
															<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
															<select id="cntry" name="cntry" class="txtind25 default_view wi_100 mart5 rbrdr pad10  white_bg hei_50p black_txt">
																
																<?php  foreach($resultContry as $category => $value) 
																	{
																		$category = htmlspecialchars($category); 
																	?>
																	
																	<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
																<?php 	}	?>
																
															</select>
														</div>
													</div>
												</div>
												
												
												
												
												
												<div class="on_clmn mart20" id="ussn" style="display:block;">
													
													<div class="pos_rel">
														<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
														<input type="text" name="ssecurity" id="ssecurity" placeholder="Den skadades person nr." class="txtind25 wi_100 rbrdr pad10 mart5 white_bg hei_50p black_txt">
														
													</div>
												</div>
												
												<div class="on_clmn mart20" id="uphn" style="display:none;">
													<label class="marb5">Phone number</label>
													<div class="pos_rel">
														<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
														<input type="text" name="uphno" id="uphno" placeholder="Den Mobil" class="txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_50p black_txt">
														
													</div>
												</div>
												
												<div class="on_clmn mart20">
													
												<textarea name="info" id="info" placeholder="Describe" class="pad20  black_txt hei_80p wi_100 mart5 rbrdr pad103e6 nobrdt white_bg "> </textarea></div>
												
												<div class="on_clmn mart20">
													<div class="thr_clmn wi_30">
														
														
														<div class="pos_rel">
															<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
															<select id="travel_info" name="travel_info" class="txtind25 white_bg default_view rbrdr wi_100 mart5 pad10 hei_50p black_txt">
																<option value="Current" selected="" class="lgtgrey2_bg">Hen finns på</option>
																<option value="Headed to..." class="lgtgrey2_bg">Hen ska till...</option>
																
																
															</select>
														</div>
													</div>
													<div class="thr_clmn padl10 wi_70">
														
														<div class="pos_rel" id="locationField">
															<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
															<input type="text" name="adrs" id="autocomplete" onfocus="geolocate()" placeholder="Adress" class="txtind25 wi_100 rbrdr pad10 mart5 white_bg hei_50p black_txt" autocomplete="off">
														</div>
														
													</div>
												</div>
												<div class="clear"></div>
											</div>
											
											
											<table id="address" class="hide">
												<tbody><tr>
													<td class="label">Street address</td>
													<td class="slimField"><input class="field" id="street_number" disabled="true"></td>
													<td class="wideField" colspan="2"><input class="field" id="route" disabled="true"></td>
												</tr>
												<tr class="odd">
													<td class="label">City</td>
													<!-- Note: Selection of address components in this example is typical.
														You may need to adjust it for the locations relevant to your app. See
														https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
													-->
													<td class="wideField" colspan="3"><input class="field" id="locality" disabled="true"></td>
												</tr>
												<tr>
													<td class="label">State</td>
													<td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true"></td>
													<td class="label">Zip code</td>
													<td class="wideField"><input class="field" id="postal_code" disabled="true"></td>
												</tr>
												<tr class="odd">
													<td class="label">Country</td>
													<td class="wideField" colspan="3"><input class="field" id="country" disabled="true"></td>
												</tr>
												</tbody></table>
												
												<div class="clear"></div>
												
										</div>
										<div class="talc padrbl20"> <a href="#" class="" data-target="#gratis_popup_login"><input type="button" value="Meddela vänner/anhöriga" class="nobrd wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" data-target="#gratis_popup_login" onclick="checkData();"></a>
										<input type="hidden" name="login"> </div>
									</form>
									
									
								</div>
								<div class="wi_60 xs-wi_100 fxshrink_0 order_1 xs-order_2 martb20 marr30 xs-marr0 talc padr40 xs-padr0">
									<h4 class="bold fsz40 padb10 tall hidden-xs"><a href="javascript:void(0);" class="show_popup_modal" data-target="#gratis_popup_ff">SOS</a> <span class="fa fa-heart red_txt"></span> Family & <a href="#" class="show_popup_modal" data-target="#gratis_popup_user_profile" onclick="makeActive();">Friends</a></h4>
									<h3 class="fsz18 padb20 tall hidden-xs">Mayday -<a href="javascript:void(0);" class="show_popup_modal" data-target="#gratis_popup_sos"> Notify Family & Friends</a></h3>
									<ul class="mart10 pad0 tall">
										
										
										<li class="dblock mar0 marb10 pad0">
											<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Vad gör man vid en svår olycka
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Om du har hittat en person som ligger medvetslös skall du ALLTID i första hand larma 112. De har alla kunskaper och kan guida dig i vad du kan göra och säga under en akut situation. </p><p>
												Men när du lämnat över till utbildad personal, hjälp då med det som verkligen betyder något för personen och alla i dennes närhet. </p><p>Skicka ett meddelande till hens närmaste och berätta vad som har hänt. I och med detta ger du den drabbade och dennes anhöriga chansen att få finnas där för varandra när man behöver det som mest.  </p>
												<!--<p><strong class="uppercase">TIPS:</strong> En tumregel är att inte ansöka om lån som överstiger 90% av din årsinkomst.</p>-->
											</div>
										</li>
										<li class="dblock mar0 marb10 pad0">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför välja "ID Typ" och "Land"...
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Om olyckan skulle vara framme eller något akut har inträffat som gör att du behöver nås snabbt blir du meddelad tack vare att du är ansluten. Brinner det i din fastighet? Behöver skolan stängas för dagen?  </p>
												
												<p>Måste din arbetsgivare få ut ett meddelande till dig och alla dina kollegor, snabbt? Du blir direkt meddelad tack vare att ni är anslutna! </p>
											</div>
										</li>
										
										<li class="dblock mar0 marb10 pad0">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför fylla i "Person nummer"....
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Dina Qloud ID anslutningar ger dig tillgång till alla de erbjudanden och förmåner som du ska ha tillgång till. Du når studentrabatter, erbjudanden från din fastighetsägare och förmåner från din arbetsgivare. </p>
											</div>
										</li>
										<li class="dblock mar0 marb10 pad0 last">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför skriva en kort "Beskrivning"...
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Du når dina kollegor, elever som går på din skola eller boende i din fastighet via era privata ”nätverk” i Qloud ID. </p>
												
												<p>Skapa ett trivsammare miljöer genom att samverka och ta hjälp av varandra. Det är ovärderligt att ha folk som hjälper till när det behövs. </p>
												<p>Att få hjälp då man är bortrest eller att kunna utbyta kunskap med de som går på samma skola eller arbetar på samma arbetsplats.  </p>
											</div>
										</li>
										<li class="dblock mar0 marb10 pad0 last">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför skriva ner "Adress"...
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Du når dina kollegor, elever som går på din skola eller boende i din fastighet via era privata ”nätverk” i Qloud ID. </p>
												
												<p>Skapa ett trivsammare miljöer genom att samverka och ta hjälp av varandra. Det är ovärderligt att ha folk som hjälper till när det behövs. </p>
												<p>Att få hjälp då man är bortrest eller att kunna utbyta kunskap med de som går på samma skola eller arbetar på samma arbetsplats.  </p>
											</div>
										</li>
									</ul>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 hidden" onclick="checkFlag();">
					<div class="padrl10 white_bg xs-padrl15">
						<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart40 xs-mart0">
							<div class="dflex xs-fxwrap_w alit_c">
								<div class="brdb_b  visible-xs visible-sm">
									<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">NOTIFY <span class="fa fa-heart red_txt"></span> Family & Friends</h4>
									<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
								</div>
								<div class="wi_40 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall martb20 marr30 xs-marr0 talc padr40 xs-padr0 lgtgrey2_bg ">
									
									
									<form action="#" method="POST" >
										<div class="marb20 padtrl20">
											
											
											<div class="on_clmn padtb0">
												
												<div class="on_clmn ">
													<div class="thr_clmn wi_50">
														
														<div class="pos_rel">
															<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
															
															
															<select  class="default_view txtind25  wi_100 mart5 pad10  rbrdr hei_50p  black_txt white_bg">
																
																
															</select>
														</div>
													</div>
													<div class="thr_clmn padl10 wi_50">
														
														<div class="pos_rel">
															<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
															<select  class="txtind25 default_view wi_100 mart5 rbrdr pad10  white_bg hei_50p black_txt">
																
																<?php  foreach($resultContry as $category => $value) 
																	{
																		$category = htmlspecialchars($category); 
																	?>
																	
																	<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
																<?php 	}	?>
																
															</select>
														</div>
													</div>
												</div>
												
												
												
												
												
												<div class="on_clmn mart20" id="ussn" style="display:block;">
													
													<div class="pos_rel">
														<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
														<input type="text"  placeholder="Den skadades person nr." class="txtind25 wi_100 rbrdr pad10 mart5 white_bg hei_50p black_txt">
														
													</div>
												</div>
												
												<div class="on_clmn mart20" id="uphn" style="display:none;">
													<label class="marb5">Phone number</label>
													<div class="pos_rel">
														<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
														<input type="text"  placeholder="Den Mobil" class="txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_50p black_txt">
														
													</div>
												</div>
												
												<div class="on_clmn mart20">
													
												<textarea  placeholder="Describe" class="pad20  black_txt hei_80p wi_100 mart5 rbrdr pad103e6 nobrdt white_bg "> </textarea></div>
												
												
												<div class="clear"></div>
											</div>
											
											
											<div class="clear"></div>
											
										</div>
										
									</form>
									
									
								</div>
								<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 mart10 brdrad5">
									<h4 class="bold fsz40 padb10 tall hidden-xs">SOS <span class="fa fa-heart red_txt"></span> Family & Friends</h4>
									<h3 class="fsz18 padb20 tall hidden-xs">Mayday - Notify Family & Friends</h3>
									<ul class="mart10 pad0 tall">
										
										
										<li class="dblock mar0 marb10 pad0">
											<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Vad gör man vid en svår olycka
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Om du har hittat en person som ligger medvetslös skall du ALLTID i första hand larma 112. De har alla kunskaper och kan guida dig i vad du kan göra och säga under en akut situation. </p><p>
												Men när du lämnat över till utbildad personal, hjälp då med det som verkligen betyder något för personen och alla i dennes närhet. </p><p>Skicka ett meddelande till hens närmaste och berätta vad som har hänt. I och med detta ger du den drabbade och dennes anhöriga chansen att få finnas där för varandra när man behöver det som mest.  </p>
												<!--<p><strong class="uppercase">TIPS:</strong> En tumregel är att inte ansöka om lån som överstiger 90% av din årsinkomst.</p>-->
											</div>
										</li>
										<li class="dblock mar0 marb10 pad0">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför välja "ID Typ" och "Land"...
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Om olyckan skulle vara framme eller något akut har inträffat som gör att du behöver nås snabbt blir du meddelad tack vare att du är ansluten. Brinner det i din fastighet? Behöver skolan stängas för dagen?  </p>
												
												<p>Måste din arbetsgivare få ut ett meddelande till dig och alla dina kollegor, snabbt? Du blir direkt meddelad tack vare att ni är anslutna! </p>
											</div>
										</li>
										
										<li class="dblock mar0 marb10 pad0">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför fylla i "Person nummer"....
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Dina Qloud ID anslutningar ger dig tillgång till alla de erbjudanden och förmåner som du ska ha tillgång till. Du når studentrabatter, erbjudanden från din fastighetsägare och förmåner från din arbetsgivare. </p>
											</div>
										</li>
										<li class="dblock mar0 marb10 pad0 last">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför skriva en kort "Beskrivning"...
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Du når dina kollegor, elever som går på din skola eller boende i din fastighet via era privata ”nätverk” i Qloud ID. </p>
												
												<p>Skapa ett trivsammare miljöer genom att samverka och ta hjälp av varandra. Det är ovärderligt att ha folk som hjälper till när det behövs. </p>
												<p>Att få hjälp då man är bortrest eller att kunna utbyta kunskap med de som går på samma skola eller arbetar på samma arbetsplats.  </p>
											</div>
										</li>
										<li class="dblock mar0 marb10 pad0 last">
											<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
												<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
												<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
												Varför skriva ner "Adress"...
											</a>
											<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
												<p>Du når dina kollegor, elever som går på din skola eller boende i din fastighet via era privata ”nätverk” i Qloud ID. </p>
												
												<p>Skapa ett trivsammare miljöer genom att samverka och ta hjälp av varandra. Det är ovärderligt att ha folk som hjälper till när det behövs. </p>
												<p>Att få hjälp då man är bortrest eller att kunna utbyta kunskap med de som går på samma skola eller arbetar på samma arbetsplats.  </p>
											</div>
										</li>
									</ul>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				<div class="column_m mart40 padb30 fsz14 xs-mart20">
					<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
				</div>
				<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect  brdrad5"  id="gratis_popup_connect">
					<div class="modal-content pad25  brdrad5 ">
						<div id="connect_id">
							
							
						</div>
					</div>
					
				</div>
				<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
					<div class="modal-content pad25 brdrad5 ">
						<div class="padb5 ">
							<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F </h1>
							<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
						</div>
						<div class="lgtgrey2_bg">
							<h3 class="pos_rel marb0 padrl25 padtb10 fsz20 dark_grey_txt lgtgrey2_bg">
								Ett engångslösenord är skickad
								
							</h3>
							<form method="POST" action="InformRelatives/sendEmail" id="save_indexing_email" name="save_indexing_email" accept-charset="ISO-8859-1">
								
								
								<div class="pad15 lgtgrey2_bg">
									<label class="marb5  padl10 padb10">Lösenord</label>
									<div class="pos_rel padrl10">
										<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
										<input type="text" name="otp" id="otp" placeholder="Fyll i lösenordet" max="9999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
										
									</div>
								</div>
								<div class="red_bg" id="error_msg_opt">
									
									
								</div>
							</form>
						</div>
						<div class="mart20 talc">
							<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
							<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp" onclick="checkOtp();">
							<input type="hidden" id="infor_id" name="infor_id" />
						</div>
					</div>
				</div>
				
				
				<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_sos">
					<div class="modal-content pad25 brdrad5 ">
						<div class="padb5 ">
							<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F </h1>
							<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
						</div>
						<div class="lgtgrey2_bg">
							
							<form method="POST" accept-charset="ISO-8859-1">
								
								
								<div class="pad15 lgtgrey2_bg">
									<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="wi_33">
												
												<label class="marb5  padl10 padb10">ID</label>
												<div class="pos_rel padr10">
													
													<select  class="default_view   wi_100 mart5 pad10  rbrdr hei_40p  black_txt white_bg">
														<option value="1" selected="" class=" ">Person nr.</option>
														
														<option value="2" class="lgtgrey2_bg ">Mobil</option>
														
													</select>
													
												</div>
											</div>
											
											<div class="wi_66">
												
												
												<label class="marb5  padl10 padb10">Country</label>
												<div class="pos_rel padr0">
													
													<select class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>	
													
												</div>
												
											</div>
										</div>
										
									</div>
								</div>
								<div class="padrbl15 lgtgrey2_bg">
									<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="wi_33">
												<label class="marb5  padl10 padb10">Location</label>
												<div class="pos_rel padr10">
													
													<select class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
														
														<option value="Current" selected="" class="lgtgrey2_bg">Hen finns på</option>
														<option value="Headed to..." class="lgtgrey2_bg">Hen ska till...</option>
														
													</select>	
												</div>	
											</div>
											<div class="wi_66">
												<label class="marb5  padl10 padb10">Adress</label>
												<div class="pos_rel padr0">
													
													<input type="text" name="pno" id="pno" placeholder="adress"  class="wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" />
													
												</div>
											</div>
										</div>
										
									</div>
								</div>
								
								
							</form>
						</div>
						<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart15"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2">Signera med Mobilt BankId</a> 
							
						</div>
					</div>
				</div>
				
				
				<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_ff">
					<div class="modal-content pad25 brdrad5 ">
						<div class="padb5 ">
							<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F </h1>
							<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
						</div>
						<div class="lgtgrey2_bg">
							
							<form method="POST" accept-charset="ISO-8859-1">
								
								<div class="pad15 lgtgrey2_bg">
									<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
										<div class="dflex xs-fxwrap_w alit_c">
											<div class="wi_33">
												<label class="marb5  padl10 padb10">Country</label>
												<div class="pos_rel padr10">
													
													<select class="default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>	
													
												</div>
											</div>
											<div class="wi_66">
												<label class="marb5  padl10 padb10">Phone number</label>
												<div class="pos_rel padr0">
													
													
													<input type="text"  placeholder="Phone number"  class="wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" />
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
								
								
							</form>
						</div>
						<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart15"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2">Signera med Mobilt BankId</a> 
							
						</div>
					</div>
				</div>
				
				<div class="popup_modal wi_350p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top50p xxs-top0 right195 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc active" id="gratis_popup_user_profile">
					
					<div id="search_user_profile">
						
						<div class="popup-content"><div>
							<div class="padb10 xxs-pad0 xxs-padb80 white_bg">
								<div class="xxs-mar0 padtrl20 xxs-pad0  xxs-bxsh_none bluenew_bg"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035"><div class="hei_125p dnone xxs-dblock padt20 bg_31932c"><div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="close_popup_modal wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a><div class="minwi_0 flex_1 talc"><div class="ovfl_hid ws_now txtovfl_el fsz18">We are looking for a very good web developer to do random tasks</div><div class="fsz16">1 of 8 Best Match</div></div><div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div><div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>Best match</div></div><div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50 padr15 xxs-pad0 xxs-marb5 "><img src="../../html/usercontent/images/appreciation_2.png" width="100" height="100" class="dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brd brdwi_5 brdclr_f dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brdrad5 white_bg" title="Sushil Jain" alt="Sushil Jain"></div><div class="flex_1 xxs-dflex xxs-fxdir_col xxs-padrl20 xxs-talc"><div class="dflex xxs-dblock xxs-order_1 alit_fs justc_sb padb0 xxs-pad0"><h3 class="mar0 marb0 xxs-mar0 pad0 bold fsz22 white_txt">Notify Family & Friends</h3></div><div class="xxs-order_3 marb10 xxs-marb5 lgn_hight_24 xxs-bold fsz15 xxs-fsz26 white_txt">Tacksamheten känner inga gränser</div><div class="dnone xxs-dblock xxs-order_4 marb15 uppercase txt_14bff5"><span class="fa fa-star"></span> Rising talent</div>
								<div class="dnone xxs-dblock xxs-order_6 mart20 padtb15 brdt txt_8e"><span class="marrl5"><span class="bold txt_0">0</span> jobs</span><span class="marrl5"><span class="bold txt_0">0</span> hours</span></div></div></div></div>
								
								<div class="marb20 padrbl20 white_bg first">
									
									
									<div class="on_clmn padtb0">
										
										<div class="on_clmn mart20">
											
											<div class="pos_rel">
												
												<input type="text" name="ssecurity1" id="ssecurity1" placeholder="Den skadades person nr." class="wi_100 rbrdr pad10 mart5 white_bg hei_50p llgrey_txt brdb_new fsz18">
												<h2 id="country_in_popup" class="nobrd wi_100 maxwi_500p padb0 mart10 marl10 dflex opa90_h brdrad3 trans_bg fsz16 xs-fsz16 blue_txt trans_all2" >Utf&auml;rdat land : <select name="ccountry" id="ccountry" class="wi_40 default_view rbrdr pad0 mart-3 white_bg hei_30p llgrey_txt fsz18" >
													
													<?php  foreach($resultContry as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> ><?php echo $value['country_name']; ?></option>
													<?php 	}	?>
													
												</select>	 </h2>
											</div>
										</div>
										
										
										<div class="on_clmn mart20">
											
											
											
											<div class="pos_rel" id="locationField1">
												
												<input type="text" name="adrs1" id="autocomplete1" onfocus="geolocate()" placeholder="Finns p&aring; adress" class="wi_100 rbrdr pad10 mart5 white_bg fsz18 hei_50p llgrey_txt brdb_new" autocomplete="off">
											</div>
											
											
										</div>
										
										<div class="on_clmn mart20">
											
										<input type="text" name="info_msg" id="info_msg" placeholder="Meddelande" class="wi_100 rbrdr pad10 mart5 white_bg hei_50p llgrey_txt brdb_new fsz18" /> </div>
										
										<div class="on_clmn martb20">
											
											<input type="text" name="prnumber" id="prnumber" placeholder="Your personal number" class="wi_100 rbrdr pad10 mart5 white_bg hei_50p llgrey_txt brdb_new fsz18" />
											
											<div id="errorMsg" class="red_txt fsz20"></div>
											<div id="cinMsg" class="blue_txt fsz20"></div>
										</div>
										
										
										<div class="clear"></div>
									</div>
									
									
									
									
									<div class="clear"></div>
									<a href="#" class="blue_txt" onclick="toggleView();"><h2 class="blue_txt fsz16" >Dont have BankID</h2></a>
								</div>
								
								<div class="marb20 padrbl20 white_bg second" style="display:none;">
									
									<form method="POST" accept-charset="ISO-8859-1">
										
										
										<div class="on_clmn padtb0">
											
											<div class="on_clmn mart20">
												
												
												
												
												
												<select  class="default_view   wi_100 mart5 pad10  rbrdr hei_40p  black_txt white_bg">
													<option value="1" selected="" class=" ">Person nr.</option>
													
													<option value="2" class="lgtgrey2_bg ">Mobil</option>
													
												</select>
												
												
											</div>
											<div class="on_clmn mart20">
												
												
												
												<select class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
													
													<?php  foreach($resultContry as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
													<?php 	}	?>
													
												</select>	
												
												
												
											</div>
											
											
											<div class="on_clmn mart20">
												
												
												
												
												<select class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
													
													<option value="Current" selected="" class="lgtgrey2_bg">Hen finns på</option>
													<option value="Headed to..." class="lgtgrey2_bg">Hen ska till...</option>
													
												</select>	
												
												
											</div>
											<div class="on_clmn mart20">
												
												
												
												
												<input type="text" name="pno" id="pno" placeholder="adress"  class="wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" />
												
												
												
											</div>
										</div>
										
										
									</form>
								</div>
								
								
							<div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">Skills</h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">jQuery</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">HTML5</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">CSS3</span><span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">PHP</span></div></div><div class=" xxs-mart15 xxs-marrl10  bg_f dnone xxs-dblock"><h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10"> </h3><div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14"></div></div></div>
							
							
							<div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot20p right195 bs_bb pad10 white_bg"><div class="dflex talc bold">
								<div class="wi_100 padrl30" id="submit_button_in_popup"><a href="#" class="wi_100 hei_50p dblock brdrad3 panlyellow_bg fsz18  lgn_hight_50 black_txt" onclick="checkBankid();">Meddela</a></div>
							</div></div>
							
							
							
						</div></div>
					</div>
					
					
				</div>
				
				
			</div>
			
			<div class="clear"></div>
			<script type="text/javascript" src="../../html/usercontent/js/jquery-ui.min.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/vex.combined.min.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/superfish.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/icheck.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/jquery.selectric.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/tinymce/tinymce.min.js"></script>
			<script type="text/javascript" src="../../html/usercontent/modules.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/custom.js"></script>
			
			
			
		</body>
	</html>																	