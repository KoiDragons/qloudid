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
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
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
			
			$("#errorMsg1").html('');
			 if($("#country").val()==0 || $("#country").val()=="")
			{
				
				$("#errorMsg1").html('Please select country');
				return false;
			}
			 if($("#company_type").val()==0 || $("#company_type").val()=="")
			{
				
				$("#errorMsg1").html('Please select company type');
				return false;
			}
			
			
			 if($("#cid").val()=="" || $("#cid").val()=="")
			{
				
				$("#errorMsg1").html('Please enter company identification number');
				return false;
			}
			else if($("#company_name").val()=="" || $("#company_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter company name');
				return false;
			}
			
			
			else if($("#property_id").val()==0)
			{
				
				$("#errorMsg1").html('Please choose property type');
				return false;
			}
			
			else if($("#autocomplete").val()=="" || $("#autocomplete").val()=="")
			{
				
				$("#errorMsg1").html('Please enter Address');
				return false;
			}
			
			else if($("#daddress").val()=="" || $("#daddress").val()=="")
			{
				
				$("#errorMsg1").html('Please enter delivery Address');
				return false;
			}
			
			else if($("#dcity").val()=="" || $("#dcity").val()=="")
			{
				
				$("#errorMsg1").html('Please enter delivery city');
				return false;
			}
			else if($("#dzip").val()=="" || $("#dzip").val()=="")
			{
				
				$("#errorMsg1").html('Please enter delivery zipcode');
				return false;
			}
			else if($("#d_port_number").val()=="" || $("#d_port_number").val()=="")
			{
				
				$("#errorMsg1").html('Please enter delivery port');
				return false;
			}
			else if($("#same_invoice").val()==0)
			{
				if($("#iaddress").val()=="" || $("#iaddress").val()=="")
			{
				
				$("#errorMsg1").html('Please enter invoice Address');
				return false;
			}
			
			else if($("#icity").val()=="" || $("#icity").val()=="")
			{
				
				$("#errorMsg1").html('Please enter invoice city');
				return false;
			}
			else if($("#izip").val()=="" || $("#izip").val()=="")
			{
				
				$("#errorMsg1").html('Please enter invoice zipcode');
				return false;
			}
			else if($("#i_port_number").val()=="" || $("#i_port_number").val()=="")
			{
				
				$("#errorMsg1").html('Please enter invoice port');
				return false;
			}
			
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
								
								$("#errorMsg1").html('Please enter unique CID');
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
				$("#isHeadquarter").attr('style','display:none');
				$(".val1").addClass('marb35');
			}
			
			else 
			{
				$("#isHeadquarter").attr('style','display:block');
				$(".val1").removeClass('marb35');
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
	<body class="white_bg">
		<?php $path1 = $path."html/usercontent/images/"; ?>
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/PrivateSearchResult" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.qloudid.com/user/index.php/PrivateSearchResult" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Company</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Register your company as an employer and supplier.</a></div>
			 
					 <div class="clear"></div>
							
							<form action="AddCompany/addCompanyDetail" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											
											<input type="hidden" name="country" id="country" value="<?php echo $userSummary['country_of_residence']; ?>" />
											
											<!--<input type="hidden" name="company_type" id="company_type" value="1" />-->
											<div class="on_clmn mart20">
												
											<select name="company_type" id="company_type"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 
														<option value="1">Company</option>
														<option value="2">Community</option>
														<option value="3">Goverment</option>
														 
											</select>
											</div>
											
									 <div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
											<select    class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb lgt_grey_txt fsz18  minhei_65p xxs-minhei_60p trans_bg   tall padl0 ffamily_avenir" style="text-align-last:center;" disabled> 
											 
													<?php  foreach($resultContry as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($userSummary['country_of_residence']==$value['id']) echo 'selected'; ?> disabled><?php echo $value['country_name']; ?></option>
													<?php 	}	?>
											</select>
											</div>
											</div>
											<div class="thr_clmn  wi_70 padl20">
											<div class="pos_rel">
												
												<input type="text" name="cid" id="cid" placeholder="Corporate Identification number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"/>
												
											</div>
											</div>
										</div>
									 <div class="on_clmn mart20 ">
											
											<div class="pos_rel">
												
												<input type="text" name="company_name" id="company_name" placeholder="Company name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											</div>
										</div>
									  <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="adrs1" id="autocomplete" onfocus="geolocate()" placeholder="Visiting address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  autocomplete="off" /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="port_number" id="port_number"  placeholder="Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 lgt_grey_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="daddress" id="daddress"  placeholder="Delivery address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="d_port_number" id="d_port_number"  placeholder="Delivery Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="dzip" id="dzip"  placeholder="Zipcoe" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="dcity" id="dcity"  placeholder="Delivery city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
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
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked" onclick="updateInvoice(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div id="ShowInvoice" class="hidden">
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="iaddress" id="iaddress"  placeholder="Invoice address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="i_port_number" id="i_port_number"  placeholder="Invoice Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="izip" id="izip"  placeholder="Zipcoe" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="icity" id="icity"  placeholder="Invoice city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										</div>
										
										 <div class="on_clmn mart20 hide">
												
											<select name="property_id" id="property_id"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 
														<?php $i=0;
															
															foreach($propertyDetailInfo as $category => $value) 
															{
															?> 
															<option value="<?php echo $value['id']; ?>" ><?php echo $value['property_name']; ?></option>
														<?php } ?>
											</select>
											</div>
						
										  
											<div class="on_clmn mart20  marb35 val1 ">
									<div class="thr_clmn  wi_30 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Your role" class="wi_100 rbrdr pad10 brdb_red_ff2828  tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_70 padl20" id="valy">
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828    fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="checkPosition(this.value);"> 
											 <option value="0" class="lgtgrey2_bg">Select</option>
														<option value="1" class="lgtgrey2_bg">Vanlig anställd</option>
													<option value="2" class="lgtgrey2_bg">Chef / Ledare</option>
													<option value="3" class="lgtgrey2_bg">Ägare</option>
														 
											</select>
											</div>
											</div>
											</div>
											 <div class="on_clmn mart20 marb35" id="isHeadquarter" style="display:none;">
												<div class="thr_clmn  wi_30 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is this headquarter?" class="wi_100 rbrdr pad10 brdb_red_ff2828  tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_70 padl20" id="valy">
								<div class="pos_rel">											
											<select name="is_headquarter" id="is_headquarter" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828    fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" > 
											<option value="0" class="lgtgrey2_bg">Nej </option>
													<option value="1" class="lgtgrey2_bg">Ja</option>
														 
											</select>
											</div>
											</div>
											 
											</div>
											
											 	 
												<table id="address" class="hidden">
													<tbody>
													<tr>
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
													</tbody>
													</table>
										
											 
									 
								 </div>
								
								<input type="hidden" id="same_invoice" name="same_invoice" value="1" />
								<input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir"> <a href="#" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
						</div>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
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
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
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