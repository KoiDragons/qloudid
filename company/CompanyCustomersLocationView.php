
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		
	 
	 
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	
	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    
function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
	
			
			function changeRequest(id)
			{
				if(id==1)
				{
					if($("#emp").val()==0)
					{
						$("#emp").val(1);
					}
					else
					{
					$("#emp").val(0);
					}
				}
				else if(id==2)
				{
					if($("#sup").val()==0)
					{
						$("#sup").val(1);
					}
					else
					{
					$("#sup").val(0);
					}
				}
				else if(id==3)
				{
					if($("#tnt").val()==0)
					{
						$("#tnt").val(1);
					}
					else
					{
					$("#tnt").val(0);
					}
				}
				else if(id==4)
				{
					if($("#skl").val()==0)
					{
						$("#skl").val(1);
					}
					else
					{
					$("#skl").val(0);
					}
				}
			}
			function  updateLocation(id)
			{
				$('.brdclr_seggreen_47E2A1').removeClass('brdclr_seggreen_47E2A1 brd_width_2');
				$('.seggreen_47E2A1_txt').addClass('lgtgrey_txt');
				$('.seggreen_47E2A1_txt').removeClass('seggreen_47E2A1_txt');
				$('.Qselect'+id).addClass('brdclr_seggreen_47E2A1 brd_width_2');
				$('.Qtext'+id).removeClass('lgtgrey_txt');
				$('.Qtext'+id).addClass('seggreen_47E2A1_txt');
				$('#property_id').val(id);
			}
			
			function submitform()
			{
			$('#errorMsg').html('');
			if($('#property_id').val()==0)
			{
				 
				$("#errorMsg").html("please select office");
				return false;
		
			}
			document.getElementById("save_indexing").submit();
			
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
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
</script>	
	
</head>

<body class="ffamily_avenir">
	
		 
<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
				 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		 
	
	<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart20 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Location</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" > Select <?php echo $employeeRequestInfo['name']; ?> workplace</a></div>
							
										<div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                            <a href="#" class="dinlblck mar5 padrl30     bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir">List</a>
                                             
                                        </div> 
					
						<form action="../../updateEmployeeLocation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							
							 <div class="column_m container  marb25   fsz14 dark_grey_txt">	
							 <?php 
										foreach($locationDetail as $category => $value) 
													{
													?> 
											 
											
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_50p marr15"> 
																	
																	<div class="wi_50p xs-wi_50p hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36   brdrad1000 lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> <span class="far fa-building  white_txt white_txt   pad0 fsz30" aria-hidden="true"></span> </div></div>
																	
																	<div class="fleft wi_50     xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Location</span>
																	
																	<span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr($value['visiting_address'],0,25); ?></span>   
																	</div>
																	
																	
																		 
																			<div class="xxs-fleft fright wi_20 xs-wi_20 padl20 fsz40   marr30 padb0 ">
																				<a href="../../updateEmployeeLocation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>/<?php echo $value['enc']; ?>"><button type="button" name="Add parent" class="forword2   blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi positionAbs xs-padr15 xs-padl15"   >Select</button></a>
																			</div>
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>

											 
										<?php } ?>    									
								
								</div>
										 <input type="hidden" value="0" name="property_id" id="property_id"   />
									<div id="errorMsg" class="fsz20 red_txt">	 </div>
									
							 
								 
						 
							 
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>
	 <!-- /.modal -->
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
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
</html>