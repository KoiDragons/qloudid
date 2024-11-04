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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		<script>
			var available_yes=0;
			var currentLang = 'sv';
			function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}

function confirmSubmit(id)
{
	
	$("#location_id").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_confirm").addClass('active')
	$("#gratis_popup_confirm").attr('style','display:block');
	
}
function confirmEmployee(id)
{
	
	$("#location_id_employee").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_employee").addClass('active')
	$("#gratis_popup_employee").attr('style','display:block');
	
}
function confirmOffer(id)
{
	
	$("#location_id_offer").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_offer").addClass('active')
	$("#gratis_popup_offer").attr('style','display:block');
	
}
function confirmYes(id)
{
	
	$("#location_id_yes").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_yes").addClass('active')
	$("#gratis_popup_yes").attr('style','display:block');
	
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
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		 <div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738"  >
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      <div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear" id=""></div>
		
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart20 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Pricingplan</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Select the plan you want to update </a></div>
					 
					<div class="tab-header martb10 padb10 xs-talc brd_fcaf17 nobrdt nobrdl nobrdr talc">
                                           
                                            <a href="#" class="dinlblck mar5 padrl30  brd_b7b7b7 brd_fcaf17_a t_fcaf17_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active" >Plans</a>
                                              
                                             

                                        </div>
										<?php if($planInfo['plan_type']==2) { ?>
										 <a href="../../updateToFreePlan/<?php echo $data['cid']; ?>/<?php echo $data['app_id']; ?>">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a   " style="background-color:#f5f5f5 !important; background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">N</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14  bold  black_txt">Free</span>
																	
																	  <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">Normal account without fee</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7" aria-hidden="true"></span> 
													</div>	
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															</a>
															
										<?php }
												
												foreach($appPriceDetails as $category => $value) 
												{
												if($planInfo['plan_type']==2 && $subscriptionInfo['billing_period']==$value['billing_period'])	
												{
													continue;
												}
													
												?> 
										<a href="../../<?php if($companyDetail['stripe_customer_id']==null || $companyDetail['stripe_customer_id']=='') echo 'selectedPlanInfo'; else echo 'updatePlanInfo'; ?>/<?php echo $data['cid']; ?>/<?php echo $data['app_id']; ?>/<?php echo $value['enc']; ?>">
										<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-color:#f5f5f5 !important;  background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">A</div>
																	</div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14  bold  black_txt">Premium <?php if($value['billing_type']==1) { echo 'One time'; } else { echo 'Recuring: '; if($value['billing_period']==1) echo 'Daily'; else if($value['billing_period']==2) echo 'Weekly'; else if($value['billing_period']==3) echo 'Monthly';  else if($value['billing_period']==4) echo 'Every 3 month'; else if($value['billing_period']==5) echo 'Every 6 month'; else if($value['billing_period']==6) echo 'Yearly'; } ?> : <?php echo $value['app_price'].' '.$value['currency']; ?>  </span>
																	
																	  <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">Account with customer support</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7" aria-hidden="true"></span> 
													</div>	
																	 															
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															</a>
														 
												<?php } ?>
</div>
<div class="clear"></div>
</div>
</div>



<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>



<!-- Popup fade -->
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