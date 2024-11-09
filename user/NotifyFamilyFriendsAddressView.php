<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		 <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
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
			
			function submitForm()
			{
				$("#error_msg_form").html('');
				if($("#autocomplete").val()=="" || $("#autocomplete").val()==null)
				{
					$("#error_msg_form").html('Address can not be blank');
					return false;
					
				}
				
				document.getElementById('save_indexing').submit();
				
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
		
		<body class="white_bg" id="bodyBg">
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/NotifyFamilyFriends" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel   marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  fsz30  black_txt_h" style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </li>
						
					</ul>
				</div>
            <div class="clear"></div>
         </div>
      </div>
<div class="column_m header hei_55p  bs_bb white_bg visible-xs" >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/NotifyFamilyFriends" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left " aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			 <div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz30  " style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </div> 
				 
				<div class="clear"></div>
			</div>
		</div>		
			
			<div class="clear" id=""></div>

			
		
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
					<a href="https://www.safeqloud.com/public/index.php/NotifyFamilyFriends">	<input type="button" value="Pröva igen" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" ></a>
						
					</div>
					</div><div class="clear"></div>
			
			
			
												</div>
												</div>		
			
			<div class="clear"></div>
			
			<!-- LOGIN FORM -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart0 xs-pad0">
					
						<div class="padb0 xxs-padb0 ">	
							
									<img src="../../../../html/usercontent/images/Map-Icon.png" class="maxwi_100 brdrad5 xs-image_dimensions_200 image_dimension_250">
									</div>
									<!-- Logo -->
									<div class="martb20  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Via denna tjänst meddelas den skadade persons anhöriga. Tjänsten är kostnadsfri.</a></div>
										
								
					<form action="../updateAddress/<?php echo $data['id']; ?>" method="POST" id="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
						
									<div class="marb0 padrl0 first">
										
										
										<div class="on_clmn padtb0">
											
											
											<div class="on_clmn mart10 marb35 ">
												
												
												
												<div class="pos_rel" id="locationField1">
													
													
													<input type="text" name="adrs1" id="autocomplete" onfocus="geolocate()" placeholder="Finns på adress" class="txtind10 fsz18  brdb_red_ff2828 red_f5a0a5_txt  wi_100  required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc trans_bg ffamily_avenir" autocomplete="off">
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
											
											
											
											
											<input type="hidden" name="user_id" id="user_id" />
											<div id="error_msg_form" class="red_txt fsz20"></div>
											<div class="clear"></div>
										</div>
										
										
										
										
										<div class="clear"></div>
										<div class="padt5 xxs-talc talc padb10 marb20">
								
								<button type="button" name="forward" class="forword hei_55p bg_ff5bad fsz18 trn ffamily_avenir" onclick="submitForm();">Next</button>
								
							</div>
										
									<a href="../addImage/<?php echo $data['id']; ?>" class="mart10 fsz18 ffamily_avenir">I cant tell the address</a>
									</div>
									</form>
									
									
									
									
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