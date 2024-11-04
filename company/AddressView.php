<?php
	$path = "../";
	
	
	$path1 = $path."usercontent/images/"; 
	
	if(isset($_POST['indexing_save']))
	{	print_r($_POST); die; }
	
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnew.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
	async defer></script>
	<script>
		
		function submitform()
		{
		$("#errorMsg").html('');
		if($("#country").val()=="" || $("#country").val()=="")
		{
		$("#errorMsg").html('Please enter visiting address');
		return false;
		}
		if($("#country2").val()=="" || $("#country2").val()=="")
		{
		$("#errorMsg").html('Please enter Invoicing Address');
		return false;
		}
			document.getElementById('save_indexing').submit();
		}
		
		
		
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		
		gtag('config', 'UA-126618362-1');
		var placeSearch, autocomplete, autocomplete2;
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
			/** @type {!HTMLInputElement} */
				(document.getElementById('autocomplete')), {
					types: ['geocode']
				});
				
				// When the user selects an address from the dropdown, populate the address
				// fields in the form.
				autocomplete.addListener('place_changed', function() {
					fillInAddress(autocomplete, "");
				});
				
				autocomplete2 = new google.maps.places.Autocomplete(
				/** @type {!HTMLInputElement} */
					(document.getElementById('autocomplete2')), {
						types: ['geocode']
					});
					autocomplete2.addListener('place_changed', function() {
						fillInAddress(autocomplete2, "2");
					});
					
				}
				
				function fillInAddress(autocomplete, unique) {
					// Get the place details from the autocomplete object.
					var place = autocomplete.getPlace();
					
					for (var component in componentForm) {
						if (!!document.getElementById(component + unique)) {
							document.getElementById(component + unique).value = '';
							document.getElementById(component + unique).disabled = false;
						}
					}
					
					// Get each component of the address from the place details
					// and fill the corresponding field on the form.
					for (var i = 0; i < place.address_components.length; i++) {
						var addressType = place.address_components[i].types[0];
						if (componentForm[addressType] && document.getElementById(addressType + unique)) {
							var val = place.address_components[i][componentForm[addressType]];
							document.getElementById(addressType + unique).value = val;
						}
					}
				}
				google.maps.event.addDomListener(window, "load", initAutocomplete);
				
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
		
	</head>
	<body class="lgtblue2_bg">
		<div class="column_m header xs-header header_small bs_bb lgtblue2_bg">
			<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtblue2_bg ">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 wi_170p">
					<a href="#"><h3 class="marb0 pad0 padt10 fsz27 black_txt " style="font-family: 'Audiowide', sans-serif;">Workplace</h3></a>
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
				
				<div class="fright xs-dnone sm-dnone padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl "> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25  uppercase lgn_hight_30 black_txt  fsz15" data-en="Ring 010-1510125" data-sw="Ring 010-1510125">Ring 010-1510125</a> </li>
					</ul>
				</div>
				<div class="visible-xs visible-sm fright  brdr brdwi_3"> <a href="zoho_hr_portal7_subscription.html" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Erbjudande</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
		
		<div class="column_m pos_rel">
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
						<div class="talc fsz75 green_txt"> <span class="fa fa-user"></span></div>
						<div class="padb10 ">
							
							<h1 class="padb5 talc fsz50 xs-fsz40 bold ">Anställd</h1>
							<p class="pad0 xs-padb10 talc fsz22 xs-fsz20 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Lägg till en person som anställd</p>
						</div>
						<div class="container padrl0 xs-padrl0">
							
							
							<form action="../addLocationDetail/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								<div class="popup-content padb0 xs-padb0">
									
									<div class="padb0 xs-padrl10">
										
										
										<div class="mart10 wi_100 dflex fxwrap_w">
											
											<div class="wi_100 jk xs-wi_33 bs_bb padrl5 padb10 ">
												
												<div class="wi_100 dflex alit_c">
													<select id="property_id" name="property_id" class="default  white_bg default_view nobrd wi_100 mart5 pad10 hei_50p fsz18 llgrey_txt">
														
														<option value="0">-- Select --</option>
														<option value="7">Boutique</option>
														<option value="2">Daycare</option>
														<option value="1">Factory</option>
														<option value="6">Food store</option>
														<option value="9">Offices</option>
														<option value="10">Real estates</option>
														<option value="5">Restaurants</option>
														<option value="3">School</option>
														<option value="8">Sport centers</option>
														<option value="4">Warehouses</option>
														
													</select>
												</div>
											</div>
											
											<div class="wi_100 xs-wi_33 bs_bb padrl5 padb10"><div class="wi_100 dflex alit_c"><input type="text" name="adrs1" id="autocomplete" onfocus="geolocate()" class="white_bg default_view nobrd wi_100 mart5 pad10 hei_50p fsz18 llgrey_txt"autocomplete="off" placeholder="Visiting/Delivery Address"></div></div>
											<div class="wi_100 xs-wi_33 bs_bb padrl5 padb10"><div class="wi_100 dflex alit_c"><input type="text" name="adrs2" id="autocomplete2" onfocus="geolocate()" class="white_bg default_view nobrd wi_100 mart5 pad10 hei_50p fsz18 llgrey_txt"autocomplete="off" placeholder="Invoicing Address"></div></div>
											
											
											
										</div>
									</div>
									
								</div>
								<div id="addresstwo" class="hidden">
									<input type="text" id="street_number2" name="street_number2" />
									<input type="text" id="route2" name="street_name2" />
									<input type="text" id="locality2" name="town_city2" />
									<input type="text" id="administrative_area_level_12" name="administrative_area_level_12" />
									<input type="text" id="postal_code2" name="postcode2" />
									<input type="text" id="country2" name="country2" />
								</div>
								<div id="addressone" class="hidden">
									<input type="text" id="street_number" name="street_number" />
									<input type="text" id="route" name="street_name" />
									<input type="text" id="locality" name="town_city" />
									<input type="text" id="administrative_area_level_1" name="administrative_area_level_1" />
									<input type="text" id="postal_code" name="postcode" />
									<input type="text" id="country" name="country" />
								</div>	
								<input type="hidden" id="indexing_save" name="indexing_save" />
								<div id="errorMsg" class="red_txt"></div>
							</form>
						</div>
						<div class="mart0 padb10 xs-padrl0"> <a href="#" class="wi_100 maxwi_500p  minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2 xs-marrl0" onclick="submitform();">Lägg till</a> </div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']==1)
			{
				echo '<script>alert("Some error occured while completing your request !!!")</script>';	
			}
			else if($_GET['error']==2)
			{
				echo '<script>alert("You have an active employee for the same email !!!")</script>';	
			}
		}
	?>	