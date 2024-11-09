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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
		</script>
		<div class="sharethis-inline-share-buttons"></div>
		<script async src="//platform-api.sharethis.com/js/sharethis.js#property=5c04f17ff30c5a001138cc7d&product="inline-share-buttons"></script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		
		<script>
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
			</script>
			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				
				gtag('config', 'UA-126618362-1');
				
				function changeClass(link)
				{
					
					$(".class-toggler").removeClass('active');
					
				}
				
				function checkOtp()
				{
					$("#error_msg_opt").html('');
					if($("#otp").val()=="")
					{
						$("#error_msg_opt").html('Please enter OTP');
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
								$("#error_msg_opt").html('Please enter Correct OTP');
							}
							else 
							{
								//alert(data1); return false;
								window.location.href ="https://www.safeqloud.com/user/index.php/InformRelatives";
							}
						}
					});
					//document.getElementById("save_indexing").submit();
				}
				
				
				
				
				
				function checkData()
				{
					if($("#ssn").val()==1)
					{
						if($("#ssecurity").val()=="")
						{
							alert("please enter social security information!!");
							return false;
						}
					}
					else if($("#ssn").val()==2)
					{
						if($("#uphno").val()=="")
						{
							alert("please enter phone number!!");
							return false;
						}
					}
					if($('#info').val().trim().length == 0)
					{
						alert("please enter description!!");
						return false;
					}
					/*	if($('#autocomplete').val() == "")
						{
						alert("please enter address!!");
						return false;
					}*/
					
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
					//document.getElementById("save_indexing").submit();
				}
				function submit_info()
				{
					$("#error_msg_phone").html('');
					if($("#pno").val()=="")
					{
						alert("please enter phone number!!");
						return false;
					}
					else if(isNaN($("#pno").val())) {
						
						alert("please enter numeric value!!");
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
									$("#error_msg_phone").html('Invalid telephone number.');
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
				
			</script>
			
			<script>
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
				
				function changeHeader()
				{
					
					window.location.href="https://www.safeqloud.com/user/index.php/InformRelatives";
					
				}
			</script>
			
		</head>
		
		<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg">
			
			<div class="column_m header xs-header  bs_bb white_bg">
				<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc white_bg">
					<div class="visible-xs visible-sm fleft">
						<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
					</div>
					<div class="logo hidden-xs hidden-sm marr15 wi_140p">
						<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="hidden-xs hidden-sm fleft padl10 padr30">
						<div class="languages">
							<a href="InformRelatives" id="language_selector" class="padrl10 black_txt"><img src="../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US"  onclick="changeHeader();">
							</a>
							<ul class="wi_100 mar0 pad5 lgtgrey2_bg">
								<!--<li class="dblock first">
									<a href="#" class="pad5" data-lang="eng"><img src="../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US">
									</a>
									</li>
									<li class="dblock last" onclick="changeHeader();">
									<a href="#" class="pad5" data-lang="swd"><img src="../../html/usercontent/images/slide/flag_us.png" width="24" height="16" title="Sweden" alt="Sweden" onclick="changeHeader();">
									</a>
								</li>-->
							</ul>
						</div>
					</div>
					<div class="fright xs-dnone sm-dnone padt10 padb10">
						<ul class="mar0 pad0 sf-menu fsz14 sf-js-enabled sf-arrows">
							
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue first"> <a href="safeqloudPersonalEng" class="translate hei_30pi dblock padrl20 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Consumer" data-sw="Consumer">Consumer</a> </li>
							
							<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.safeqloud.com/user/index.php/CorporateServicesEng" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Företag" data-sw="Företag">Företag</a> </li>
							<li class="dblock hidden hidden-sm fleft pos_rel  brdclr_dblue first"> <a href="#" class="translate hei_30pi dblock padrl20 blue_bg uppercase lgn_hight_30 white_txt white_txt_h" data-en="Start" data-sw="Start">NOTIFY <span class="fa fa-heart red_txt"></span> F&F </a> </li>
							<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_lgrey2 lgtgrey2_bg brdrad5 marl20 "> <a href="https://www.safeqloud.com/public/index.php/PublicAboutUs/companyAccount/M0xvUmVVa1BXQUpmc1FpQ3lydWJXZz09" id="usermenu_singin" class="translate hei_30pi dblock padrl10   lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
							<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 last"> <a href="https://www.safeqloud.com/user/index.php/LoginAccountEng" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h uppercase lgn_hight_30 black_txt  white_txt_h  brdl" data-en="Logga In" data-sw="Logga In">Logga In</a> </li>
						</ul>
					</div>
					
					<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3 "> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			
			
			
			<div class="clear"></div>
			
			<!-- LOGIN FORM -->
			<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 ">
				<div class="padrl10 white_bg xs-padrl15">
					<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart40 xs-mart0">
						<div class="dflex xs-fxwrap_w alit_c">
							<div class="brdb_b  visible-xs visible-sm">
								<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">SOS <span class="fa fa-heart red_txt"></span> Family & Friends</h4>
								<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Mayday - Notify Family & Friends</h3>
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
															<option value="1" selected="" class=" ">SSN</option>
															<!--<option value="Passport number" class="lgtgrey2_bg ">Passport number</option>-->
															<option value="2" class="lgtgrey2_bg ">Phone number</option>
															
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
													<input type="text" name="ssecurity" id="ssecurity" placeholder="Add social security number" class="txtind25 wi_100 rbrdr pad10 mart5 white_bg hei_50p black_txt">
													
												</div>
											</div>
											
											<div class="on_clmn mart20" id="uphn" style="display:none;">
												<label class="marb5">Phone number</label>
												<div class="pos_rel">
													<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
													<input type="text" name="uphno" id="uphno" placeholder="Add phone number" class="txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_50p black_txt">
													
												</div>
											</div>
											
											<div class="on_clmn mart20">
												
											<textarea name="info" id="info" placeholder="Describe" class="pad20  black_txt hei_80p wi_100 mart5 rbrdr pad103e6 nobrdt white_bg "> </textarea></div>
											
											<div class="on_clmn mart20">
												<div class="thr_clmn wi_30">
													
													
													<div class="pos_rel">
														<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
														<select id="travel_info" name="travel_info" class="txtind25 white_bg default_view rbrdr wi_100 mart5 pad10 hei_50p black_txt">
															<option value="Current" selected="" class="lgtgrey2_bg">Current</option>
															<option value="Headed to..." class="lgtgrey2_bg">Headed to...</option>
															
															
														</select>
													</div>
												</div>
												<div class="thr_clmn padl10 wi_70">
													
													<div class="pos_rel" id="locationField">
														<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_50"><span class="fa fa-star fsz14"></span></div>
														<input type="text" name="adrs" id="autocomplete" onfocus="geolocate()" placeholder="Address" class="txtind25 wi_100 rbrdr pad10 mart5 white_bg hei_50p black_txt" autocomplete="off">
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
									<div class="talc padrbl20"> <a href="#" class="" data-target="#gratis_popup_login"><input type="button" value="Submit" class="nobrd wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" data-target="#gratis_popup_login"></a>
									<input type="hidden" name="login"> </div>
								</form>
								
								
							</div>
							<div class="wi_60 xs-wi_100 fxshrink_0 order_1 xs-order_2 martb20 marr30 xs-marr0 talc padr40 xs-padr0">
								<h4 class="bold fsz40 padb10 tall hidden-xs">SOS <span class="fa fa-heart red_txt"></span> Family & Friends</h4>
								<h3 class="fsz18 padb20 tall hidden-xs">Mayday - Notify Family & Friends</h3>
								<ul class="mart10 pad0 tall">
									<li class="dblock mar0 marb10 pad0 first">
										<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											För att försäkra rätt information...
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>När du ansluter ditt Qloud ID till din arbetsgivare, skola eller bostadsförening får du tillgång till all viktig information som är stängd för allmänheten. Genom ett gemensamt samtycke till att dela varandras information har ni alltid rätta uppgifter.  </p>
											
											<p>Om du tex byter bank behöver du inte oroa dig för att inte få lönen i tid eller att hyran inte dras från rätt konto. </p>
											
											
											
											
										</div>
									</li>
									
									<li class="dblock mar0 marb10 pad0">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											För att kunna kommunicera i förväg...
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Du får all information som berör dig som individ på ett ställe. Skall vattnet stängas av i din bostad, skall ni ha konferens, planerar skolan ett event?</p>
											<p>Du kommunicerar med din arbetsgivare, skola och bostadsförening via din Qloud ID anslutning.</p>
											<!--<p><strong class="uppercase">TIPS:</strong> En tumregel är att inte ansöka om lån som överstiger 90% av din årsinkomst.</p>-->
										</div>
									</li>
									<li class="dblock mar0 marb10 pad0">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											För att bli meddelad om något hänt...
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
											För att få tillgång till erbjudanden och förmåner....
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Dina Qloud ID anslutningar ger dig tillgång till alla de erbjudanden och förmåner som du ska ha tillgång till. Du når studentrabatter, erbjudanden från din fastighetsägare och förmåner från din arbetsgivare. </p>
										</div>
									</li>
									<li class="dblock mar0 marb10 pad0 last">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											För att samverka och skapa relationer...
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
				<!--	<div class="wrap maxwi_100 hide">
					
					<div class="container padrl15">
					
					<div class="maxwi_365p marrla brdb">
					<h1 class="tall bold fsz40 xs-fsz35">Inform close ones</h1>
					<h3 class="marb20 tall fsz18 black_txt brdb_b xs-fsz16">Provide the information you wnat to send</h3>
					<form action="#" method="POST" id="loginform">
					<div class="marb20 pad0 brdb">
					
					
					<div class="on_clmn padtb10">
					
					<div class="on_clmn ">
					<div class="thr_clmn wi_50">
					<label class="marb5">ID Type</label>
					<div class="pos_rel">
					<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					
					
					<select id="ssn" name="ssn" class="default_view txtind25  wi_100 mart5 pad10  rbrdr lgtgrey2_bg hei_40p brdb_dfe3e6 black_txt ">
					<option value="SSN" selected="" class="lgtgrey2_bg ">SSN</option>
					<option value="Passport number" class="lgtgrey2_bg ">Passport number</option>
					<option value="Phone number" class="lgtgrey2_bg ">Phone number</option>
					
					</select>
					</div>
					</div>
					<div class="thr_clmn padl10 wi_50">
					<label class="marb5">Country</label>
					<div class="pos_rel">
					<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<select id="cntry" name="cntry" class="txtind25 default_view wi_100 mart5 rbrdr pad10 brdb_dfe3e6 white_bg hei_40p black_txt">
					
					<?php  foreach($resultContry as $category => $value) 
						{
							$category = htmlspecialchars($category); 
						?>
						
						<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
						<?php 	}
					?>
					
					</select>
					</div>
					</div>
					</div>
					
					
					
					
					
					<div class="on_clmn mart20">
					<label class="marb5">Social Sceurity</label>
					<div class="pos_rel">
					<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="text" name="ssecurity" id="ssecurity" placeholder="Provide Information" class="txtind25 wi_100 rbrdr pad10 mart5 brdb_dfe3e6 white_bg hei_40p black_txt">
					
					</div>
					</div>
					
					
					<div class="on_clmn mart20">
					<label class="marb5">Information</label>
					<textarea name="info" id="info" placeholder="Describe" class="black_txt hei_80p wi_100 mart5 rbrdr pad10 brdb_dfe3e6 nobrdt white_bg "> </textarea></div>
					<div class="clear"></div>
					</div>
					
					<div class="on_clmn mart20">
					<div class="thr_clmn wi_30">
					
					<label class="marb5">Location</label>
					<div class="pos_rel">
					<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<select id="travel_info" name="travel_info" class="txtind25 default_view rbrdr wi_100 mart5 pad10 lgtgrey2_bg hei_40p brdb_dfe3e6 black_txt">
					<option value="Current" selected="" class="lgtgrey2_bg">Current</option>
					<option value="Headed to..." class="lgtgrey2_bg">Headed to...</option>
					
					
					</select>
					</div>
					</div>
					<div class="thr_clmn padl10 wi_70">
					<label class="marb5">Address</label>
					<div class="pos_rel">
					<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="text" name="adrs" id="adrs" placeholder="Address" class="txtind25 wi_100 rbrdr pad10 mart5 brdb_dfe3e6 white_bg hei_40p black_txt">
					</div>
					
					</div>
					</div>
					
					
					<div class="clear"></div>
					
					</div>
					<div class="talc "> <a href="#" class="" data-target="#gratis_popup_login"><input type="button" value="Submit" class=" wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" data-target="#gratis_popup_login" onclick="checkData();"></a>
					<input type="hidden" name="login"> </div>
					</form>
					<div class="martb10 talc fsz18"><a href="CreateAccount">Create a new account</a>
					</div>
					<div class="marb10 talc "><span>One Qloud ID Account for everything Qloud ID</span>
					</div>
					
					<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 ">
					<div class="padrl10 white_bg xs-padrl15">
					<div class="wrap maxwi_100 padb30 padt10  xs-nobrdb xs-padt10 xs-padb0">
					<div class="dflex xs-fxwrap_w alit_c brdt xs-nobrdt">
					
					<div class="wi_100 xs-wi_100 fxshrink_0 order_1 xs-order_1 martb20 marr30 xs-marr0 talc">
					<h4 class="bold fsz30 padt10 tall xs-fsz25">VARFÖR ANSLUTA…</h4>
					<ul class="mart10 pad0 tall">
					<li class="dblock mar0 marb10 pad0 first">
					<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
					<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
					<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
					För att försäkra rätt information...
					</a>
					<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
					<p>När du ansluter ditt Qloud ID till din arbetsgivare, skola eller bostadsförening får du tillgång till all viktig information som är stängd för allmänheten. Genom ett gemensamt samtycke till att dela varandras information har ni alltid rätta uppgifter.  </p>
					
					<p>Om du tex byter bank behöver du inte oroa dig för att inte få lönen i tid eller att hyran inte dras från rätt konto. </p>
					
					
					
					
					</div>
					</li>
					
					<li class="dblock mar0 marb10 pad0">
					<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
					<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
					<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
					För att kunna kommunicera i förväg...
					</a>
					<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
					<p>Du får all information som berör dig som individ på ett ställe. Skall vattnet stängas av i din bostad, skall ni ha konferens, planerar skolan ett event?</p>
					<p>Du kommunicerar med din arbetsgivare, skola och bostadsförening via din Qloud ID anslutning.</p>
					
					</div>
					</li>
					<li class="dblock mar0 marb10 pad0">
					<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
					<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
					<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
					För att bli meddelad om något hänt...
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
					För att få tillgång till erbjudanden och förmåner....
					</a>
					<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
					<p>Dina Qloud ID anslutningar ger dig tillgång till alla de erbjudanden och förmåner som du ska ha tillgång till. Du når studentrabatter, erbjudanden från din fastighetsägare och förmåner från din arbetsgivare. </p>
					</div>
					</li>
					<li class="dblock mar0 marb10 pad0 last">
					<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
					<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
					<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
					För att samverka och skapa relationer...
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
					
					</div>
					
					
					
					</div>
				</div>-->
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
						<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F</h1>
							<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">On the behalf of family and friends to this person - We thank you <span class="padl10 fa fa-praying-hands"></span></p>
						</div>
						<div class="lgtgrey2_bg">
							<h3 class="pos_rel marb0 padrl25 padtb10 fsz20 dark_grey_txt lgtgrey2_bg">
								We have sent a message on your phone
								
							</h3>
							<form method="POST" action="InformRelatives/sendEmail" id="save_indexing_email" name="save_indexing_email" accept-charset="ISO-8859-1">
								
								<div class="pad15 lgtgrey2_bg">
									<label class="marb5  padl10 padb10">Password</label>
									<div class="pos_rel padrl10">
									<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"></span></div>
									<input type="text" name="otp" id="otp" placeholder="Enter OTP" max="9999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
									
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