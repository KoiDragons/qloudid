<html style=""><head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Bliss</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/trendwatch/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/trendwatch/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/trendwatch/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/trendwatch/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/trendwatch/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/trendwatch/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href=" https://store.storeimages.cdn-apple.com/4982/store.apple.com/shop/rs-ipad/2/dist/step1flagship.css" />
	
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		
		<link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css">
		 
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css">
	
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css">
		
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/trendwatch/constructor.css">
		 
	 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css">
		 
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		 
		 
		<script>
 $(document.body).on('click', '.ui-slider-range .slider-range .ui-slider-handle', function(){
			alert('jain');
			return false;
		});	
		
		
		
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
		 function getChecked(link,id,id1,id2)
		 {
			 $('#errorMsg').html('');
			 $('.variationInfo'+id).prop('checked', false);
			  $('.variationInfo'+id).removeClass('checked');
			  $('#variation'+id).val(id2);
			 $(link).addClass('checked');
			  $(link).prop('checked', true);
			  var newSizeSelected=$('#variation_name'+id).val()+': '+id1+' <span class="black_txt fsz16 fright hidden-xs nobold darkgrey_txt"> Change</span><span class="black_txt fsz16 fright visible-xs nobold darkgrey_txt padr20"> <li class="far fa-edit"></li></span>';
			  $('#sizeValue'+id).removeClass('hidden');
			  $('#sizeExpand'+id).addClass('hidden');
			  $('.show-collapsed'+id).html(newSizeSelected);
			 var send_data={};
			 send_data.variationCount=$('#total_variations').val();
			  if($('#total_variations').val()==1)
			  {
				send_data.variation= $('#variation1').val(); 
				$.ajax({
					type:"POST",
					url:"../../getPrice/<?php echo $data['pid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						 if(data1==-1)
						{
							$('#inStock').val(0);
							$('#errorMsg').html('this product combination is out of stock');
							return false;
						}
						else
						{
						$('#inStock').val(1);
						 $('#oil_price').val(data1);
						 var t_price=$('#oil_price').val()*$('#oil_numbers').val();
						$('#totalPrice').html(t_price);
						}
					}
				});	
			  }
			   else if($('#total_variations').val()==2)
			  {
				 send_data.variation= $('#variation1').val()+','+$('#variation2').val();
				   
				if($('#variation1').val()==0 || $('#variation2').val()==0)
				{
					return false;
				}
				else				
				{
					$.ajax({
					type:"POST",
					url:"../../getPrice/<?php echo $data['pid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==-1)
						{
							$('#inStock').val(0);
							$('#errorMsg').html('this product combination is out of stock');
							return false;
						}
						else
						{
							$('#inStock').val(1);
						 $('#oil_price').val(data1);
						 var t_price=$('#oil_price').val()*$('#oil_numbers').val();
						$('#totalPrice').html(t_price);
						}
					}
				});
				}
			  }
			 else if($('#total_variations').val()==3)
			  {
				 send_data.variation= $('#variation1').val()+','+$('#variation2').val()+','+$('#variation3').val();
					if($('#variation1').val()==0 || $('#variation2').val()==0 || $('#variation3').val()==0)
				{
					return false;
				}
				else				
				{
					$.ajax({
					type:"POST",
					url:"../../getPrice/<?php echo $data['pid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1==-1)
						{
							$('#inStock').val(0);
							$('#errorMsg').html('this product combination is out of stock');
							return false;
						}
						else
						{
							$('#inStock').val(1);
						 $('#oil_price').val(data1);
						 var t_price=$('#oil_price').val()*$('#oil_numbers').val();
						$('#totalPrice').html(t_price);
						}
					}
				});
				}
			  }
			   
			  
			  
		 }
		 
		 function showSize(id)
		 {
		$('#sizeValue'+id).addClass('hidden');
		$('#sizeExpand'+id).removeClass('hidden');	 
			 
		 }
		 
		 function showSlider()
		 {
			$('#totalValue').addClass('hidden');
		$('#selectSlider').removeClass('hidden');	 
		 }
			
		</script>
		 
		</head>
		<body class="white_bg ffamily_avenir" style="">
		<?php if($businessImageDetail['promotion_type']==1) { ?>
	<div class="column_m   hei_45p xs-header xsip-header xsi-header bs_bb red_ff2828_bg hidden-xs">
				<div class="wi_100 hei_45p xs-pos_fix padt0 padrl10 red_ff2828_bg">
				
				<div class="  marr15 wi_100 padt5">
				
					<a href="#"> <h3 class="marb0 pad0 fsz20 white_txt padt5 padb10 talc" style="font-family: Avenir;"><?php echo $businessImageDetail['promotional_txt']; ?> </h3> </a>
					
				
				</div>
			 
			
				<div class="clear"></div>
			</div>
		</div>	
	<?php } ?>
			<div class="column_m header xs-header xsip-header xsi-header bs_bb hidden-xs">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 white_bg xs-lgtgrey_bg">
				
				<div class="logo marr15 wi_140p xs-wi_130p ">
				
					<a href="../../itemInformation/<?php echo $data['cid']; ?>"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10 ffamily_avenir">Dstrict</h3> </a>
					
				
				</div>
			 <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first"><a href="https://www.safeqloud.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt   ffamily_avenir" data-en="Logga in" data-sw="Logga in" style="background-color: #000000;">Logga in</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel padr20"><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 lgn_hight_30 black_txt ffamily_avenir padt5">Vår metod</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Om CBD</a></li>
	 
						
					</ul>
				</div>
				
				 
			<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="diblock padl15 padr0 brdrad3 fsz30 black_txt"><i class="fas fa-bars" aria-hidden="true"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	  
	  <div class="column_m header xs-hei_55p  bs_bb black_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 black_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-bars white_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
				<div class="top_menu talc    wi_60i " style="padding-top:10px;">
				<ul class="menulist sf-menu  fsz20 wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="white_txt pred_txt_h ffamily_avenir"><?php if($businessImageDetail['free_text']=='' || $businessImageDetail['free_text']==null) echo substr($companyDetail['company_name'],0,12); else  echo substr($businessImageDetail['free_text'],0,12); ?></span></a>
					</li>
				 	 
       			 	</ul>
			</div> 
			<div class="hidden fright marr0 padt2 "> <a href="#" class="diblock padr10 brdrad3 fsz30 white_txt padt5"><i class="fas fa-search" aria-hidden="true"></i></a> </div>		
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	<div class="column_m pos_rel" onclick="checkFlag();">
			
		 

		<div class=" wi_100 maxwi_100 marb0 padrl15 mart20   padb80">
		
			
<div class="  maxwi_100 white_bg marrla">
		<div class="wrap maxwi_100 padrl10 padt40 xs-padt0 xs-padrl0" style="width: 1200px !important;">
		
		<div class="dflex fxwrap_w alit_s padt0 talc">
		
		<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-mart35 xxs-padrl0 padr20">
				<div class="wi_100  padrl15 md-padrl30 lg-padrl30 bg_f txt_708198 white_bg"  >
					
					<div class="maxwi_80">
						
					</div>
	<a href="#"><div class="maxwi_80">
						<img ci-src="../../../../<?php echo $productInfo['image_path']; ?>?w=1040&h=1045&func=cover"   class="maxwi_100 valm " title="Free Support" alt="Free Support">
					</div>
<h3 class="mart40 marb10 pad0 black_txt  fsz50 xs-fsz40 hidden" style="
    font-family: Avenir;
">CBD Olja</h3>
					<h3 class="marb40 md-marb40 lg-marb40 pad0 black_txt  fsz25 xs-fsz20 hidden" style="
    font-family: Avenir;
">A suite of self service solutions</h3></a>


				</div>
			</div>
			
			 
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-mart35 padl20 xs-padrl15">
			<div class="xs-wi_100 flex_1 xs-talc tall padl30 xs-padl0 padt0 xs-padt0">
					 									
									<div class="on_clmn   mart0 hidden  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="New" class="wi_100 rbrdr pad10 padb0 padl0  tall xs-talc  minhei_45p fsz20   red_txt ffamily_avenir " readonly="">
										 
									</div>
									 </div>
									 
									 <div class="on_clmn   mart0  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="<?php echo $productInfo['dish_name']; ?>" class="wi_100 rbrdr padl0  tall  minhei_45p fsz65 xs-fsz40   black_txt ffamily_avenir " readonly="">
										 
									</div>
									 </div>
									 
									  <div class="on_clmn   mart0  <?php if(strip_tags($productInfo['product_information'])=='' || strip_tags($productInfo['product_information'])==null || $productInfo['product_information']=='<!DOCTYPE html> <html> <head> </head> <body> </body> </html>') echo 'hidden-xs'; ?>">
								 
								 
											 
										<div class="pos_rel  ">
									
										<div class="wi_100 rbrdr pad0 nobrd tall    minhei_45p fsz16   black_txt ffamily_avenir "><?php echo html_entity_decode ($productInfo['product_information']); ?></div>
										 
									</div>
									 </div>
									<div class="clear"></div>
									
									
									
									<?php if($productInfo['variation_type']==1)  { $j=0; foreach($productVariations as $category => $value1) { ?>
									<div class="padt0 hidden" id="sizeValue<?php echo $value1['variation_count']; ?>" onclick="showSize(<?php echo $value1['variation_count']; ?>);">
									<fieldset class="lgtgrey2_bg mart10 black_brd5 brdrad5 xs-tall brd_width_2 padl30 xs-padl15 " >

         <materializer   class="as-dimension-summary ase-materializer ase-materializer-show padr30 xs-padr0"  >
                <div class="as-dimension-summary-text  " aria-hidden="true"><div class="show-expanded">11-inch display</div><div class="show-collapsed<?php echo $value1['variation_count']; ?> black_txt fsz18 nobold">11-inch iPad&nbsp;Pro</div></div>
        </materializer>

        

    </fieldset>
	</div>
									<div class="" id="sizeExpand<?php echo $value1['variation_count']; ?>">
									<div class="on_clmn   mart0 brdb">
								 <div class="pos_rel  ">
									
										<input type="text" value="<?php echo $value1['variation_name']; ?>" class="wi_100 rbrdr pad10 padb0 padl0  tall xs-talc  minhei_45p fsz20  black_txt ffamily_avenir xs-fsz18 bold" id="variation_name<?php echo $value1['variation_count']; ?>" readonly="">
										 
									</div>
									 </div>
									 
									 
									

<div class="wi_100 maxwi_500p ovfl_hid padt10 padb0">
										 
										<div class="dflex fxwrap_w alit_s marrl-15 padrl15">
										<?php $i=0; foreach($value1['variations'] as $category => $value2) {  ?>
										<div class="wi_50  dflex alit_s  marb15 <?php if($i%2==0) echo 'padr7_5'; else echo 'padl7_5'; ?>">
											<div class="wi_100 dflex fxdir_col alit_c justc_c pos_rel zi1 pad25 xxs-pad10 talc">
											 	<input type="checkbox" name="priority-access<?php echo $j; ?>" id="professional-priority-access<?php echo $j; ?>" class="price-addon price-value sr-only default hidden variationInfo<?php echo $j; ?>" data-regularity="monthly" value="350" data-label="Priority Access" data-note="(billed annually)" onclick="getChecked(this,<?php echo $value1['variation_count']; ?>,'<?php echo $value2['subvariation_name']; ?>',<?php echo $value2['id']; ?>);" >  
												<div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_ins0001_00a4bd_sibc brd_00a4bd brdrad5 bg_f bg_e6f5f8_ph bg_e6f5f8_sibc"></div>
												<label for="professional-priority-access<?php echo $j; ?>" class="wi_100 hei_100 dblock pos_abs zi10 top0 left0 curp"></label>
												
												<div class="wi_20p hei_20p dnone_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n hidden"></div>
												<div class="wi_20p hei_20p dnone dblock_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n fsz14 txt_00a4bd hidden">
													<span class="fa fa-check"></span>
												</div>
												<h4 class="padb10 bold fsz30 lgn_hight_30  xxs-lgn_hight_25 xs-fsz25  black_txt mart10"><?php echo $value2['subvariation_name']; ?></h4>
												<div class="mart10 fsz12 black_txt  hidden">Monthly sessions with an inbound consultant for guidance on your marketing and sales strategy, plus quarterly strategy reports</div>
												<div class="price-change mart0 ws_now hidden">
													<sup class="currency fsz13 black_txt hidden">kr</sup>
													<strong class="price marrl-2 fsz16 black_txt nobold" data-price="365 kr/styck">365 kr/styck</strong>
													<span class="fsz14 black_txt hidden">/month</span>
												</div>
											</div>
										</div>
										<?php $i++; $j++; } ?>
									</div>
									</div>
				</div>				 
									<?php } } ?>
									
						<fieldset class="marb20 mart10 lgtgrey2_bg black_brd5 brdrad5 xs-tall brd_width_2 padl30 xs-padl15 visible-xs"   >

         <materializer class="as-dimension-summary ase-materializer ase-materializer-show padr30 xs-padr0">
                <div class="as-dimension-summary-text  " aria-hidden="true"><div class=" black_txt fsz18 nobold">Price: <?php echo $productInfo['dish_price']; ?>  SEK</div> </div>
        </materializer>

        

    </fieldset>			
									
								<fieldset class="  marb20 mart10 lgtgrey2_bg hidden black_brd5 brdrad5 xs-tall brd_width_2 padl30 xs-padl15" id="totalValue" onclick="showSlider();">

         <materializer   class="as-dimension-summary ase-materializer ase-materializer-show padr30 xs-padr0"  >
                <div class="as-dimension-summary-text  " aria-hidden="true"><div class="show-expanded ">11-inch display</div><div class="show-collapsed1 slider-value black_txt fsz18 nobold">11-inch iPad&nbsp;Pro</div> </div>
        </materializer>

        

    </fieldset>	
	
	
									
									<div class="padtb15 padtb0 padrl15 lgtgrey2_bg " id="selectSlider">
									<div class="on_clmn   marb20 brdb">
								 <div class="pos_rel  ">
									
										<input type="text" value="How many" class="wi_100 rbrdr pad10 padb0 padl0  tall bold  minhei_45p fsz20  black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
							<div class="dflex fxwrap_w alit_fs justc_sb hidden">
								<h3 class="marb15 pad0 uppercase fsz14 txt_2d3e50 bold xs-tall">How many</h3>
								<a href="#" class="tooltip txt_00a4bd" title="A contact is a single person (other than a user) whose contact information is stored in your database." data-tooltip-settings="track:false,tooltipClass:maxwi_280p bxsh_0482_cbd6e2 brdrad3 bg_2d3e50 lgn_hight_s13 fsz13 txt_f">What is a contact?</a>
							</div>
							<div class="marb15 hidden">
								<div class="marb5">Choose how many contacts you’ll have in your database to see how it affects pricing.</div>
								<div class="marb5 fsz12 txt_7c98b6">1,000 contacts included.+<span class="price-change"><span class="currency">$</span><span class="price" data-price="50">50</span></span>/month per 1,000 additional contacts.</div>
							</div>
							<div class="padb20  ">
								<input type="text" name="contacts" id="professional-contacts" class="price-addon price-value price-variable-value default wi_100 hei_auto marb15 pad0 nobrd bg_trans bold fsz20 xs-fsz16 txt_2d3e50" value="1" data-min="1" data-base="1" data-each="50" disabled="disabled" data-regularity="monthly" data-label="{init-value} Contacts" data-note="(billed annually)">
								<div class="slider-range hei_8p nobrdi brdrad2 bg_cbd6e2 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-range="min" data-min="1" data-fixed-min="1" data-max="10" data-step="1" data-capture="#professional-contacts" data-capture-trigger="change" data-range-classes="bg_ff7a59" data-handle-classes="wi_24pi hei_24pi top-9pi bxsh_0111_cbd6e2 nobrdi brdrad50 bg_f_i curpi"  onchange="getValue(this);"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min bg_ff7a59" style="width: 0%;" ></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default wi_24pi hei_24pi top-9pi bxsh_0111_cbd6e2 nobrdi brdrad50 bg_f_i curpi" style="left: 0%;"></span></div>
								<div class="dflex alit_c justc_sb mart15 bold fsz13 txt_7c98b6">
									<span>1</span>
									<span>10</span>
								</div>
							</div>
						</div>
						
						 
						<div class="padb20 red_txt fsz18" id="errorMsg"></div>
						<div class="xs-padrl15 padrl0">
					<div class="xs-padrl0 as-purchaseinfo-details as-purchaseinfo-price-section bg_ececec as-l-container-full-small as-price-visible  xs-white_bg">
    

        <div class="as-price as-purchaseinfo-price as-purchaseinfo-price-enabled xs-white_bg">
                

                    
                    <materializer data-shown="{summaryBuilder.summary.price}" class="ase-materializer as-price-animation ase-materializer-show   xs-tall">
                            <span class="as-price-acinstallments   xs-tall">
                                





				 



		            <span>Price is <span id="totalPrice"><?php echo $productInfo['dish_price']; ?></span> kr</span>




                            </span>

                            

                            <div class="as-buyflow-messaging-sectionlink">
                                
            
<buyflow-messages>
    <action ($inserted)="bootstrap('BUYFLOW_MESSAGES_BOOTSTRAP')"></action>
        
            <div id="as-buyflow-messagelinkcontainer" class="as-buyflow-messagelinkcontainer">
                
                    <span>
                        <button data-buyflow-messages-overlay="button" class="as-buttonlink  ">This price is based upon above item, quantity and tax. Total price for all items can be viewed under checkout.</button>
                    </span>
            </div>
    
</buyflow-messages>

        
                            </div>

         
        



                    </materializer>
            
        </div>

        


                
        </div>
</div>
<div class="xs-padrl15">
<div class="as-bfaccessory-container bg_ececec hei_90p xs-pad0  xs-white_bg">
<accessory-slot>
    <action ($inserted)="bootstrap('applecareplus', 'asBuyFlow.applecareplus')"></action>
    
        

        <div role="region" aria-labelledby="applecareplus" class="rs-modularaccessory  enabled padb0 ">
                   
            
<div class="as-purchaseinfo">
            <div class="as-purchaseinfo-details bg_ececec as-purchaseinfo-background padb0 xs-pad0 xs-white_bg">
                <div class="as-purchaseinfo-actioninfo">
        
            <div class="grouped-button-icon">
                   
                <div class="grouped-button-left">
                    <div class="as-purchaseinfo-section">
                            
                                <div class="as-buynowbutton ">
                                    



<form method="POST" action="../../addToCart/<?php echo $data['cid']; ?>/<?php echo $data['pid']; ?>"  name="save_indexing" id="save_indexing" >

    

        <div class="as-purchaseinfo-button">

<span class="add-to-cart ">



<button type="button" class="button button-block xxs-padtb18 xxs-fsz22b" name="add-to-cart" value="add-to-cart" title="Add to bag" data-autom="add-to-cart" aria-describedby="purchaseinfo-retailavailability purchaseinfo-dudeinfo" tabindex="0" aria-hidden="false" onclick="checkProductInfo();">
        <span class="label">Add to Bag</span>
</button>
</span>         </div>
		<input type="hidden" id="inStock" name="inStock" value="1" />
        <input name="product" type="hidden" disabled="disabled" value="" id="productPartNumber">
		<input type="hidden" id="variation1" name="variation1" value="0" />
		<input type="hidden" id="variation2" name="variation2" value="0" />
		<input type="hidden" id="variation3" name="variation3" value="0" />

		<input type="hidden" id="total_variations" name="total_variations" value="<?php if($productInfo['variation_type']==1) echo $value1['variation_count'];else echo 0; ?>" />
		<input type="hidden" id="oil_price" name="oil_price" value="<?php echo $productInfo['dish_price']; ?>" />
        <input type="hidden" id="oil_numbers" name="oil_numbers" value="1" />
        <input type="hidden" name="product" value="MXF22LL/A">
        <input type="hidden" name="purchaseOption" value="fullPrice">
        <input type="hidden" name="step" value="select">
        <input type="hidden" name="bfil" value="2">
</form>
                                </div>
                        
    
                                
                                
                            

                    </div>
                </div>
            </div>

    


                </div>
                
                    <materializer data-shown="{summaryBuilder.enabled}" class="as-purchaseinfo-availabilityinfo row ase-materializer ase-materializer-show hidden">
                        


	


		
			<div class="large-6 small-6 column as-purchaseinfo-buacinfo" style="display: block;">
 
  <div class="as-purchaseinfo-retailavailability" id="check-availability-search-section" style="display: block;">

	<div class="as-retailavailabilitytrigger-info" data-part="MXF22LL/A">
    <div data-showstoresearchlink="true" data-title="11-inch iPad&nbsp;Pro Wi‑Fi + Cellular 1TB - Silver" data-part="MXF22LL/A" data-eligibility="true" class="as-retailavailabilitytrigger-info">
        <div class="as-retailavailabilitytrigger-infoblock as-purchaseinfo-buactriggerblock as-icondetails as-icondetails-topicon rs-retailavailability-noquote">
            <span class="icon icon-pickup as-purchaseinfo-availabilityicons as-icondetails-icon as-util-equalheight-top" aria-hidden="true"></span>
            <div class="as-util-equalheight-top" data-autom="pickUpDetails">
                <span class="retail-availability-search-availability-label strong">
                    Pickup:
                </span>
                
                    
                            <button class="as-buttonlink rs-productlocator-trigger" type="button" data-ase-overlay="product-locator-overlay" data-ase-click="show" data-pl-partnumber="MXF22LL/A" data-pl-storenumber="" data-autom="productLocatorTriggerLink">
                                Check availability 
                            </button>
                                            
                            </div>
        </div>
    </div>
</div>

  </div>
  
</div>
		
		
			<div class="large-6 small-6 column rs-purchaseinfo-dudeinfo as-icondetails as-icondetails-topicon">
    
    <span class="icon icon-shipping as-purchaseinfo-availabilityicons as-icondetails-icon"></span>
    
    <div class="as-purchaseinfo-deliverydates" data-deliverypartnumber="MXF22LL/A">
<div data-autom="dudeInfo">
        <span class="as-purchaseinfo-dudeinfo-label">Ships:</span>
    <ul class="as-purchaseinfo-dudeinfo">
            <li class="as-purchaseinfo-dudeinfo-deliverymsg">
                <span>3–4 weeks</span>
            </li>
        
            <li class="as-purchaseinfo-dudeinfo-deliverypromo"> <span> Free Shipping </span> </li>
    </ul>
        <button data-autom="deliveryDateChecker" class="as-delivery-overlay-trigger as-purchaseinfo-dudetrigger as-buttonlink" data-ase-overlay="dude-overlay" data-ase-click="show">
                    Get delivery dates
        </button>
    </div>
</div>

</div>
		



                    </materializer>
                
            </div>

            
           
        </div>


        </div>

    
</accessory-slot>
</div>		
													</div> 
	</div>												
													</div>		</div>
	</div>
	
	</div>
		
		 		
		 
	 		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>		
			
			<div class="clear"></div>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex-theme-default.css">
		 <script src="https://cdn.scaleflex.it/plugins/js-cloudimage-responsive/4.6.5/js-cloudimage-responsive.min.js"></script>
<script>
	 
    const ciResponsive = new window.CIResponsive({
      token: 'ajfkzjyzgp'
   
    });
 
</script>

<script>                        
function checkProductInfo()
		{
			$('#errorMsg').html('');
			if($('#total_variations').val()==0)
			{
				document.getElementById("save_indexing").submit();
			}
			if($('#total_variations').val()==1)
			{
				if($('#variation1').val()==0)
				{
				$('#errorMsg').html('please select variation first');
				return false;
				}
			}
			else if($('#total_variations').val()==2)
			{
				if($('#variation1').val()==0 || $('#variation2').val()==0)
				{
				$('#errorMsg').html('please select variation first');
				return false;
				}
			}
			else if($('#total_variations').val()==3)
			{
				if($('#variation1').val()==0 || $('#variation2').val()==0 || $('#variation3').val()==0)
				{
				$('#errorMsg').html('please select variation first');
				return false;
				}
			}
			
			if($('#inStock').val()==0)
			{
			$('#errorMsg').html('This product is out of stock.Please select other variant');
				return false;	
			}
			
			document.getElementById("save_indexing").submit();
		}
		</script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
		 <script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/hubstaff-calculations.js"></script>
			
			
			
		
											</body></html>