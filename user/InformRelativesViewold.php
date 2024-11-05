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
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		
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
					window.location.href ="https://www.qloudid.com/user/index.php/InformRelatives";
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
					if($('#autocomplete').val() == "")
						{
						alert("please enter address!!");
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
						<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="hidden-xs hidden-sm fleft padl10 padr30">
						<div class="languages">
							<a href="#" id="language_selector" class="padrl10 black_txt"><img src="../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" >
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
							<li class="right hei_30p first last">
								<a href="#" class="translate orange_btn bold xs-padrl10i hei_40p " id="usermenu_singin" data-en="Sign In" data-sw="Logga In">Sign Up</a>
							</li>
						</ul>
					</div>
					
					<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3 "> <a href="https://www.qloudid.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			
			
			<div class="clear"></div>
			
			<!-- LOGIN FORM -->
			<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 ">
				<div class="padrl10 white_bg xs-padrl15">
					<div class="wrap maxwi_100 padtb30  xs-nobrdb xs-padt30 xs-padb0">
						<div class="dflex xs-fxwrap_w alit_c">
							<div class="xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall mart60">
								<!--<h1 class="tall bold fsz40 xs-fsz35">Inform close ones</h1>
								<h3 class="marb20 tall fsz18 black_txt brdb_b xs-fsz16">Provide the information you want to send</h3>-->
								<form action="#" method="POST" id="loginform">
									<div class="marb20 pad0 brdb">
										
										
										<div class="on_clmn padtb10">
											
											<div class="on_clmn ">
												<div class="thr_clmn wi_50">
												<!--	<label class="marb5">ID Type</label>-->
													<div class="pos_rel">
														<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
														
														
														<select id="ssn" name="ssn" class="default_view txtind25  wi_100 mart5 pad10  rbrdr lgtgrey2_bg hei_40p brdb_dfe3e6 black_txt " onchange="displayField(this.value);">
															<option value="1" selected="" class="lgtgrey2_bg ">SSN</option>
															<!--<option value="Passport number" class="lgtgrey2_bg ">Passport number</option>-->
															<option value="2" class="lgtgrey2_bg ">Phone number</option>
															
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
											
											
											
											
											
											<div class="on_clmn mart20" id="ussn" style="display:block;">
												<label class="marb5">Social Security</label>
												<div class="pos_rel">
													<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
													<input type="text" name="ssecurity" id="ssecurity" placeholder="Provide Information" class="txtind25 wi_100 rbrdr pad10 mart5 brdb_dfe3e6 white_bg hei_40p black_txt">
													
												</div>
											</div>
											
											<div class="on_clmn mart20" id="uphn" style="display:none;">
												<label class="marb5">Phone number</label>
												<div class="pos_rel">
													<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
													<input type="text" name="uphno" id="uphno" placeholder="Provide Information" class="txtind25 wi_100 rbrdr pad10 mart5 brdb_dfe3e6 white_bg hei_40p black_txt">
													
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
												<div class="pos_rel" id="locationField">
													<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
													<input type="text" name="adrs" id="autocomplete" onfocus="geolocate()" placeholder="Address" class="txtind25 wi_100 rbrdr pad10 mart5 brdb_dfe3e6 white_bg hei_40p black_txt" >
												</div>
												
											</div>
										</div>
										<table id="address" class="hide">
											<tbody><tr>
												<td class="label">Street address</td>
												<td class="slimField"><input class="field" id="street_number" disabled="true"></td>
												<td class="wideField" colspan="2"><input class="field" id="route" disabled="true"></td>
											</tr>
											<tr>
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
											<tr>
												<td class="label">Country</td>
												<td class="wideField" colspan="3"><input class="field" id="country" disabled="true"></td>
											</tr>
											</tbody></table>
											
											<div class="clear"></div>
											
									</div>
									<div class="talc "> <a href="#" class="" data-target="#gratis_popup_login"><input type="button" value="Submit" class=" wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" data-target="#gratis_popup_login" onclick="checkData();"></a>
									<input type="hidden" name="login"> </div>
								</form>
								<div class="martb10 talc fsz18"><a href="CreateAccount">Create a new account</a>
								</div>
								<div class="marb10 talc "><span>One Qloud ID Account for everything Qloud ID</span>
								</div>
							</div>
							<div class="wi_50 xs-wi_100 fxshrink_0 order_1 xs-order_1 martb20 marr30 xs-marr0 talc">
								<h4 class="bold fsz30 padt10 tall">VARFÖR ANSLUTA…</h4>
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
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect brd brdrad5"  id="gratis_popup_connect">
				<div class="modal-content pad25 brd brdrad10">
					<div id="connect_id">
						
						
					</div>
				</div>
				
			</div>
			<div class="popup_modal wi_300p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login" id="gratis_popup_login">
				<div class="modal-content pad25 brd">
					<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
						We have sent a message on your phone
						<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
					</h3>
					<form method="POST" action="InformRelatives/sendEmail" id="save_indexing_email" name="save_indexing_email" accept-charset="ISO-8859-1">
						
						<div class="marb15 ">
							<label for="new-organization-name" class="sr-only">One Time Password</label>
							<input type="text" id="otp" name="otp" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Enter OTP">
						</div>
						
						<div class="red_bg" id="error_msg_opt">
						
						
					</div>
						
						
						
						
						<div class="mart30 talr">
							<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
							<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="checkOtp();">
							<input type="hidden" id="infor_id" name="infor_id" />
						</div>
					</form>
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