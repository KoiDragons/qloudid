
<!DOCTYPE html>
<html lang="en">

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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
	async defer></script>
	<script>
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
				
	</script>
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
     	function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
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
			
			function informEmployee()
			{
				$("#error_msg_form").html('');
				
			 
				
				if($("#autocomplete").val()=="" ||  $("#autocomplete").val()==null ||  $("#autocomplete").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					return false;
				}
				 
				var autoCom=$("#autocomplete").val();
				var portDetail=$("#port_number").val()
				var addressDetail=autoCom+' '+portDetail;
				if($('#lstatus').val()==0)
					{
				var send_data={};
						send_data.address=encodeURIComponent(addressDetail);
						$.ajax({
							type:"POST",
							url:"../checkAddress",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#error_msg_form').html('we cant find address. Please add coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									 $('#locationDetail').attr('style','display:block;');
									$("#latit").val(obj[0]['lat']);
									
									$("#longi").val(obj[0]['lon']);	
									document.getElementById('save_indexing').submit()
								}
							}
						});	
					}
					
					if($('#lstatus').val()==1)
					{
				var send_data={};
						send_data.address=encodeURIComponent($("#addrs").val());
						send_data.lat=($("#latit").val());
						send_data.lon=($("#longi").val());
						$.ajax({
							type:"POST",
							url:"../checkAddresslatLong",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#error_msg_form').html('we cant find address. Please enter valid coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									 $('#locationDetail').attr('style','display:block;');
									 
									document.getElementById('save_indexing').submit()
								}
							}
						});	
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
                        <a href="https://www.safeqloud.com/company/index.php/Company/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/Company/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
				
				 
	
	<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40   xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ffamily_avenir">Address</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please add your complete address here.</a></div>
									
									<form action="../companyAccount/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									 
									 
									<div class="on_clmn mart10">
										<div class="thr_clmn wi_70 padr20" > 
										<div class="pos_rel">
										<input type="text" name="addrs"  placeholder="Street address " id="autocomplete"  class="ffamily_avenir txtind10 fsz18   wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc red_f5a0a5_txt brdb_red_ff2828" value="<?php if($addressDetail['visiting_address']!="" || $addressDetail['visiting_address']!= null) echo $addressDetail['visiting_address']; else echo "-"; ?>"  onfocus="geolocate()" autocomplete="off"/>
										
										 
									 
									</div>
									</div>
									<div class="thr_clmn wi_30" >
										<div class="pos_rel">
											
											<input type="text" name="port_number" id="port_number" class="ffamily_avenir wi_100 nobrdr nobrdt nobrdl xxs-minhei_60p  talc  minhei_65p fsz16 dark_grey_txt brdb trans_bg" placeholder="Port number" value="<?php echo $addressDetail['port_number'];?>"></div></div>	
									 
									</div>
									
								 <div id="addressone" class="hidden">
									<input type="text" id="street_number" name="street_number"  />
									<input type="text" id="route" name="street_name" />
									<input type="text" id="locality" name="town_city" />
									<input type="text" id="administrative_area_level_1" name="administrative_area_level_1"  />
									<input type="text" id="postal_code" name="postcode" />
									<input type="text" id="country" name="country" />
								</div>
									
									<div id="locationDetail" style="display:none">
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel"  >
													
													
													<input type="text" name="latit" id="latit"   placeholder="Latitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"  >
												</div>
												
												 	</div>
													
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel"  >
													
													
													<input type="text" name="longi" id="longi"   placeholder="Longitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"  >
												</div>
												
												 	</div>
													</div>		
									 
									 
								<div class="clear"></div>
								<input type="hidden" id="lstatus" name="lstatus" value='0' />
								<input type="hidden" id="visit_addrs" name="visit_addrs" value='1' />
								<div class="valm fsz20 red_txt marb35" id="error_msg_form"> </div>
							<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18" onclick="informEmployee();">Submit</button>
								
							</div>
							<!-- /bottom-wizard -->
						</form>
						
					
					</div>
					<!-- /Wizard container -->
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		  
	 
	
	  
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
</body>
</html>