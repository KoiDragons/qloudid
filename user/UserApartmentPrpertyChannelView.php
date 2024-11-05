<!doctype html>


<html>
	
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
		 
		 
		function updatePropertyType(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updatePropertyType/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								  
							}
						});	
		}
		
			function updateChannelsAll(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateChannelsAll/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('.checkChannels').html(data1);  
								$('#ttlChannels').html(35); 
							}
						});	
		}
		
		function updateRent(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateRent/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		function updatePublishRentLong(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updatePublishRentLong/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		function updateCancellationPolicy(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.policyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateCancellationPolicy/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								  
							}
						});	
		}
		
		
		function updateSale(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateSale/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		
		function updateAir(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateAir/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		
		function updateBooking(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateBookingChannel/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		function updateExpedia(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateExpedia/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		function updateVrbo(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateVrbo/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		function updateTrip(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateTrip/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
		
		function updateTui(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.propertyType=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateTui/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$('#ttlChannels').html(data1);  
							}
						});	
		}
		
			function updateSalePrice(id)
		{
			$('#errorMsg').html('');
			 
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			return false;
			}
			
			if(id<10000)
			{
			$('#errorMsg').html('Value cant be less then 10000!!!');	
			return false;
			}
			$('#wordCount').html(id.length);
				var send_data={};
				 send_data.salePrice=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateSalePrice/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 
								  
							}
						});	
		}
		 
		
		function updateArea(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.updateInfo=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateArea/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
							$('#propertyLayout').html('');
							$('#propertyLayout').html(data1+' m2'); 	  
							}
						});	
		}
		
		
		function updateFloors(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.updateInfo=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateFloors/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
							$('#propertyFloors').html('');
							$('#propertyFloors').html(data1+' floors'); 	  
							}
						});	
		}
		
		
		function updateEntrance(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.updateInfo=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateEntrance/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
							$('#entranceFloor').html('');
							$('#entranceFloor').html(data1); 	  
							}
						});	
		}
		
		function updatePrivateDoor(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.updateInfo=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updatePrivateDoor/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
							$('.chip-container').html('');
							$('.chip-container').html(data1); 	  
							}
						});	
		}
		
		
		function updateElevator(id)
		{
			$('#errorMsg').html('');
		var send_data={};
				 send_data.updateInfo=id;
				 
				 $.ajax({
							type:"POST",
							url:"../updateElevator/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
							$('.chip-container').html('');
							$('.chip-container').html(data1); 	  
							}
						});	
		}
		
		
		 </script>		
		 
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../rentOutRevisionInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			  
            <div class="clear"></div>
         </div>
      </div>
		
		 	 
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../rentOutRevisionInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="#" class="lgn_hight_s1 fsz25"><span class="fa fa-bars black_txt" aria-hidden="true"></span></a>
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
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "    >
				<div class="wrap maxwi_100 padrl0 xs-padrl15 xsi-padrl134">
					
					 
					<!-- Center content -->
					<div class="wi_960p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Property</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" ><?php echo $resultOrg1['name_on_house'].','.$resultOrg1['address'].'-'.$resultOrg1['port_number']; ?></a></div>
					 
					 <div class="clear"></div>
									  
						 
						<div class="on_clmn  marb5 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Property channels" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									 <div class="marketing-hub"><div class="marketing-hub__content"><style class="css-4ekjg7"></style><h2 class="marketing-hub__content-title tall">Fees paid on bookings</h2><div class="css-1x3o8ez"><div data-testid="commission-explainer-root" class="css-y2pgtc"><div class="css-grz9n1"><h1 class="css-jr7o5h">5%</h1><div><h3 class="css-75edtn tall bold">TravelNest Fee</h3><p class="css-vwh9m8">We keep things simple with a 5% TravelNest Fee per booking.</p></div></div><div id="spacer" spacing="standard" class="css-vqlgan"></div><hr class="css-1fky4oj"><div id="spacer" spacing="standard" class="css-vqlgan"></div><div class="css-grz9n1"><h2 class="css-19irje bold">+15%</h2><div><p class="css-vwh9m8 tall bold">Our Channel Fee covers ALL channel commissions and guest payment processing.</p></div></div></div></div><h2 class="marketing-hub__content-title tall">30 day Welcome Deal!</h2><div class="css-1x3o8ez"><div data-testid="deal-explainer-root" class="css-iqzk0r"><div class="css-grz9n1"><h2 class="css-19irje">🎉 -2%</h2><div><p class="css-vwh9m8">We'll reduce the TravelNest Fee by 2% for your first 30 days.</p></div></div></div><p class="vat-explainer">For UK-based customers, we'll charge VAT on the fees which will be deducted from your payout.</p></div><h2 class="marketing-hub__content-title tall fsz28 bold">Cancellation preference</h2>
									 <p class="marketing-hub__content-text tall fsz18 maxwi_50">Choose a cancellation preference for your account to set the guest cancellation terms on all channels. We recommend Flexible to increase bookings, however, you can change this here.</p>
									 <div class="form__row maxwi_50">
									 <div class="form-select form-select--container">
									 <div class="css-11e5cyp padt10">
												<select id="cancellation_policy" data-testid="cancellation_policy" class="css-bnguuq dropdown-bg" onchange="updateCancellationPolicy(this.value);">
												<option value="super_strict" <?php if($resultOrg1['cancellation_policy']=='super_strict') echo 'selected'; ?>>Super Strict</option><option value="strict" <?php if($resultOrg1['cancellation_policy']=='strict') echo 'selected'; ?>>Strict</option><option value="moderate" <?php if($resultOrg1['cancellation_policy']=='moderate') echo 'selected'; ?>>Moderate</option><option value="relaxed" <?php if($resultOrg1['cancellation_policy']=='relaxed') echo 'selected'; ?>>Relaxed</option><option value="flexible" <?php if($resultOrg1['cancellation_policy']=='flexible') echo 'selected'; ?>>Flexible (Recommended)</option>
												</select>
												</div>
									  
									 </div>
									 </div>
									 <hr class="css-c2sgj1"></div></div>
									 <div class="clear"></div>
									 	<div class="css-14v3gli  ">
    
   <div id="spacer" spacing="large" class="css-swt4jz"></div>
   <div class="css-ahy16g">
      <div class="css-zp5g9l">
         <h2 class="css-s01aoq tall bold  ">Helping you reach more guests</h2>
         <div id="spacer" spacing="small" class="css-1coujgl"></div>
         <p class="paragraph--b1 paragraph--mid css-1680uhd tall">We'll boost your exposure so you'll be seen by millions of guests. We work with 6 core partner channels and 20+ well-known affiliate sites.</p>
         <div id="spacer" spacing="small" class="css-1coujgl"></div>
      </div>
      <div class="css-zp5g9l">
         <div id="spacer" spacing="small" class="css-1coujgl"></div>
         <div class="css-f2p9x4">
            <div data-testid="stats-panel-You'll go live on:" class="css-tcew49">
               <div>
                  <div class="stat-panel__label">You'll go live on:</div>
                  <div class="css-5eqqcn">
                     <div class="css-5eqqcn" id="ttlChannels"><?php echo $resultOrg1['total_channels']; ?></div>
                     <span class="css-ymj97d"> channels 🙌</span>
                  </div>
               </div>
               <div class="css-i2nu59">All Channel Fees are 15%, plus 5% TravelNest Fee</div>
            </div>
         </div>
         <div id="spacer" spacing="small" class="css-1coujgl"></div>
         <button color="#444444" class="merlin-button css-1ovnf16 fleft" aria-label="" onclick="updateChannelsAll();">
            <div class="merlin-button__content">Select all channels</div>
         </button>
         <div id="spacer" spacing="standard" class="css-vqlgan padt10"></div>
		 <div class="clear"></div>
         <p class="paragraph--b1 paragraph--mid css-1680uhd padt10 tall">You can update your channel selection at any time.</p>
         <div id="spacer" spacing="standard" class="css-vqlgan"></div>
      </div>
   </div>
</div>


<div class="clear"></div>
									  
									 
										
										<div class="css-14v3gli checkChannels  ">
   <div width="50" class="css-9laphc">
   <?php if($resultOrg1['district_short_rent']==1) { ?>
    <div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk">
               <div class="css-h54deh">
			   
			   <img src="<?php echo $path; ?>html/usercontent/images/icons/airbnb.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">Dstricts</div>
                   <div>For short term rent only.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi" >
			<input data-testid="test-checkbox-Airbnb-checkbox" id="rent" name="rent-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_dstrict_rent']==1) echo 'checked'; ?> onclick="updateRent();"></div>
         </div>
          
          
      </div>
   <?php } if($resultOrg1['district_long_rent']==1) { ?>
   
   <div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk">
               <div class="css-h54deh">
			   
			   <img src="<?php echo $path; ?>html/usercontent/images/icons/airbnb.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">Dstricts</div>
                   <div>For long term rent only.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi" >
			<input data-testid="test-checkbox-Airbnb-checkbox" id="rent" name="rent-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_dstrict_long_rent']==1) echo 'checked'; ?> onclick="updatePublishRentLong();"></div>
         </div>
          
          
      </div>
   <?php } ?>
      <div data-testid="checked-accordion" class="css-1dgq259"  >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk">
               <div class="css-h54deh">
			   
			   <img src="<?php echo $path; ?>html/usercontent/images/icons/airbnb.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">Airbnb</div>
                  <div></div>
               </div>
               
            </div>
            <div class="css-1c7lyzi" id="sale"><input data-testid="test-checkbox-Airbnb-checkbox" id="air" name="sale-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_airnub']==1) echo 'checked'; ?> onclick="updateAir();"></div>
         </div>
          
          
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk">
               <div class="css-h54deh"><img src="<?php echo $path; ?>html/usercontent/images/icons/booking.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">Booking.com</div>
                  <div>+3 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-Booking.com-checkbox"  id="booking" name="Booking.com-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_booking']==1) echo 'checked'; ?> onclick="updateBooking();"></div>
         </div>
         
          
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" >
               <div class="css-h54deh"><img src="<?php echo $path; ?>html/usercontent/images/icons/expedia.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">Expedia</div>
                  <div>+19 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-Expedia-checkbox" id="expd" name="Expedia-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_exptd']==1) echo 'checked'; ?> onclick="updateExpedia();"></div>
         </div>
        
         
      </div>
   </div>
   <div width="50" class="css-9laphc">
 <?php if($resultOrg1['district_sale']==1) { ?>    
<div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" >
               <div class="css-h54deh"><img src="<?php echo $path; ?>html/usercontent/images/icons/booking.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">Dstricts</div>
                  <div>For sale only.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-Booking.com-checkbox" id="sale" name="Booking.com-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_dstrict_sale']==1) echo 'checked'; ?> onclick="updateSale();"></div>
         </div>
         
          
      </div>
 <?php } ?> 

	 <div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" >
               <div class="css-h54deh"><img src="<?php echo $path; ?>html/usercontent/images/icons/vrbo.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">VRBO</div>
                  <div>+1 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-VRBO-checkbox" id="vrbo" name="VRBO-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_vrbo']==1) echo 'checked'; ?> onclick="updateVrbo();"></div>
         </div>
           
         
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" >
               <div class="css-h54deh"><img src="<?php echo $path; ?>html/usercontent/images/icons/tripadvisor.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">TripAdvisor</div>
                  <div>+3 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-TripAdvisor-checkbox" id="trip" name="TripAdvisor-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_trip']==1) echo 'checked'; ?> onclick="updateTrip();"></div>
         </div>
          
          
      </div>
      <div data-testid="checked-accordion" class="css-1dgq259" >
         <div class="css-1ykgisf">
            <div data-testid="accordion-header" role="button" class="css-hdn4uk" >
               <div class="css-h54deh"><img src="<?php echo $path; ?>html/usercontent/images/icons/tui.fe30.svg" height="44" width="40"></div>
               <div class="css-dwbcy3">
                  <div class="tall">TUI</div>
                  <div>+1 affiliate channels.</div>
               </div>
               
            </div>
            <div class="css-1c7lyzi"><input data-testid="test-checkbox-TUI-checkbox" id="tui" name="TUI-checkbox" type="checkbox" class="css-1lgzhz8" <?php if($resultOrg1['publish_tui']==1) echo 'checked'; ?> onclick="updateTui();"></div>
         </div>
        
        
      </div>
   </div>
</div>
					 
					 
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
			
		</div>
		 
		
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="edit_department">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
				</div>
				
				
			</div>
			
			
			
			
			<div class="on_clmn padb10">
				
				<div class="pos_rel ">
					
					<input type="text" id="d_name1" name="d_name1" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="avdelning ">
				</div>
			</div>
			
			<div id="errorMsg1" class="red_txt fsz16"> </div>
			
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="editDepartment();">
				<input type="hidden" id="did" name="did" />
			</div>
			
			
		</div>
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
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