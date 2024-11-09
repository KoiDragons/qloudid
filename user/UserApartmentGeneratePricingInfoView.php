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
		var shortest_duration=1;
		var todayDate='<?php echo date('Y-m-d') ?>';
		
	function updateStandardPrice(id)
		{
			$('#errorMsg').html('');
			 
			if(id==0)
			{
			$('#errorMsg').html('Price cant be zero!!!');	
			$('#standard_price_per_night').val(100);
			
			return false;
			}
			if(id=='' || id==null)
			{
			$('#errorMsg').html('Price cant be null!!!');	
			$('#standard_price_per_night').val(100);
			
			return false;
			}
			if(isNaN(id))
			{
			$('#errorMsg').html('Price must be a numeric value!!!');	
			$('#standard_price_per_night').val(100);
			
			return false;	
			}
			
				
		}
		
		function generatePricingSubmit()
		{
			document.getElementById('save_indexing').submit();
		}
	  function startPricing()
	  {
		$('#getStarted').addClass('hidden');  
		$('#selectDate').removeClass('hidden');
return false;		
	  }
	  
	  function getStarted()
	  {
		 
		$('#date_picker').val(todayDate);   
		$('#selectDate').addClass('hidden');  
		$('#getStarted').removeClass('hidden');    
	  }
	  
	  function addPrice()
	  {
		$('#selectDate').addClass('hidden'); 
		$('#selectFlatPrice').removeClass('hidden'); 	
	  }
	  
	   function addPrice()
	  {
		$('#selectDate').addClass('hidden'); 
		$('#selectFlatPrice').removeClass('hidden'); 	
	  }
	  function updatePrice()
	  {
		 $('#date_picker').val(todayDate); 
		 $('#standard_price_per_night').val(100);
		$('#selectDate').removeClass('hidden'); 
		$('#selectFlatPrice').addClass('hidden');   
	  }
	  
	  function selectSeason()
	  {
		
		$('#selectFlatPrice').addClass('hidden'); 	
		$('#seasonlyInfo').removeClass('hidden'); 
	  }
	  function backToPrice()
	  {
		  $('#gras').removeClass('hidden');
        $('#flat').addClass('hidden');
        $('#qua').addClass('hidden');
        $('#sum').addClass('hidden');
		 $('#seasonality_template').val(1);
		$('#standard_price_per_night').val(100);  
		$('#selectFlatPrice').removeClass('hidden'); 	
		$('#seasonlyInfo').addClass('hidden');   
	  }
	  
	 function showSeason(id) {
    if (id == 1) {
        $('#gras').removeClass('hidden');
        $('#flat').addClass('hidden');
        $('#qua').addClass('hidden');
        $('#sum').addClass('hidden');
    } else if (id == 2) {
        $('#flat').removeClass('hidden');
        $('#gras').addClass('hidden');
        $('#qua').addClass('hidden');
        $('#sum').addClass('hidden');
    } else if (id == 3) {
        $('#qua').removeClass('hidden');
        $('#gras').addClass('hidden');
        $('#flat').addClass('hidden');
        $('#sum').addClass('hidden');
    } else if (id == 4) {
        $('#sum').removeClass('hidden');
        $('#gras').addClass('hidden');
        $('#flat').addClass('hidden');
        $('#qua').addClass('hidden');
    }
} 
	function selectMinimumNights()
	{
	$('#minNights').removeClass('hidden'); 	
		$('#seasonlyInfo').addClass('hidden');  	
	}	
	
	function decrementNight()
		{
		 var send_data={};
		 shortest_duration=shortest_duration-1;
		 if(shortest_duration==0)
		 {
			 shortest_duration=1;
			 return false;
		 }
				  $('#totalNights').html('');
				  $('#totalNights').html(shortest_duration);
				  $('#t_nights').val(shortest_duration);
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
				 $('#totalNights').html('');
				$('#totalNights').html(shortest_duration);
				$('#t_nights').val(shortest_duration);
		}
		
	function backToSeason()
	{
		 $('#seasonality_template').val(1);
		$('#gras').removeClass('hidden');
        $('#flat').addClass('hidden');
        $('#qua').addClass('hidden');
        $('#sum').addClass('hidden');
		shortest_duration=1;
		$('#totalNights').html(shortest_duration);
		$('#t_nights').val(shortest_duration);
		$('#minNights').addClass('hidden'); 	
		$('#seasonlyInfo').removeClass('hidden');  
	}
	
	function selectAvailableDays()
	{
		$('#minNights').addClass('hidden'); 	
		$('#dayAvailable').removeClass('hidden');  
	}
	function backToMinimumNights()
	{
		$('#monday').val(1);
		$('#mon0').removeClass('hidden');
		$('#mon1').addClass('hidden');	
	$('#tuesday').val(1);
		$('#tue0').removeClass('hidden');
		$('#tue1').addClass('hidden');	
		$('#wednesday').val(1);
		$('#wed0').removeClass('hidden');
		$('#wed1').addClass('hidden');	
$('#thursday').val(1);
		$('#thu0').removeClass('hidden');
		$('#thu1').addClass('hidden');	
$('#friday').val(1);
		$('#fri0').removeClass('hidden');
		$('#fri1').addClass('hidden');	
$('#saturday').val(1);
		$('#sat0').removeClass('hidden');
		$('#sat1').addClass('hidden');	
		$('#sunday').val(1);
		$('#sun0').removeClass('hidden');
		$('#sun1').addClass('hidden');
		shortest_duration=1;
		$('#totalNights').html(shortest_duration);
		$('#t_nights').val(shortest_duration);
		$('#minNights').removeClass('hidden'); 	
		$('#dayAvailable').addClass('hidden'); 
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
				 
                        <a href="../apartmentPricingInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
                        <a href="../apartmentPricingInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
									
										<input type="text" value="Add pricing" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									 <div class="clear"></div>
									 <form action="../generatePricing/<?php echo $data['aid']; ?>" method="POST" id="save_indexing" name="save_indexing">
									 
									 <div id="getStarted" class="">
									 <div class="travelnest-modal__contain">
										<div class="travelnest-modal__content">
											<h2 class="css-s01aoq bold tall padt30">Build your perfect pricing model</h2>
											 
											<p class="paragraph--b1 paragraph--full css-1680uhd tall">Pricing your property can be difficult, we get it! Using this tool, we will help you to quickly build 24 months of pricing.</p>
											 
											<p class="paragraph--b1 paragraph--full css-1680uhd tall">You'll be able to fine tune it afterwards.</p>
										</div>
									</div>
									 
								  
									 <input type="button" color="#444444" value="Get started" class="merlin-button css-u7z53d fright" aria-label=""  onclick="startPricing();" />
												 <!--<div class="merlin-button__content">Get started</div>
											  </button>-->
											  
										</div>	
										
											<div id="selectDate" class="hidden">
											 
											<div class="travelnest-modal__content maxwi_100i">
												<h2 class="css-s01aoq bold tall padt30">Override your existing pricing</h2>
												 
												<p class="paragraph--b1 paragraph--full css-1680uhd tall">Let's get you new pricing! By following the next few prompts, we will overwrite your existing pricing and generate 2 years worth of new pricing.</p>
												 
												<p class="paragraph--b1 paragraph--full css-1680uhd tall">If instead you simply wish to extend the pricing you already have, adjust the start date below. 2 years of pricing will be generated from that start date.</p>
												<div id="spacer" spacing="standard" class="css-vqlgan"></div>
												<label for="pricing-start-date" class="css-14q70q0 tall">Start date</label>
												<div id="spacer" spacing="small" class="css-1coujgl"></div>
												<div>
													<div class="css-1jebfy1">
														<input type="date" placeholder="dd/mm/yyyy" id="date_picker" name="date_picker" min="<?php echo date('Y-m-d'); ?>" class="merlin-datepicker__input" value="<?php echo date('Y-m-d'); ?>">
													</div>
												</div>
											</div>
												 
												<div class="dflex padt30">
												
													  <div class="wi_50">
														 <input type="button" value="Previous" color="#444444" class="merlin-button css-1gwp7cd fleft  " aria-label="" onclick="getStarted();" />
														  
													   </div>
													   <div class="wi_50">
													   <input type="button" color="#444444" value="Next" class="merlin-button css-u7z53d fright" aria-label=""  onclick="addPrice();" />
											  
													  </div>
										  </div>
											</div>
											
											<div id="selectFlatPrice" class="hidden">
											<div class="travelnest-modal__content maxwi_100i">
											<h2 class="css-s01aoq"><label for="standard-price-per-night" class="css-14q70q0 padt30 bold tall">Standard price per night</label></h2>
											 
											<p class="paragraph--b1 paragraph--full css-1680uhd tall" >Tell us the average price you would charge for a night in your property. We'll use this as a base for your pricing model.</p>
											 
											<label for="standard-price-per-night" class="css-14q70q0 tall">Standard price per night</label>
											<div id="spacer" spacing="small" class="css-1coujgl"></div>
											<div class="css-mmbpsy">
												<div id="standard-price-per-night" class="css-11drqoa">
													<div class="currency__label"><?php if($getCurrency==1) echo '£ - GBP'; else if($getCurrency==2) echo '€ - EUR'; else if($getCurrency==3) echo '$ - USD'; ?></div>
													<input id="standard_price_per_night" name="standard_price_per_night" currency="<?php if($getCurrency==1) echo 'GBP'; else if($getCurrency==2) echo 'EUR'; else if($getCurrency==3) echo 'USD'; ?>" type="text" pattern="[0-9]*" class="" value="100" onkeyup="updateStandardPrice(this.value);">
												</div>
											</div>
										</div>
										
										<div class="dflex padt30">
												
													  <div class="wi_50">
														 <input type="button" value="Previous" color="#444444" class="merlin-button css-1gwp7cd fleft  " aria-label="" onclick="updatePrice();" />
														  
													   </div>
													   <div class="wi_50">
													   <input type="button" color="#444444" value="Next" class="merlin-button css-u7z53d fright" aria-label=""  onclick="selectSeason();" />
											  
													  </div>
										  </div>
											</div>
								   
										<div id="seasonlyInfo" class="hidden">
										<div class="travelnest-modal__content maxwi_100i">
										<h2 class="css-s01aoq padt30 bold tall">Seasonality</h2>
										 
										<p class="paragraph--b1 paragraph--full css-1680uhd tall">To help us create your pricing model, select a seasonality that closest matches your property.</p>
										 
										<label for="seasonality-template" class="css-owua82 tall">Seasonality</label>
										<div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
										<div class="css-11e5cyp">
											<select id="seasonality_template" name="seasonality_template" data-testid="seasonality-template" class="css-bnguuq" onchange="showSeason(this.value);">
												<option value="1">Gradual Seasonality</option>
												<option value="2">Flat Rate Seasonality</option>
												<option value="3">Quarterly Seasonality</option>
												<option value="4">Summer Peak Seasonality</option>
											</select>
										</div>
										<div id="spacer" spacing="standard" class="css-vqlgan"></div>
										<img src="<?php echo $path; ?>html/usercontent/images/grases.png" width="100%" class="" id="gras">
										<img src="<?php echo $path; ?>html/usercontent/images/flatses.png" width="100%" class="hidden" id="flat">
										<img src="<?php echo $path; ?>html/usercontent/images/quases.png" width="100%" class="hidden" id="qua">
										<img src="<?php echo $path; ?>html/usercontent/images/sumses.png" width="100%" class="hidden" id="sum">
									 	</div>
										
										
										
											<div class="dflex padt30">
												
													   <div class="wi_50">
														 <input type="button" value="Previous" color="#444444" class="merlin-button css-1gwp7cd fleft  " aria-label="" onclick="backToPrice();" />
														  
													   </div>
													   <div class="wi_50">
													   <input type="button" color="#444444" value="Next" class="merlin-button css-u7z53d fright" aria-label=""  onclick="selectMinimumNights();" />
											  
													  </div>
										  </div>
										</div>
								   
								   
								   <div id="minNights" class="hidden">
								   <div class="travelnest-modal__content maxwi_100i">
	<h2 class="css-s01aoq padt30 bold tall">Minimum nights stay</h2>
	<div id="spacer" spacing="small" class="css-1coujgl"></div>
	<p class="paragraph--b1 paragraph--full css-1680uhd tall">What is the shortest duration a guest can stay for?</p>
	<div id="spacer" spacing="standard" class="css-vqlgan"></div>
	<div id="night_count" class="css-151xzu3">
										<a href="javascript:void(0);" onclick="decrementNight();"><button type="button"  color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										<span class="value"><span id="totalNights">1</span> nights</span>
									<a href="javascript:void(0);" onclick="incrementNight();">	
									<button type="button" color="#444444" data-testid="icon-button--plus" class="merlin-button css-mgojn5" aria-label="">
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
										<input type='hidden' id="t_nights" name="t_nights" value="1" />
	<div id="spacer" spacing="standard" class="css-vqlgan"></div>
	<div class="css-1jcail2">
		<div data-testid="did-you-know-min-stay" class="css-1miy8fb"><img role="presentation" src="https://www.safeqloud.com/html/usercontent/images/paintbrush-ladder.68ee.svg" class="css-1p436cn">
			<div class="css-1ai2sgr">A minimum stay of 1 or 2 nights will increase your chances of getting booked</div>
		</div>
	</div>
</div>
								  
									<div class="dflex padt30">
												
													   <div class="wi_50">
														 <input type="button" value="Previous" color="#444444" class="merlin-button css-1gwp7cd fleft  " aria-label="" onclick="backToSeason();" />
														  
													   </div>
													   <div class="wi_50">
													   <input type="button" color="#444444" value="Next" class="merlin-button css-u7z53d fright" aria-label=""  onclick="selectAvailableDays();" />
											  
													  </div>
										  </div>

								  </div>
								   
								   <div id="dayAvailable" class="hidden">
								   <div class="css-1jzh2co tall">
                  <p class="paragraph--b1 paragraph--full css-1680uhd martb0 padt30 bold tall">Which days can guests arrive?</p>
                  <div class="chip-container">
        <script>
function updateMondayOpen(id)
{
	if(id==0)
	{
		$('#monday').val(0);
		$('#mon0').addClass('hidden');
		$('#mon1').removeClass('hidden');
	}
	else
	{
		$('#monday').val(1);
		$('#mon0').removeClass('hidden');
		$('#mon1').addClass('hidden');	
	}
}
</script>	          
				  <a href="javascript:void(0);" onclick="updateMondayOpen(0);" class="" id="mon0"><div class="css-cedhmb">
                        <div tabindex="0" role="button" class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Monday</span>
							</span>
                           </span>
                        </div>
                     </div>
					 </a>
					 <a href="javascript:void(0);" onclick="updateMondayOpen(1);" class="hidden" id="mon1"><div class="css-cedhmb">
														 <div tabindex="0" role="button" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Monday</span>
															   </span>
															</span>
														 </div>
													  </div>
													  </a>
						<input type="hidden" id="monday" name="monday" value="1" />							  
	
	<script>
function updateTuesdayOpen(id)
{
	if(id==0)
	{
		$('#tuesday').val(0);
		$('#tue0').addClass('hidden');
		$('#tue1').removeClass('hidden');
	}
	else
	{
		$('#tuesday').val(1);
		$('#tue0').removeClass('hidden');
		$('#tue1').addClass('hidden');	
	}
}
</script>				
					<a href="javascript:void(0);" onclick="updateTuesdayOpen(0);" id="tue0"><div class="css-cedhmb">
                        <div tabindex="0" role="button" class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Tuesday</span>
							</span>
                           </span>
                        </div>
                     </div></a>
					 
					 <a href="javascript:void(0);" onclick="updateTuesdayOpen(1);" class="hidden" id="tue1"><div class="css-cedhmb">
														 <div tabindex="0" role="button" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Tuesday</span>
															   </span>
															</span>
														 </div>
													  </div>
													  </a>
							<input type="hidden" id="tuesday" name="tuesday" value="1" />						  
<script>
function updateWednesdayOpen(id)
{
	if(id==0)
	{
		$('#wednesday').val(0);
		$('#wed0').addClass('hidden');
		$('#wed1').removeClass('hidden');
	}
	else
	{
		$('#wednesday').val(1);
		$('#wed0').removeClass('hidden');
		$('#wed1').addClass('hidden');	
	}
}
</script>														  
					 <a href="javascript:void(0);" onclick="updateWednesdayOpen(0);" id="wed0"><div class="css-cedhmb">
                        <div tabindex="0" role="button" class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Wednesday</span>
							</span>
                           </span>
                        </div>
                     </div></a>
					 
					  <a href="javascript:void(0);" onclick="updateWednesdayOpen(1);" class="hidden" id="wed1"><div class="css-cedhmb">
														 <div tabindex="0" role="button" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Wednesday</span>
															   </span>
															</span>
														 </div>
													  </div>
													  </a>
						<input type="hidden" id="wednesday" name="wednesday" value="1" />	
		
<script>
function updateThursdayOpen(id)
{
	if(id==0)
	{
		$('#thursday').val(0);
		$('#thu0').addClass('hidden');
		$('#thu1').removeClass('hidden');
	}
	else
	{
		$('#thursday').val(1);
		$('#thu0').removeClass('hidden');
		$('#thu1').addClass('hidden');	
	}
}
</script>			

					<a href="javascript:void(0);" onclick="updateThursdayOpen(0);" id="thu0"><div class="css-cedhmb">
                        <div tabindex="0" role="button" class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Thursday</span>
							</span>
                           </span>
                        </div>
                     </div></a>
					 
					 <a href="javascript:void(0);" onclick="updateThursdayOpen(1);" class="hidden" id="thu1"><div class="css-cedhmb">
														 <div tabindex="0" role="button" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Thursday</span>
															   </span>
															</span>
														 </div>
													  </div>
													  </a>
						<input type="hidden" id="thursday" name="thursday" value="1" />								  
					
<script>
function updateFridayOpen(id)
{
	if(id==0)
	{
		$('#friday').val(0);
		$('#fri0').addClass('hidden');
		$('#fri1').removeClass('hidden');
	}
	else
	{
		$('#friday').val(1);
		$('#fri0').removeClass('hidden');
		$('#fri1').addClass('hidden');	
	}
}
</script>
					<a href="javascript:void(0);" onclick="updateFridayOpen(0);" id="fri0"><div class="css-cedhmb">
                        <div tabindex="0" role="button" class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Friday</span>
							</span>
                           </span>
                        </div>
                     </div></a>
					 
					  <a href="javascript:void(0);" onclick="updateFridayOpen(1);" class="hidden" id="fri1"><div class="css-cedhmb">
														 <div tabindex="0" role="button" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Friday</span>
															   </span>
															</span>
														 </div>
													  </div>
													  </a>
							<input type="hidden" id="friday" name="friday" value="1" />								  
			
		<script>
function updateSaturdayOpen(id)
{
	if(id==0)
	{
		$('#saturday').val(0);
		$('#sat0').addClass('hidden');
		$('#sat1').removeClass('hidden');
	}
	else
	{
		$('#saturday').val(1);
		$('#sat0').removeClass('hidden');
		$('#sat1').addClass('hidden');	
	}
}
</script>											  
					 <a href="javascript:void(0);" onclick="updateSaturdayOpen(0);" id="sat0"><div class="css-cedhmb">
                        <div tabindex="0" role="button" class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Saturday</span>
							</span>
                           </span>
                        </div>
                     </div></a>
					 
					   <a href="javascript:void(0);" onclick="updateSaturdayOpen(1);" class="hidden" id="sat1"><div class="css-cedhmb">
														 <div tabindex="0" role="button" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Saturday</span>
															   </span>
															</span>
														 </div>
													  </div>
													  </a>
						<input type="hidden" id="saturday" name="saturday" value="1" />	

<script>
function updateSundayOpen(id)
{
	if(id==0)
	{
		$('#sunday').val(0);
		$('#sun0').addClass('hidden');
		$('#sun1').removeClass('hidden');
	}
	else
	{
		$('#sunday').val(1);
		$('#sun0').removeClass('hidden');
		$('#sun1').addClass('hidden');	
	}
}
</script>

						
					 <a href="javascript:void(0);" onclick="updateSundayOpen(0);" id="sun0"><div class="css-cedhmb">
                        <div tabindex="0" role="button" class="css-1w0xfwu">
                           <span class="chip chip_is-selected">
                              <span class="chip_content">
								<div class="css-utgzrm"></div>
								<span class="chip_text">Sunday</span>
							</span>
                           </span>
                        </div>
                     </div></a> 
					 
					 <a href="javascript:void(0);" onclick="updateSundayOpen(1);" class="hidden" id="sun1"><div class="css-cedhmb">
														 <div tabindex="0" role="button" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Sunday</span>
															   </span>
															</span>
														 </div>
													  </div>
													  </a>
													  <input type="hidden" id="sunday" name="sunday" value="1" />	
					 </div>
               </div>
								   <div class="dflex padt30">
												
													  
													   <div class="wi_50">
														 <input type="button" value="Previous" color="#444444" class="merlin-button css-1gwp7cd fleft  " aria-label="" onclick="backToMinimumNights();" />
														  
													   </div>
													   <div class="wi_50">
													   <input type="button" color="#444444" value="Next" class="merlin-button css-u7z53d fright" aria-label=""  onclick="generatePricingSubmit();" />
											  
													  </div>
										  </div>
								   
								   </div>
								   </form>
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