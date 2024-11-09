
<!DOCTYPE html>
<html lang="en">

<html>
	
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
    </script>
<script>
var countClick=0;
function changeBg(link,id)
			{
				if($(link).hasClass('black_brd'))
				{
					countClick=countClick-1;
					 
					$(link).removeClass('black_brd');
					if(id==1)
					{
						$("#employer").val(0);
					}
					if(id==2)
					{
						$("#supplier").val(0);
					}
					if(id==3)
					{
						$("#tenant").val(0);
					}
					if(id==4)
					{
						$("#skola").val(0);
					}
				}
				else
				{
					countClick=countClick+1;
					
					$(link).addClass('black_brd');
					if(id==1)
					{
						$("#employer").val(1);
					}
					if(id==2)
					{
						$("#supplier").val(1);
					}
					if(id==3)
					{
						$("#tenant").val(1);
					}
					if(id==4)
					{
						$("#skola").val(1);
					}
					
					
					
				}
			}
function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
	function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					alert('Please provide a valid email address');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}
			
			
			function submitform()
			{
			$('#errorMsg').html('');
			
			if(countClick==0)
							{
								$("#popup_fade").addClass('active');
								$("#popup_fade").attr('style','display:block');
								$("#gratis_popup_error").addClass('active');
								$("#gratis_popup_error").attr('style','display:block');
								$("#errorMsg").html("please select atleast one request");
								return false;	
							}
							else 
							{
								document.getElementById("save_indexing").submit();
							}
						
			}
			
			
			function voidRequest()
			{
				$('#errorMsg').html('');
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("you already sent this request");
				return false;		
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

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg ffamily_avenir" >
			<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/CompanySearch" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/user/index.php/CompanySearch" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>

	
	<div class="column_m  talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn nobold"  >Select</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn nobold" >Select your relations towards the company and connect</a></div>	
							
									 
								 
						<form action="../<?php if($employeeAccount['ssn']!='' && $employeeAccount['ssn']!='-' && $employeeAccount['ssn']!=null && $employeeAccount['ssn']!=0) echo 'updateRequestAll'; else echo 'updateRequestAccount'; ?>/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard" class="mart20">
								<div class="step">
									
									
									
									
											<div class="form-group hidden">
										<div class="styled-select clearfix">
											<select class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p  lgt_grey_txt tall padl0" style="text-align-last:center;" name="property_id" id="property_id">
												
										<?php 
										foreach($locationDetail as $category => $value) 
													{
													?> 
										<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg lgt_grey_txt fsz16 tall"><?php echo $value['visiting_address']; ?></option>
													<?php } ?>                         
											</select>
										</div>
									</div>
									
									<div class="form-group hidden" >
										<input type="text" name="ssn" id="ssn" placeholder="Employee SSN" value="<?php echo $employeeAccount['ssn']; ?>" class="fsz18 xs-fsz16 brdb brdrad3 wi_100 trans_bg required minhei_65p nobrd talc black_txt" <?php if($employeeAccount['ssn']==0) echo ""; else if($employeeAccount['ssn']>0 &&($employeeAccount['ssn']!='' || $employeeAccount['ssn']!=null) ) echo 'readonly'; ?>>
									</div>
									<input type="hidden" id="ind" name="ind" value="<?php if($employeeAccount['ssn']==0) echo 0; else if($employeeAccount['ssn']>0 &&($employeeAccount['ssn']!='' || $employeeAccount['ssn']!=null) ) echo 1; ?>" />
									<div class="container padrl0 xs-padrl0">
							<div class=" wi_50 xxs-wi_50 fleft bs_bb padrb20 talc  xs-padr10" >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_190p xxs-hei_160p dblock bs_bb pad25 xs-pad10 brdclr_seggreen_h brdrad5  lgtgrey2_bg    trans_all2 " onclick="<?php if($employeeRequestCount==1) echo 'voidRequest(0);'; else echo 'changeBg(this,1);'; ?>" >
																<div class="talc ">
																	<div class="wi_100 hei_90p  bs_bb padrl20">
																		<img src="../../../../html/usercontent/images/random/officepng.png" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padb15 padt20 xs-padt15 xs-padr0">
																		<h3 class=" talc pad0 txtovfl_el  lgn_hight_24 bold fsz18 segdblue_txt padt0">Employer</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												<div class=" wi_50 xxs-wi_50 fleft bs_bb padrb20 talc xs-padr0 xs-padl10 " >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_190p xxs-hei_160p dblock bs_bb pad25 xs-pad10 brdclr_seggreen_h brdrad5  lgtgrey2_bg    trans_all2 " onclick="<?php if($supplierRequestCount==1) echo 'voidRequest(0);'; else echo 'changeBg(this,2);'; ?>" >
																<div class="talc ">
																	<div class="wi_100 hei_90p  bs_bb padrl20">
																		<img src="../../../../html/usercontent/images/random/13-512.png" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padb15 padt20 xs-padt15 xs-padr0">
																		<h3 class=" talc pad0 txtovfl_el  lgn_hight_24 bold fsz18 segdblue_txt padt0">Supplier</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
											 
												
												<div class=" wi_50 xxs-wi_50 fleft bs_bb padrb20 talc xs-padr0 xs-padl10 " >
													<div class="toggle-parent wi_100 dflex alit_s">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_190p xxs-hei_160p dblock bs_bb pad25 xs-pad10  brdclr_seggreen_h brdrad5  lgtgrey2_bg    trans_all2 " onclick="<?php if($studentRequestCount==1) echo 'voidRequest(0);'; else echo 'changeBg(this,4);'; ?>">
																<div class="talc ">
																	<div class="wi_100 hei_90p  bs_bb padrl20">
																		<img src="../../../../html/usercontent/images/random/School-PNG-Pic.png" height="90" width="90" class="brdrad5 padb0">
																	</div>
																	
																	<div class="padb15 padt20 xs-padt15 xs-padr0">
																		<h3 class=" talc pad0 txtovfl_el  lgn_hight_24 bold fsz18 segdblue_txt padt0">School</h3>
																		 
																		
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
									</div>
									
							<input type="hidden" name="employer" id="employer" />
							<input type="hidden" name="supplier" id="supplier" />
							<input type="hidden" name="tenant" id="tenant" />
							<input type="hidden" name="skola" id="skola" />
 									
								</div>
							
							</div>
							<div class="clear"></div>
							<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18 trn ffamily_avenir" onclick="submitform();">Send</button>
								
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
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