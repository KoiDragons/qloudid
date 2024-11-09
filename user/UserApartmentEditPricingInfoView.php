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
			<link rel="stylesheet" type="text/css" media="all" href="https://account.travelnest.com/d566fde/assets/main.css?%20[sm]" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
		var title="<?php echo $pricing['pricing_title']; ?>";
		var monday_price="<?php echo $pricing['monday_price']; ?>"; 
		var tuesday_price="<?php echo $pricing['tuesday_price']; ?>";
		var wednesday_price="<?php echo $pricing['wednesday_price']; ?>";
		var thursday_price="<?php echo $pricing['thursday_price']; ?>";
		var friday_price="<?php echo $pricing['friday_price']; ?>";
		var saturday_price="<?php echo $pricing['saturday_price']; ?>";
		var sunday_price="<?php echo $pricing['sunday_price']; ?>";
		var shortest_duration=<?php echo $pricing['shortest_duration']; ?>;
		var discount_for_seven=<?php echo $pricing['discount_for_seven']; ?>;		
		function decrementNight()
		{
		 var send_data={};
		 shortest_duration=shortest_duration-1;
		 if(shortest_duration==0)
		 {
			 shortest_duration=1;
			 return false;
		 }
				 send_data.id=-1;
				 send_data.shortest_duration=shortest_duration;
				 $.ajax({
							type:"POST",
							url:"../../updateMinimumNight/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								
								 $('#totalNights').html('');
								 $('#totalNights').html(shortest_duration);
								
							}
						});	
		}
		
		
		function incrementNight()
		{
		 var send_data={};
		 shortest_duration=shortest_duration+1;
		 if(shortest_duration>7)
		 {
			 shortest_duration=7;
			 return false;
		 }
				 send_data.id=-1;
				 send_data.shortest_duration=shortest_duration;
				 $.ajax({
							type:"POST",
							url:"../../updateMinimumNight/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								
								 $('#totalNights').html('');
								 $('#totalNights').html(shortest_duration);
								
							}
						});	
		}
		
		function decrementDiscount()
		{
		 var send_data={};
		 discount_for_seven=discount_for_seven-1;
		 if(discount_for_seven<0)
		 {
			 discount_for_seven=1;
			 return false;
		 }
				 send_data.id=-1;
				 send_data.discount_for_seven=discount_for_seven;
				 $.ajax({
							type:"POST",
							url:"../../updateDiscount/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								
								 $('#totalDiscount').html('');
								 $('#totalDiscount').html(discount_for_seven);
								
							}
						});	
		}
		
		
		function incrementDiscount()
		{
		 var send_data={};
		 discount_for_seven=discount_for_seven+1;
		 if(discount_for_seven>100)
		 {
			 discount_for_seven=100;
			 return false;
		 }
				 send_data.id=-1;
				 send_data.discount_for_seven=discount_for_seven;
				 $.ajax({
							type:"POST",
							url:"../../updateDiscount/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								
								 $('#totalDiscount').html('');
								 $('#totalDiscount').html(discount_for_seven);
								
							}
						});	
		}
		
		
		function updateTitle(id)
		{
			$('#errorMsg').html('');
			 
			if(id.length==1)
			{
			$('#errorMsg').html('Minimum one character is required!!!');	
			return false;
			}
			
			if(id.length==0)
			{
			$('#errorMsg').html('Minimum one character is required!!!');	
			$('#period_name').val(title);
			
			return false;
			}
			$('#wordCount').html(id.length);
				var send_data={};
				 send_data.title=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateTitle/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								title=id;
								  
							}
						});	
		}
		
		
		function updateEndDate(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateEndDate/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 
								  
							}
						});	
		}
		
		
		function updateMonday(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#monday_price').val(monday_price);
			
			return false;
			}
			
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#monday_price').val(monday_price);
			
			return false;	
			}
			
				var send_data={};
				 send_data.update_info=parseInt(id);
				 
				 $.ajax({
							type:"POST",
							url:"../../updateMonday/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								monday_price=id;
								  
							}
						});	
		}
		
		
		function updateTuesday(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#tuesday_price').val(tuesday_price);
			
			return false;
			}
			
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#tuesday_price').val(tuesday_price);
			
			return false;	
			}
			
				var send_data={};
				 send_data.update_info=parseInt(id);
				 
				 $.ajax({
							type:"POST",
							url:"../../updateTuesday/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								tuesday_price=id;
								  
							}
						});	
		}
		
		function updateWednesday(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#wednesday_price').val(wednesday_price);
			
			return false;
			}
			
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#wednesday_price').val(wednesday_price);
			
			return false;	
			}
			
				var send_data={};
				 send_data.update_info=parseInt(id);
				 
				 $.ajax({
							type:"POST",
							url:"../../updateWednesday/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								wednesday_price=id;
								  
							}
						});	
		}
		
		function updateThursday(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#thursday_price').val(thursday_price);
			
			return false;
			}
			
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#thursday_price').val(thursday_price);
			
			return false;	
			}
			
				var send_data={};
				 send_data.update_info=parseInt(id);
				 
				 $.ajax({
							type:"POST",
							url:"../../updateThursday/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								thursday_price=id;
								  
							}
						});	
		}
		
		function updateFriday(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#friday_price').val(friday_price);
			
			return false;
			}
			
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#friday_price').val(friday_price);
			
			return false;	
			}
			
				var send_data={};
				 send_data.update_info=parseInt(id);
				 
				 $.ajax({
							type:"POST",
							url:"../../updateFriday/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								friday_price=id;
								  
							}
						});	
		}
		
		
		function updateSaturday(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#saturday_price').val(saturday_price);
			
			return false;
			}
			
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#saturday_price').val(saturday_price);
			
			return false;	
			}
			
				var send_data={};
				 send_data.update_info=parseInt(id);
				 
				 $.ajax({
							type:"POST",
							url:"../../updateSaturday/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								saturday_price=id;
								  
							}
						});	
		}
		
		
		function updateSunday(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#sunday_price').val(sunday_price);
			
			return false;
			}
			
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#sunday_price').val(sunday_price);
			
			return false;	
			}
			
				var send_data={};
				 send_data.update_info=parseInt(id);
				 
				 $.ajax({
							type:"POST",
							url:"../../updateSunday/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								sunday_price=id;
								  
							}
						});	
		}
		
		
		function updateSundayOpen(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateSundayOpen/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.chip-container').html('');
								 $('.chip-container').html(data1); 
								  
							}
						});	
		}
		
		function updateSaturdayOpen(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateSaturdayOpen/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.chip-container').html('');
								 $('.chip-container').html(data1); 
								  
							}
						});	
		}
		
		function updateFridayOpen(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateFridayOpen/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.chip-container').html('');
								 $('.chip-container').html(data1); 
								  
							}
						});	
		}
		
		function updateThursdayOpen(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateThursdayOpen/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.chip-container').html('');
								 $('.chip-container').html(data1); 
								  
							}
						});	
		}
		
		function updateWednesdayOpen(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateWednesdayOpen/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.chip-container').html('');
								 $('.chip-container').html(data1); 
								  
							}
						});	
		}
		
		function updateTuesdayOpen(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateTuesdayOpen/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.chip-container').html('');
								 $('.chip-container').html(data1); 
								  
							}
						});	
		}
		
		function updateMondayOpen(id)
		{
			$('#errorMsg').html('');
			 
				var send_data={};
				 send_data.update_info=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../updateMondayOpen/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?> ",
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
				 
                        <a href="../../apartmentPricingInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
                        <a href="../../apartmentPricingInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Property</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir black_txt fsz25  xs-fsz20"> <?php echo $resultOrg1['name_on_house'].','.$resultOrg1['address'].'-'.$resultOrg1['port_number']; ?></div>
					 
					 <div class="clear"></div>
									  
						 
						<div class="on_clmn brdb  marb5">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Nightly pricing" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									 <div class="clear"></div>
									 
									 	<div class="css-17s7vuc">
   <div class="css-lp0u0j">
      <div id="spacer" spacing="large" class="css-swt4jz"></div>
      <div width="100" class="css-11wamwp">
         <div class="css-ahy16g tall">
            
               <div data-testid="period_name-wrapper">
                  <label for="period_name" class="css-14q70q0 bold tall bold">Pricing period title</label>
                  <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                  <div class="css-zcv01q"><input label="Pricing period title" id="period_name" minlength="1" maxlength="100" class="css-xt766" value="<?php echo $pricing['pricing_title']; ?>" onkeyup="updateTitle(this.value);"></div>
                  <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                  <div class="css-ev078v tall">(minimum 1) <span id="wordCount"><?php echo strlen($pricing['pricing_title']); ?></span>/100</div>
               </div>
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <div class="css-4l9tge">
                  <div class="date-pickers">
                     <div class="css-64k0s4">
                        <div>
                           <div class="css-1q6edn6 tall"><label for="block-range-start-date" class="label bold tall">Start date</label></div>
                           <div class="css-1jebfy1"><input type="date" placeholder="dd/mm/yyyy" id="block-range-start-date" class="merlin-datepicker__input" value="<?php echo date('Y-m-d',$pricing['pricing_start_date']); ?>" readonly></div>
                        </div>
                     </div>
                     <div class="css-64k0s4">
                        <div>
                           <div class="css-1q6edn6 tall"><label for="block-range-end-date" class="label bold tall">End date</label></div>
                           <div class="css-1jebfy1"><input type="date" placeholder="dd/mm/yyyy" id="block-range-end-date" min="<?php echo date('Y-m-d',$pricing['pricing_start_date']); ?>" class="merlin-datepicker__input" value="<?php echo date('Y-m-d',$pricing['pricing_end_date']); ?>" onchange="updateEndDate(this.value);"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <hr class="css-1fky4oj">
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <div class="css-1jzh2co tall">
                  <p class="paragraph--b1 paragraph--full css-1680uhd martb0">Which days can guests arrive?</p>
                  <div class="chip-container">
                     <?php echo $dayAvailable; ?> </div>
               </div>
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <label for="minimum-nights-stay" class="css-ca7ok7 tall">What is the shortest duration a guest can stay for?</label>
               <div id="spacer" spacing="standard" class="css-vqlgan"></div>
			   <div id="night_count" class="css-151xzu3">
										<a href="javascript:void(0);" onclick="decrementNight();"><button color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										<span class="value" ><span id="totalNights"><?php echo $pricing['shortest_duration']; ?></span> nights</span>
									<a href="javascript:void(0);" onclick="incrementNight();">	
									<button color="#444444" data-testid="icon-button--plus" class="merlin-button css-mgojn5" aria-label="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-r0ilrj">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										</div>
                
               <div id="spacer" spacing="standard" class="css-vqlgan"></div>
               <div class="css-1jcail2">
                  <div data-testid="did-you-know-min-stay" class="css-1miy8fb">
                     <img role="presentation" src="https://www.safeqloud.com/html/usercontent/images/paintbrush-ladder.68ee.svg" class="css-1p436cn">
                     <div class="css-1ai2sgr">A minimum stay of 1 or 2 nights will increase your chances of getting booked</div>
                  </div>
               </div>
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <hr class="css-1fky4oj">
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <div role="group" aria-labelledby="nightly-pricing-group-label">
                  <p id="nightly-pricing-group-label" class="paragraph--b1 paragraph--full css-1680uhd martb0">What is the price for each night?</p>
                  <div class="css-1qgbx8i padb20 dflex">
                     <div class="css-1bafjsv padr10">
                        <div class="css-umfz9">
                           <div data-testid="price-mon-wrapper">
                              <label for="price-mon" class="css-14q70q0 bold">Mon</label>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                              <div class="css-zcv01q"><input type="text" pattern="[0-9]*" label="Mon" id="monday_price" class="css-xt766" value="<?php echo $pricing['monday_price']; ?>" onkeyup="updateMonday(this.value);"></div>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                           </div>
                        </div>
                     </div>
                     <div class="css-1rp1tha padl10">
                        <div class="css-umfz9">
                           <div data-testid="price-tue-wrapper">
                              <label for="price-tue" class="css-14q70q0 bold">Tue</label>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                              <div class="css-zcv01q"><input type="text" pattern="[0-9]*" label="Tue" id="tuesday_price" class="css-xt766" value="<?php echo $pricing['tuesday_price']; ?>" onkeyup="updateTuesday(this.value);"></div>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="css-1qgbx8i padb20 dflex">
                     <div class="css-1bafjsv padr10">
                        <div class="css-umfz9">
                           <div data-testid="price-wed-wrapper">
                              <label for="price-wed" class="css-14q70q0 bold">Wed</label>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                              <div class="css-zcv01q"><input type="text" pattern="[0-9]*" label="Wed" id="wednesday_price" class="css-xt766" value="<?php echo $pricing['wednesday_price']; ?>" onkeyup="updateWednesday(this.value);"></div>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                           </div>
                        </div>
                     </div>
                     <div class="css-1rp1tha padl10">
                        <div class="css-umfz9">
                           <div data-testid="price-thu-wrapper">
                              <label for="price-thu" class="css-14q70q0 bold">Thu</label>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                              <div class="css-zcv01q"><input type="text" pattern="[0-9]*" label="Thu" id="thursday_price" class="css-xt766" value="<?php echo $pricing['thursday_price']; ?>" onkeyup="updateThursday(this.value);"></div>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="css-1qgbx8i padb20 dflex">
                     <div class="css-1bafjsv padr10">
                        <div class="css-umfz9">
                           <div data-testid="price-fri-wrapper">
                              <label for="price-fri" class="css-14q70q0 bold">Fri</label>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                              <div class="css-zcv01q"><input type="text" pattern="[0-9]*" label="Fri" id="friday_price" class="css-xt766" value="<?php echo $pricing['friday_price']; ?>" onkeyup="updateFriday(this.value);"></div>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                           </div>
                        </div>
                     </div>
                     <div class="css-1rp1tha padl10">
                        <div class="css-umfz9">
                           <div data-testid="price-sat-wrapper">
                              <label for="price-sat" class="css-14q70q0 bold">Sat</label>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                              <div class="css-zcv01q"><input type="text" pattern="[0-9]*" label="Sat" id="saturday_price" class="css-xt766" value="<?php echo $pricing['saturday_price']; ?>" onkeyup="updateSaturday(this.value);"></div>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="css-1qgbx8i padb20 dflex">
                     <div class="css-1bafjsv padr10">
                        <div class="css-umfz9">
                           <div data-testid="price-sun-wrapper">
                              <label for="price-sun" class="css-14q70q0 bold">Sun</label>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                              <div class="css-zcv01q"><input type="text" pattern="[0-9]*" label="Sun" id="sunday_price" class="css-xt766" value="<?php echo $pricing['sunday_price']; ?>" onkeyup="updateSunday(this.value);"></div>
                              <div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <label for="seven-night-discount" class="css-ca7ok7">What discount do you offer for each 7 night stay?</label>
               <div id="spacer" spacing="standard" class="css-vqlgan"></div>
			    <div id="seven-night-discount" class="css-151xzu3">
										<a href="javascript:void(0);" onclick="decrementDiscount();"><button color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										<span class="value"><span id="totalDiscount"><?php echo $pricing['discount_for_seven']; ?></span>% discount</span>
									<a href="javascript:void(0);" onclick="incrementDiscount();">	
									<button color="#444444" data-testid="icon-button--plus" class="merlin-button css-mgojn5" aria-label="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-r0ilrj">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										</div>
                
                <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <hr class="css-1fky4oj">
               <div id="spacer" spacing="large" class="css-swt4jz"></div>
               <div>
               <a href="../../deletePricing/<?php echo $data['aid']; ?>/<?php echo $data['pid']; ?>" style="text-decoration: none;">   <button color="#444444" class="merlin-button css-1gwp7cd" aria-label="">
                     <div class="merlin-button__content">Delete pricing period</div>
                  </button></a>
               </div>
            </div>
         
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