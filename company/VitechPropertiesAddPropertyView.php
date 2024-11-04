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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	
	<script type="text/javascript">
	 function updateInvoice(id,link)
   {
	   invoiceShow=1;
	    
   }
   
  var property_status= '<?php echo $data['property_status']; ?>';
   
   var optionsDetail='<option value="0">Select</option>';

					function selectCity(id)
					{
					var send_data={};
					send_data.cid=id;
					 
					$.ajax({
						type:"POST",
						url:"../../getCities",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
							 $('#vitech_city_id').html(data1);
							$('#vitech_area_id').html(optionsDetail);
						}
					});
					}
					function selectArea(id)
					{
					var send_data={};
					send_data.cid=id;
					 
					$.ajax({
						type:"POST",
						url:"../../getArea",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
							 
							$('#vitech_area_id').html(data1);
						}
					});
					}
    function updateName(id,link)
   {
	   nameInfoUpdate=1;
	    
   }
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
				
				 
				
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					return false;
				}
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					return false;
				}
				
				
				 if($("#rooms_count").val()=="" || $("#rooms_count").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter total rooms');
					return false;
				}
				
				 if($("#total_floor").val()=="" || $("#total_floor").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter total floors');
					return false;
				}
				
				 if($("#bathrooms_count").val()=="" || $("#bathrooms_count").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter total bathrooms');
					return false;
				}
				 if($("#bedrooms_count").val()=="" || $("#bedrooms_count").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter total bedrooms');
					return false;
				}
				
				 if($("#total_area").val()=="" || $("#total_area").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter total area');
					return false;
				}
				
				 if($("#sell_phrase").val()=="" || $("#sell_phrase").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter property heading');
					return false;
				}
				
				if($("#vitech_region_id").val()==0)
				{
					 
					$("#error_msg_form").html('Please select region');
					return false;
				}
				
				if($("#vitech_city_id").val()==0)
				{
					 
					$("#error_msg_form").html('Please select city');
					return false;
				}
				
				if($("#vitech_area_id").val()==0)
				{
					 
					$("#error_msg_form").html('Please select area');
					return false;
				}
				
				if($("#first_name").val()=="" || $("#first_name").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter first name');
					return false;
				}
				
				if($("#last_name").val()=="" || $("#last_name").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter last name');
					return false;
				}
				
				
				if($("#owner_email").val()=="" || $("#owner_email").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter owner email');
					return false;
				}
				
				if($("#uphno").val()=="" || $("#uphno").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter owner phone number');
					return false;
				}
				
				if(property_status=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09')
				{
					if($("#sell_price").val()=="" || $("#sell_price").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter sell price');
					return false;
				}
				
				
				if($("#sold_on").val()=="" || $("#sold_on").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter date when the property was sold');
					return false;
				}
				
				}
				 document.getElementById('save_indexing').submit();
				 
				}
		</script>
			
			
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg ffamily_avenir" >
		 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../propertyStatus/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header hei_60p  bs_bb lgtgrey2_bg visible-xs">
         <div class="wi_100 hei_60p xs-pos_fix padtb5 padrl10 lgtgrey2_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../propertyStatus/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
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
					
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_65 xxs-lgn_hight_50 padb0 black_txt trn ffamily_avenir"  >Address</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb0 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please update your property detail here.</a></div>
								 
									
									<form action="../../addVitechAdddress/<?php echo $data['cid']; ?>/<?php echo $data['property_status']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									
									 
										
									<div class="on_clmn padt10">
								  
											 
										<div class="pos_rel talc">
									  
										<Select  name="property_type" id="property_type"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100" > 
											 
											<option value="House">House</option>
											<option value="Apartment" selected="">Apartment</option>
											<option value="Lodge">Lodge</option>
											<option value="Cottage">Cottage</option>
											<option value="Cabin">Cabin</option>
											<option value="Chalet">Chalet</option>
											<option value="Wigwam">Wigwam</option>
											<option value="Barn">Barn</option>
											</Select>
											<label for="property_type" class="floating__label tall nobold padl10" data-content="Property type" >
											<span class="hidden--visually">
											  Region</span></label> 
									 
									 
									 
									</div> 
									 
									 
									</div>
								
										
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="addrs" id="addrs"  placeholder="Delivery address" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" /> 
												 <label for="addrs" class="floating__label tall nobold padl10" data-content="Address">
											<span class="hidden--visually">
											Price</span></label>
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="pnumber" id="pnumber"  placeholder="Delivery Port number" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"     /> 
												 <label for="pnumber" class="floating__label tall nobold padl10" data-content="Port number">
											<span class="hidden--visually">
											Price</span></label>
											</div>
											</div>
										</div>
									 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="dzip" id="dzip"  placeholder="Zipcode" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"     /> 
												 <label for="dzip" class="floating__label tall nobold padl10" data-content="Zipcode">
											<span class="hidden--visually">
											Price</span></label>
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="dcity" id="dcity"  placeholder="Delivery city" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"      /> 
												 <label for="dcity" class="floating__label tall nobold padl10" data-content="City">
											<span class="hidden--visually">
											Price</span></label>
											</div>
											</div>
										</div>
										
										<div class="on_clmn padt10">
								  
											 
										<div class="pos_rel talc">
									  
										<Select  name="country" id="country"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100" > 
											 <?php foreach($countryList as $category => $value) { ?>
											<option value="<?php echo $value['country_name']; ?>"><?php echo $value['country_name']; ?></option>
											 <?php } ?>
											</Select>
											<label for="country" class="floating__label tall nobold padl10" data-content="Country" >
											<span class="hidden--visually">
											  Country</span></label> 
									 
									 
									 
									</div> 
									 
									 
									</div>
										
										 <div class="on_clmn mart20">
										 <div class="thr_clmn  wi_50 padr5">
									 
													
												<div class="pos_rel">
												
												<input type="number" name="rooms_count" id="rooms_count"  min=1 class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="rooms_count" class="floating__label tall nobold padl10" data-content="Rooms">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									<div class="thr_clmn  wi_50 padl5">
										 
									 
													
												<div class="pos_rel">
												
												<input type="text" name="total_floor" id="total_floor" min=1  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="total_floor" class="floating__label tall nobold padl10" data-content="Floors">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									</div>
									
									<div class="on_clmn mart20">
										 
									 <div class="thr_clmn  wi_50 padr5">
													
												<div class="pos_rel">
												
												<input type="number" name="bathrooms_count" id="bathrooms_count" min=1  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="entry_code" class="floating__label tall nobold padl10" data-content="Bathrooms">
											<span class="hidden--visually">
											 Mobile</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									 <div class="thr_clmn  wi_50 padl5">
													
												<div class="pos_rel">
												
												<input type="number" name="bedrooms_count" id="bedrooms_count" min=1  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="bedrooms_count" class="floating__label tall nobold padl10" data-content="Bedrooms">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									</div>
									
									
									<div class="on_clmn mart20">
										 
									 <div class="thr_clmn  wi_50 padr5">
													
												<div class="pos_rel">
												
												<input type="number" name="total_area" id="total_area" min=1  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="total_area" class="floating__label tall nobold padl10" data-content="Area(m2)">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									 <div class="thr_clmn  wi_50 padl5">
													
												<div class="pos_rel">
												
												<input type="text" name="sell_phrase" id="sell_phrase"   class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="sell_phrase" class="floating__label tall nobold padl10" data-content="Property heading">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									</div>
									<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_50 padr5"> 
											 
										<div class="pos_rel talc">
									 
										<Select  name="private_entrance" id="private_entrance"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100" > 
											 
											<option value="Yes" >Yes</option>
											<option value="No" >No</option>
											</Select>
											<label for="private_entrance" class="floating__label tall nobold padl10" data-content="Private entrance" >
											<span class="hidden--visually">
											  Region</span></label> 
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn  wi_50  padl5"> 
											<div class="pos_rel">
											 
											
											<Select  name="elevater" id="elevater"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100" > 
											<option value="Yes" >Yes</option>
											<option value="No" >No</option>
											</Select>
												 <label for="city" class="floating__label tall padl10 nobold" data-content="elevater" >
											<span class="hidden--visually">
											  City</span></label> 
										</div>
									</div>
									 
									</div>
								
									
									
									<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_35 padr5"> 
											 
										<div class="pos_rel talc">
									 
										<Select  name="vitech_region_id" id="vitech_region_id"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100" onchange='selectCity(this.value);'> 
											<option value="0">Select</option>
											<option value="1" >Costa Blanca North</option>
											<option value="2" >Costa Blanca South</option>
											</Select>
											<label for="longitud" class="floating__label tall nobold padl10" data-content="Region" >
											<span class="hidden--visually">
											  Region</span></label> 
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn  wi_35 padr5 padl5"> 
											<div class="pos_rel">
											 
											
											<Select  name="vitech_city_id" id="vitech_city_id"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100" onchange='selectArea(this.value);'> 
											<?php echo $fetchCitechCity; ?>
											</Select>
												 <label for="city" class="floating__label tall padl10 nobold" data-content="City" >
											<span class="hidden--visually">
											  City</span></label> 
										</div>
									</div>
									<div class="thr_clmn  wi_30 padl5"> 
											<div class="pos_rel">
											 
											
											<Select  name="vitech_area_id" id="vitech_area_id"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100"> 
											<?php echo $fetchCitechArea; ?>
											</Select>
												 <label for="city" class="floating__label tall padl10 nobold" data-content="Area" >
											<span class="hidden--visually">
											  Area</span></label> 
										</div>
									</div>
									</div>
								
									 <div class="on_clmn mart20">
										 <div class="thr_clmn  wi_50 padr5">
									 
													
												<div class="pos_rel">
												
												<input type="text" name="first_name" id="first_name"    class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="first_name" class="floating__label tall nobold padl10" data-content="Owner first name">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									<div class="thr_clmn  wi_50 padl5">
										 
									 
													
												<div class="pos_rel">
												
												<input type="text" name="last_name" id="last_name"    class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="last_name" class="floating__label tall nobold padl10" data-content="Owner last name">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									</div>
									
									
									<div class="on_clmn mart20">
										 
									<div class="pos_rel"  >
													
												<div class="pos_rel">
												
												<input type="text" name="owner_email" id="owner_email"   class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="owner_email" class="floating__label tall nobold padl10" data-content="Owner email">
											<span class="hidden--visually">
											 Email</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									</div>
									
									
									<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_30 padr10">
											 
										<div class="pos_rel talc">
											
											 
											<select name="country_id" id="country_id" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100" fdprocessedid="p73uye"> 
																											
																<option value="38" class="lgtgrey2_bg">+1</option>
																															
																<option value="143" class="lgtgrey2_bg">+1</option>
																															
																<option value="224" class="lgtgrey2_bg">+1</option>
																															
																<option value="230" class="lgtgrey2_bg">+1</option>
																															
																<option value="182" class="lgtgrey2_bg">+7</option>
																															
																<option value="64" class="lgtgrey2_bg">+20</option>
																															
																<option value="237" class="lgtgrey2_bg">+27</option>
																															
																<option value="86" class="lgtgrey2_bg">+30</option>
																															
																<option value="159" class="lgtgrey2_bg">+31</option>
																															
																<option value="19" class="lgtgrey2_bg">+32</option>
																															
																<option value="73" class="lgtgrey2_bg">+33</option>
																															
																<option value="67" class="lgtgrey2_bg">+34</option>
																															
																<option value="98" class="lgtgrey2_bg">+36</option>
																															
																<option value="236" class="lgtgrey2_bg">+38</option>
																															
																<option value="107" class="lgtgrey2_bg">+39</option>
																															
																<option value="181" class="lgtgrey2_bg">+40</option>
																															
																<option value="40" class="lgtgrey2_bg">+41</option>
																															
																<option value="16" class="lgtgrey2_bg">+43</option>
																															
																<option value="77" class="lgtgrey2_bg">+44</option>
																															
																<option value="60" class="lgtgrey2_bg">+45</option>
																															
																<option value="201"   class="lgtgrey2_bg">+46</option>
																															
																<option value="35" class="lgtgrey2_bg">+47</option>
																															
																<option value="160" class="lgtgrey2_bg">+47</option>
																															
																<option value="190" class="lgtgrey2_bg">+47</option>
																															
																<option value="172" class="lgtgrey2_bg">+48</option>
																															
																<option value="57" class="lgtgrey2_bg">+49</option>
																															
																<option value="168" class="lgtgrey2_bg">+51</option>
																															
																<option value="136" class="lgtgrey2_bg">+52</option>
																															
																<option value="52" class="lgtgrey2_bg">+53</option>
																															
																<option value="9" class="lgtgrey2_bg">+54</option>
																															
																<option value="31" class="lgtgrey2_bg">+55</option>
																															
																<option value="41" class="lgtgrey2_bg">+56</option>
																															
																<option value="48" class="lgtgrey2_bg">+57</option>
																															
																<option value="228" class="lgtgrey2_bg">+58</option>
																															
																<option value="150" class="lgtgrey2_bg">+60</option>
																															
																<option value="15" class="lgtgrey2_bg">+61</option>
																															
																<option value="39" class="lgtgrey2_bg">+61</option>
																															
																<option value="53" class="lgtgrey2_bg">+61</option>
																															
																<option value="99" class="lgtgrey2_bg">+62</option>
																															
																<option value="169" class="lgtgrey2_bg">+63</option>
																															
																<option value="163" class="lgtgrey2_bg">+64</option>
																															
																<option value="167" class="lgtgrey2_bg">+64</option>
																															
																<option value="187" class="lgtgrey2_bg">+65</option>
																															
																<option value="208" class="lgtgrey2_bg">+66</option>
																															
																<option value="111" class="lgtgrey2_bg">+77</option>
																															
																<option value="110" class="lgtgrey2_bg">+81</option>
																															
																<option value="117" class="lgtgrey2_bg">+82</option>
																															
																<option value="231" class="lgtgrey2_bg">+84</option>
																															
																<option value="42" class="lgtgrey2_bg">+86</option>
																															
																<option value="216" class="lgtgrey2_bg">+90</option>
																															
																<option value="100" class="lgtgrey2_bg">+91</option>
																															
																<option value="165" class="lgtgrey2_bg">+92</option>
																															
																<option value="2" class="lgtgrey2_bg">+93</option>
																															
																<option value="125" class="lgtgrey2_bg">+94</option>
																															
																<option value="141" class="lgtgrey2_bg">+95</option>
																															
																<option value="103" class="lgtgrey2_bg">+98</option>
																															
																<option value="66" class="lgtgrey2_bg">+212</option>
																															
																<option value="131" class="lgtgrey2_bg">+212</option>
																															
																<option value="62" class="lgtgrey2_bg">+213</option>
																															
																<option value="215" class="lgtgrey2_bg">+216</option>
																															
																<option value="122" class="lgtgrey2_bg">+218</option>
																															
																<option value="83" class="lgtgrey2_bg">+220</option>
																															
																<option value="186" class="lgtgrey2_bg">+221</option>
																															
																<option value="145" class="lgtgrey2_bg">+222</option>
																															
																<option value="139" class="lgtgrey2_bg">+223</option>
																															
																<option value="81" class="lgtgrey2_bg">+224</option>
																															
																<option value="43" class="lgtgrey2_bg">+225</option>
																															
																<option value="21" class="lgtgrey2_bg">+226</option>
																															
																<option value="154" class="lgtgrey2_bg">+227</option>
																															
																<option value="207" class="lgtgrey2_bg">+228</option>
																															
																<option value="20" class="lgtgrey2_bg">+229</option>
																															
																<option value="148" class="lgtgrey2_bg">+230</option>
																															
																<option value="121" class="lgtgrey2_bg">+231</option>
																															
																<option value="192" class="lgtgrey2_bg">+232</option>
																															
																<option value="79" class="lgtgrey2_bg">+233</option>
																															
																<option value="156" class="lgtgrey2_bg">+234</option>
																															
																<option value="206" class="lgtgrey2_bg">+235</option>
																															
																<option value="37" class="lgtgrey2_bg">+236</option>
																															
																<option value="44" class="lgtgrey2_bg">+237</option>
																															
																<option value="50" class="lgtgrey2_bg">+238</option>
																															
																<option value="197" class="lgtgrey2_bg">+239</option>
																															
																<option value="85" class="lgtgrey2_bg">+240</option>
																															
																<option value="76" class="lgtgrey2_bg">+241</option>
																															
																<option value="46" class="lgtgrey2_bg">+242</option>
																															
																<option value="45" class="lgtgrey2_bg">+243</option>
																															
																<option value="3" class="lgtgrey2_bg">+244</option>
																															
																<option value="84" class="lgtgrey2_bg">+245</option>
																															
																<option value="101" class="lgtgrey2_bg">+246</option>
																															
																<option value="222" class="lgtgrey2_bg">+246</option>
																															
																<option value="203" class="lgtgrey2_bg">+248</option>
																															
																<option value="185" class="lgtgrey2_bg">+249</option>
																															
																<option value="183" class="lgtgrey2_bg">+250</option>
																															
																<option value="69" class="lgtgrey2_bg">+251</option>
																															
																<option value="195" class="lgtgrey2_bg">+252</option>
																															
																<option value="58" class="lgtgrey2_bg">+253</option>
																															
																<option value="112" class="lgtgrey2_bg">+254</option>
																															
																<option value="219" class="lgtgrey2_bg">+255</option>
																															
																<option value="220" class="lgtgrey2_bg">+256</option>
																															
																<option value="18" class="lgtgrey2_bg">+257</option>
																															
																<option value="144" class="lgtgrey2_bg">+258</option>
																															
																<option value="238" class="lgtgrey2_bg">+260</option>
																															
																<option value="134" class="lgtgrey2_bg">+261</option>
																															
																<option value="151" class="lgtgrey2_bg">+262</option>
																															
																<option value="180" class="lgtgrey2_bg">+262</option>
																															
																<option value="239" class="lgtgrey2_bg">+263</option>
																															
																<option value="152" class="lgtgrey2_bg">+264</option>
																															
																<option value="149" class="lgtgrey2_bg">+265</option>
																															
																<option value="126" class="lgtgrey2_bg">+266</option>
																															
																<option value="36" class="lgtgrey2_bg">+267</option>
																															
																<option value="202" class="lgtgrey2_bg">+268</option>
																															
																<option value="49" class="lgtgrey2_bg">+269</option>
																															
																<option value="189" class="lgtgrey2_bg">+290</option>
																															
																<option value="65" class="lgtgrey2_bg">+291</option>
																															
																<option value="1" class="lgtgrey2_bg">+297</option>
																															
																<option value="74" class="lgtgrey2_bg">+298</option>
																															
																<option value="88" class="lgtgrey2_bg">+299</option>
																															
																<option value="54" class="lgtgrey2_bg">+345</option>
																															
																<option value="80" class="lgtgrey2_bg">+350</option>
																															
																<option value="175" class="lgtgrey2_bg">+351</option>
																															
																<option value="128" class="lgtgrey2_bg">+352</option>
																															
																<option value="102" class="lgtgrey2_bg">+353</option>
																															
																<option value="105" class="lgtgrey2_bg">+354</option>
																															
																<option value="5" class="lgtgrey2_bg">+355</option>
																															
																<option value="140" class="lgtgrey2_bg">+356</option>
																															
																<option value="70" class="lgtgrey2_bg">+358</option>
																															
																<option value="23" class="lgtgrey2_bg">+359</option>
																															
																<option value="127" class="lgtgrey2_bg">+370</option>
																															
																<option value="129" class="lgtgrey2_bg">+371</option>
																															
																<option value="68" class="lgtgrey2_bg">+372</option>
																															
																<option value="133" class="lgtgrey2_bg">+373</option>
																															
																<option value="10" class="lgtgrey2_bg">+374</option>
																															
																<option value="27" class="lgtgrey2_bg">+375</option>
																															
																<option value="6" class="lgtgrey2_bg">+376</option>
																															
																<option value="132" class="lgtgrey2_bg">+377</option>
																															
																<option value="194" class="lgtgrey2_bg">+378</option>
																															
																<option value="226" class="lgtgrey2_bg">+379</option>
																															
																<option value="221" class="lgtgrey2_bg">+380</option>
																															
																<option value="96" class="lgtgrey2_bg">+385</option>
																															
																<option value="200" class="lgtgrey2_bg">+386</option>
																															
																<option value="26" class="lgtgrey2_bg">+387</option>
																															
																<option value="138" class="lgtgrey2_bg">+389</option>
																															
																<option value="56" class="lgtgrey2_bg">+420</option>
																															
																<option value="199" class="lgtgrey2_bg">+421</option>
																															
																<option value="124" class="lgtgrey2_bg">+423</option>
																															
																<option value="72" class="lgtgrey2_bg">+500</option>
																															
																<option value="188" class="lgtgrey2_bg">+500</option>
																															
																<option value="28" class="lgtgrey2_bg">+501</option>
																															
																<option value="89" class="lgtgrey2_bg">+502</option>
																															
																<option value="193" class="lgtgrey2_bg">+503</option>
																															
																<option value="95" class="lgtgrey2_bg">+504</option>
																															
																<option value="157" class="lgtgrey2_bg">+505</option>
																															
																<option value="51" class="lgtgrey2_bg">+506</option>
																															
																<option value="166" class="lgtgrey2_bg">+507</option>
																															
																<option value="196" class="lgtgrey2_bg">+508</option>
																															
																<option value="97" class="lgtgrey2_bg">+509</option>
																															
																<option value="55" class="lgtgrey2_bg">+537</option>
																															
																<option value="82" class="lgtgrey2_bg">+590</option>
																															
																<option value="30" class="lgtgrey2_bg">+591</option>
																															
																<option value="63" class="lgtgrey2_bg">+593</option>
																															
																<option value="90" class="lgtgrey2_bg">+594</option>
																															
																<option value="92" class="lgtgrey2_bg">+595</option>
																															
																<option value="176" class="lgtgrey2_bg">+595</option>
																															
																<option value="147" class="lgtgrey2_bg">+596</option>
																															
																<option value="198" class="lgtgrey2_bg">+597</option>
																															
																<option value="223" class="lgtgrey2_bg">+598</option>
																															
																<option value="7" class="lgtgrey2_bg">+599</option>
																															
																<option value="212" class="lgtgrey2_bg">+670</option>
																															
																<option value="12" class="lgtgrey2_bg">+672</option>
																															
																<option value="94" class="lgtgrey2_bg">+672</option>
																															
																<option value="155" class="lgtgrey2_bg">+672</option>
																															
																<option value="33" class="lgtgrey2_bg">+673</option>
																															
																<option value="162" class="lgtgrey2_bg">+674</option>
																															
																<option value="171" class="lgtgrey2_bg">+675</option>
																															
																<option value="213" class="lgtgrey2_bg">+676</option>
																															
																<option value="191" class="lgtgrey2_bg">+677</option>
																															
																<option value="232" class="lgtgrey2_bg">+678</option>
																															
																<option value="71" class="lgtgrey2_bg">+679</option>
																															
																<option value="170" class="lgtgrey2_bg">+680</option>
																															
																<option value="233" class="lgtgrey2_bg">+681</option>
																															
																<option value="47" class="lgtgrey2_bg">+682</option>
																															
																<option value="158" class="lgtgrey2_bg">+683</option>
																															
																<option value="234" class="lgtgrey2_bg">+685</option>
																															
																<option value="115" class="lgtgrey2_bg">+686</option>
																															
																<option value="153" class="lgtgrey2_bg">+687</option>
																															
																<option value="217" class="lgtgrey2_bg">+688</option>
																															
																<option value="178" class="lgtgrey2_bg">+689</option>
																															
																<option value="210" class="lgtgrey2_bg">+690</option>
																															
																<option value="75" class="lgtgrey2_bg">+691</option>
																															
																<option value="137" class="lgtgrey2_bg">+692</option>
																															
																<option value="174" class="lgtgrey2_bg">+850</option>
																															
																<option value="93" class="lgtgrey2_bg">+852</option>
																															
																<option value="130" class="lgtgrey2_bg">+853</option>
																															
																<option value="114" class="lgtgrey2_bg">+855</option>
																															
																<option value="119" class="lgtgrey2_bg">+856</option>
																															
																<option value="22" class="lgtgrey2_bg">+880</option>
																															
																<option value="218" class="lgtgrey2_bg">+886</option>
																															
																<option value="135" class="lgtgrey2_bg">+960</option>
																															
																<option value="120" class="lgtgrey2_bg">+961</option>
																															
																<option value="109" class="lgtgrey2_bg">+962</option>
																															
																<option value="204" class="lgtgrey2_bg">+963</option>
																															
																<option value="104" class="lgtgrey2_bg">+964</option>
																															
																<option value="118" class="lgtgrey2_bg">+965</option>
																															
																<option value="184" class="lgtgrey2_bg">+966</option>
																															
																<option value="235" class="lgtgrey2_bg">+967</option>
																															
																<option value="164" class="lgtgrey2_bg">+968</option>
																															
																<option value="177" class="lgtgrey2_bg">+970</option>
																															
																<option value="8" class="lgtgrey2_bg">+971</option>
																															
																<option value="106" class="lgtgrey2_bg">+972</option>
																															
																<option value="24" class="lgtgrey2_bg">+973</option>
																															
																<option value="179" class="lgtgrey2_bg">+974</option>
																															
																<option value="34" class="lgtgrey2_bg">+975</option>
																															
																<option value="142" class="lgtgrey2_bg">+976</option>
																															
																<option value="161" class="lgtgrey2_bg">+977</option>
																															
																<option value="209" class="lgtgrey2_bg">+992</option>
																															
																<option value="211" class="lgtgrey2_bg">+993</option>
																															
																<option value="17" class="lgtgrey2_bg">+994</option>
																															
																<option value="78" class="lgtgrey2_bg">+995</option>
																															
																<option value="113" class="lgtgrey2_bg">+996</option>
																															
																<option value="225" class="lgtgrey2_bg">+998</option>
																															
																<option value="25" class="lgtgrey2_bg">+1242</option>
																															
																<option value="32" class="lgtgrey2_bg">+1246</option>
																															
																<option value="4" class="lgtgrey2_bg">+1264</option>
																															
																<option value="14" class="lgtgrey2_bg">+1268</option>
																															
																<option value="229" class="lgtgrey2_bg">+1284</option>
																															
																<option value="29" class="lgtgrey2_bg">+1441</option>
																															
																<option value="87" class="lgtgrey2_bg">+1473</option>
																															
																<option value="205" class="lgtgrey2_bg">+1649</option>
																															
																<option value="146" class="lgtgrey2_bg">+1664</option>
																															
																<option value="91" class="lgtgrey2_bg">+1671</option>
																															
																<option value="11" class="lgtgrey2_bg">+1684</option>
																															
																<option value="123" class="lgtgrey2_bg">+1758</option>
																															
																<option value="59" class="lgtgrey2_bg">+1767</option>
																															
																<option value="227" class="lgtgrey2_bg">+1784</option>
																															
																<option value="173" class="lgtgrey2_bg">+1787</option>
																															
																<option value="61" class="lgtgrey2_bg">+1809</option>
																															
																<option value="214" class="lgtgrey2_bg">+1868</option>
																															
																<option value="116" class="lgtgrey2_bg">+1869</option>
																															
																<option value="108" class="lgtgrey2_bg">+1876</option>
																															
																<option value="13" class="lgtgrey2_bg">+3166</option>
																 
											</select>
												<label for="country_id" class="floating__label tall nobold padl10" data-content="Country">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="thr_clmn  wi_70 padl10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="number" name="uphno" id="uphno" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="41fdk"> 
												<label for="uphno" class="floating__label tall nobold padl10" data-content="Phone number">
											<span class="hidden--visually">
											 Phone number</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										 	</div>
											
											<?php if($data['property_status']=='T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09') { ?>
											<div class="on_clmn mart20">
										 <div class="thr_clmn  wi_50 padr5">
									 
													
												<div class="pos_rel">
												
												<input type="text" name="sell_price" id="sell_price"    class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="sell_price" class="floating__label tall nobold padl10" data-content="Sell price">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									<div class="thr_clmn  wi_50 padl5">
										 
									 
													
												<div class="pos_rel">
												
												<input type="date" name="sold_on" id="sold_on"    class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="sold_on" class="floating__label tall nobold padl10" data-content="Selling date">
											<span class="hidden--visually">
											 Bedrooms</span></label> 
												
											 </div>	
													 
													
													 
												</div>
												 
									</div>
									
											<?php } ?>
									
									<input type="hidden" id="same_name" name="same_name" value="1" />
									  
									 
									<div class="valm fsz20 red_txt" id="error_msg_form"> </div>	
								<div class="clear"></div>
								<input type="hidden" id="lstatus" name="lstatus" value='0' />
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
		  
	 
	
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="gratis_popup_error1">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" id="error_msg_form1">Du måste....</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt" id="error_msg_form2"> </span>
				</div>
				
				
			</div>
			<div class="on_clmn padt20">
				<input type="button" value="Submit" class="wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp" onclick="sendInvitation();">
				
			</div>
			
			<a href="#" class="close_popup_modal padt10 fsz18">Close</a>
	</div>
	
	</div>
			
	 
 
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
 
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		function updatePopup(id,id1)
		{
			$("#did").val(id);
			$("#d_name1").val(id1);
			
		}
		// Charts
		google.charts.load('current', { 'packages': ['corechart'] });
		
		
		// Line Chart
		google.charts.setOnLoadCallback(drawLineChartInhouse);
		function drawLineChartInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartStaffing);
		function drawLineChartStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartRecruiting);
		function drawLineChartRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
		function drawLineChartBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// Donut Chart
		// - yearly
		google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
		function drawDonutChartYearlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
		function drawDonutChartYearlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
		function drawDonutChartYearlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
		function drawDonutChartYearlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - monthly
		google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
		function drawDonutChartMonthlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
		function drawDonutChartMonthlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
		function drawDonutChartMonthlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
		function drawDonutChartMonthlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - daily
		google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
		function drawDonutChartDailyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
		function drawDonutChartDailyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
		function drawDonutChartDailyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
		function drawDonutChartDailyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		tinyMCE.init({
			selector: '.texteditor',
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
			//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
			menubar: false,
			toolbar_items_size: 'small',
			style_formats: [
			{
				title: 'Bold text',
				inline: 'b'
			},
			{
				title: 'Red text',
				inline: 'span',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Red header',
				block: 'h1',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Example 1',
				inline: 'span',
				classes: 'example1'
			},
			{
				title: 'Example 2',
				inline: 'span',
				classes: 'example2'
			},
			{
				title: 'Table styles'
			},
			{
				title: 'Table row 1',
				selector: 'tr',
				classes: 'tablerow1'
			}],
			templates: [
			{
				title: 'Test template 1',
				content: 'Test 1'
			},
			{
				title: 'Test template 2',
				content: 'Test 2'
			}]
		});
	</script>

</body>
</html>