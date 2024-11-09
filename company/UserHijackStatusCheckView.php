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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
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
			function getKey(id)
			{
			if(id==0)
			{
				 
				$("#get_key").attr('style','display:none');
				$('#findKey').addClass('marb35');
				
			}
			else if(id==1)
			{
			$('#findKey').removeClass('marb35');
			$("#get_key").attr('style','display:block');	
			$("#get_country").attr('style','display:block');
			$("#get_keyDetail").removeClass('wi_100');
			$("#get_keyDetail").addClass('wi_70 padl10');
			$('#search_key').attr('placeholder','Social security number');
			}
			else if(id==2)
			{
			$('#findKey').removeClass('marb35');
			$("#get_key").attr('style','display:block');	
			$("#get_country").attr('style','display:none');
			$("#get_keyDetail").addClass('wi_100');
			$("#get_keyDetail").removeClass('wi_70 padl10');
			$('#search_key').attr('placeholder','Card number');
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
			
		function submitForm()
			{
				var submit_form=true;
				$("#error_msg_form").html('');
				
					if($("#stype").val()==0)
				{
				
				$("#error_msg_form").html("please select search type !!!");
				submit_form=false;
					return false;
				}
				
				if($("#stype").val() == 1)
				{
					
				if($("#ccountry").val()==0)
				{
				
				$("#error_msg_form").html("please select country !!!");
				submit_form=false;
					return false;
				}	
					if($("#search_key").val()=="")
				{
				
				$("#error_msg_form").html("please enter ssn !!!");
				submit_form=false;
					return false;
				}
				
					
				}
				else if($("#stype").val() == 2)
				{
					if($("#search_key").val()=="")
				{
				
				$("#error_msg_form").html("please enter card number !!!");
				submit_form=false;
					return false;
				}
				
				else if(isNaN($("#search_key").val()))
				{
				
				$("#error_msg_form").html("please enter numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				
				else if($("#search_key").val().length!=16)
				{
				
				$("#error_msg_form").html("please enter 16 digit numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				}
				if(submit_form==true)
				{
				document.getElementById("save_indexing").submit();
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
		 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
			<!-- LOGIN FORM -->
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100   xxs-fsz45 padb10 trn  black_txt ffamily_avenir"  >Fraud</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Prevent a fraud purchase by making a search on social security number or Debit/Credit card number</a></div>
								 
						 
								<form action="../getUserInfo/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									<div class="marb0 padtrl0">
										
										
										<div class="on_clmn mart10 xxs-mart10 marb35" id="findKey">
											 
												<div class="pos_rel">
													
													<select id="stype" name="stype" class=" default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" onchange="getKey(this.value);" style="text-align-last:center;" >
													<option value="0" class="lgtgrey2_bg">Select</option>
														<option value="1"  class="lgtgrey2_bg">SSN</option>
														<option value="2" class="lgtgrey2_bg">Credit/Debit Cards</option>
														
													</select>
													
												 
											</div>
										 
										</div>
										
										<div class="on_clmn mart20 marb35" id="get_key" style="display:none">
											 
												<div class="thr_clmn  wi_30 padr10" id="get_country" style="display:none"> 
										<div class="pos_rel">
													<select id="ccountry" name="ccountry"  class="wi_100 minhei_65p fsz18 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 brdrad0  xxs-minhei_60p trans_bg nobold tall padl0 ffamily_avenir dropdown-bg"  style="text-align-last:center;"  >
														<option value="0">Select</option>
														<?php  foreach($countryInfo as $category => $value) 
																{
																	$category = htmlspecialchars($category); 
																?>
																
																<option value="<?php echo $value['id']; ?>"><?php echo $value['country_name']; ?></option>
															<?php 	}	?>
														
													</select>
												</div>
												</div>
												<div class="thr_clmn  wi_70 padl10" id="get_keyDetail" > 
											 
												
												<div class="pos_rel">
													
													<input type="text" name="search_key" id="search_key" placeholder="User search" class=" wi_100  pad10  xxs-minhei_60p  minhei_65p fsz18 talc red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir nobrdt nobrdl nobrdr ">
													
												</div>
												</div>
											 
										</div>
											
											<div class="clear"></div>
											<div class="red_txt fsz20 ffamily_avenir" id="error_msg_form"> </div>
									</div>
									
									<div class="talc padtb20 "> <a href="#" onclick="submitForm();"><input type="button" value="Search" class="forword hei_55p fsz18  red_ff2828_bg ffamily_avenir"  ></a>
										
									
									</div>
									
								</form>
								
								
							</div>
							
						</div>
					 
			<div id="popup_fade" class="opa0 opa55_a black_bg close_popup_modal" onclick="closePop();"></div>
			</div>
			
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
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