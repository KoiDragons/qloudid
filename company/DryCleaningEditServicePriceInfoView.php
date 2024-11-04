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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script>
	 
	function updatePrice(id)
	{
		price=parseInt($("#price_detail").val())+id;
		if(price<=0)
		{
		$("#price_detail").val(10);
		$("#priceInfo").html('10 usd');
		}
		else
		{
		$("#price_detail").val(price);
		$("#priceInfo").html(price+' usd');
		}
	}
	 
		function submitform()
		{
			
			$("#errorMsg1").html('');
			if($("#service_id").val()==0)
			{
				
				$("#errorMsg1").html('Please service name');
				return false;
			}
			
			document.getElementById('save_indexing').submit();
			}
		
		  
				
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../serviceInformation/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../serviceInformation/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Laundromat</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20 ffamily_avenir" >Update your service price</a></div>
					 
					 
							
							<form action="../../../updateDryCleaningPriceInfo/<?php echo $data['cid']; ?>/<?php echo $data['wid']; ?>/<?php echo $data['sid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		
 				
							 <div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  brdb_black padb10">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Selected service type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Your selected service type</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
												
											 <input type="hidden" id="category_id" name="category_id" value="<?php echo $dryCleaningServiceDetail['category_id']; ?>" />
										 <div id="bedroom_count" class="css-151xzu3">
										<a href="javascript:void(0);"><button disabled="" aria-label="" class="merlin-button merlin-button--disabled css-ig30wo" data-testid="icon-button--minus" color="#444444">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										<span class="value" id="bedRoomCount"><?php if($dryCleaningServiceDetail['category_id']==1) echo 'drycleaning'; else if($dryCleaningServiceDetail['category_id']==2) echo 'washing'; else if($dryCleaningServiceDetail['category_id']==3) echo 'ironing'; ?></span>
										 
									<a href="javascript:void(0);">	
									<button color="#444444" data-testid="icon-button--plus" disabled="" class="merlin-button merlin-button--disabled css-mgojn5" aria-label="">
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
									 	 
											 
									</div>
										 <input type="hidden" id="service_id" name="service_id" value="<?php echo $dryCleaningServiceDetail['service_id']; ?>" />
							 <div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  brdb_black padb10">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Selected service product</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Your selected service product</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
												
											 <div class="css-1jzh2co marb15"><div class="chip-container">
											 <a href="javascript:void(0);" ><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text"><?php echo $dryCleaningServiceDetail['article_name']; ?></span>
															   </span>
															</span>
														 </div>
													  </div></a>
									 	 </div> </div>
											 
									</div>
							 <input type="hidden" id="price_detail" name="price_detail" value="<?php echo $dryCleaningServiceDetail['price']; ?>" />
									<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  padb10">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Update pricing</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Update your price for this service below</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div id="bedroom_count" class="css-151xzu3">
										<a href="javascript:void(0);" onclick="updatePrice(-10);"><button color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</button></a>
										<span class="value" id="priceInfo"><?php echo $dryCleaningServiceDetail['price']; ?> usd</span>
									<a href="javascript:void(0);" onclick="updatePrice(10);">	
									<button color="#444444" data-testid="icon-button--plus" disabled="" class="merlin-button merlin-button--disabled css-mgojn5" aria-label="">
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
									 	 
											 
									</div>
										<input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	 						