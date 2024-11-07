<!doctype html>
<?php
	
	$path1 = $path."html/usercontent/images/";
	
?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		 </head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
		 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr0 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="fright   padtbz10  " >
						<ul class="mar0 pad0">
							<div class="  padtrl10">
								<a href="#" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir">+ Add<i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
								</a>
							</div>
							
							
							
						</ul>
					</div>   
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb lgtgrey2_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey2_bg ">
			<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									  <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                
			  
				<div class="top_menu talc    wi_60i " style="padding-top:10px;">
				<ul class="menulist sf-menu  fsz20 wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir"><?php if($businessImageDetail['free_text']=='' || $businessImageDetail['free_text']==null) echo substr($companyDetail['company_name'],0,12); else  echo substr($businessImageDetail['free_text'],0,12); ?></span></a>
					</li>
				 	 
       			 	</ul>
			</div> 
					
					 
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		
		<div class="column_m pos_rel">
			
		 <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 "  >
				<div class="wrap maxwi_100 padrl15 xxs-padrl30 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz100 xxs-fsz30 xxs-lgn_hight_45 bold padb10 xs-padb0 black_txt trn"  >Thank you</h1>
									</div>
									<div class="mart20 xs-mart0 xs-marb20 marb35  xxs-tall talc xs-padb15  "> <a href="#" class="black_txt fsz25 xxs-tall xxs-lgn_hight_20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >For your business and trust. We hope to see you again soon</a></div>
									
									
					 
					<div class="tab-header martb10 padb10 xs-talc  brdb_94cffd darkbluebrdcolor nobrdt nobrdl nobrdr talc hidden-xs">
                                             
                                            <a href="#" class="dinlblck mar5 padrl30     darkbluergb brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Cart</a>
                                              

                                        </div>
										
										<div class="on_clmn brdb marb20 visible-xs">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Your selected items" class="wi_100 rbrdr pad10 padb0 padl0 bold tall  minhei_55p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
										
										<?php $i=0;
												
												foreach($selectedProducts as $category => $value) 
												{
													
													
												?>  
												 
											<div class="column_m container  marb5 xxs-marb10  fsz14 dark_grey_txt">
												<div class="white_bg xxs-brdrad10 xs-lgtgrey2_bg brdb xs-nobrd bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo $value['dish_name'].$value['sub_variantions']; ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt"><?php echo $value['number_of_products']; ?> pieces, <?php echo $value['total_price']; ?> usd in total</span>  </div>
													 
												 <a href="../deleteSelectedItem/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>"> <div class="fright wi_20  padl20 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0 hidden">
																				<button type="button" name="Hotel" class="forword3 minhei_35p red_ff2828_bg ffamily_avenir white_txt pad10 ">Remove</button>
																			</div> 
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz25  padb0 padt0 marr15">
													  <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg xs-lgtgrey2_bg " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> <span class="fas fa-times red_ff2828_txt" aria-hidden="true"></span> </div>
														 
													</div></a>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											</a> 
												<?php } ?>	
												
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_70   ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Total price" class="wi_100 nobrd   pad10 padb0 padl0  tall bold  minhei_45p fsz20 black_txt ffamily_avenir" readonly="" />
										 
									</div>
									</div>
								<div class="thr_clmn  wi_30  "  >
											<div class="pos_rel">
											<input type="text" value="<?php echo $selectedProductsPrice['total_amount']; ?> USD" class="wi_100 nobrd  pad10 padb0 padl0  talr  minhei_45p fsz20 black_txt ffamily_avenir" readonly="" />
											
											  
										</div>
									</div>
									 
									</div>
									<div class="mart20 xs-mart0   xxs-tall talc visible-xs "> <a href="#" class="black_txt fsz14 xxs-tall xxs-lgn_hight_20 xxs-talc talc edit-text jain_drop_company trn" >This is a total price based on selected items, quantities, delivery fee and taxes.</a></div>
										 
									 			 					
									<div class="clear"></div>
		
									<div class="talc padtb20 ffamily_avenir  mart35"> <a href="https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/loginPurchase/<?php echo $data['cid']; ?>"  ><input type="button" value="Pay with Qloud ID" class="forword minhei_55p bluergb_bg fsz18 padrl80"  ></a> </div> 
								
								<div class="talc padtb20 ffamily_avenir  "> <a href="../guestCheckout/<?php echo $data['cid']; ?>" class="fsz18" >Add manually</a> </div> 
									
								 
												 
											</div>
											
				 
</div>
<div class="clear"></div>
</div>
</div>



<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>


 
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

</div>

 
<!-- Slide fade -->
<div id="slide_fade"></div>

<!-- Menu list fade -->
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
 </body>

</html>