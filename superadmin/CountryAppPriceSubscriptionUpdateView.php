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
		 
		 
	<script>
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
			if($('#price').val()=="" || $('#price').val()==null || $('#price').val()<5)
			{
			$('#errorMsg1').html('Please enter correct price !!!');	
			return false;
			}
			if(isNaN($('#price').val()))
			{
			$('#errorMsg1').html('Please enter nemeric value for price !!!');	
			return false;	
				
			}
			 
							document.getElementById('save_indexing').submit();
						 
				
				
			}
			
			
		function checkMeter(id)
		{
			
			if(id==1)
			{
				$("#isMeter").attr('style','display:none');
				 
			}
			
			else 
			{
				$("#isMeter").attr('style','display:block');
				 
			}
			
		}
		
		function checkRecur(id)
		{
			
			if(id==1)
			{
				$("#isRecuring").attr('style','display:none');
				 
			}
			
			else 
			{
				$("#isRecuring").attr('style','display:block');
				 
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
				
				var currency_data='<?php echo $planInfo['currency']; ?>';
				function selectbox(startyear, syear)
			{
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
				function changeCurrency()
				{
					
					selectbox(document.getElementById("currency_code"), currency_data);
				}
			</script>
			
			
		
	</head>
	<body class="white_bg" onload='changeCurrency();'>
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738">
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../../CountryList/productSubscriptionDetailInfo/<?php echo $data['cid']; ?>/<?php echo $data['appid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		 
		 
	<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../../../CountryList/productSubscriptionDetailInfo/<?php echo $data['cid']; ?>/<?php echo $data['appid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Pricing</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please provide subscription detail here.</a></div>
			 
					 <div class="clear"></div>
							
							<form action="../../../updatePrice/<?php echo $data['cid']; ?>/<?php echo $data['appid']; ?>/<?php echo $data['planid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											
											 
											
									 <div class="on_clmn mart10 ">
									 <div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="number" name="price" id="price" placeholder="Price" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $planInfo['app_price']; ?>"/>
												
											</div>
											</div>
											<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
											<select    class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb lgt_grey_txt fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg   tall padl0 ffamily_avenir" style="text-align-last:center;" id="currency_code" name="currency_code"> 
											 
												 
														<option value="USD" selected="selected">United States Dollars</option>
														<option value="EUR">Euro</option>
														<option value="GBP">United Kingdom Pounds</option>
														<option value="DZD">Algeria Dinars</option>
														<option value="ARP">Argentina Pesos</option>
														<option value="AUD">Australia Dollars</option>
														<option value="ATS">Austria Schillings</option>
														<option value="BSD">Bahamas Dollars</option>
														<option value="BBD">Barbados Dollars</option>
														<option value="BEF">Belgium Francs</option>
														<option value="BMD">Bermuda Dollars</option>
														<option value="BRR">Brazil Real</option>
														<option value="BGL">Bulgaria Lev</option>
														<option value="CAD">Canada Dollars</option>
														<option value="CLP">Chile Pesos</option>
														<option value="CNY">China Yuan Renmimbi</option>
														<option value="CYP">Cyprus Pounds</option>
														<option value="CSK">Czech Republic Koruna</option>
														<option value="DKK">Denmark Kroner</option>
														<option value="NLG">Dutch Guilders</option>
														<option value="XCD">Eastern Caribbean Dollars</option>
														<option value="EGP">Egypt Pounds</option>
														<option value="FJD">Fiji Dollars</option>
														<option value="FIM">Finland Markka</option>
														<option value="FRF">France Francs</option>
														<option value="DEM">Germany Deutsche Marks</option>
														<option value="XAU">Gold Ounces</option>
														<option value="GRD">Greece Drachmas</option>
														<option value="HKD">Hong Kong Dollars</option>
														<option value="HUF">Hungary Forint</option>
														<option value="ISK">Iceland Krona</option>
														<option value="INR">India Rupees</option>
														<option value="IDR">Indonesia Rupiah</option>
														<option value="IEP">Ireland Punt</option>
														<option value="ILS">Israel New Shekels</option>
														<option value="ITL">Italy Lira</option>
														<option value="JMD">Jamaica Dollars</option>
														<option value="JPY">Japan Yen</option>
														<option value="JOD">Jordan Dinar</option>
														<option value="KRW">Korea (South) Won</option>
														<option value="LBP">Lebanon Pounds</option>
														<option value="LUF">Luxembourg Francs</option>
														<option value="MYR">Malaysia Ringgit</option>
														<option value="MXP">Mexico Pesos</option>
														<option value="NLG">Netherlands Guilders</option>
														<option value="NZD">New Zealand Dollars</option>
														<option value="NOK">Norway Kroner</option>
														<option value="PKR">Pakistan Rupees</option>
														<option value="XPD">Palladium Ounces</option>
														<option value="PHP">Philippines Pesos</option>
														<option value="XPT">Platinum Ounces</option>
														<option value="PLZ">Poland Zloty</option>
														<option value="PTE">Portugal Escudo</option>
														<option value="ROL">Romania Leu</option>
														<option value="RUR">Russia Rubles</option>
														<option value="SAR">Saudi Arabia Riyal</option>
														<option value="XAG">Silver Ounces</option>
														<option value="SGD">Singapore Dollars</option>
														<option value="SKK" >Slovakia Koruna</option>
														<option value="ZAR">South Africa Rand</option>
														<option value="KRW">South Korea Won</option>
														<option value="ESP">Spain Pesetas</option>
														<option value="XDR">Special Drawing Right (IMF)</option>
														<option value="SDD">Sudan Dinar</option>
														<option value="SEK">Sweden Krona</option>
														<option value="CHF">Switzerland Francs</option>
														<option value="TWD">Taiwan Dollars</option>
														<option value="THB">Thailand Baht</option>
														<option value="TTD">Trinidad and Tobago Dollars</option>
														<option value="TRL">Turkey Lira</option>
														<option value="VEB">Venezuela Bolivar</option>
														<option value="ZMK">Zambia Kwacha</option>
														<option value="EUR">Euro</option>
														<option value="XCD">Eastern Caribbean Dollars</option>
														<option value="XDR">Special Drawing Right (IMF)</option>
														<option value="XAG">Silver Ounces</option>
														<option value="XAU">Gold Ounces</option>
														<option value="XPD">Palladium Ounces</option>
														<option value="XPT">Platinum Ounces</option>
														 
											</select>
											</div>
											</div>
											
										</div>
									 <div class="on_clmn mart20 ">
											
											<div class="pos_rel">
												
											<select    class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb lgt_grey_txt fsz18  minhei_65p xxs-minhei_60p trans_bg   tall padl0 ffamily_avenir dropdown-bg " style="text-align-last:center;" id="billing_type" name="billing_type"  onchange="checkRecur(this.value);"> 
											 
												 
														<option value="1" class="lgtgrey2_bg" <?php if($planInfo['billing_type']==1) echo 'selected'; ?>>One time</option>
														<option value="2" class="lgtgrey2_bg" <?php if($planInfo['billing_type']==2) echo 'selected'; ?>>Recuring</option>
											</select> 
												
											</div>
										</div>
										
									<div class="on_clmn mart20" id="isRecuring" style="display:<?php if($planInfo['billing_type']==1) echo 'none'; else echo 'block'; ?>;">
												 
										 
								<div class="pos_rel">											
											<select name="billing_period" id="billing_period" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb lgt_grey_txt fsz18  minhei_65p xxs-minhei_60p trans_bg   tall padl0 ffamily_avenir dropdown-bg " style="text-align-last:center;"> 
											<option value="1" class="lgtgrey2_bg" <?php if($planInfo['billing_period']==1) echo 'selected'; ?>>Daily </option>
											<option value="2" class="lgtgrey2_bg" <?php if($planInfo['billing_period']==2) echo 'selected'; ?>>Weekly</option>
											<option value="3" class="lgtgrey2_bg" <?php if($planInfo['billing_period']==3) echo 'selected'; ?>>Monthly</option>		
											<option value="4" class="lgtgrey2_bg" <?php if($planInfo['billing_period']==4) echo 'selected'; ?>>Every 3 Month</option>	
											<option value="5" class="lgtgrey2_bg" <?php if($planInfo['billing_period']==5) echo 'selected'; ?>>Every 6 Month</option>	
											<option value="6" class="lgtgrey2_bg" <?php if($planInfo['billing_period']==6) echo 'selected'; ?>>Yearly</option>	
											</select>
											</div>
											 
											</div>
										
											 <div class="on_clmn mart20 ">
											
											<div class="pos_rel">
												
											<select    class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb lgt_grey_txt fsz18  minhei_65p xxs-minhei_60p trans_bg   tall padl0 ffamily_avenir dropdown-bg " style="text-align-last:center;" id="metered" name="metered"  onchange="checkMeter(this.value);"> 
											 
												 
														<option value="1" class="lgtgrey2_bg"  <?php if($planInfo['metered']==1) echo 'selected'; ?>>Not metered usage</option>
														<option value="2" class="lgtgrey2_bg"  <?php if($planInfo['metered']==2) echo 'selected'; ?>>Metered Usage</option>
											</select> 
												
											</div>
										</div>
										
										<div class="on_clmn mart20" id="isMeter" style="display:<?php if($planInfo['metered']==1) echo 'none'; else echo 'block'; ?>;">
												 
										 
								<div class="pos_rel">											
											<select name="meter_range" id="meter_range" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb lgt_grey_txt fsz18  minhei_65p xxs-minhei_60p trans_bg   tall padl0 ffamily_avenir dropdown-bg " style="text-align-last:center;"> 
											<option value="1" class="lgtgrey2_bg" <?php if($planInfo['meter_range']==1) echo 'selected'; ?>>Sum of usage values during the period </option>
											<option value="2" class="lgtgrey2_bg" <?php if($planInfo['meter_range']==2) echo 'selected'; ?>>Most recent usage value during the period</option>
											<option value="3" class="lgtgrey2_bg" <?php if($planInfo['meter_range']==3) echo 'selected'; ?>>Most recent usage value</option>		
											<option value="4" class="lgtgrey2_bg" <?php if($planInfo['meter_range']==4) echo 'selected'; ?>>Maximum usage value during the period</option>	
											 
											</select>
											</div>
											 
											</div>
										
										
										
									  <div class="on_clmn mart20 ">
											 
												 
											<div class="pos_rel">
												
												<input type="text" name="p_description" id="p_description" value="<?php echo $planInfo['price_description']; ?>" placeholder="Product description" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 lgt_grey_txt ffamily_avenir"    /> 
												
											</div>
											 
										</div>
										
										 
						
										  
											 
										
											
											 	 
											 
											 
									 
								 </div>
								
								
								<input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><input type="button" value="Update" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
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