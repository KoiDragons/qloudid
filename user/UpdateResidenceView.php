<!doctype html>
<html>
	
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
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
			
			var placeSearch, autocomplete;
			var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=40;
			var send_data1={};
			var componentForm = {
				street_number: 'short_name',
				route: 'long_name',
				locality: 'long_name',
				administrative_area_level_1: 'short_name',
				country: 'long_name',
				postal_code: 'short_name'
			};
			
			
			
			
		
			
			
			
			function checkFormData()
			{
				
				$("#error_msg_form").html('');
				
					var send_data={};
					send_data.cntry=$("#ccountry").val();
					send_data.ssn=$("#ssecurity").val();
					$.ajax({
						url: 'UpdateResidence/checkCountry',
						type: 'POST',
						dataType: 'json',
						data: send_data
					})
					.done(function(data){
						if(data==0)
						{
							$("#error_msg_form").html('Please select another country.');
							return false;
						}
						else
						{
								$("#popup_fade").addClass('active');
							$("#popup_fade").attr('style','display:block;');
							$("#gratis_popup_ssn").addClass('active');
							$("#gratis_popup_ssn").attr('style','display:block;');
								
								$("#loginBank").hide();
								$("#loginBankMsg").attr('style','display:block');
								$("#headerData").attr('style','display:none');
								var send_data={};
								send_data.prnumber=$("#ssecurity").val();
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
											return false;
										}
									}
								});
							
						}
					})
					.fail(function(){})
					.always(function(){});
					
				
			}
			
			function askAddress()
			{
				$("#userAddress").removeClass('hidden');
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
								return false;
							}
							else if(data2==2)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten. Försök igen.");
								return false;
							}
							else if(data2==3)
							{
								clearInterval(a);
								$("#errorMsg").html("BankID-appen verkar inte finnas i din dator eller telefon. Installera den och hämta ett BankID hos din internetbank. Installera appen från din appbutik eller https://install.bankid.com.");
								return false;
							}
							else if(data2==4)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten.");
								return false;
							}
							else if(timeout>tout)
							{
								clearInterval(a);
								$("#loginBankMsg").attr('style','display:none');
								$("#loginFailMsg").attr('style','display:block');
								return false;
							} 
							else 
							{
								$("#errorMsg").html(data2);
								return false;
							}
						}
						else 
						{
							$("#updateSecurity").val(0);
							$("#uphno").val('');
							$("#ssecurity").val('');
							document.getElementById("updateform").submit();
							
							
						}
						
					}
				});
				
			}
			
			function verifyUser()
			{
				
				$("#error_msg_form").html('');
				var send_data={};
					send_data.cntry=$("#ccountry").val();
					send_data.ssn=$("#ssecurity").val();
					$.ajax({
						url: 'UpdateResidence/checkCountry',
						type: 'POST',
						dataType: 'json',
						data: send_data
					})
					.done(function(data){
						if(data==0)
						{
							$("#error_msg_form").html('Please select another country.');
							return false;
						}
						else
						{
					var send_data={};
					send_data.countryname=$("#cntry").val();
					send_data.phoneno=$("#uphno").val();
					$.ajax({
						type:"POST",
						url:"UpdateResidence/verifyUserDetail",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							//alert(data1); return false;
							if(data1==0)
							{
								$("#error_msg_form").html('Please enter another/valid phone number');
							}
							else
							{
								var subst=$("#uphno").val().substr(-4);
								$("#popup_fade").addClass('active');
								$("#popup_fade").attr('style','display:block;');
								$("#gratis_popup_login").addClass('active');
								$("#gratis_popup_login").attr('style','display:block;');
								$("#infor_id").val(data1);
								$("#lastPh").html(subst);
							}
							
						}
					});
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
					url:"UpdateResidence/verifyOtp",
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
							$("#updateSecurity").val(0);
							$("#uphno").val('');
							$("#ssecurity").val('');
							document.getElementById("updateform").submit();
						}
					}
				});
				
			}
			
			
			
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
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
			</script>
			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				
				gtag('config', 'UA-126618362-1');
				
				
				function initMap(){
					var google_map = document.getElementById('gmap');
					if (google_map){
						var map_zoom = parseInt(google_map.getAttribute('data-zoom')),
						map_lat = parseFloat(google_map.getAttribute('data-lat')),
						map_lng = parseFloat(google_map.getAttribute('data-lng')),
						title = google_map.getAttribute('data-title');
						//content_info = google_map.getAttribute('data-content');
						
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
						
						/*
							var noPoi = [{
							featureType: "poi",
							stylers: [{
							visibility: "off"
							}]
							}];
							
							map.setOptions({
							styles: noPoi
							});
						*/
						if (title) {
							var marker = new google.maps.Marker({
								position: myLatLng,
								map: map,
								title: title
							});
							
							var infowindow = new google.maps.InfoWindow({
								content: title,
								maxWidth: 230,
								//pixelOffset: new google.maps.Size(-177, 150)
							});
							//infowindow.open(map, marker);
							google.maps.event.addListener(marker, 'click', function() {
								infowindow.open(map, marker);
							});
						}
						
					}
				}
			</script>
			
		</head>
		
	</head>
	
	<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" >
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
			
				<div class="fright xs-dnone visible_si padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="https://www.safeqloud.com/user/index.php/UserLogout?action=logout" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Logout" data-sw="Logout">Logout</a> </li>
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
			<div class="visible-xs visible-xxs fright marr0 xs-padt5 "> <a href="https://www.safeqloud.com/user/index.php/UserLogout?action=logout" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Logout</a> </div>
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
	 
		
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60  padb10 black_txt trn">Land</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Var vänlig och välj ditt nya land.</a></div>
									
							<form action="UpdateResidence/updateUserProfile" method="POST" id="updateform" id="updateform" accept-charset="ISO-8859-1">
								<div class="marb0 padtrl0">
									<div class="on_clmn mart10 xxs-mart10">
										
										<div class="pos_rel">
											
											 <select name="ccountry" id="ccountry"  class="input1 minhei_65p fsz16 nobrd brdb trans_bg nobold dropdown-bg   llgrey_txt tall padl0"    onchange="askAddress();" style="text-align-last:center;">
												
												<?php  foreach($resultContry as $category => $value) 
													{
														$category = htmlspecialchars($category); 
													?>
													
													<option value="<?php echo $value['id']; ?>" <?php if($value['id']==$result['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
												<?php 	}	?>
												
												
											</select>	
											
											
										</div>
									</div>
									
									
									
									
									<div id="userAddress" class="hidden">
										
										<div class="on_clmn mart20 ">
											
											
											
											<div class="pos_rel">
												
												<input type="text" name="adrs" id="adrs"  placeholder="Adress" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt">
											</div>
											
											
										</div>
										
										<div class="on_clmn mart20">
											
											<div class="thr_clmn  wi_50 padr10">
												
												<div class="pos_rel">
													
													<input type="text" name="city" id="city"  placeholder="City" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt">
												</div>
											</div>
											<div class="thr_clmn  wi_50">
												
												<div class="pos_rel">
													
													<input type="text" name="zip" id="zip"  placeholder="Zip" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt">
												</div>
											</div>
										</div>
										
										
										<div class="on_clmn mart10 xxs-mart10 hidden">
											
											<div class="pos_rel">
												
												<input type="text" name="ssecurity" id="ssecurity" placeholder="Personnummer 12 siffror" class=" wi_100 rbrdr pad10 mart5 lgtgrey2_bg fsz18 hei_50p llgrey_txt" value="<?php echo $phoneAccount['ssn']; ?>">
												
											</div>
										</div>
										
										
										
										<div class="on_clmn martb10 hidden">
											
											<div class="thr_clmn  wi_50 hide"  >
												
												<div class="pos_rel">
													
													<select id="cntry" name="cntry"  class="input1 minhei_65p fsz16 nobrd brdb trans_bg nobold dropdown-bg   llgrey_txt tall padl0"  style="text-align-last:center;" >
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==$result['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn  wi_100">
												
												<div class="pos_rel">
													
													<input type="text" name="uphno" id="uphno" placeholder="Mobil" class=" wi_100 rbrdr pad10 mart5  lgtgrey2_bg hei_50p fsz18 llgrey_txt" value="<?php echo $phoneAccount['phone_number']; ?>">
													
												</div>
												
											</div>
											
											
											
										</div>
										
										
										
										
										<input type="hidden" name="updateSecurity" id="updateSecurity" />
										
										
									</div>
									
									
									
									
									
									<div class="clear"></div>
									<div class="red_txt bold mart10" id="error_msg_form"> </div>
								</div>
								
								
								<div class="talc  mart25"> <a href="#" onclick="<?php if($result['grading_status']==2) { echo 'checkFormData();'; } else { echo 'verifyUser();'; } ?> "><input type="button" value="Verifiera" class="forword minhei_55p"  ></a>
										
									
									</div>
								
								
								
							</form>
							
							
						</div>
				</div>
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg close_popup_modal" onclick="closePop();"></div>
		</div>
		
	 
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_phone">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Signera med sms & kod</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">General - Skickas till </span>
				</div>
				
				
			</div>
			
			
			<div class="on_clmn padb10">
				
				<div class="on_clmn ">
					<div class="thr_clmn wi_50">	
						
						
						
						<div class="pos_rel padl0">
							
							<input type="text" id="cntryph" name="cntryph"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter phone">
							
						</div>
						
					</div>
					<div class="thr_clmn padl10 wi_50">
						
						
						<div class="pos_rel padr0">
							
							
							<input type="number" id="phoneno" name="phoneno" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter phone">
						</div>
					</div>
				</div>
			</div>
			<div id="errPhone"></div>
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Generera kod" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="verifyUser();">
				
			</div>
			
			
			
		</div>
	</div>
	
	
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_ssn">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			<div id="loginBankMsg" >
			<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
			<div class="padb10 padt20">
				<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="errorMsg"></h1>
				<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="cinMsg"></h1>
				
			</div>
			
		</div>
		
		<div id="loginFailMsg" style="display:none;">
		<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
		<div class="padb10 padt20">
			<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="errorMsg"></h1>
			<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="cinMsg"></h1>
			
		</div>
		
	</div>
</div>
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
		
		<form method="POST" action="approveOtp" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
			
			
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
		<div> Inte fått något sms? Försök igen.</div>
		
	</div>
</div>

<div class="clear"></div>
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
<script>
	function closePop()
	{
		$('#gratis_popup_login').removeClass('active');
		$('#gratis_popup_login').attr('style','display:none');
		$('#gratis_popup_ssn').removeClass('active');
		$('#gratis_popup_ssn').attr('style','display:none');
		$('#gratis_popup_phone').removeClass('active');
		$('#gratis_popup_phone').attr('style','display:none');
	}
</script>


</body>
</html>									