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
			function sendInformation()
			{
				$("#error_msg_form").html('');
				 
					
						if($("#email").val()=="" || $("#email").val()==null)
						{
							
						$("#error_msg_form").html('please provide email !!!');	
						return false;
						}
						else
						{
						document.getElementById('save_indexing').submit();	
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
                        <a href="../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      
		
		
		
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
					<div class="wi_550p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ">Invite</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >We need below contact details to invite parents.</a></div>
					
						 
								<form action="../addParentEmailInfo/<?php echo $data['child_id']; ?>/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									<div class="marb0 padtrl0">
										
										
										<div class="on_clmn mart10 xxs-mart10" >
											<div class="thr_clmn wi_30">
												<div class="pos_rel">
													
													<select id="cntry" name="cntry" class=" default_view wi_100 mart0  nobrdr nobrdt nobrdl   fsz18 ffamily_avenir  minhei_65p xxs-minhei_60p txtind25  llgrey_txt brdb  dropdown-bg85    talc padl0">
													<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
														<option value="<?php echo $value['country_name']; ?>" class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?> 
														
													</select>
													
												</div>
											</div>
											<div class="thr_clmn padl10 wi_70">
												
												<div class="pos_rel">
													
													<input type="number" name="search_phone" id="search_phone" placeholder="Mobil" class="txtind10 fsz18 xs-fsz16 brdb brdrad3 wi_100 ffamily_avenir xxs-minhei_60p  required minhei_65p nobrd talc black_txt" >
													
												</div>
												
											</div>
										</div>
										
										<div class="on_clmn mart20  marb35" >
																		
										<div class="pos_rel">

									<input type="text" name="email" id="email" placeholder="Email" class="wi_100 nobrdt nobrdl nobrdr pad10  xxs-minhei_60p talc  minhei_65p fsz18 red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir">

												</div>

																				
																			</div>
										
										
											
											<div class="clear"></div>
											<div class="red_txt fsz20" id="error_msg_form"> </div>
									</div>
									
									<div class="talc padtb20 "> <a href="#" onclick="sendInformation();"><input type="button" value="Next" class="ffamily_avenir forword minhei_55p t_67cff7_bg fsz16"  ></a>
										
									
									</div>
							 
									
								</form>
								
								
							</div>
							
						</div>
					</div>
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