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
		$path1 = $path."html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
		
	if($childrenDetail ['image_path']!=null) { $filename="../estorecss/".$childrenDetail ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$childrenDetail ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$childrenDetail['image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
	
	
	if($childrenDetail ['image_path']!=null) { $filename="../estorecss/".$childrenDetail ['image_path'].".txt"; if (file_exists($filename)) { $value_e=file_get_contents("../estorecss/".$childrenDetail ['image_path'].".txt"); $value_e=str_replace('"','',$value_e); $imgData=$value_e; } else { $value_e="../html/usercontent/images/person-male.png"; $imgData=''; } }  else { $value_e="../html/usercontent/images/person-male.png";  $imgData=''; };
	
	?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
	async defer></script>
		<script>
		function updateSSNAvailable()
						{
							ssnAvailable=1;
						}
						function updateAddress()
						{
							sameAddressAsUser=1;
						}
		var issueM="<?php echo date('m'); ?>";
		var issueY="<?php echo date('Y'); ?>";
		function updateMonth(id)
         {
         	if(id<issueY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#dob_month").html(allDays);							
         	}
         	else
         	{
         	for(i=1;i<=issueM;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#dob_month").html(allDays);							
         	}
         }
		 
							function updateDays(id)
								{
									
								var tDays=new Date($("#dob_year").val(), id, 0).getDate();
								 if($("#dob_year").val()==issueY && id==issueM)
								 {
									tDays=todayDate;
								 }
								var allDays='';
								for(i=1;i<=tDays;i++)
								{
									allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
								}
								$("#dob_day").html(allDays);
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
										
										if($("#dp_type").val()=="0")
										{
										
										$("#error_msg_form").html('Please select dependent type');
										return false;
										}
										if($('#image-data1').val()=='' || $('#image-data1').val()==null)
										{
										$("#error_msg_form").html('Please select profile image');
										return false;	
										}
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
										if($("#is_ssn_available").val()==1)
										{
										if($("#social_number").val()=="" || $("#social_number").val()==null)
										{
										
										$("#error_msg_form").html('Please enter social security number');
										return false;
										}
										var send_data={};

										send_data.ssn=$("#social_number").val();
										send_data.cntry=$("#d_country").val();

										$.ajax({
										type:"POST",
										url: "checkSsn",
										data:send_data,
										dataType:"text",
										contentType: "application/x-www-form-urlencoded;charset=utf-8",
										success: function(data1){
											if(data!=0)
												{
											
													window.location.href ="https://www.qloudid.com/user/index.php/Dependents/requestGuardian/"+data1;
													}
										}											
										});
										}
										
										if($("#is_address_same").val()==0)
										{
										if($("#child_address").val()=="" || $("#child_address").val()==null)
										{
										
										$("#error_msg_form").html('Please enter address');
										return false;
										}	
										if($("#child_port_number").val()=="" || $("#child_port_number").val()==null)
										{
										
										$("#error_msg_form").html('Please enter port number');
										return false;
										}	
										if($("#child_city").val()=="" || $("#child_city").val()==null)
										{
										
										$("#error_msg_form").html('Please enter city');
										return false;
										}	
										
										if($("#child_zipcode").val()=="" || $("#child_zipcode").val()==null)
										{
										
										$("#error_msg_form").html('Please enter zipcode');
										return false;
										}	
										}
										document.getElementById('save_indexing').submit();
										}

 
										
function readURL(input) {
	 
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
			 
            $('#image-data')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data1').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }

	 
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
			<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/Dependents/dependentInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="fright marr0  ">
				<div class="top_menu fright  padt15 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows mart10 marb0">
					<li class="hidden-xs padr10 padt5">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir">History</span></a>
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
									<a href="https://www.qloudid.com/user/index.php/Dependents/dependentInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
		<div class="column_m pos_rel">
			<!-- CONTENT -->
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
					
						<div class="wi_240p fleft pos_rel zi50">
												<div class="padrl10">

													<!-- Scroll menu -->
													<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
														<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new" id="scroll_menu">
														
														<div class="column_m padb0 ">
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
																	 <div class="clear"></div>
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="fsz30 ffamily_avenir mart20"> <span><?php echo $childrenDetail['first_name']; ?></span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
											       
                           <ul class="dblock marr20  padl10 fsz16">
							 					
							  
							   
							 <li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb tb_67cff7_bg brd_width_2 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">General</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
								  <li class="dblock padrb10 padt5">
                                 <a href="../childPassportInformation/<?php echo $data['did']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Passport</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>		
									 <li class="dblock padrb10 ">
                                 <a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Health</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>			 
									 <li class="dblock padrb10 ">
                                 <a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Emergency</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>				
												 
												
											</ul>
											
									 
								
								
															 
														 

														</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>

											
				
				
						 					
					<!-- Center content -->
					<div class="wi_500p xsi-wi_500p maxwi_100  fleft xsi-nofloat pos_rel zi5 marrla xsi-padl0 xs-padl0 padl20">
						<form action="../updateChildInfo/<?php echo $data['did']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							<div class="marb25 maxwidth_100 padrl10 xs-padrl0">
						
								<!--	<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white wi_200p hei_200p">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php echo $imgData; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd borderr">
											<div class="cropped_image cropped_image_added borderr grey_brd5" style="background-image: <?php echo $value_e; ?>;" id="image-data" name="image-data" onchange="readURL(this);"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);"></a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>-->
							 
				<div class="marb25  mart25 ">
                  <div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
                     <div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white wi_200p hei_200p">
                        <input type="hidden" name="image-data1" id="image-data1" value="<?php echo $imgData; ?>" class="hidden-image-data" />
                        <div class="imgwrap nobrd borderr">
                           <div class="cropped_image  grey_brd5 borderr" style="background-image: url(<?php echo $imgData; ?>)" id="image-data" name="image-data"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="on_clmn mart10 xxs-mart10">
                  <div class="thr_clmn  wi_100 padr10"  >
                     <div class="pos_rel">
                        <div class="wi_100  bs_bb padrl5 padb10 ">
                           <div class="wi_100 talc">
                              <label class="forword ">
                              Profile Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
							
						
					 <div class="mart0 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz18 xxs-talc talc edit-text jain_drop_company trn " >Here is your childs details.</a></div>
					 
					  <div id="finalDetails">
                
               <div class="clear"></div>
               <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                  <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                     <!--<div class="clear hidden-xs"></div>-->
                     <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                        <div class="fleft wi_100  xs-mar0 xs-padt10">
                           <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Dependent name</span>
                           <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter the name here</span> 
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
               <div class="on_clmn    " >
                  <div class="thr_clmn wi_50 padr10">
                     <div class="pos_rel">
                        <input type="text" name="fname" id="fname" placeholder="Name" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php if($childrenDetail['first_name']!="" || $childrenDetail['first_name']!= null) echo $childrenDetail['first_name']; else echo "-"; ?>" >
                     </div>
                  </div>
                  <div class="thr_clmn padl10 wi_50">
                     <div class="pos_rel">
                        <input type="text" name="lname" id="lname" placeholder="Last name" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php if($childrenDetail['last_name']!="" || $childrenDetail['last_name']!= null) echo $childrenDetail['last_name']; else echo "-"; ?>">
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                  <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                     <!--<div class="clear hidden-xs"></div>-->
                     <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                        <div class="fleft wi_100  xs-mar0 xs-padt10">
                           <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Date of birth</span>
                           <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select day month and year</span> 
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
               <div class="on_clmn    " >
                  <div class="thr_clmn wi_33 padr10">
                     <div class="pos_rel">
                        <select name="dob_year" id="dob_year" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" onchange='updateMonths(this.value);'>
                         <?php $date=date('Y'); $year=date('Y')-12;  for($i=$date; $i>=$year;$i--) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($childrenDetail['birth_year']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
                                 <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="thr_clmn padl10 wi_33">
                     <div class="pos_rel">
                        <select name="dob_month" id="dob_month" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" onchange='updateDays(this.value);'>
                        <?php $dateM=date('m'); if($childrenDetail['birth_year']==$date){ for($i=1; $i<=date('m');$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($childrenDetail['birth_month']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
                                 <?php } } else { for($i=1; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($childrenDetail['birth_month']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
								  <?php } } ?>
                        </select>
                     </div>
                  </div>
                  <div class="thr_clmn padl10 wi_33">
                     <div class="pos_rel">
                        <select name="dob_day" id="dob_day" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
						<?php if($childrenDetail['birth_month']==null)  $month=1; else $month=(int) $childrenDetail['birth_month'];  $year=(int) $childrenDetail['birth_year']; $d=cal_days_in_month(CAL_GREGORIAN,$month,$year); 
						if($childrenDetail['birth_month']==date('m') && $childrenDetail['birth_year']==date('Y')) 
						{
						for($i=1;$i<=date('d');$i++)
						{
						?>
                           <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($childrenDetail['birth_day']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
						<?php } }  	else 
						{
						for($i=1;$i<=$d;$i++)
						{
						?>
                           <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($childrenDetail['birth_day']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
						<?php } }?>
                        </select>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="d_country" name="d_country" value="<?php echo $userSummary['country_of_residence']; ?>" />
               <div class="on_clmn    brdb">
                  <div class="thr_clmn  wi_75 ">
                     <div class="pos_rel talc">
                        <input type="text" value="Does the child have a Social security number?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
                     </div>
                  </div>
                  <div class="thr_clmn  wi_25">
                     <div class="pos_rel">
                        <div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
                           <div class="boolean-control boolean-control-small boolean-control-green fright <?php if($childrenDetail['is_ssn_available']==1) echo 'checked'; ?>" onclick="updateSSNAvailable();">
                              <input type="checkbox" class="default" data-true="" data-false="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class='<?php if($childrenDetail['is_ssn_available']==0) echo 'hidden'; ?>' id='isAvailable'>
                  <div class="clear"></div>
                  <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                     <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                        <!--<div class="clear hidden-xs"></div>-->
                        <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                           <div class="fleft wi_100  xs-mar0 xs-padt10">
                              <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">SSN</span>
                              <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter social security number</span> 
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
                  <div class="on_clmn " >
                     <div class="pos_rel">
                        <input type="text" name="social_number" id="social_number" placeholder="xxxx-xxxx-xxxx"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt " value="<?php if($childrenDetail['ssn']!="" || $childrenDetail['ssn']!= null) echo $childrenDetail['ssn']; else echo "-"; ?>">
                     </div>
                     <input type='hidden' id='is_ssn_available' name='is_ssn_available' value='<?php echo $childrenDetail['is_ssn_available']; ?>' />
                  </div>
               </div>
               <div class="on_clmn    brdb">
                  <div class="thr_clmn  wi_75 ">
                     <div class="pos_rel talc">
                        <input type="text" value="Does child share same address as you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
                     </div>
                  </div>
                  <div class="thr_clmn  wi_25">
                     <div class="pos_rel">
                        <div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
                           <div class="boolean-control boolean-control-small boolean-control-green fright <?php if($childrenDetail['is_address_same']==1) echo 'checked'; ?>" onclick="updateAddress();">
                              <input type="checkbox" class="default" data-true="" data-false="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="<?php if($childrenDetail['is_address_same']==1) echo 'hidden'; ?>" id='sameAddress'>
                  <div class="clear"></div>
                  <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                     <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                        <!--<div class="clear hidden-xs"></div>-->
                        <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                           <div class="fleft wi_100  xs-mar0 xs-padt10">
                              <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Address</span>
                              <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter dependent address</span> 
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
                  <div class="on_clmn">
                     <div class="thr_clmn wi_75 padr5">
                        <div class="pos_rel">
                           <input type="text" name="child_address" id="child_address" placeholder="Address"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value='<?php echo $childrenDetail['child_address']; ?>' >
                        </div>
                     </div>
                     <div class="thr_clmn wi_25 padl5">
                        <div class="pos_rel">
                           <input type="text" name="child_port_number" id="child_port_number" placeholder="Port number"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value='<?php echo $childrenDetail['child_port_number']; ?>' >
                        </div>
                     </div>
                  </div>
                  <div class="on_clmn mart20">
                     <div class="thr_clmn wi_50 padr5">
                        <div class="pos_rel">
                           <input type="text" name="child_city" id="child_city" placeholder="City"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value='<?php echo $childrenDetail['child_city']; ?>' >
                        </div>
                     </div>
                     <div class="thr_clmn wi_50 padl5">
                        <div class="pos_rel">
                           <input type="text" name="child_zipcode" id="child_zipcode" placeholder="Zipcode"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value='<?php echo $childrenDetail['child_zip']; ?>' >
                        </div>
                     </div>
                  </div>
                  <input type='hidden' id='is_address_same' name='is_address_same' value='<?php echo $childrenDetail['is_address_same']; ?>' />
               </div>
               <div id="error_msg_form" class="red_txt fsz20 ffamily_avenir"></div>
               <div class="clear"></div>
            </div>
           
					 
					 
					 
						  
						  <div class=" padtb20 talc fsz16  " onclick="sendInformation();"> <a href="#" class="forword hei_55p fsz18  t_67cff7_bg ffamily_avenir" >Update</a> </div>
						 </div>
						</form>
						
					
						
						
					</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			 
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
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