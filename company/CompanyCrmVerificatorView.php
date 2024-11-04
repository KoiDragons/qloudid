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
		
		<!-- HEADER -->
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/company/index.php/CompanySuppliers/resourceAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.qloudid.com/company/index.php/CompanySuppliers/resourceAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>

	 
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart20 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn nobold"  >Employees</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn nobold" >This is a list of employees added by admin for ID verification.</a></div>
					 
										<div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                            <a href="#" class="dinlblck mar5 padrl30     bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir">Employees</a>
											  
                                             
                                        </div>
										
										<div class="pad10 fsz16 xxs-talc talc lgtgrey2_bg">The employees from this list has been approved for ID verification.
										</div>
										 <?php 
													foreach($employeeVerifiedList as $category => $value) 
													{
														
														
													?> 
																	
																
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_50p marr15"> 
																	
																	<?php echo $value['img']; ?></div>
																	
																	<div class="fleft wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Employee</span>
																	
																	   <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 black_txt"><?php echo  substr(html_entity_decode($value['name']),0,18); ?></span>   
																	</div>
																	
																	
																		 	 	 
													<?php if($value['is_verificator']==0)
													{?>
												<a href="../validateVerificator/<?php echo $data['cid']; ?>/<?php echo $value['employee_id']; ?>">	<div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Hotel" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Validate</button>
																			</div>	</a>
													<?php } else if($value['is_verificator']==1) { ?>
													<a href="../removeVerificator/<?php echo $data['cid']; ?>/<?php echo $value['employee_id']; ?>"><div class="fright wi_25  padl30 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Hotel" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi">Remove</button>
																			</div>	</a>
													<?php } ?>
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															 
	 
																	
																 
																	<?php } ?>		

																	<div id="approvedLocation">
																	</div>

																


															
															<div class="clear"></div>
															 
															<div class="padtb20 talc <?php if($employeeVerifiedListCount['num']<=5) echo 'hidden'; ?>">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" onclick="add_more_rows_approved_location(this);" value="1">View more</a>

															</div>
											 
											 
	 
												 
									
										<script>
										function add_more_rows_approved_location(link) {
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															//send_data.message=id;
															$.ajax({
															type:"POST",
															url:"../moreEmployeeVerifiedList/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#approvedLocation"),
															html=html1;

															$tbody
															.append($(html))
															.find('input.init')
															.iCheck({
															checkboxClass: 'icheckbox_minimal-aero',
															radioClass: 'iradio_minimal-aero',
															increaseArea: '20%'
															});
															}
															});

															return false;
															}
										
									  
									</script>
	 
	 
												 
										 
											 
											 
	 
											  
									  
									
	<div class="clear"></div>



</div>
 
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