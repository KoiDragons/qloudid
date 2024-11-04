
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/stylenew.css" />
	<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="html/usercontent/css/modulesnew.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="html/usercontent/js/jquery.js"></script>
	<script type="text/javascript" src="html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="html/usercontent/modules.js"></script>
	<script type="text/javascript" src="html/usercontent/js/custom.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
	<script>
		function closePop()
		{
			document.getElementById("popup_fade").style.display='none';
			$("#popup_fade").removeClass('active');
			document.getElementById("person_informed").style.display='none';
			$(".person_informed").removeClass('active');
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
		function submitform()
		{
			
			$("#errorMsg").html('');
			 if($("#country").val()=="" || $("#country").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please select country');
				return false;
			}
			 if($("#cid").val()=="" || $("#cid").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please enter company identification number');
				return false;
			}
			else if($("#company_name").val()=="" || $("#company_name").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please enter company name');
				return false;
			}
			
			
			else if($("#property_id").val()==0)
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please choose property type');
				return false;
			}
			
			else if($("#autocomplete").val()=="" || $("#autocomplete").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please enter Address');
				return false;
			}
			
			
			
			
			else 
			{
				var data1=1;
				
					var send_data={};
					send_data.cid=$("#cid").val();
					send_data.country=$("#country").val();
					$.ajax({
						type:"POST",
						url:"AddCompany/checkCid",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
							if(data1==0)
							{
								$("#popup_fade").addClass('active');
								$("#popup_fade").attr('style','display:block');
								$("#gratis_popup_error").addClass('active');
								$("#gratis_popup_error").attr('style','display:block');
								$("#errorMsg").html('Please enter unique CID');
								return false;
							}
							else
							{
							document.getElementById('save_indexing').submit();
							}	
							
						}
					});
				
				
				
			}
			
			
		}
		
		function checkPosition(id)
		{
			
			if(id==1)
			{
				$("#nextInfo").attr('style','display:none');
			}
			
			else 
			{
				$("#nextInfo").attr('style','display:block');
			}
			
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
			
			
		</head>
		
	</head>
	<body class="white_bg">
		<?php $path1 = "html/usercontent/images/"; ?>
		<div class="column_m header xs-header bs_bb lgtgrey2_bg">
			<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey2_bg">
				
				<div class="logo  marr15 wi_140p xs-wi_80p">
					<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
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
													<div class="user_pic padt5"><a href="javascript:void(0);" data-value="sv" ><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="sv" >  Svenska</a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);" data-value="en"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="en" >  Engelska </a> </div>
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
				
				<div class="fright xs-dnone sm-dnone padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl "> <a href="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
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
				<div class="visible-xs visible-sm fright marr0 padr0 "> <a href="zoho_hr_portal7_subscription.html" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Erbjudande</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		
		
		<div class="column_m pos_rel">
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
					
						<div class="talc fsz75 green_txt"> <span class="fas fa-map-marker-alt"></span></div>
						<div class="padb10 ">
							
							<h1 class="padb5 talc fsz50 xs-fsz40 bold ">Klart...</h1>
							<p class="pad0 xs-padb10 talc fsz22 xs-fsz20 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Ditt företag är härmed registrerad under Qloudid.com och dess globala leverantörsnätverk...</p>
						</div>
						<div class="mart0 padb40 marb40 padrl5 xs-padrl15"> <a href="#" class="wi_100 maxwi_500p  minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2 xs-marrl0" >Gå vidare</a> </div>
					</div>
				</div>
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
		<script type="text/javascript" src="html/vacancycontent/js/custom.js"></script>
	</body>
							