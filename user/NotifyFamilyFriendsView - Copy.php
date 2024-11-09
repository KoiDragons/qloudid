<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
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
			function checkData()
			{
				if($("#ssecurity1").val()=="")
				{
					$("#error_msg_form").html('Fyll i ditt person nr.!!');
					
					return false;
				}
				if($('#info_msg').val().trim().length == 0)
				{
					$("#error_msg_form").html('Skriv en kort beskrivning!!');
					
					return false;
				}
				
				var send_data={};
				
				send_data.cntry=$("#ccountry").val();
				send_data.info=$("#info_msg").val();
				send_data.adrs=$("#autocomplete").val();
				send_data.ssecurity=$("#ssecurity1").val();
				send_data.street_number=$("#street_number").val();
				send_data.route=$("#route").val();
				send_data.locality=$("#locality").val();
				send_data.administrative_area_level_1=$("#administrative_area_level_1").val();
				send_data.postal_code=$("#postal_code").val();
				send_data.country=$("#country").val();
				$.ajax({
					type:"POST",
					url:"NotifyFamilyFriends/createPopup",
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
								url:"NotifyFamilyFriends/sendOtp",
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
					url:"NotifyFamilyFriends/verifyOtp",
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
					
							window.location.href ="https://www.safeqloud.com/user/index.php/NotifyFamilyFriends";
						}
					}
				});
				
			}
			
			
			
			
			
			function checkBankid()
			{
				//Clear previous message, if any
				$("#error_msg_form").html('');
				$("#cinMsg").html('');
				
				if($("#ssecurity1").val()=="" || $("#ssecurity1").val()==null)
				{
					$("#error_msg_form").html('Social security number can not be blank');
					return false;
					
				}
				
				
				
				var send_ssn={};
				send_ssn.ssecurity1=$("#ssecurity1").val();
				
				$.ajax({
					type:"POST",
					url:"NotifyFamilyFriends/checkUserAvailability",
					data:send_ssn,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==0)
						{
							$("#error_msg_form").html('This person does not exist in our system');
							return false;
						}
						else 
						{
							send_data1.user_id=data1;
							
						}
					}
				});
				
				if($("#autocomplete").val()=="" || $("#autocomplete").val()==null)
				{
					$("#error_msg_form").html('Address can not be blank');
					return false;
					
				}
				
				if($("#info_msg").val()=="" || $("#info_msg").val()==null)
				{
					$("#error_msg_form").html('Message can not be blank');
					return false;
					
				}
				
				if($("#prnumber").val()=="")
				{
					$("#error_msg_form").html('Personal number can not be blank');
					return false;
				}
				if(isNaN($("#prnumber").val())) 
				{
					$("#error_msg_form").html('Personal number must be a numeric value');
					return false;
				}
				if($("#prnumber").val().length < 12 || $("#prnumber").val().length > 12) 
				{
					$("#error_msg_form").html('Personal number must be 12 digit numeric value');
					return false;
				}
				// after clicking the submit button, hide all form fields
				$("#ssecurity1").hide();
				$("#prnumber").hide();
				$("#country_in_popup").hide();
				$("#autocomplete").hide();
				$("#info_msg").hide();
				$("#prnumber").hide();
				$("#submit_button_in_popup").hide();
				$("#loginBank").hide();
				$("#headerData").hide();
				$("#loginBankMsg").attr('style','display:block');
				
				//$("#bodyBg").removeClass('yellownew_bg');
				//$("#bodyBg").addClass('white_bg');
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
								$("#loginBankMsg").attr('style','display:none');
								$("#loginFailMsg").attr('style','display:block');
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
								url:"NotifyFamilyFriends/informRelativesPerson",
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
										$("#cinMsg").html("Dina registrerade anhöriga är meddelade.");
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
					
					
					
					// When the user selects an address from the dropdown, populate the address
					// fields in the form.
					autocomplete.addListener('place_changed', fillInAddress);
					
					
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
				
				
				
				
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				
				gtag('config', 'UA-126618362-1');
				
				function changeClass(link)
				{
					
					$(".class-toggler").removeClass('active');
					
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
			<div class="sharethis-inline-share-buttons"></div>
			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
			
		</head>
		
		<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" id="bodyBg"><div class="sharethis-inline-share-buttons"></div>
			
				<div class="column_m header  bs_bb white_bg" id="headerData">
			<div class="wi_100 hei_65p xs-pos_fix pos_fix  padtb5 padrl10 white_bg">
				
				<div class="logo  marr15 wi_140p xs-wi_80p">
						<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 " style="width: 50px; padding : 5px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
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
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
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
					
				<div class="hidden-xs hidden-sm fleft padl20 padr10 brdl">
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
													<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
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
				
				<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20"> <a href="https://www.safeqloud.com" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg uppercase lgn_hight_30 white_txt  white_txt_h  brdl" data-en="Close" data-sw="Close">Close</a> </li>
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 "> <a href="#"  class="translate hei_30pi dblock padrl20   lgn_hight_30 black_txt show_popup_modal   " data-target="#om_mina" data-en="Om mina uppgifter" data-sw="Om mina uppgifter">Om mina uppgifter</a> </li>
					</ul>
				</div>
				
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.safeqloud.com" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
			
			
			
		
				<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart65 mart95 marb0" id="loginBankMsg" style="display:none;">
			<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
						
						<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
							<div class="padb10 padt20">
									<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="errorMsg"></h1>
									<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="cinMsg"></h1>
									
								</div>
						
					
					</div><div class="clear"></div>
			
			
			
												</div>
												</div>
												
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart65 mart95 marb0" id="loginFailMsg" style="display:none;">
			<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
						
						<div class="talc fsz75 red_txt"> <img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
							<div class="padb10 padt20">
									<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" >Internt tekniskt fel. Försök igen.</h1>
									
									
								</div>
						
						<div class="mart20 talc">
					<a href="https://www.safeqloud.com/user/index.php/NotifyFamilyFriends">	<input type="button" value="Pröva igen" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" ></a>
						
					</div>
					</div><div class="clear"></div>
			
			
			
												</div>
												</div>		
			
			<div class="clear"></div>
			
			<!-- LOGIN FORM -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart0 mart30 marb0" id="loginBank" onclick="checkFlag();">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100   xs-nobrdb">
						<div class="dflex xs-fxwrap_w alit_c">
							
							
							<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc padl50 xs-padl0 xs-mart0">
								
								
								<div class="padb0 xxs-pad0 ">
								<div class="visible-xs visible-sm talc">
									<img src="https://www.safeqloud.com/html/omworkplace/images/random/undraw_gradma_wanr.png" class="wi_75 ">	
								</div>	
								<h4 class="bold fsz40 padb10 tall xs-fsz35 xs-talc ">Meddela anhöriga...</h4>
									<h3 class="fsz25 xs-fsz20 padb10 padt10 xs-padt0 brdb_new tall  lgn_hight_30 xs-talc">Gratis tjänst till anhöriga</h3>
									
									<div class="marb0 padrl0 first">
										
										
										<div class="on_clmn padtb0">
											
											<div class="on_clmn mart20">
												
												<div class="pos_rel">
													
													<h2 id="country_in_popup" class="nobrd wi_100 maxwi_500p padb0 mart10 marl0 dflex opa90_h brdrad3 trans_bg fsz16 xs-fsz16 black_txt trans_all2 ">Utfärdat land : <select name="ccountry" id="ccountry" class="wi_30 default_view rbrdr pad0 mart-3 hei_30p black_txt fsz16">
														
														
														<option value="Afghanistan">Afghanistan</option>
														
														<option value="Albania">Albania</option>
														
														<option value="Algeria">Algeria</option>
														
														<option value="American Samoa">American Samoa</option>
														
														<option value="Andorra">Andorra</option>
														
														<option value="Angola">Angola</option>
														
														<option value="Anguilla">Anguilla</option>
														
														<option value="Antarctica">Antarctica</option>
														
														<option value="Antigua and Barbuda">Antigua and Barbuda</option>
														
														<option value="Argentina">Argentina</option>
														
														<option value="Armenia">Armenia</option>
														
														<option value="Aruba">Aruba</option>
														
														<option value="Australia">Australia</option>
														
														<option value="Austria">Austria</option>
														
														<option value="Azerbaijan">Azerbaijan</option>
														
														<option value="Bahamas">Bahamas</option>
														
														<option value="Bahrain">Bahrain</option>
														
														<option value="Bangladesh">Bangladesh</option>
														
														<option value="Barbados">Barbados</option>
														
														<option value="Belarus">Belarus</option>
														
														<option value="Belgium">Belgium</option>
														
														<option value="Belize">Belize</option>
														
														<option value="Benin">Benin</option>
														
														<option value="Bermuda">Bermuda</option>
														
														<option value="Bhutan">Bhutan</option>
														
														<option value="Bolivia">Bolivia</option>
														
														<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
														
														<option value="Botswana">Botswana</option>
														
														<option value="Bouvet Island">Bouvet Island</option>
														
														<option value="Brazil">Brazil</option>
														
														<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
														
														<option value="Brunei">Brunei</option>
														
														<option value="Bulgaria">Bulgaria</option>
														
														<option value="Burkina Faso">Burkina Faso</option>
														
														<option value="Burundi">Burundi</option>
														
														<option value="CÃƒÂ´te dÃ¢â‚¬â„¢Ivoire">CÃƒÂ´te dÃ¢â‚¬â„¢Ivoire</option>
														
														<option value="Cambodia">Cambodia</option>
														
														<option value="Cameroon">Cameroon</option>
														
														<option value="Canada">Canada</option>
														
														<option value="Cape Verde">Cape Verde</option>
														
														<option value="Cayman Islands">Cayman Islands</option>
														
														<option value="Central African Republic">Central African Republic</option>
														
														<option value="Chad">Chad</option>
														
														<option value="Chile">Chile</option>
														
														<option value="China">China</option>
														
														<option value="Christmas Island">Christmas Island</option>
														
														<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
														
														<option value="Colombia">Colombia</option>
														
														<option value="Comoros">Comoros</option>
														
														<option value="Congo">Congo</option>
														
														<option value="Congo, The Democratic Republic">Congo, The Democratic Republic</option>
														
														<option value="Cook Islands">Cook Islands</option>
														
														<option value="Costa Rica">Costa Rica</option>
														
														<option value="Croatia">Croatia</option>
														
														<option value="Cuba">Cuba</option>
														
														<option value="Cyprus">Cyprus</option>
														
														<option value="Czech Republic">Czech Republic</option>
														
														<option value="Denmark">Denmark</option>
														
														<option value="Djibouti">Djibouti</option>
														
														<option value="Dominica">Dominica</option>
														
														<option value="Dominican Republic">Dominican Republic</option>
														
														<option value="East Timor">East Timor</option>
														
														<option value="Ecuador">Ecuador</option>
														
														<option value="Egypt">Egypt</option>
														
														<option value="El Salvador">El Salvador</option>
														
														<option value="Equatorial Guinea">Equatorial Guinea</option>
														
														<option value="Eritrea">Eritrea</option>
														
														<option value="Estonia">Estonia</option>
														
														<option value="Ethiopia">Ethiopia</option>
														
														<option value="Falkland Islands">Falkland Islands</option>
														
														<option value="Faroe Islands">Faroe Islands</option>
														
														<option value="Fiji Islands">Fiji Islands</option>
														
														<option value="Finland">Finland</option>
														
														<option value="France">France</option>
														
														<option value="French Guiana">French Guiana</option>
														
														<option value="French Polynesia">French Polynesia</option>
														
														<option value="French Southern territories">French Southern territories</option>
														
														<option value="Gabon">Gabon</option>
														
														<option value="Gambia">Gambia</option>
														
														<option value="Georgia">Georgia</option>
														
														<option value="Germany">Germany</option>
														
														<option value="Ghana">Ghana</option>
														
														<option value="Gibraltar">Gibraltar</option>
														
														<option value="Greece">Greece</option>
														
														<option value="Greenland">Greenland</option>
														
														<option value="Grenada">Grenada</option>
														
														<option value="Guadeloupe">Guadeloupe</option>
														
														<option value="Guam">Guam</option>
														
														<option value="Guatemala">Guatemala</option>
														
														<option value="Guinea">Guinea</option>
														
														<option value="Guinea-Bissau">Guinea-Bissau</option>
														
														<option value="Guyana">Guyana</option>
														
														<option value="Haiti">Haiti</option>
														
														<option value="Heard Island and McDonald Isla">Heard Island and McDonald Isla</option>
														
														<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
														
														<option value="Honduras">Honduras</option>
														
														<option value="Hong Kong">Hong Kong</option>
														
														<option value="Hungary">Hungary</option>
														
														<option value="Iceland">Iceland</option>
														
														<option value="India">India</option>
														
														<option value="Indonesia">Indonesia</option>
														
														<option value="Iran">Iran</option>
														
														<option value="Iraq">Iraq</option>
														
														<option value="Ireland">Ireland</option>
														
														<option value="Israel">Israel</option>
														
														<option value="Italy">Italy</option>
														
														<option value="Jamaica">Jamaica</option>
														
														<option value="Japan">Japan</option>
														
														<option value="Jordan">Jordan</option>
														
														<option value="Kazakstan">Kazakstan</option>
														
														<option value="Kenya">Kenya</option>
														
														<option value="Kiribati">Kiribati</option>
														
														<option value="Kuwait">Kuwait</option>
														
														<option value="Kyrgyzstan">Kyrgyzstan</option>
														
														<option value="Laos">Laos</option>
														
														<option value="Latvia">Latvia</option>
														
														<option value="Lebanon">Lebanon</option>
														
														<option value="Lesotho">Lesotho</option>
														
														<option value="Liberia">Liberia</option>
														
														<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
														
														<option value="Liechtenstein">Liechtenstein</option>
														
														<option value="Lithuania">Lithuania</option>
														
														<option value="Luxembourg">Luxembourg</option>
														
														<option value="Macao">Macao</option>
														
														<option value="Macedonia">Macedonia</option>
														
														<option value="Madagascar">Madagascar</option>
														
														<option value="Malawi">Malawi</option>
														
														<option value="Malaysia">Malaysia</option>
														
														<option value="Maldives">Maldives</option>
														
														<option value="Mali">Mali</option>
														
														<option value="Malta">Malta</option>
														
														<option value="Marshall Islands">Marshall Islands</option>
														
														<option value="Martinique">Martinique</option>
														
														<option value="Mauritania">Mauritania</option>
														
														<option value="Mauritius">Mauritius</option>
														
														<option value="Mayotte">Mayotte</option>
														
														<option value="Mexico">Mexico</option>
														
														<option value="Micronesia, Federated States o">Micronesia, Federated States o</option>
														
														<option value="Moldova">Moldova</option>
														
														<option value="Monaco">Monaco</option>
														
														<option value="Mongolia">Mongolia</option>
														
														<option value="Montserrat">Montserrat</option>
														
														<option value="Morocco">Morocco</option>
														
														<option value="Mozambique">Mozambique</option>
														
														<option value="Myanmar">Myanmar</option>
														
														<option value="Namibia">Namibia</option>
														
														<option value="Nauru">Nauru</option>
														
														<option value="Nepal">Nepal</option>
														
														<option value="Netherlands">Netherlands</option>
														
														<option value="Netherlands Antilles">Netherlands Antilles</option>
														
														<option value="New Caledonia">New Caledonia</option>
														
														<option value="New Zealand">New Zealand</option>
														
														<option value="Nicaragua">Nicaragua</option>
														
														<option value="Niger">Niger</option>
														
														<option value="Nigeria">Nigeria</option>
														
														<option value="Niue">Niue</option>
														
														<option value="Norfolk Island">Norfolk Island</option>
														
														<option value="North Korea">North Korea</option>
														
														<option value="Northern Mariana Islands">Northern Mariana Islands</option>
														
														<option value="Norway">Norway</option>
														
														<option value="Oman">Oman</option>
														
														<option value="Pakistan">Pakistan</option>
														
														<option value="Palau">Palau</option>
														
														<option value="Palestine">Palestine</option>
														
														<option value="Panama">Panama</option>
														
														<option value="Papua New Guinea">Papua New Guinea</option>
														
														<option value="Paraguay">Paraguay</option>
														
														<option value="Peru">Peru</option>
														
														<option value="Philippines">Philippines</option>
														
														<option value="Pitcairn">Pitcairn</option>
														
														<option value="Poland">Poland</option>
														
														<option value="Portugal">Portugal</option>
														
														<option value="Puerto Rico">Puerto Rico</option>
														
														<option value="Qatar">Qatar</option>
														
														<option value="RÃƒÂ©union">RÃƒÂ©union</option>
														
														<option value="Romania">Romania</option>
														
														<option value="Russian Federation">Russian Federation</option>
														
														<option value="Rwanda">Rwanda</option>
														
														<option value="Saint Helena">Saint Helena</option>
														
														<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
														
														<option value="Saint Lucia">Saint Lucia</option>
														
														<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
														
														<option value="Saint Vincent and the Grenadin">Saint Vincent and the Grenadin</option>
														
														<option value="Samoa">Samoa</option>
														
														<option value="San Marino">San Marino</option>
														
														<option value="Sao Tome and Principe">Sao Tome and Principe</option>
														
														<option value="Saudi Arabia">Saudi Arabia</option>
														
														<option value="Senegal">Senegal</option>
														
														<option value="Seychelles">Seychelles</option>
														
														<option value="Sierra Leone">Sierra Leone</option>
														
														<option value="Singapore">Singapore</option>
														
														<option value="Slovakia">Slovakia</option>
														
														<option value="Slovenia">Slovenia</option>
														
														<option value="Solomon Islands">Solomon Islands</option>
														
														<option value="Somalia">Somalia</option>
														
														<option value="South Africa">South Africa</option>
														
														<option value="South Georgia and the South Sa">South Georgia and the South Sa</option>
														
														<option value="South Korea">South Korea</option>
														
														<option value="Spain">Spain</option>
														
														<option value="Sri Lanka">Sri Lanka</option>
														
														<option value="Sudan">Sudan</option>
														
														<option value="Suriname">Suriname</option>
														
														<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
														
														<option value="Swaziland">Swaziland</option>
														
														<option value="Sweden" selected="">Sweden</option>
														
														<option value="Switzerland">Switzerland</option>
														
														<option value="Syria">Syria</option>
														
														<option value="Taiwan">Taiwan</option>
														
														<option value="Tajikistan">Tajikistan</option>
														
														<option value="Tanzania">Tanzania</option>
														
														<option value="Thailand">Thailand</option>
														
														<option value="Togo">Togo</option>
														
														<option value="Tokelau">Tokelau</option>
														
														<option value="Tonga">Tonga</option>
														
														<option value="Trinidad and Tobago">Trinidad and Tobago</option>
														
														<option value="Tunisia">Tunisia</option>
														
														<option value="Turkey">Turkey</option>
														
														<option value="Turkmenistan">Turkmenistan</option>
														
														<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
														
														<option value="Tuvalu">Tuvalu</option>
														
														<option value="Uganda">Uganda</option>
														
														<option value="Ukraine">Ukraine</option>
														
														<option value="United Arab Emirates">United Arab Emirates</option>
														
														<option value="United Kingdom">United Kingdom</option>
														
														<option value="United States">United States</option>
														
														<option value="United States Minor Outlying I">United States Minor Outlying I</option>
														
														<option value="Uruguay">Uruguay</option>
														
														<option value="Uzbekistan">Uzbekistan</option>
														
														<option value="Vanuatu">Vanuatu</option>
														
														<option value="Venezuela">Venezuela</option>
														
														<option value="Vietnam">Vietnam</option>
														
														<option value="Virgin Islands, British">Virgin Islands, British</option>
														
														<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
														
														<option value="Wallis and Futuna">Wallis and Futuna</option>
														
														<option value="Western Sahara">Western Sahara</option>
														
														<option value="Yemen">Yemen</option>
														
														<option value="Yugoslavia">Yugoslavia</option>
														
														<option value="Zambia">Zambia</option>
														
														<option value="Zimbabwe">Zimbabwe</option>
														
													</select>	 </h2>
													<input type="text" name="ssecurity1" id="ssecurity1" placeholder="Den skadades person nr." class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
													
												</div>
											</div>
											
											
											<div class="on_clmn mart10">
												
												
												
												<div class="pos_rel" id="locationField1">
													
													
													<input type="text" name="adrs1" id="autocomplete" onfocus="geolocate()" placeholder="Finns på adress" class="wi_100 rbrdr pad10 mart5 fsz18 hei_50p llgrey_txt lgtgrey2_bg brdrad5" autocomplete="off">
												</div>
												
												<table id="address" class="hidden">
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
											</div>
											
											<div class="on_clmn mart10">
												
											<input type="text" name="info_msg" id="info_msg" placeholder="Meddelande" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5"> </div>
											
											<div class="on_clmn martb10">
												
												<input type="text" name="prnumber" id="prnumber" placeholder="Ditt personnummer" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
												
												
											</div>
											
											<div id="error_msg_form" class="red_txt"></div>
											<div class="clear"></div>
										</div>
										
										
										
										
										<div class="clear"></div>
										
										<div class="padb10 xs-padrl0" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="checkBankid();">Meddela med BankID</a> </div>
										
										<div class=" padb10 xs-padrl0 talc "> <a href="#" class="fsz16 black_txt " onclick="checkData();">Har inget BankID?</a></div>
										
									</div>
									
									
									
									
									
								</div>
								
								
							</div>
							<div class="wi_50 xs-wi_100 fxshrink_0 order_1 xs-order_2 martb20 marr30 xs-marr0 talc  xs-padr0">
								<img src="https://www.safeqloud.com/html/omworkplace/images/random/undraw_gradma_wanr.png" class="wi_100 hidden-xs">
								
								<h4 class="bold fsz25 padb10 tall">Hur det fungerar</h4>
								
								<ul class="mart10 padl20 tall">
									<li class="black_txt fsz16">Fyll i den skadades person nummer. Se till att det är rätt land</li>
									<li class="black_txt fsz16">Fyll i address var personen befinner sig.</li>
									<li class="black_txt fsz16">Skriv ett kort meddelande</li>
									<li class="black_txt fsz16">Fyll i ditt personnummer</li>
									<li class="black_txt fsz16">Klicka på meddela rutan</li>
								</ul>
								</div>
							
						</div>
					</div>
				</div>
				
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
					
			<h2 class="marb10 pad0 bold fsz24 black_txt talc">Slå in koden</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Låt oss fastställa din identitet. Vi har precis skickat ett text meddelande med en ny kod till telefon numret som slutar på *****<span id="lastPh"></span> </span>
				</div>
				
				
			</div>
			
							<form method="POST" action="InformRelatives/sendEmail" id="save_indexing_email" name="save_indexing_email" accept-charset="ISO-8859-1">
								
								
								<div class="padb0">
									
									<div class="pos_rel ">
										
										<input type="text" name="otp" id="otp" placeholder="Fyll i lösenordet" max="9999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
										
									</div>
								</div>
								<div class="red_bg" id="error_msg_opt">
									
									
								</div>
								
								
								
								
								
							</form>
						<div class="mart20 talc marb10">
				<input type="button" value="Signera och kom igång" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkOtp();">
					<input type="hidden" id="infor_id" name="infor_id" />
				
			</div>
			<div class="talc"> Inte fått något sms? Försök igen.</div>
						
					</div>
				</div>
				
			
			
		
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_send">
				<div class="modal-content pad25 brdrad5 ">
					<div class="padb5 ">
						<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F </h1>
						<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
					</div>
					<div class="lgtgrey2_bg">
						<h3 class="pos_rel marb0 padrl25 padtb10 fsz20 dark_grey_txt lgtgrey2_bg">
							Ett engångslösenord är skickad
							
						</h3>
						
						
						<div class="pad15 lgtgrey2_bg">
							<label class="marb5  padl10 padb10">Phone Number</label>
							<div class="pos_rel padrl10">
								<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
								<input type="text" name="phno" id="phno" placeholder="Phone number" max="9999999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
								
							</div>
						</div>
						<div class="red_bg" id="error_msg_phone">
							
							
						</div>
						
					</div>
					<div class="mart20 talc">
						<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
						<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp" onclick="submit_info();">
						
					</div>
				</div>
			</div>
			<div class="popup_modal wi_700p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="om_mina">
				<div class="modal-content pad25  nobrdb talc brdrad5 ">
					
					
					<h2 class="marb10 pad0 bold fsz24 black_txt">HANTERING AV PERSONUPPGIFTER</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla tall">
						
						
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Vi värnar om din integritet</span>
						</div>
						<ul class="mart10 pad0 tall fsz16">
									
									
									<li class="dblock mar0 marb10 pad0 first">
										<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											Hantering av personuppgifter
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>När du matar in ditt namn och telefonnummer i vårt besökssystem används uppgifterna för att informera den person du besöker per sms och/eller e-post via en extern tjänsteleverantör om din ankomst och lagras i syfte att kunna ta fram en utrymningslista i händelse av brand eller annan fara. Uppgifterna raderas automatiskt från besökssystemet efter 1 dygn men kan lagras under en längre tid hos våra externa tjänsteleverantörer för fakturerings- och statistikändamål.  </p>
											<p>Grunden för insamlingen är att det eter en intresseavvägning finns ett legitimt syfte med att samla in dina uppgifter för att kunna informera om ditt besök och veta vilka personer som vistas i våra lokaler. </p>
										</div>
									</li>
									<li class="dblock mar0 marb10 pad0 last">
										<a href="#" class="class-toggler dark_grey_txt " data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											Du äger din data
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Du kan så länge dina personuppgifter finns lagrade begära att få ut utdrag på uppgifterna eller få uppgifterna rättade eller raderade. Du har också rätt att klaga på behandlingen till tillsynsmyndigheten (i Sverige Datainspektionen). Dina personuppgifter kommer inte att lämnas ut till tredje part (utöver vad som angetts ovan), föras över till part i land utanför EU som inte är ”privacyshield”-certifierad eller behandlas för några andra ändamål än vad som angetts ovan. I fall där besöksmottagaren eller du som besökare har telefontjänster eller mailtjänster via leverantörer utanför EU kommer dock uppgifter om besöket aviseras via dessa leverantörer.   </p>
											
											
										</div>
									</li>
									
								</ul>
						
							<div class="wi_100 mart10 talc">
				<input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp ">
					
			</div>
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