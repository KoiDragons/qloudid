<html style=""><head>
<?php
		 if($selectedDish ['dish_image']!=null) { $filename="../estorecss/".$selectedDish ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$selectedDish ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; ?>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qloud ID</title>
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
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
	<?php if($selectedDish['is_physical']==2) { ?>	 
	<div class="column_m   hei_45p xs-header xsip-header xsi-header bs_bb red_ff2828_bg hidden-xs">
				<div class="wi_100 hei_45p xs-pos_fix padt0 padrl10 red_ff2828_bg">
				
				<div class="  marr15 wi_100 padt5">
				
					<a href="../../dishEmployeeInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>"> <h3 class="marb0 pad0 fsz20 white_txt padt5 padb10 talc" style="font-family: Avenir;">Assign Employee </h3> </a>
					
				
				</div>
			 
			
				<div class="clear"></div>
			</div>
		</div>	
	<?php } ?>
	
	
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../<?php if($selectedDish['is_physical']==1) echo 'dishesInformation'; else if($selectedDish['is_physical']==2) echo 'servicesInformation'; ?>/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16">
					<li class="dblock hidden-xs hidden-sm fright pos_rel   first"><a href="../../servicesMarketplaceInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt   ffamily_avenir" data-en="Logga in" data-sw="Logga in" style="background-color: #000000;">Publish</a></li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first padr10"><a href="../../photoInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt   ffamily_avenir" data-en="Logga in" data-sw="Logga in" style="background-color: #000000;">Images</a></li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first padr10"><a href="../../<?php if($selectedDish['is_physical']==1) echo 'editDishInformation'; else if($selectedDish['is_physical']==2) echo 'editServiceInformation'; ?>/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt   ffamily_avenir" data-en="Logga in" data-sw="Logga in" style="background-color: #000000;">Edit</a></li>
	 
	 
						
					</ul>
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
									<a href="../../<?php if($selectedDish['is_physical']==1) echo 'dishesInformation'; else if($selectedDish['is_physical']==2) echo 'servicesInformation'; ?>/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					 
					 <div class="  fright marr0 padt2 ">
						<a href="../../photoInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" class="diblock padr10 brdrad3 fsz30 white_txt padt5" style="color:#d9e7f0;"><i class="fas fa-image" aria-hidden="true"></i></a>

					 <a href="../../<?php if($selectedDish['is_physical']==1) echo 'editDishInformation'; else if($selectedDish['is_physical']==2) echo 'editServiceInformation'; ?>/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" class="diblock padr10 brdrad3 fsz30 white_txt padt5" style="color:#d9e7f0;"><i class="fas fa-edit" aria-hidden="true"></i></a> </div>	
					
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
						<img src="<?php echo $selectedDish['selected_image']; ?>?w=1040&h=1045&func=cover"   class="maxwi_100 valm brdrad10" title="Free Support" alt="Free Support">
					</div>
<h3 class="mart40 marb10 pad0 black_txt  fsz50 xs-fsz40 hidden" style="
    font-family: Avenir;
">CBD Olja</h3>
					<h3 class="marb40 md-marb40 lg-marb40 pad0 black_txt  fsz25 xs-fsz20" style="
    font-family: Avenir;
"><?php echo html_entity_decode($selectedDish['product_information']); ?></h3></a>


				</div>
			</div>
			
			 
			<div class="wi_50 xxs-wi_100 maxwi_100  dflex alit_s mart15 xxs-mart35 padl20 xs-padrl15">
			<div class="xs-wi_100 flex_1 xs-talc tall padl30 xs-padl0 padt0 xs-padt0">
			  <div class="marb0 padtrl0">		 
							 
											 
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Product type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Physical product/Service</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>	 
										
										 
										 <div class="column_m container fsz14 dark_grey_txt mart0">
												<div class="">
										<div class="">
											<div class=" ">
												
												 <div class="css-1jzh2co  ">
												   
												   <div class="chip-container bookSharedType">
												   <?php if($selectedDish['is_physical']==1) { ?>
													  <a href="javascript:void(0);" ><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Physical</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 
													 <a href="javascript:void(0);"  ><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Service</span>
															   </span>
															</span>
														 </div>
													  </div></a>
												   <?php } else { ?>
													 
													 
													 <a href="javascript:void(0);"  ><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Physical</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													   <a href="javascript:void(0);" ><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Service</span>
															   </span>
															</span>
														 </div>
													  </div></a>
												   <?php } ?>
												   </div>
												</div>
												 
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
										</div>
										 
										<div class="<?php if($selectedDish['is_physical']==1) echo 'hidden'; ?>" id="timeInfo"> 	
											<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value=" Is Bookable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedDish['is_bookable']==1) echo 'checked'; ?>" disabled>
																<input type="checkbox"  class="default" data-true="" data-false="" disabled />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 
										
										
										
										<div class="<?php if($selectedDish['is_bookable']==0) echo 'hidden'; ?>" id="bookableSevice">
										<div class="column_m container fsz14 dark_grey_txt mart0">
												<div class="">
										<div class="">
											<div class=" ">
												
												 <div class="css-1jzh2co  ">
												   
												   <div class="chip-container bookSharedType">
												   <?php if($selectedDish['one_shared']==1) { ?>
													  <a href="javascript:void(0);" ><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">1-to-1</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 
													 <a href="javascript:void(0);"  ><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Shared</span>
															   </span>
															</span>
														 </div>
													  </div></a>
												   <?php } else { ?>
													 
													 
													 <a href="javascript:void(0);"  ><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">1-to-1</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													   <a href="javascript:void(0);" ><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Shared</span>
															   </span>
															</span>
														 </div>
													  </div></a>
												   <?php } ?>
												   </div>
												</div>
												<div class="clear"></div>
											 
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
										</div>
										 
										
										<div class="on_clmn mart20 <?php if($selectedDish['one_shared']==1) echo 'hidden'; ?>" id="sharedInfo">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Shared type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How the event will be shared among others?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="wi_50">
											<div class="pos_rel">
												 
												<select     class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" onclick="upadteNotAvailable();" disabled> 
											  
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['one_shared_type']==1) echo 'selected'; else echo 'hidden'; ?>>Open</option>
											 
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['one_shared_type']==2) echo 'selected';  else echo 'hidden'; ?>>Private</option> 
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['one_shared_type']==3) echo 'selected';  else echo 'hidden'; ?>>Both</option> 
											 
														 
											 	 
											</select>
											 	
											</div>
										 	</div>
											
											<div class="padtb20 red_txt fsz16 hidden error_msg_remove">You can't change shared type.Please add a new event. </div>
											<input type="hidden" name="one_shared_type" id="one_shared_type" value='<?php echo $selectedDish['one_shared_type']; ?>' />
										<div class="<?php if($selectedDish['one_shared_type']==2) echo 'hidden'; ?> " id="OpenInfo">
										
										<input type='hidden' id='recurring_event' name='recurring_event' value='<?php echo $selectedDish['recurring_event']; ?>' />
										<?php if($selectedDish['recurring_event']==0) { ?>
										<div class="on_clmn mart20 " id='notRecurringEvent'>
											<div class="thr_clmn  wi_50 padr10">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Event date</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Select date of event?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="date"   name="open_event_date" id="open_event_date"   class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo date('Y-m-d',$selectedDish['open_event_date']); ?>" readonly /> 
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Event start time</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">When event will be started?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<select name="event_start_time" id="event_start_time"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" disabled > 
												<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$selectedDish['open_event_time']) echo 'selected'; ?>><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											  
											 </div>
											 
												
											</div>
										 	</div>
											
										
										<?php } else { ?>
										 <div class="container column_m lgtgrey2_bg  mart20 padrl20 " id='isRecurringEvent'>
										 <?php foreach($selectedDishRecurringInfo  as $category => $value) { ?>
								 <div class="on_clmn  lgtgrey2_bg brdt">
								 
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="<?php echo $value['day_name']; ?>" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="<?php echo substr($value['day_name'],0,1); ?>" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($value['event_day']==1) echo 'checked'; else echo '';  ?> " onclick="updateWorkingOpen(<?php echo $value['day_id']; ?>,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="" id="day_<?php echo $value['day_id']; ?>">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="work_start_time_<?php echo $value['day_id']; ?>" id="work_start_time_<?php echo $value['day_id']; ?>"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;" disabled > 
												<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value['event_start_time']== $value1['id']) echo 'selected'; ?>><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											 
										</div>
										
									 

										</div>
										
								 	
										  
										 
										 <?php } ?>
									  	</div>
										<?php } ?>
											<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Price info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Per person cost of the event</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="open_price_per_person" id="open_price_per_person" min="10" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['open_price_per_person']; ?>" readonly /> 
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Person info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum person</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="open_total_person" id="open_total_person"  min="1" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['open_total_person']; ?>" readonly /> 
											  
											 </div>
											 
												
											</div>
										 	</div>
											
											
											<div class="on_clmn mart20">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Events</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum open events allowed per day</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												 
												<input type="number"   name="total_open_events" id="total_open_events" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['total_open_events']; ?>" readonly /> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											</div>
											
										
										 	</div>
										
										
											<div class="<?php if($selectedDish['one_shared_type']==1) echo 'hidden'; ?>" id="PrivateInfo">
										
											<div class="on_clmn mart20 ">
											
											<div class="thr_clmn  wi_50 padr10">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Price info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Minimum price for private event</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="private_price" id="private_price" value="<?php   echo $selectedDish['private_price']; ?>" min="10" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" readonly /> 
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Person info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum person </span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="private_max_person" id="private_max_person" min="1"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['private_max_person']; ?>" readonly /> 
											  
											 </div>
											 
												
											</div>
										 	</div>
											
											
											
									<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Event available at customer place" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedDish['event_at_customer_place']==1) echo 'checked'; ?>"  >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 
										
										<div class="on_clmn  mart20 brdb <?php if($selectedDish['event_at_customer_place']==0) echo 'hidden'; ?>" id="customerPlaceTour">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tour fee applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedDish['tour_fee_applicable']==1) echo 'checked'; ?>"  >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 
										
										<div class="on_clmn mart20 <?php if($selectedDish['tour_fee_applicable']==0) echo 'hidden'; ?>" id="tourFee">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Tour fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs">Minimum charge of travel?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												 
												<input type="number"   name="tour_fee" id="tour_fee" min="0" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $selectedDish['tour_fee']; ?>" readonly /> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn mart20">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Events</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum events per day?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number" value="<?php echo $selectedDish['total_private_events']; ?>"    name="total_private_events" id="total_private_events" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" readonly /> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="More events available on request" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedDish['more_event_on_request']==1) echo 'checked'; ?> " >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="more_event_on_request" name="more_event_on_request" value="<?php echo $selectedDish['more_event_on_request']; ?>" />
										
										<div class="<?php if($selectedDish['more_event_on_request']==0) echo 'hidden'; ?>" id="moreEvents">
										<div class="on_clmn mart20">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Person info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Minimum person required for request?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number" value="<?php echo $selectedDish['minimum_people_required']; ?>"   name="minimum_people_required" id="minimum_people_required" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" readonly /> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn  mart20 ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Request period</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Minimum time required for request?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="minimum_time_required" id="minimum_time_required" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg " disabled> 
											<option value="0" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==0) echo 'selected'; ?> >0</option>
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==1) echo 'selected'; ?>>1</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==2) echo 'selected'; ?>>2</option>
											<option value="3" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==3) echo 'selected'; ?>>3</option>
											<option value="4" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==4) echo 'selected'; ?>>4</option>
											<option value="5" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==5) echo 'selected'; ?> >5</option>
											<option value="6" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==6) echo 'selected'; ?>>6</option>
											<option value="7" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==7) echo 'selected'; ?>>7</option>
											<option value="8" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==8) echo 'selected'; ?>>8</option>
											<option value="9" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==9) echo 'selected'; ?>>9</option>
											<option value="10" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==10) echo 'selected'; ?>>10</option>
											<option value="11" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==11) echo 'selected'; ?>>11</option>		 
											</select>
												
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="minimum_time_period" id="minimum_time_period" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg " disabled> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												
											</div>
										 </div>
											 
											 
										</div>
										
										
										<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Extra fee applicable for event request" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedDish['more_event_extra_fee']==1) echo 'checked'; ?> " >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										 
										
										
										<div class="on_clmn mart20 <?php if($selectedDish['more_event_extra_fee']==0) echo 'hidden'; ?>" id="extraFee">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Extra fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Extra fee for on request event</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number" value="<?php echo $selectedDish['extra_fee']; ?>"   name="extra_fee" id="extra_fee" min="0" class="default_view  mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt wi_50" readonly /> 
											  
											 </div>
											 
												
											 
										 	</div>
					 
										</div>
											
											
											
											</div>
										
										
											<div class="on_clmn mart20 hidden">
											  <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Service category</span>
													 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												
												<select   name="bookable_service_category_id" id="bookable_service_category_id"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg " disabled> 
											 <?php  foreach($bookableServiceCategories as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($selectedDish['bookable_service_category_id']==$value['id']) echo 'selected'; ?>><?php echo $value['service_category_name']; ?></option>
											 
											 
											 
														<?php } ?>
											 	 
											</select>
											
											 
												
											</div>
										 
										 	</div>
											
											</div>
											<div class="on_clmn mart20  <?php if($selectedDish['is_physical']==1) echo 'hidden'; ?>">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Time</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Minimum time required for the service</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												
												<select   name="time_required" id="time_required"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" disabled> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==1) echo 'selected'; ?>>15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==2) echo 'selected'; ?>>30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==3) echo 'selected'; ?>>45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==4) echo 'selected'; ?>>60 minutes</option>
											 	 
											</select>
											
										 
												
											</div>
										 
										 	</div>
											
											
											<div class="on_clmn mart20 <?php if($selectedDish['is_physical']==1) echo 'hidden'; ?>">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Time</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Preparation time required for the service</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												
												<select   name="preparation_time" id="preparation_time"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" disabled> 
												<option value="0" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==0) echo 'selected'; ?>>0 minutes</option>
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==1) echo 'selected'; ?>>15 minutes</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==2) echo 'selected'; ?>>30 minutes</option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==3) echo 'selected'; ?>>45 minutes</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==4) echo 'selected'; ?>>60 minutes</option>
										 
											 	 
											</select>
											
											 
												
											</div>
										 
										 	</div>
											
											<div class="on_clmn mart20 <?php if($selectedDish['is_physical']==1) echo 'hidden'; ?>">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Time</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Post production time required for the service</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												
												<select   name="post_production_time" id="post_production_time"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" disabled> 
												<option value="0" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==0) echo 'selected'; ?>>0 minutes</option>
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==1) echo 'selected'; ?>>15 minutes</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==2) echo 'selected'; ?>>30 minutes</option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==3) echo 'selected'; ?>>45 minutes</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==4) echo 'selected'; ?>>60 minutes</option>
											 
											 	 
											</select>
											
											 
												
											</div>
										 
										 	</div>
											
											</div>
											<input type="hidden" name="food_type" id="food_type" value="<?php echo $selectedDish['dish_warnings']; ?>" />
											 <div class="on_clmn mart10 hidden">
											  <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"> Dish type</span>
													  
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												
												<select name="dish_type" id="dish_type"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg"  disabled > 
											 <option value="0">Select category</option> 
											 
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['dish_type']==2) echo 'selected'; ?>>Drink</option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['dish_type']==3) echo 'selected'; ?>>Spa</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['dish_type']==4) echo 'selected'; ?>>Fitness</option>			 
											</select>
											 
											</div>
										 
											 
										</div>
											 <div class="on_clmn mart20 ">
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Title</span>
													 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												
												<input type="text" name="dish_name" id="dish_name" placeholder="Title" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt " value="<?php echo $selectedDish['dish_name']; ?>" readonly /> 
												 
											</div>
										 
											 
										</div>
										
										
										 
										
										 
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10 <?php if($selectedDish['dish_type']>1) echo 'hidden'; ?>" id="warningsDetail">
										<?php  foreach($foodTypeInformation as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['food_type'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?> fsz18 white_txt curp ffamily_avenir" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
											
								 
									 
								 
								 
								 <div class="on_clmn mart20 <?php if($selectedDish['variation_type']==1) echo 'hidden'; if($selectedDish['one_shared']==2) echo 'hidden';  ?>">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Price</span>
													 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												
												
												<input type="number" name="dish_price" id="dish_price" placeholder="Price" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $selectedDish['dish_price']; ?>" <?php if($selectedDish['variation_type']==1) echo 'readonly'; ?> /> 
											 
											</div>
											 
										 
										</div>
										
										
											<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10   <?php if($selectedDish['one_shared']==2) { if($selectedDish['one_shared_type']==2) echo ''; else echo 'hidden'; } ?>" >
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" id="oneTime" value="One time" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($selectedDish['subscription_info']==1) echo 'green_bg'; else echo 'red_ff2828_bg'; ?> fsz18 white_txt curp ffamily_avenir " onclick="addTypeRec(1);" >
														</div>
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="Recurring" id="subs" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($selectedDish['subscription_info']==2) echo 'green_bg'; else echo 'red_ff2828_bg'; ?> fsz18 white_txt curp ffamily_avenir" onclick="addTypeRec(2);" >
														</div>
														</div>
										
											 <div class="on_clmn mart20  <?php if($selectedDish['subscription_info']==1) echo 'hidden'; ?>" id="recurr">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_type" id="recurring_type" onchange="changeCustom(this.value);">
											       <option value="1" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==1) echo 'selected'; ?>>Hourly</option>
												<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==2) echo 'selected'; ?>>Daily </option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==3) echo 'selected'; ?>>Weekly</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==4) echo 'selected'; ?>>Monthly</option>		
											<option value="5" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==5) echo 'selected'; ?>>Every 3 Month</option>	
											<option value="6" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==6) echo 'selected'; ?>>Every 6 Month</option>	
											<option value="7" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==7) echo 'selected'; ?>>Yearly</option>											
											<option value="8" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==8) echo 'selected'; ?>>Custom</option>					 
											</select>
											 	
											  <label for="recurring_type0" class="floating__label tall nobold padl10" data-content="Subscription type">
											<span class="hidden--visually">
											  Subscription type</span></label>
											</div>
											</div>
											<div id="customData" class="<?php if($selectedDish['recurring_type']==8) echo ''; else echo 'hidden'; ?>">
											 <div class="thr_clmn  wi_15 padl10">
											<input type="text"  value="Every" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " readonly /> 
											 
											</div>
											 <div class="thr_clmn  wi_10 padl10">
											<input type="number"  id="total_time" name="total_time" value="<?php echo $selectedDish['custom_time']; ?>" min=1 class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " /> 
											 
											</div>
											
											<div class="thr_clmn  wi_25 padl10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_typec" id="recurring_typec">
											       <option value="1" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==1) echo 'selected'; ?>>Hourly</option>
												<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==2) echo 'selected'; ?>>Daily </option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==3) echo 'selected'; ?>>Weekly</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==4) echo 'selected'; ?>>Monthly</option>		
											<option value="7" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==7) echo 'selected'; ?>>Yearly</option>											
											 			 
											</select>
											 	
											   
											</div>
											</div>
											</div>
										 </div>
										<input type="hidden" name="subscription_info" id="subscription_info" class="subscription_info" value="<?php echo $selectedDish['subscription_info']; ?>" />				
								 
								
								
							 		<div id="product_list" class="<?php if($selectedDish['variation_type']==0) echo 'hidden'; ?>">
									<?php echo $availableVariationInfo; ?>
									</div>
										 
										 
									  	<input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					 
							
						</div>
						</div>												
					</div>	
					</div>
	</div>
	
	</div>
		
		 		
		 
	 		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>		
			
			<div class="clear"></div>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex-theme-default.css">
		 <script src="https://cdn.scaleflex.it/plugins/js-cloudimage-responsive/4.6.5/js-cloudimage-responsive.min.js"></script>
 

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