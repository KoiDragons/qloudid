
<!DOCTYPE html>
<html lang="en">
	<?php $path1 = $path."html/usercontent/images/"; ?>
	<head>
		<meta charset="utf-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
				<title>Qmatchup</title>
				<!-- Styles -->
				<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">

					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />

					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
					<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
						<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
									async defer></script>
							<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
							<script type="text/javascript">
								var _gaq = _gaq || [];
								_gaq.push(['_setAccount', 'UA-11097556-8']);
								_gaq.push(['_trackPageview']);

								(function() {
								var ga = document.createElement('script');
								ga.type = 'text/javascript';
								ga.async = true;
								ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
								var s = document.getElementsByTagName('script')[0];
								s.parentNode.insertBefore(ga, s);
								})();


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
								country_1: 'long_name',
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



									</script>	

									<script>

										function changeClass(link)
										{

										$(".class-toggler").removeClass('active');
										$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
										$(link).closest('.fa-caret-down').removeClass('hidden');
										}
										function checkEmail(id) {

										var email = document.getElementById(id);
										var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

										if (!filter.test(email.value)) {
										alert('Please provide a valid email address');
										email.focus();
										return false;
										}
										else
										return true; 


										}
										function sendInformation()
										{
										$("#error_msg_form").html('');

										var bg_url = $('#image-data').css('background-image');

										if(bg_url!="" || bg_url!=null || bg_url!="none")
										{
										$('#image-data1').val(bg_url);
										}


										document.getElementById('save_indexing').submit();	


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
										function closePop()
										{
										document.getElementById("popup_fade").style.display='none';
										$("#popup_fade").removeClass('active');
										document.getElementById("person_informed").style.display='none';
										$(".person_informed").removeClass('active');
										}
									</script>	

								</head>

								<?php $path1 = $path."html/usercontent/images/"; ?>
								<body class="white_bg">

									<div class="column_m header xs-header bs_bb lgtblue2_bg">
		<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtblue2_bg">
			
			<div class="logo padt10 wi_50p xs-wi_50p"><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="visible-xs visible-sm fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
			
		<div class="fright xs-dnone visible_si padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
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
			<div class="visible-xs visible-xxs fright marr0 xs-padt10 "> <a href="#" class="diblock padrl20 brdrad3  lgn_hight_29 fsz14 black_txt">Close</a> </div>
			<div class="clear"></div>
		</div>
	</div>
	
									<div class="clear" id=""></div>
									<div class="column_m marb30 mart40 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0" id="loginBank1"  onclick="checkFlag();">
				<div class="padrl10 white_bg xs-padrl25">
					<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart40 xs-mart0">
						
							<div class="wi_500p maxwi_100  pos_rel zi5 marrla pad10  xs-pad0  ">
								
								<h3 class="marb0  xxs-talc talc fsz35 xs-fsz25 bold marb5 black_txt trn" >Register Dependents</h3>
															<div class="padb20 padt10 xxs-talc talc"> <a href="#" class="black_txt fsz20 xs-fsz20 xxs-talc talc edit-text jain_drop_company trn " >Please upload dependent image</a></div>
<form action="../updateDependentInfo/<?php echo $data['dependent_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
																										<div class="column_m scroll_menu_header mart10 padb30 " data-params="class|dark_grey_txt" data-text="Passport">

																											<div class="container pad25 fsz14 dark_grey_txt">
																												<div class="passport column_m signin_bx  tall">

																													<div class="wi_100 fleft">
																														<div class="wp_columns_upload wp_columns_upload_custom marr5">
																															<input type="hidden" name="image-data1" id="image-data1" value=""  />


																															<div class="imgwrap ">
																																<div class="cropped_image "  id="image-data" name="image-data"></div>
																																<div class="cropped_image"></div>
																																<div class="subimg_load">
																																	<a href="#" class="load_button">Change</a>
																																</div>
																															</div>
																														</div>
																														
																													</div>

																												</div>
																											</div>
																										</div>

																									
<div class="talc padtb10 mart10 "> <a href="#" onclick="sendInformation();"><input type="button" value="Next" class="forword minhei_55p"  ></a>
										
									
									</div>
																																															</form>
																						</div>
																					</div>
																					<div id="popup_fade" class="opa0 opa55_a black_bg"></div>	
																				</div>
																				</div>
																				<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
																					<div class="modal-content pad25  nobrdb talc brdrad5 ">


																						<div id="error_msg_form" class="fsz20"> </div>

																						<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
																					</div>
																				</div>
																				<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
																				<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />

																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script> 
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script> 
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script> 
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/s/vex.combined.min.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_image.js"></script><script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>


																			</body>
																		</html>