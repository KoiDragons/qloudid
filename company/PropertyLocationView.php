<?php
	$path1 = $path."usercontent/images/"; 
	
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>-->
	<script>
	
	  function updateInvoice(id,link)
   {
	   invoiceShow=1;
	    
   }	 
			
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
		if($("#property_id").val()==0)
		{
		
		$("#errorMsg").html('Please choose property type');
		return false;
		}
		if($("#autocomplete").val()=="" || $("#autocomplete").val()=="")
		{
		
		$("#errorMsg").html('Please enter visiting address');
		return false;
		}
		 if($('#phone_number').val()=='' || $('#phone_number').val()==null)
		 {
			$("#errorMsg").html('Please enter phone number');
				return false; 
		 }
		 if($("#daddress").val()=="" || $("#daddress").val()=="")
			{
				
				$("#errorMsg").html('Please enter delivery Address');
				return false;
			}
			
			 if($("#dcity").val()=="" || $("#dcity").val()=="")
			{
				
				$("#errorMsg").html('Please enter delivery city');
				return false;
			}
			 if($("#dzip").val()=="" || $("#dzip").val()=="")
			{
				
				$("#errorMsg").html('Please enter delivery zipcode');
				return false;
			}
			 if($("#d_port_number").val()=="" || $("#d_port_number").val()=="")
			{
				
				$("#errorMsg").html('Please enter delivery port');
				return false;
			}
			 if($("#same_invoice").val()==0)
			{
				if($("#iaddress").val()=="" || $("#iaddress").val()=="")
			{
				
				$("#errorMsg").html('Please enter invoice Address');
				return false;
			}
			
			 if($("#icity").val()=="" || $("#icity").val()=="")
			{
				
				$("#errorMsg").html('Please enter invoice city');
				return false;
			}
			 if($("#izip").val()=="" || $("#izip").val()=="")
			{
				
				$("#errorMsg").html('Please enter invoice zipcode');
				return false;
			}
			 if($("#i_port_number").val()=="" || $("#i_port_number").val()=="")
			{
				
				$("#errorMsg").html('Please enter invoice port');
				return false;
			}
			
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
							url:"<?php if(isset($data['id'])) { echo '../'; } ?>../checkAddress",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#errorMsg').html('we cant find address. Please add coordinates');
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
						send_data.address=encodeURIComponent($("#autocomplete").val());
						send_data.lat=($("#latit").val());
						send_data.lon=($("#longi").val());
						$.ajax({
							type:"POST",
							url:"<?php if(isset($data['id'])) { echo '../'; } ?>../checkAddresslatLong",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#errorMsg').html('we cant find address. Please enter valid coordinates');
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
		
		
	/*	
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
			 
				(document.getElementById('autocomplete')), {
					types: ['geocode']
				});
				
				// When the user selects an address from the dropdown, populate the address
				// fields in the form.
				autocomplete.addListener('place_changed', function() {
					fillInAddress(autocomplete, "");
				});
				
				autocomplete2 = new google.maps.places.Autocomplete(
			 
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
				
				*/
				function changeLat()
				{
					$('#latit').val('');
					$('#longi').val('');
					$('#lstatus').val(0);
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
			 
		<!--	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>-->
			
	 	
	</head>
	<body class="white_bg ffamily_avenir">
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
				<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Office</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Only register a workplace with same company identification number as headquarter.</a></div>
					 
							 
							
							<?php if(isset($data['id'])) { ?>
							<form action="../../updateLocationDetail/<?php echo $data['cid']; ?>/<?php echo $data['id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								<?php } else { ?>
							<form action="../addLocationDetail/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							<?php } ?>
							
										
										<input type="hidden" name="ccountry" id="ccountry" value="<?php echo $companyDetail['country_id']; ?>" />
										<div class="on_clmn  mart10  <?php if(isset($data['id'])) {  echo '';  } else { echo 'hidden'; } ?>" >
											

												<div class="pos_rel">
													<select id="property_id" name="property_id" class="default_view wi_100 mart0 trans_bg nobrdr nobrdt nobrdl   fsz18 brdb_red_ff2828 red_f5a0a5_txt minhei_65p ffamily_avenir xxs-minhei_60p input1 nobold  dropdown-bg   tall "  style="text-align-last:center;">
														
														
														<?php $i=0;
													
													foreach($propertyDetailInfo as $category => $value) 
													{
													?> 
														<option value="<?php echo $value['id']; ?>" <?php if(isset($data['id'])) { if($propertyInfo['property_id']== $value['id']) echo 'selected';  } else {  if($value['id']==6) echo 'selected'; } ?>><?php echo $value['property_name']; ?></option>
													<?php } ?>
														
													</select>
												</div>
											</div>
											<div class="on_clmn  mart20  brdb">	
								 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Visiting address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
											
											<input type="hidden" id="same_invoice" name="same_invoice" value="<?php if(isset($data['id'])) {  echo $propertyInfo['is_invoice_same']; } else echo 1; ?>" />
											<div class="on_clmn  <?php if(isset($data['id'])) {  echo 'mart0';  } else { echo 'mart0'; } ?> " >
											<div class="thr_clmn wi_70 padr20" >
											<div class="pos_rel">
											<input type="text" name="adrs1" id="autocomplete"   value="<?php if(isset($data['id'])) {  echo $propertyInfo['visiting_address']; } ?>" class="ffamily_avenir wi_100 nobrdr nobrdt nobrdl xxs-minhei_60p  talc  minhei_65p fsz18 trans_bg brdb_red_ff2828 red_f5a0a5_txt" autocomplete="off" placeholder="Visiting address" onchange="changeLat();"></div></div>
											
											<div class="thr_clmn wi_30" >
										<div class="pos_rel">
											
											<input type="text" name="port_number" id="port_number" class="ffamily_avenir wi_100 nobrdr nobrdt nobrdl xxs-minhei_60p  talc  minhei_65p fsz16 dark_grey_txt brdb trans_bg" placeholder="Port number" value="<?php if(isset($data['id'])) {  echo $propertyInfo['port_number']; } ?>"></div></div>	
											</div>
											
											<div id="locationDetail" style="display:none">
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel"  >
													
													
													<input type="text" name="latit" id="latit"   placeholder="Latitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"   value="<?php if(isset($data['id'])) {  echo $propertyInfo['latitude']; } ?>">
												</div>
												
												 	</div>
													
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel"  >
													
													
													<input type="text" name="longi" id="longi"   placeholder="Longitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"  value="<?php if(isset($data['id'])) {  echo $propertyInfo['longitude']; } ?>" >
												</div>
												
												 	</div>
													</div>		
									 
											<input type="hidden" id="lstatus" name="lstatus" value='<?php if(isset($data['id'])) {  echo 1; } else echo 0; ?>' />
									
											
										<div class="clear"></div>
										<div class="on_clmn  mart20  brdb">	
								 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Phone number" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 <div class="on_clmn mart0 ">
											<div class="thr_clmn  wi_30 padr10"> 
											<div class="pos_rel">
											<select    class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" style="text-align-last:center;" id="country_v" name="country_v"> 
											 
													<?php  foreach($resultContry as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['country_name']; ?>" class="lgtgrey2_bg" <?php if(isset($data['id'])) { if($companyDetail['country_id']==$value['id']) echo 'selected'; }?> >+<?php echo $value['country_code']; ?></option>
													<?php 	}	?>
											</select>
											</div>
											 </div>
											 
											 <div class="thr_clmn  wi_70 padl10"> 
											<div class="pos_rel">
											<input type="text" name="phone_number" id="phone_number"  placeholder="Phone number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if(isset($data['id'])) {  echo $propertyInfo['phone_number']; } ?>" /> 
											</div>
											 </div>
											 
										</div>
										<div class="on_clmn  mart20  brdb">	
								 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Delivery address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 <div class="on_clmn mart0 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="daddress" id="daddress"  placeholder="Delivery address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if(isset($data['id'])) {  echo $propertyInfo['street_name_v']; } ?>" /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="d_port_number" id="d_port_number"  placeholder="Delivery Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   value="<?php if(isset($data['id'])) {  echo $propertyInfo['d_port_number']; } ?>" /> 
												
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="dzip" id="dzip"  placeholder="Zipcode" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(isset($data['id'])) {  echo $propertyInfo['postal_code_v']; } ?>"  /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="dcity" id="dcity"  placeholder="Delivery city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   value="<?php if(isset($data['id'])) {  echo $propertyInfo['city_v']; } ?>" /> 
												
											</div>
											</div>
										</div>
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If Invoice address is same as delivery address?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(isset($data['id'])) {  if($propertyInfo['is_invoice_same']==1) echo 'checked'; } else echo 'checked'; ?>" onclick="updateInvoice(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div id="ShowInvoice" class="<?php if(isset($data['id'])) {  if($propertyInfo['is_invoice_same']==1) echo 'hidden'; } else echo 'hidden'; ?>">
										
										 <div class="on_clmn mart20 hidden">
											 
											<div class="pos_rel">
											<select    class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" style="text-align-last:center;" id="country_i" name="country_i"> 
											 
													<?php  foreach($resultContry as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['country_name']; ?>" class="lgtgrey2_bg" <?php if(isset($data['id'])) { if($companyDetail['country_id']==$value['id']) echo 'selected'; }?> ><?php echo $value['country_name']; ?></option>
													<?php 	}	?>
											</select>
											</div>
											 
											 
										</div>
										
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="iaddress" id="iaddress"  placeholder="Invoice address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if(isset($data['id'])) {  echo $propertyInfo['street_name_i']; } ?>" /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="i_port_number" id="i_port_number"  placeholder="Invoice Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   value="<?php if(isset($data['id'])) {  echo $propertyInfo['i_port_number']; } ?>" /> 
												
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="izip" id="izip"  placeholder="Zipcode" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if(isset($data['id'])) {  echo $propertyInfo['postal_code_i']; } ?>" /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="icity" id="icity"  placeholder="Invoice city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(isset($data['id'])) {  echo $propertyInfo['city_i']; } ?>"   /> 
												
											</div>
											</div>
										</div>
										</div>
										
										
										
										<div class="on_clmn  mart10 " id="isHeadquarter" style="display:none;">
											

												<div class="pos_rel">
											
											<h1 class="mart10 tall fsz25 xs-fsz20 bold brdb_new ">Är detta huvudkontoret?</h1>
											
												<select name="is_headquarter" id="is_headquarter" class="ffamily_avenir nobold  dropdown-bg default_view wi_100 mart0 trans_bg nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p  dark_grey_txt tall xxs-minhei_60p" style="text-align-last:center;">
													
													
													<option value="0" class="lgtgrey2_bg" <?php if(isset($propertyInfo)) { if($propertyInfo ['is_headquarter']==0) echo 'selected'; } ?>>No</option>
													<option value="1" class="lgtgrey2_bg" <?php if(isset($propertyInfo)) { if($propertyInfo ['is_headquarter']==1) echo 'selected'; } ?>>Yes</option>
													
													
												</select>
												
											
											
										</div>
									</div>
								 	
									<div id="errorMsg" class="fsz20 red_txt">	 </div>
									
									<div class="clear"></div>
									<div class="talc padtb20 mart35"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Submit" class="forword red_ff2828_bg minhei_55p fsz18 ffamily_avenir"  ></a>
										
									
									</div>	
							
								
								<div id="addressone" class="hidden">
									<input type="text" id="street_number" name="street_number" value="<?php if(isset($data['id'])) {  echo $propertyInfo['street_number_v']; } ?>" />
									<input type="text" id="route" name="street_name" value="<?php if(isset($data['id'])) {  echo $propertyInfo['street_name_v']; } ?>"/>
									<input type="text" id="locality" name="town_city" value="<?php if(isset($data['id'])) {  echo $propertyInfo['city_v']; } ?>"/>
									<input type="text" id="administrative_area_level_1" name="administrative_area_level_1" value="<?php if(isset($data['id'])) {  echo $propertyInfo['state_v']; } ?>" />
									<input type="text" id="postal_code" name="postcode" value="<?php if(isset($data['id'])) {  echo $propertyInfo['postal_code_v']; } ?>"/>
									<input type="text" id="country" name="country" value="<?php if(isset($data['id'])) {  echo $propertyInfo['country_v']; } ?>"/>
								</div>	
								<input type="hidden" id="indexing_save" name="indexing_save" />
								
							</form>
						</div>
					
					
					
					</div>
				</div>
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
		<div class="modal-content pad25 brd brdrad10">
			
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
				
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
			
			
		</div>
	</div>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
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