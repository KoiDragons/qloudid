
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
					<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
										if($('#d_country').val()==0)
										{
										$("#error_msg_form").html('Please select country');
										return false;	
											
										}	
										else if($("#social_number").val()=="" || $("#social_number").val()==null)
										{
										
										$("#error_msg_form").html('Please enter social security number');
										return false;
										}
										else {
										var send_data={};

										send_data.ssn=$("#social_number").val();
										send_data.country=$("#d_country").val();	
										$.ajax({
										type:"POST",
										url: "../checkSsn/<?php echo $data['cid']; ?>",
										data:send_data,
										dataType:"text",
										contentType: "application/x-www-form-urlencoded;charset=utf-8",
										success: function(data1){
										if(data1==1)
										{
											
										$("#error_msg_form").html('This child is already registered !!!');
										return false;
										}
										else
										{
										if($("#fname").val()=="" || $("#fname").val()==null)
										{
										
										$("#error_msg_form").html('Please enter first name');
										return false;
										}
										if($("#lname").val()=="" || $("#lname").val()==null)
										{
										
										$("#error_msg_form").html('Please enter last name');
										return false;
										}
										 

										document.getElementById('save_indexing').submit();	
										}
										}
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
								<body class="white_bg ffamily_avenir">

									 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../helpCenter/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      <div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../helpCenter/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear" id=""></div>
	
	<div class="column_m pos_rel">
	  
									<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0  xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45 padb10 black_txt trn ffamily_avenir">Child</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >This is where you add a new child to your organization.</a></div>
														<form action="../addChildInfo/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
															<div class="marb0 padtrl0">

																<div class="on_clmn mart10 ">
																	<div class="thr_clmn  wi_30 "  >
												
												<div class="pos_rel">
													
													<select id="d_country" name="d_country" class=" default_view wi_100 mart0  nobrdr nobrdt nobrdl   fsz18 ffamily_avenir  minhei_65p xxs-minhei_60p txtind25  red_f5a0a5_txt brdb_red_ff2828 dropdown-bg85    talc padl0"  >
														<option value="0">Select</option>
														<?php  foreach($countryCodeList as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_70 padl20">			
																	<div class="pos_rel">

																		<input type="text" name="social_number" id="social_number" placeholder="Social number"  class=" wi_100 nobrdt nobrdl nobrdr pad10  xxs-minhei_60p talc  minhei_65p fsz18 red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir">

																		</div>
																	</div>
																	</div>
																	<div class="on_clmn mart20  marb35" >
																		<div class="thr_clmn wi_50 padr10">
																		
																			<div class="pos_rel">

																				<input type="text" name="fname" id="fname" placeholder="Name" class=" wi_100 nobrdt nobrdl nobrdr pad10   talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir">

																				</div>
																			</div>
																			<div class="thr_clmn padl10 wi_50">
																				
																				<div class="pos_rel">

																					<input type="text" name="lname" id="lname" placeholder="Last name" class="wi_100 nobrdt nobrdl nobrdr pad10 xxs-minhei_60p  talc  minhei_65p fsz18 red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir">

																					</div>

																				</div>
																			</div>

																			<div class="on_clmn mart20 marb25 hidden">
																					
																				<div class="pos_rel">

																					<input type="text" name="adrs1" id="autocomplete" onfocus="geolocate()" placeholder="Address"  autocomplete="off" class="wi_100 nobrdt nobrdl nobrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt ffamily_avenir">

																					</div>
																				</div>

																				<div id="error_msg_form" class="fsz20 red_txt ffamily_avenir"> </div>
																				<table id="address" class="hidden">
																					<tbody><tr>
																							<td class="label">Street address</td>
																							<td class="slimField"><input class="field" id="street_number" disabled="true"></td>
																								<td class="wideField" colspan="2"><input class="field" id="route" disabled="true"></td>
																								</tr>
																								<tr class="odd">
																									<td class="label">City</td>

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
																												<td class="wideField" colspan="3"><input class="field" id="country_1" disabled="true"></td>
																												</tr>
																											</tbody></table>

																									</div>
																									<div class="clear"></div>
																							<div class="talc padtb20 "> <a href="#" onclick="sendInformation();"><input type="button" value="Next" class="ffamily_avenir forword minhei_55p red_ff2828_bg fsz18"  ></a>
										
									
									</div>
																									




																									 
																									
																								
																							</form>
																						</div>
																					</div>
																				<div id="popup_fade" class="opa0 opa55_a black_bg">
																					</div>	
																				</div>
																				 
																				
			</div>
																				<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
																					<div class="modal-content pad25  nobrdb talc brdrad5 ">


																						

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