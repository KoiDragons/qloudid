<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
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
			
				function checkPhoneDetailPop()
			{
				
				$("#error_msg_form1").html('');
					
							if($('#uphno1').val()== "")
							{
								$("#error_msg_form1").html('please enter phone number!!');
								
								return false;
							}
							
							$("#popup_fade").addClass('active');
							$("#popup_fade").attr('style','display:block;');
							$("#gratis_popup_phone").addClass('active');
							$("#gratis_popup_phone").attr('style','display:block;');
							var phn=$('#uphno1').val();
							var cnt=$('#cntry1').val();
							$('#cntryph').val(cnt);
							$('#phoneno').val(phn);
							$('#cntry').val(cnt);
							$('#uphno').val(phn);
							$("#cntryph").attr('readonly','readonly');
							$("#phoneno").attr('readonly','readonly');
						$("#gratis_popup_ssn").removeClass('active');
							$("#gratis_popup_ssn").attr('style','display:none;');
							
						
			}
			
			
			function checkPhoneDetail()
			{
				 
				$("#error_msg_form").html('');
				
						
							if($('#f_name').val()== "")
							{
								$("#error_msg_form").html('please enter first name!!');
								
								return false;
							}
							if($('#l_name').val()== "")
							{
								$("#error_msg_form").html('please enter last name!!');
								
								return false;
							}
							
							
							
							if($('#uphno').val()== "")
							{
								$("#error_msg_form").html('please enter phone number!!');
								
								return false;
							}
							else
				{
					var send_data={};
					send_data.countryname=$("#cntryph").val();
					send_data.phoneno=$("#uphno").val();
					$.ajax({
						type:"POST",
						url:"GetStartedNew/verifyUserDetail",
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
								$("#loginBank").hide();
								$("#headerData").hide();
								$("#loginPhone").attr('style','display:block');
								
								$("#otp").val('');
								$("#infor_id").val(data1);
								$("#lastPh").html(subst);
							}
							
						}
					});
				}
							 
						
							
						
			}
			
			
			function checkSSNDetail()
			{
				
				$("#error_msg_form").html('');
				
						
							
							if($('#dob').val()== "")
							{
								$("#error_msg_form").html('please enter date of birth!!');
								
								return false;
							}
							/*if($('#autocomplete').val()== "")
							{
								$("#error_msg_form").html('please enter address!!');
								
								return false;
							}*/
							
							
							$("#popup_fade").addClass('active');
							$("#popup_fade").attr('style','display:block;');
							$("#gratis_popup_ssn").addClass('active');
							$("#gratis_popup_ssn").attr('style','display:block;');
								
							
						
			}
			
			
			
			function checkFormData()
			{
				
				$("#error_msg_form1").html('');
				if($("#ssecurity1").val()=="")
				{
					$("#error_msg_form1").html('Fyll i ditt person nr.!!');
					
					return false;
				}
				
				else if(isNaN($("#ssecurity1").val())) 
				{
					$("#error_msg_form1").html('Personal number must be a numeric value');
					return false;
				}
				else if($("#ssecurity1").val().length < 12 || $("#ssecurity1").val().length > 12) 
				{
					$("#error_msg_form1").html('Personal number must be 12 digit numeric value');
					return false;
				}
				else
				{
					var send_data={};
					send_data.ssn=$("#ssecurity1").val();
					$.ajax({
						url: 'GetStartedNew/checkUserAvailability',
						type: 'POST',
						dataType: 'json',
						data: send_data
					})
					.done(function(data){
						if(data==0)
						{
							$("#error_msg_form1").html('Another user with this personal number already exist.');
							return false;
						}
						else
						{
					var ssn=$("#ssecurity1").val();
					$("#ssecurity").val(ssn);
							
							$("#zipcode").val($("#postal_code").val());
							$("#cty").val($("#locality").val());
							if($('#cntry').val()== "Sweden")
							{
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
							else {
								
								$("#gratis_popup_phone").addClass('active');
								$("#gratis_popup_phone").attr('style','display:block;');
							}
						}
					})
					.fail(function(){})
					.always(function(){});
					
					
					
				}
				
				
				
				
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
							$("#updateSecurity").val(2);
							document.getElementById("updateform").submit();
							
							
						}
						
					}
				});
				
			}
			
			function verifyUser()
			{
				
				
				if($("#cntryph").val()==0)
				{
					alert("Please select country!!!");
					return false;
				}
				else if($("#phoneno").val()=="" || $("#phoneno").val()==null)
				{
					alert("Please enter phone number!!!");
					return false;
				}
				else
				{
					var send_data={};
					send_data.countryname=$("#cntryph").val();
					send_data.phoneno=$("#uphno").val();
					$.ajax({
						type:"POST",
						url:"GetStartedNew/verifyUserDetail",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							//alert(data1); return false;
							if(data1==0)
							{
								$("#errPhone").html('Please enter another/valid phone number');
							}
							else
							{
								var subst=$("#uphno").val().substr(-4);
								$("#gratis_popup_phone").removeClass('active');
								$("#gratis_popup_phone").attr('style','display:none;');
								$("#gratis_popup_login").addClass('active');
								$("#gratis_popup_login").attr('style','display:block;');
								$("#infor_id").val(data1);
								$("#lastPh").html(subst);
							}
							
						}
					});
				}
				
			}
			
			
			function checkPhoneDetailSwedish()
			{
				
				$("#error_msg_form").html('');
				
						
							if($('#f_name').val()== "")
							{
								$("#error_msg_form").html('please enter first name!!');
								
								return false;
							}
							else if($('#l_name').val()== "")
							{
								$("#error_msg_form").html('please enter last name!!');
								
								return false;
							}
							if($('#uphno').val()== "")
							{
								$("#error_msg_form").html('please enter phone number!!');
								
								return false;
							}
				else
				{
					var send_data={};
					send_data.countryname=$("#cntryph").val();
					send_data.phoneno=$("#uphno").val();
					$.ajax({
						type:"POST",
						url:"GetStartedNew/verifyUserDetailCheck",
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
							$("#updateSecurity").val(0);
							document.getElementById("updateform").submit();
							}
							
						}
					});
				}
							 
					
							 
							
						
			}
			
			 function ChangeInput(id)
			 {
				if(id<10)
				{
					newVal=$("#otp").val()+id;
					$("#otp").val(newVal);
				}
				else
				{
					newVal=$("#otp").val().slice(0, -1); 
					$("#otp").val(newVal);
				}
				
				checkOtp();
			 }
			
			function checkOtp()
			{
				$("#error_msg_opt").html('');
				if($("#otp").val()=="")
				{
					$("#error_msg_opt").html('Fyll i lösenordet');
					return false;
					
				}
				if($("#otp").val().length==7)
				{
				var send_data={};
				
				send_data.otp=$("#otp").val();
				send_data.infor_id=$("#infor_id").val();
				
				$.ajax({
					type:"POST",
					url:"GetStartedNew/verifyOtp",
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
							$("#updateSecurity").val(1);
							document.getElementById("updateform").submit();
						}
					}
				});
				}
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
		
		<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg ffamily_avenir" >
		
		
		
		<div class="column_m header  xs-hei_55p bs_bb xs-white_bg lgtgrey2_bg " id="headerData">
				<div class="wi_100 hei_65p  xs-hei_55p xs-pos_fix padtb5 padrl10 xs-white_bg lgtgrey2_bg">
				<div class="fleft padrl0 hidden">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../CoronaHelp" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"  ><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 	<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel   marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  fsz30  black_txt_h" style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz30  " style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </div> 
				<div class="clear"></div>
			</div>
		</div>
	 
	<div class="clear"></div>
	<div  id="loginPhone" onclick="checkFlag();"  style="display:none;">
	 <div class="column_m header xs-hei_55p bs_bb white_bg visible-xs"  id="hedearData" >
				<div class="wi_100 hei_65p xs-hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
							 
			<div class="clear"></div>
		</div>
		</div>
		<div class="clear"></div>
	 	<div class="column_m  talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					 
<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0 xs-mart0">
								
			<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz80 xxs-fsz45 nobold padb10 black_txt trn ffamily_avenir">Enter the code</h1>
									</div>
									<div class="mart10 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >We have sent a message with a new password to the phone ending with *****<span id="lastPh"></span></a></div>
				 
			 
		
		<form method="POST" action="approveOtp" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
			
			
			<div class="on_clmn mart25 xxs-mart30 marb10">
											 
				<div class="pos_rel">
					
					<input type="text" name="otp" id="otp" placeholder="" max="9999999" class="wi_30 xs-wi_60 rbrdr pad10  brdb talc  minhei_65p  blue_67cff7 fsz30" style="border-bottom: 3px dashed #dedede; letter-spacing:10px;" onkeyup="checkOtp();">
					
				</div>
			</div>
			 
			<input type="hidden" id="infor_id" name="infor_id" value="" />
			<div class="red_txt ffamily_avenir fsz20" id="error_msg_opt"></div>
			<div class="container column_m martb15 padtb20">
			<div class=" wi_33  fleft bs_bb  talc padb20">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(1);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">1</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(2);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">2</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(3);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">3</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
														<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(4);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">4</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(5);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">5</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(6);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">6</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
														<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr" onclick="ChangeInput(7);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">7</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr" onclick="ChangeInput(8);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">8</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(9);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">9</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												
												
														<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="#" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   white_bg  trans_all2 borderr  ">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0"></h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   lgtgrey2_bg  trans_all2 borderr " onclick="ChangeInput(0);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0">0</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_33  fleft bs_bb padb20 talc ">
													<div class="toggle-parent wi_100 dflex ">
														<div class="wi_100 dnone_pa padrl50 xxs-padr20l25">
															<a href="javascript:void(0);" class="style_base hei_60p dblock bs_bb pad30 padt20 valm brdclr_seggreen_h   white_bg  trans_all2 borderr xxs-padl14 padl17 " onclick="ChangeInput(10);">
																<div class=" ">
																	 
																	
																	<div class="  padb15 padl0 ">
																		<h3 class=" tall pad0 txtovfl_el ws_now lgn_hight_24 bold fsz22 grey_txt padt0"> </h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
			
			</div>
		
			<div class="ffamily_avenir talc">Not received sms yet. Try again.</div>	
		 </form>
		 
	</div>
				
				
			</div>
			<div class="clear">
			
 </div>
	</div>
 </div>
	 
		<!-- LOGIN FORM -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn">Hello</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Please finish registration and get started.</a></div>
						
								
								<form action="GetStartedNew/updateUserProfile" method="POST" id="updateform" id="updateform" accept-charset="ISO-8859-1">
									<div class="marb0 padtrl0">
										<div class="on_clmn mart10 xxs-mart10 hidden">
												
												<div class="pos_rel">
													
													<h2 id="country_in_popup" class="nobrd wi_100 maxwi_500p padb0 mart10 marl0 dflex opa90_h brdrad3 trans_bg fsz16 xs-fsz16 black_txt trans_all2 ffamily_avenir">Utfärdat land : <select name="ccountry" id="ccountry" class="wi_30 default_view rbrdr pad0 mart-3 hei_30p black_txt fsz16 brdb ffamily_avenir" disabled="true" >
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" <?php if($value['id']==$result['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
													
														
													</select>	 </h2>
												
													
												</div>
											</div>
										
										<div class="on_clmn  mart10" >
											<div class="thr_clmn wi_50">
											<label class="fsz18 fleft"></label>
												<div class="pos_rel">
													
													<input type="text" name="f_name" id="f_name"  placeholder="Name" class=" wi_100  pad10 mart5  talc  minhei_65p xxs-minhei_60p fsz18 brdb_red_ff2828  red_f5a0a5_txt nobrdt nobrdr nobrdl ffamily_avenir">
													
												</div>
											</div>
											<div class="thr_clmn padl20 wi_50">
												<label class="fsz18 fleft"></label>
												<div class="pos_rel">
													
													<input type="text" name="l_name" id="l_name" placeholder="Last name" class=" wi_100  pad10 mart5  talc  minhei_65p xxs-minhei_60p fsz18 brdb_red_ff2828  red_f5a0a5_txt nobrdt nobrdr nobrdl ffamily_avenir">
													
												</div>
												
											</div>
										</div>
										
										<div class="on_clmn mart20  hidden" >
											<div class="thr_clmn wi_50">
												<div class="pos_rel">
													
													<input type="date" name="dob" id="dob" placeholder="19xx-mm-dd" class=" wi_100 rbrdr pad10 mart5  lgtgrey2_bg minhei_65p xxs-minhei_60p fsz18 llgrey_txt ffamily_avenir">
													
												</div>
											</div>
											<div class="thr_clmn padl10 wi_50">
												
												<div class="pos_rel">
													
													<select id="sex" name="sex" class="ffamily_avenir lgtgrey2_bg input1 minhei_65p xxs-minhei_60p fsz16 nobrd brdb  nobold dropdown-bg  llgrey_txt">
														<option value="1" selected="" class="lgtgrey2_bg">Man</option>
														<option value="2" class="lgtgrey2_bg">Kvinna</option>
														<option value="3" class="lgtgrey2_bg">Annat</option>
														
													</select>
													
												</div>
												
											</div>
										</div>
										
										
										
										
										<div class="on_clmn mart10 hide">
											
											
											
											<div class="pos_rel" id="locationField">
												
												<input type="text" name="adrs" id="autocomplete" onfocus="geolocate()" placeholder="Adress" class=" wi_100 rbrdr pad10 mart5 lgtgrey2_bg minhei_65p xxs-minhei_60p fsz18 llgrey_txt ffamily_avenir" autocomplete="off">
											</div>
											
											
										</div>
										
										
											
										
										<div class="on_clmn mart10 xxs-mart10 hidden">
											
											<div class="pos_rel">
												
												<input type="text" name="ssecurity" id="ssecurity" placeholder="Personnummer 12 siffror" class=" wi_100 rbrdr pad10 mart5 lgtgrey2_bg fsz18 minhei_65p xxs-minhei_60p llgrey_txt ffamily_avenir">
												
											</div>
										</div>
										
										
										
										<div class="on_clmn mart20 marb35  ">
											
											<div class="thr_clmn  wi_30 "  >
												<div class="pos_rel">
													
													<select  class="ffamily_avenir default_view wi_100 mart5  pad10 trans_bg  minhei_65p xxs-minhei_60p fsz18 brdb   llgrey_txt nobrdt nobrdr nobrdl" style="text-align-last:center;" disabled="true">
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==$result['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
												<div class="pos_rel hidden">
													
													<select id="cntryph" name="cntryph" class="ffamily_avenir default_view wi_100 mart5  pad10   minhei_65p xxs-minhei_60p fsz18 brdb_red_ff2828  red_f5a0a5_txt nobrdt nobrdr nobrdl"  >
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==$result['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn  wi_70 padl20">
												<label class="fsz18 fleft"></label>
												<div class="pos_rel">
													
													<input type="text" name="uphno" id="uphno" placeholder="Phone"  class=" wi_100  pad10 mart5   minhei_65p xxs-minhei_60p fsz18 talc  brdb_red_ff2828  red_f5a0a5_txt nobrdt nobrdr nobrdl ffamily_avenir" >
													
												</div>
												
											</div>
											
											
											
										</div>
										
										
										
										
										
										
										
										<div class="clear"></div>
										
										
										
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
											<div class="red_txt fsz20 ffamily_avenir" id="error_msg_form"> </div>
									</div>
									<div class="talc padtb20  hidden"> <a href="#" onclick="checkPhoneDetailSwedish();"><input type="button" value="Uppdatera" class="forword minhei_55p t_67cff7_bg  fsz18 ffamily_avenir"  ></a>
										<input type="hidden" name="zipcode" id="zipcode"> 
									<input type="hidden" name="cty" id="cty">
									<input type="hidden" name="updateSecurity" id="updateSecurity" />
									
									</div>
									<div class="talc padtb20 "> <a href="#" onclick="checkPhoneDetail();"><input type="button" value="Uppdatera" class="forword minhei_55p t_67cff7_bg  fsz18 ffamily_avenir"  ></a>
										
									
									</div>
									<div class="talc padb20 fsz18"> Once you submit a password will be sent to your phone as sms.</div>
								</form>
								
								
							</div>
							
						
					</div>
					<div id="popup_fade" class="opa0 opa55_a black_bg close_popup_modal" onclick="closePop();"></div>
				</div>
			 
			<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_phone">
				<div class="modal-content pad25  nobrdb talc brdrad5 ">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt ffamily_avenir">Signera med sms & kod</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16 ffamily_avenir">General - Skickas till </span>
						</div>
						
						
					</div>
					
					
					<div class="on_clmn padb10">
						
						<div class="on_clmn ">
							<div class="thr_clmn wi_50">	
								
								
								
								<div class="pos_rel padl0">
									
									<input type="text" id="cntryphd" name="cntryphd"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 ffamily_avenir" placeholder="Enter phone">
									
								</div>
								
							</div>
							<div class="thr_clmn padl10 wi_50">
								
								
								<div class="pos_rel padr0">
									
									
									<input type="number" id="phonenod" name="phonenod" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 ffamily_avenir" placeholder="Enter phone">
								</div>
							</div>
						</div>
					</div>
					<div id="errPhone"></div>
					<div class="on_clmn mart10 marb20">
						<input type="button" value="Generera kod" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp ffamily_avenir" onclick="verifyUser();">
						
					</div>
					
					
					
				</div>
			</div>
			
			
			
			
			<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_ssn">
				<div class="modal-content pad25  nobrdb talc brdrad5 ">
				<div id="loginBankMsg" style="display:none;">
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
					<div id="loginBank">
					<h2 class="marb10 pad0 bold fsz24 black_txt ffamily_avenir">Signera med BankID</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16 ffamily_avenir">Var vänlig och signera med ditt mobila BankID. </span>
						</div>
						
						
					</div>
					
					
					<div class="on_clmn padb10">
						
						<div class="on_clmn ">
							
								
								
								<div class="pos_rel padl0">
									
									<input type="text" id="ssecurity1" name="ssecurity1"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 ffamily_avenir" placeholder="Enter Personnummer">
									
							
								
							</div>
							
						</div>
					</div>
					
					<div class="on_clmn martb10 ">
											
											<div class="thr_clmn  wi_50 "  >
												
												<div class="pos_rel">
													
													<select id="cntry1" name="cntry1" class="ffamily_avenir default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt"  >
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==$result['country_of_residence']) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn  wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="uphno1" id="uphno1" placeholder="Mobil" class=" wi_100 rbrdr pad10 mart5  lgtgrey2_bg hei_50p fsz18 llgrey_txt ffamily_avenir">
													
												</div>
												
											</div>
											
											
											
										</div>
										
										
										
					<div id="error_msg_form1"></div>
					<div class="on_clmn mart10 marb20">
						<input type="button" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp ffamily_avenir" onclick="checkFormData();">
						
					</div>
					<a href="#" onclick="checkPhoneDetailPop();"><p class="padt10 fsz16 ffamily_avenir" >Har du BankID</p></a>
					
				</div>	
				</div>
			</div>
			
			
			
			
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect  brdrad5"  id="gratis_popup_connect">
				<div class="modal-content pad25  brdrad5 ">
					<div id="connect_id">
						
						
					</div>
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