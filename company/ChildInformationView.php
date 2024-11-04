<!doctype html>
<html>
	<?php
		function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );
//print_r($data); die;
    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[1] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}
		$path1 = "../../html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
		
	if($childrenDetail ['child_image_path']!=null) { $filename="../estorecss/".$childrenDetail ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$childrenDetail ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$childrenDetail['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
	
	
	if($childrenDetail ['child_image_path']!=null) { $filename="../estorecss/".$childrenDetail ['child_image_path'].".txt"; if (file_exists($filename)) { $value_e=file_get_contents("../estorecss/".$childrenDetail ['child_image_path'].".txt"); $value_e=str_replace('"','',$value_e); } else { $value_e="../html/usercontent/images/person-male.png"; } }  else $value_e="../html/usercontent/images/person-male.png";
	
	?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
	async defer></script>
		<script>
		
			function openPopup()
         {
         if($("#openPop").hasClass('active'))
         {
         $("#openPop").removeClass('active')
         $("#openPop").attr('style','display:none');
         }
         else
         {
         $("#openPop").addClass('active')
         $("#openPop").attr('style','display:block');
         }
         }
	function checkFlag()
		{
		if($("#openPop").hasClass('active'))
         {
         $("#openPop").removeClass('active')
         $("#openPop").attr('style','display:none');
         }
		
		}
			function removeActive()
			{
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function raActive()
			{
				
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rbActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown2").removeClass('active');
			}
			var currentLang = 'sv';
										function sendInformation()
										{
										$("#error_msg_form").html('');

										var bg_url = $('#image-data').css('background-image');

										if(bg_url!="" || bg_url!=null || bg_url!="none")
										{
										$('#image-data1').val(bg_url);
										}
										
										if($("#fname").val()=="" || $("#fname").val()==null)
										{
										document.getElementById("popup_fade").style.display='block';
										$("#popup_fade").addClass('active');
										document.getElementById("person_informed").style.display='block';
										$(".person_informed").addClass('active');
										$("#error_msg_form").html('Please enter first name');
										return false;
										}
										if($("#lname").val()=="" || $("#lname").val()==null)
										{
										document.getElementById("popup_fade").style.display='block';
										$("#popup_fade").addClass('active');
										document.getElementById("person_informed").style.display='block';
										$(".person_informed").addClass('active');
										$("#error_msg_form").html('Please enter last name');
										return false;
										}
										if($("#autocomplete").val()=="" || $("#autocomplete").val()==null)
										{
										document.getElementById("popup_fade").style.display='block';
										$("#popup_fade").addClass('active');
										document.getElementById("person_informed").style.display='block';
										$(".person_informed").addClass('active');
										$("#error_msg_form").html('Please enter address');
										return false;
										}
										
										if($("#bgroup").val()==0 || $("#bgroup").val()==null)
										{
										document.getElementById("popup_fade").style.display='block';
										$("#popup_fade").addClass('active');
										document.getElementById("person_informed").style.display='block';
										$(".person_informed").addClass('active');
										$("#error_msg_form").html('Please select blood group');
										return false;
										}
										

										document.getElementById('save_indexing').submit();	
										
										
										
										}




			
		
		</script>
	
	
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
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
			<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738"  >
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../ChilldCare/helpCenter/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
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
                        <a href="../../ChilldCare/helpCenter/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25" onclick="openPopup();"><span class="fas fa-list  " aria-hidden="true" ></span></a>
						<ul id="openPop" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									<div class="fsz16i trn">Menu items</div>
									<ol class="mart10">
									<li>
                    <div class=" mart10"></div>
                  </li>
									<li class="first"><a href="../childNewsDetail/<?php echo $data['child_id']; ?>" class="fsz16i" ><span class="fas fa-gift padr15"> </span>Newsfeed</a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				  
										
                  <li><a href="../childAttendenceHistory/<?php echo $data['child_id']; ?>" class="fsz16i"><span class="fas fa-list-ol padr15"> </span> Presence</a></li>
				   <li>
                    <div class="line martb10"></div>
                  </li>
                  <li><a href="javascript:void(0);" class="fsz16i"><span class="fas fa-drafting-compass padr15"> </span> Details</a></li>
				  <li>
                    <div class="line martb10"></div>
                  </li>
                  <li><a href="../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="fsz16i"><span class="fas fa-users padr15"> </span>Parents</a></li>
				   <li>
                    <div class="line martb10"></div>
                  </li>
				   <li><a href="../relativeDetail/<?php echo $data['child_id']; ?>" class="fsz16i"><span class="fas fa-users padr15"> </span>Drop & Pick up</a></li>
				   <li>
                    <div class="line martb10"></div>
                  </li>
                    </ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
</div>
			  
			 
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				
				<div class="wi_240p fleft pos_rel zi50">
												<div class="padrl10">

													<!-- Scroll menu -->
													<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
														<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new" id="scroll_menu">
														
														<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20 marb10">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<img src="../../../<?php echo $value_a; ?>" height="100" width="100" class="brdrad5 padb0">
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="fsz30 ffamily_avenir"> <span><?php echo $childrenDetail['first_name']; ?></span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
											<ul class="dblock mar0 padl10 fsz16">
										
										
										<!-- Company -->
										
										
										
										
										<li class="dblock pos_rel padb10 padt0 brdclr_hgrey  first last">
											 
											<ul class="marr20 pad0">
											
												
							  <li class="dblock padrb10 ">
                                 <a href="../childNewsDetail/<?php echo $data['child_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Newsfeed </span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>  
							  	<li class="dblock padrb10 ">
                                 <a href="../childAttendenceHistory/<?php echo $data['child_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Presence</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
							 <li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb tb_67cff7_bg brd_width_2 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Details</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
								 
									 <li class="dblock padrb10 padt5">
                                 <a href="../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Parents</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>			 
									 <li class="dblock padrb10 ">
                                 <a href="../relativeDetail/<?php echo $data['child_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Drop & Pick up</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>				
												 
												
											</ul>
											
										</li>
										
										
										
										
										
									</ul>
								
								
								
															 
														 

														</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>

											
				
				
						 					
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 xsi-padl0 xs-padl0 padl20">
								 
						
						<form action="../updateChildInfo/<?php echo $data['child_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
						 
							
							<div class="marb25 wi_500p maxwidth_100 padrl10  xxs-padrl75">
						
									<div class="wi_100 xxs-wi_100 xxs-padrl75 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white wi_200p hei_200p">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd borderr">
											<div class="cropped_image cropped_image_added borderr grey_brd5" style="background-image: <?php echo $value_e; ?>;" id="image-data" name="image-data"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
							 
								
							</div>
							
							 <div class="column_m container  marb25   fsz14 dark_grey_txt wi_500p maxwidth_100 padr20 padl10">
								<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Social Number</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<input type="text" name="social_number" id="social_number"  value="<?php if($childrenDetail['social_number']!="" || $childrenDetail['social_number']!= null) echo $childrenDetail['social_number'].'  (Gär inte att ändra)'; else echo "-"; ?>" class="edit-text padt0 jain2 dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd" readonly>
										 		 
													
												</div>
												
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>

										
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">First name</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<input type="text" name="fname" id="fname"  value="<?php if($childrenDetail['first_name']!="" || $childrenDetail['first_name']!= null) echo $childrenDetail['first_name']; else echo ""; ?>" class="edit-text padt0 jain2 dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd">
										 		 
													
												</div>
												
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Last name</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<input type="text" name="lname" id="lname"  value="<?php if($childrenDetail['last_name']!="" || $childrenDetail['last_name']!= null) echo $childrenDetail['last_name']; else echo ""; ?>" class="edit-text padt0 jain2 dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd">
										 		 
													
												</div>
												
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Adress</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<input type="text" name="adrs1" id="autocomplete"  value="<?php if($childrenDetail['address']!="" || $childrenDetail['address']!= null) echo $childrenDetail['address']; else echo ""; ?>" class="edit-text padt0 jain2 dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd" onfocus="geolocate()" autocomplete="off">
										 		 
													
												</div>
												
												</div>
												
											
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
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
										
												
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Blood type</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<select name="bgroup" id="bgroup" class="edit-text padt0 wi_100 jain2 dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd">
										 		<option value="0">Select</option>
											<?php foreach($bloodType as $category => $value)
												
												{
												?>
												<option value="<?php echo $value['id']; ?>" <?php if($childrenDetail['blood_group']!="" || $childrenDetail['blood_group']!= null) { if($childrenDetail['blood_group']== $value['id'] ) echo 'selected'; } ?>><?php echo $value['blood_group']; ?></option>
											<?php } ?> 
											</select>		
												</div>
												
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb35" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marr15 xs-mar0 "> <div class="wi_40p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Allergic</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<select name="allergic" id="allergic" class="edit-text padt0 wi_100 jain2 dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd">
										 	<option value="0" <?php if($childrenDetail['allergic']== 0 ) echo 'selected'; ?>>None</option>
											<option value="1" <?php if($childrenDetail['allergic']== 1 ) echo 'selected'; ?>>Cat</option>
											<option value="2" <?php if($childrenDetail['allergic']== 2 ) echo 'selected'; ?>>DOG</option>
											</select>		
												</div>
												
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
								  <div class="clear" id=""></div>
		
								 	<div class=" padtb20 talc fsz16  " onclick="sendInformation();"> <a href="#" class="forword minhei_55p t_67cff7_bg fsz18 ffamily_avenir" >Uppdatera </a> </div>
									
								</div>
							
							 
						
						</form>
						
					
						
						
					</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			<div id="keep-selected" class="wi_100 hei_64p dflex  alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
				<div class="dflex fxwrap_w alit_c padtb10">
					<div class="pos_rel marr15">
						<a href="#" class="keep-selected-clear dflex alit_c justc_c talc">
							<img src="<?php echo $path; ?>/html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
						</a>
						<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8">Clear selection</span>
						</div>
					</div>
					<div class="marr15 fsz20 txt_0_54">
						<span id="keep-selected-count"></span> uppdatering
					</div>
				</div>
				<div class="keep-actions wi_100 xs-maxwi_150p  maxwi_250p dflex  padtb10">
					<div class="keep-action wi_40 pos_rel">
						<a href="#" class="show_popup_modal dblock opa50 opa1_h pad5 talc trans_opa1 blue_btn fsz16"  onclick="submit_value();" data-target="#gratis_popup_company_searched">
							Godkänn <!--  <img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Godkänn">-->
						</a>
						<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8 ">Godkänn</span>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="marb20"> <img src="<?php echo $path;?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
						<div class="marb10 padtb20 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span> </div>
							<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
					</form>
				</div>
			</div>
			
			
			<!-- Sales popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Marketing popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">


		<div id="error_msg_form" class="fsz20"> </div>

		<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
																					</div>
																				</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14  brd brdrad5"  id="gratis_popup_company_error">
			<div class="modal-content pad25 brdrad10">
				<h3 class="fsz20">You are not authorized to update this company</h3>
				
			</div>
		</div>
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	</body>
	
</html>